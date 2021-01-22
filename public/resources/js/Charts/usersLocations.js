const userLocationcanvas = document.querySelector('#userLocation');

// chart.js default config
Chart.defaults.global.defaultFontFamily = 'Montserrat'
Chart.defaults.global.defaultFontSize = 12
Chart.defaults.global.defaultFontColor = '#666'

// tutors growth chart
const userLocation = new Chart(userLocationcanvas, {
  type: 'doughnut',
  data: {
    labels: ['Usa', 'Canada', 'Denmark', 'Spain', 'Nigeria', 'Others'],
    datasets: [{
      label: 'Age distribution',
      data: [200, 120, 150, 210, 60, 240],
      backgroundColor: ['#2F70E9', '#D1495B', '#EAC435', '#F29E4C', '#219653', '#0052e93d'],
      hoverBorderWidth: 2,
      hoverBorderColor: '#333',
      borderWidth: 0
    }]
  },
  options: {
    cutoutPercentage: 80,
    legend: {
      display: true,
      position: 'right',
      fullWidth: true,
      labels: {
        boxWidth: 10,
        padding: 15
      }
    }
  }
})