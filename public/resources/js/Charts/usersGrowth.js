const userCanvas = document.querySelector('#userGrowth').getContext('2d');
// ali added --
const userCount = JSON.parse(document.querySelector('#userGrowth').dataset.users);

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
            data: [userCount['Mon'], userCount['Tue'], userCount['Wed'], userCount['Thu'], userCount['Fri'], userCount['Sat'], userCount["Sun"]],
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