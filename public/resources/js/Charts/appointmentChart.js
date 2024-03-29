const userCanvas = document.querySelector('#appointment').getContext('2d');
// ali added --
const appointments = JSON.parse(document.querySelector('#appointment').dataset.appointments);
console.log(appointments);
// ----
// chart.js default config
Chart.defaults.global.defaultFontFamily = 'Montserrat'
Chart.defaults.global.defaultFontSize = 12
Chart.defaults.global.defaultFontColor = '#666'

// users growth chart
const userGrowth = new Chart(userCanvas, {
    type: 'bar',
    responsive: true,
    data: {
        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', "Sun"],
        datasets: [{
            label: 'User Growth(New Users)',
            data: [appointments['monday'], appointments['tueday'], appointments['wednesday'], appointments['thursday'], appointments['friday'], appointments['saturday'], appointments["sunday"]],
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