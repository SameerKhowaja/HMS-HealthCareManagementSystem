const ageDistributionCanvas = document.querySelector('#ageDistribution').getContext('2d')

// chart.js default config
Chart.defaults.global.defaultFontFamily = 'Montserrat'
Chart.defaults.global.defaultFontSize = 12
Chart.defaults.global.defaultFontColor = '#666'

// tutors growth chart
const ageDistribution = new Chart(ageDistributionCanvas, {
  type: 'bar',
  // responsive: true,
  data: {
    labels: ['3-10yrs', '11-18yrs', '18-25yrs', '26-33yrs', '34-41yrs', '42-49yrs', "50-59yrs"],
    datasets: [{
      label: 'Age distribution',
      data: [200, 120, 150, 210, 60, 240, 180],
      backgroundColor: '#0052E9',
      hoverBorderWidth: 2,
      hoverBorderColor: '#333',
      barThickness: 20
    }]
  },
  options: {
    legend: {
      display: false
    },
    layout: {
      padding: {
        left: 20,
        rigth: 20
      }
    },
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true,
          stepSize: 50
        }
      }],
      xAxes: [{
        gridLines: {
          display: false
        }
      }]
    }
  }
})