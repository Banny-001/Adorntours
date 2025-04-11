<script setup>
import { Doughnut } from 'vue-chartjs'
import {
  Chart as ChartJS,
  Title,
  Tooltip,
  Legend,
  ArcElement
} from 'chart.js'

ChartJS.register(Title, Tooltip, Legend, ArcElement)

const props = defineProps(['chartData'])
</script>

<template>
  <Doughnut :data="chartData" :options="{ responsive: true, maintainAspectRatio: false }" style="height: 300px;" />
</template>
