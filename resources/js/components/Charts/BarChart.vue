<script setup>
import { Bar } from 'vue-chartjs'
import {
  Chart as ChartJS,
  Title,
  Tooltip,
  Legend,
  BarElement,
  CategoryScale,
  LinearScale
} from 'chart.js'

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)

const props = defineProps(['chartData'])
</script>

<template>
  <Bar :data="chartData" :options="{ responsive: true, maintainAspectRatio: false }" style="height: 300px;" />
</template>
