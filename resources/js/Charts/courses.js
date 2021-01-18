const coursesCanvas = document.querySelector('#numberOfCourses').getContext('2d')

// chart.js default config
Chart.defaults.global.defaultFontFamily = 'Montserrat'
Chart.defaults.global.defaultFontSize = 12
Chart.defaults.global.defaultFontColor = '#666'

// tutors growth chart
const numberOfCourses = new Chart(coursesCanvas, {
  type: 'bar',
  // responsive: true,
  data: {
    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    datasets: [{
      label: 'Number of courses',
      data: [400, 250, 300, 280, 290, 450, 420, 420, 290, 150, 490, 290],
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
          stepSize: 100
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