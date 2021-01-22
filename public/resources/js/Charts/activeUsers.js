const activeUsercanvas = document.querySelector('#activeUsers').getContext('2d')

// chart.js default config
Chart.defaults.global.defaultFontFamily = 'Montserrat'
Chart.defaults.global.defaultFontSize = 12
Chart.defaults.global.defaultFontColor = '#666'

// tutors growth chart
const activeUsers = new Chart(activeUsercanvas, {
  type: 'bar',
  // responsive: true,
  data: {
    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', "Sun"],
    datasets: [{
      label: 'Active Users',
      data: [50, 100, 120, 75, 98, 174, 85],
      backgroundColor: '#0052E9',
      hoverBorderWidth: 2,
      hoverBorderColor: '#333',
      barThickness: 18
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
          stepSize: 20
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