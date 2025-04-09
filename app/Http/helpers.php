<?php
use App\Models\ProcurementEntity;
use App\Models\Quarter;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\FinancialYear;
use App\Exports\GenericExport;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Auth\Access\Response;

if (!function_exists('getPossibleEnumValues')) {

    /**
     * Gets possible enum values for a column
     *
     * @param String $table
     * @param String $column
     * @return Array
     */
    function getPossibleEnumValues($table, $column)
    {
        $rawQuery = DB::raw('SHOW COLUMNS FROM ' . $table . ' WHERE Field = "' . $column . '"');

        $stringQuery = $rawQuery->getValue(DB::connection()->getQueryGrammar());

        $column = DB::select($stringQuery);

        if (count($column) == 0) {
            return array();
        }
        // Pulls column string from DB
        $enumStr = $column[0]->Type;

        // Parse string
        preg_match_all("/'([^']+)'/", $enumStr, $matches);

        // Return matches
        return isset($matches[1]) ? $matches[1] : [];
    }
}

if (!function_exists('sanitizeQuery')) {
    /**
     * Sanitize query by column white-listing
     *
     * @param Illuminate\Database\*\Builder $query
     * @param array<array> $selectedColumns
     *
     * Eloquent column refers to a column accessed via an eloquent relationship
     */
    function sanitizeQuery($query, $selectedColumns)
    {
        $type = get_class($query);

        /**
         * Check whether inputs are well formatted.
         * Just confirming the array structure.
         */
        if (!array_key_exists('normal', $selectedColumns))
            throw new Exception('Invalid request');

        if (!array_key_exists('eloquent', $selectedColumns))
            throw new Exception('Invalid request');

        // we now collect all the columns from the involved tables.

        /**
         * For an eloquent query
         */
        if ($type === 'Illuminate\Database\Eloquent\Builder') {
            // attempt to get the list of columns from the memory in model
            $validColumns = $query->getModel()->getFillable();

            if (count($validColumns) === 0) {
                // if non exist in memory, get the list from the DB.
                $validColumns = Schema::getColumnListing($query->getQuery()->from);
            } else {
                $validColumns = array_merge($validColumns, ['created_at', 'updated_at']);
            }

            /**
             * This function does actual screening through a fast-fail approach
             * by comapring the list of valid columns to what was requested for.
             */
            validateColumns($validColumns, $selectedColumns['normal']);

            // get columns from the related tables
            foreach ($selectedColumns['eloquent'] as $eloquentColumn) {
                $relationship = $eloquentColumn['relationship'];
                $relatedColumns = $query->getModel()->$relationship()->getRelated()->getFillable();

                if (count($relatedColumns) === 0) {
                    $table = $query->getModel()->$relationship()->getRelated()->getTable();
                    $relatedColumns = Schema::getColumnListing($table);
                }

                // Covers the Audit model which uses a MorphTo relationship
                $relationshipInstance = $query->getModel()->$relationship();
                if (get_class($relationshipInstance) === "Illuminate\Database\Eloquent\Relations\MorphTo") {
                    $relatedColumns = array_merge(
                        $relatedColumns,
                        Schema::getColumnListing($relationshipInstance->getRelationName() . "s")
                    );
                }

                // finally we validate the columns
                validateColumns($relatedColumns, [$eloquentColumn['name']]);
            }

            return;
        }

        /**
         * For a plain query builder, no eloquent
         */
        if ($type === 'Illuminate\Database\Query\Builder') {
            //get all the table columns
            $validColumns = Schema::getColumnListing($query->from);

            //add the columns from all the joined tables
            foreach ($query->joins as $joined) {
                $joinedColumns = Schema::getColumnListing($joined->table);
                $validColumns = array_merge($validColumns, $joinedColumns);
            }

            // actual validation
            validateColumns($validColumns, $selectedColumns['normal']);

            return;
        }
    }

    /**
     * Checks if any of the selected columns
     * are invalid, if so
     *
     * @throws Exception('Invalid request.')
     */
    function validateColumns($validColumns, $selectedColumns)
    {
        // remove duplicates
        $uniqueSelectedColumns = array_unique($selectedColumns);

        // Use the intersection operation to screen.
        // All the the selected columns ( the user requested columns) must
        // be present in the list of valid columns
        $intersection = array_intersect($validColumns, $uniqueSelectedColumns);

        if (count($intersection) < count($uniqueSelectedColumns)) {
            // dd("valid:", $validColumns, "selected:", $selectedColumns);
            throw new Exception('Invalid request.');
        }
    }
}

if (!function_exists('datatabulate')) {
    function datatabulate(Request $request, $query, $perPage = 10, $asc = false)
    {
        $emptyParams = [];
        $involvedColumns = [
            'normal' => [],
            'eloquent' => []
        ];
        $columns = [];
        $sortbyColumn = null;

        /**
         * Get all columns involved for sanitization.
         * 
         * This is necessary to mitigate SQL injection attacks.
         */
        foreach ($request->except(['search', 'page', 'perpage', 'order', 'sortby', 'export']) as $column => $filter) {
            /**
             * we use the colon syntax i.e relationship:col to denote eloquent relationships
             */
            // we isolate eloquent columns by checking that they have a colon
            if (preg_match('/:/', $column)) {
                // extract the relatioship name and column in the foreign tbale
                $relation = explode(':', $column);
                $eloquentColumn = [
                    'name' => $relation[1], // column in foreign table
                    'isEloquent' => true,
                    'relationship' => $relation[0] // name of relationship
                ];
                $columns[] = $eloquentColumn;
                
                // we save all the requested eloquent columns here
                $involvedColumns['eloquent'][] = $eloquentColumn;
                continue;
            }

            // we save all the requested columns here
            $involvedColumns['normal'][] = $column;

            // we save a similar list of columns but with useful metadata
            $columns[] = [
                "name" => $column,
                "isEloquent" => false,
            ];
        }

        /**
         * Get sortby column for sanitization
         */
        if ($request->query('sortby')) {
            /**
             * If it is an eloquent column i.e relationship:column
             */
            if (preg_match('/:/', $request->query('sortby'))) {
                $relation = explode(':', $request->query('sortby'));

                // save the sort-by columns
                $sortbyColumn = [
                    'name' => $relation[1],
                    'isEloquent' => true,
                    'relationship' => $relation[0]
                ];

                // we also save them to the list of involved columns
                $involvedColumns['eloquent'][] = $sortbyColumn;
            } else {
                $sortbyColumn = [
                    'name' => $request->query('sortby'),
                    'isEloquent' => false,
                ];

                $involvedColumns['normal'][] = $sortbyColumn['name'];
            }
        }

        /**
         * Halt when rogue column is submitted
         */
        sanitizeQuery($query, $involvedColumns);

        /**
         * Handle search in columns
         */
        foreach ($request->except(['search', 'page', 'perpage', 'order', 'sortby', 'export']) as $column => $filter) {
            if (!$filter) {
                array_push($emptyParams, $column);
                continue;
            }
            //check for eloquent relationship
            if (preg_match('/:/', $column)) {
                $relation = explode(':', $column);
                $foreignTable = getTableFromRelationship($query, $relation[0]);
                //search in relationship
                $query->whereRelation($relation[0], "{$foreignTable}.{$relation[1]}", 'LIKE', "%{$filter}%");
            } else {
                $query->where("{$query->from}.{$column}", 'LIKE', "%{$filter}%");
            }
        }

        /**
         * Search in every column which was not submitted with a keyword.
         * 
         * If a global search keyword was entered we attempt searching in every
         * requested column that did not have an explicit search keyword.
         */
        if ($request->query('search')) {
            $query->where(function (Builder $query) use ($request, $emptyParams) {
                foreach ($emptyParams as $param) {
                    //check for eloquent relationship
                    if (preg_match('/:/', $param)) {
                        $relation = explode(':', $param);
                        $foreignTable = getTableFromRelationship($query, $relation[0]);

                        //search in relationship
                        $query->orWhereRelation($relation[0], "{$foreignTable}.{$relation[1]}", 'LIKE', "%{$request->query('search')}%");
                    } else {
                        $query->orWhere("{$query->from}.{$param}", 'LIKE', "%{$request->query('search')}%");
                    }
                }
            });
        }

        /**
         * Handle sortby
         */
        if ($request->query('sortby')) {

            /**
             * Clear any order by clause present so that the one
             *  requested by the user takes precedence
             * */
            $query->reorder();

            /**
             * Handle sortby for eloquent queries.
             * 
             * This is complicated because laravel does not support
             * order by for eloquent related columns. Each relationship
             * type has its own complications.
             * 
             * The approach is to manually do a join the tables involved
             * in the eloquent query and sort the results using the
             * user-specified column.
             */
            if (preg_match('/:/', $request->query('sortby'))) {
                $relation = explode(':', $request->query('sortby'));
                $relationFunc = $relation[0];
                $model = $query->getModel();
                $relationship = $model->$relationFunc();
                $foreignTable = $relationship->getRelated()->getTable();
                $type = get_class($relationship);
                if ( $type == "Illuminate\Database\Eloquent\Relations\BelongsToMany" || $type ==  "Illuminate\Database\Eloquent\Relations\MorphToMany" ){
                    $pivotTable = $relationship->getTable();
                    $query->join(
                        $pivotTable,
                        "{$pivotTable}.{$relationship->getForeignPivotKeyName()}",
                        '=',
                        "{$model->getTable()}.{$relationship->getParentKeyName()}"
                    )
                        ->join(
                            $foreignTable,
                            "{$foreignTable}.{$relationship->getRelatedKeyName()}",
                            '=',
                            "{$pivotTable}.{$relationship->getRelatedPivotKeyName()}"
                        )
                        ->select(DB::raw("{$foreignTable}.*, {$pivotTable}.*, {$model->getTable()}.*,
                        {$foreignTable}.{$relationship->getRelatedKeyName()} as {$relationFunc}{$relationship->getRelatedKeyName()}"))
                        // ->distinct("{$model->getTable()}.id")
                        ->orderBy("{$foreignTable}.{$relation[1]}", $request->query('order', 'asc'));
                } else if ( $type ==  "Illuminate\Database\Eloquent\Relations\BelongsTo" || $type == "Illuminate\Database\Eloquent\Relations\MorphTo" ){
                    $query->join(
                        $foreignTable,
                        "{$foreignTable}.{$relationship->getOwnerKeyName()}",
                        '=',
                        "{$model->getTable()}.{$relationship->getForeignKeyName()}"
                    )
                        ->select(DB::raw("{$foreignTable}.*, {$model->getTable()}.*, {$foreignTable}.{$relationship->getOwnerKeyName()} as {$relationFunc}{$relationship->getOwnerKeyName()}"))
                        ->orderBy("{$foreignTable}.{$relation[1]}", $request->query('order', 'desc'));
                }else if ( $type ==  "Illuminate\Database\Eloquent\Relations\HasOneThrough" || $type == "Illuminate\Database\Eloquent\Relations\HasManyThrough" ){

                    $localTable = $model->getTable();
                    $intermediateTable = $relationship->getParent()->getTable();
                    $foreignTable = $relationship->getRelated()->getTable();
                   
                    $query
                        ->join(
                            $intermediateTable,
                            "{$relationship->getQualifiedFirstKeyName()}",
                            '=',
                            "{$relationship->getQualifiedLocalKeyName()}",
                        )
                        ->join(
                            $foreignTable,
                            "{$intermediateTable}.{$relationship->getSecondLocalKeyName()}",
                            '=',
                            "{$relationship->getQualifiedForeignKeyName()}"
                        )
                        ->select(
                            DB::raw( 
                                "{$intermediateTable}.*, 
                                {$localTable}.*"
                            )
                        )
                        ->orderBy("{$foreignTable}.{$relation[1]}", $request->query('order', 'desc'));

                    }
                    else {
                    $query->join(
                        $foreignTable,
                        "{$foreignTable}.{$relationship->getForeignKeyName()}",
                        '=',
                        "{$model->getTable()}.{$relationship->getLocalKeyName()}"
                    )
                        ->select(DB::raw("{$foreignTable}.*, {$model->getTable()}.*, {$foreignTable}.{$relationship->getForeignKeyName()} as {$relationFunc}{$relationship->getForeignKeyName()}"))
                        ->orderBy("{$foreignTable}.{$relation[1]}", $request->query('order', 'desc'));
                }
            } else {
                $query->orderBy("{$query->from}.{$request->query('sortby')}", $request->query('order', 'desc'));
            }
        } else {
            // it is trivial for non-eloquent queries
            if (!(get_class($query) === "Illuminate\\Database\\Query\\Builder")) {
                $query->orderBy("id", $asc ? 'ASC' : 'DESC');
            }
        }

        // handle excel exports
        if($request->query('export')){
            return exportDataTable($request, $query, $columns);
        }
        // otherwise paginate results
        else{
            return paginateWithQueryString($query, $request->query('perpage', $perPage));
        }
    }
}

function camelToTitleCase($str)
{
    return Str::title(str_replace('_', ' ', Str::snake($str)));
}

/**
 * Export whatever is passed to excel
 * @param mixed $query
 * @param mixed $involvedColumns
 * @return void
 */
function exportDataTable($request, $query, $columns)
{
    /**
     * Collect headings from involved columns
     */
    $headings = collect($columns)->map(function ($col){
        if($col['isEloquent']) return camelToTitleCase($col['relationship']);

        else return $col['name'];
    });

    /**
     * We utilize the same datatable query to get the results.
     */
    $records = $query->get();

    /**
     * Then we map the results to the headings.
     */
    $rows = $records->map(function ($record) use($columns) {
        $row = [];

        foreach ($columns as $column) {
            $name = $column['name'];

            if($column['isEloquent']){

                $relationship = $column['relationship'];

                /**
                 * We utilize that datatable definition to get the nested 
                 * information e.g for eloqent.
                 * 
                 * The colon syntax definition (relationship:col) must be correct 
                 * for a correct mapping.
                 */
                $row[] = $record?->$relationship?->$name;
            }
            else{
                $row[] = $record?->$name;
            }
        }

        return $row;
    });

    /**
     * Download the excel
     */
    $export = new GenericExport($rows, $headings->toArray());

    return Excel::download($export, Str::slug($request->getPathInfo()) . '.xlsx');
}

function getTableFromRelationship($query, $relationFunction): string
{
    $model = $query->getModel();
    $relationship = $model->$relationFunction();
    return $relationship->getRelated()->getTable();
}

function paginateWithQueryString($query, $perPage)
{
    return $query->paginate($perPage)->withQueryString();
}