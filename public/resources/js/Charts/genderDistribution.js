const genderDistributionCanvas = document.querySelector('#genderDistribution');

// chart.js default config
Chart.defaults.global.defaultFontFamily = 'Montserrat'
Chart.defaults.global.defaultFontSize = 12
Chart.defaults.global.defaultFontColor = '#666'

// tutors growth chart
const genderDistribution = new Chart(genderDistributionCanvas, {
  type: 'doughnut',
  data: {
    labels: ['male', 'female'],
    datasets: [{
      label: 'Age distribution',
      data: [200, 120],
      backgroundColor: ['#2F70E9', '#0052e93d'],
      hoverBorderWidth: 2,
      hoverBorderColor: '#333',
      borderWidth: 0
    }]
  },
  options: {
    cutoutPercentage: 80,
    legend: {
      display: true,
      position: 'bottom',
      fullWidth: true,
      labels: {
        boxWidth: 10,
        padding: 20
      }
    }
  }
})