const tutorCanvas = document.querySelector('#tutorGrowth').getContext('2d');
// ali added --
const stafCount = JSON.parse(document.querySelector('#tutorGrowth').dataset.staff);
//---


// chart.js default config
Chart.defaults.global.defaultFontFamily = 'Montserrat'
Chart.defaults.global.defaultFontSize = 12
Chart.defaults.global.defaultFontColor = '#666'

// tutors growth chart
const tutorGrowth = new Chart(tutorCanvas, {
    type: 'bar',
    // responsive: true,
    data: {
        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', "Sun"],
        datasets: [{
            label: 'User Growth(New Users)',
            data: [stafCount['Mon'], stafCount['Tue'], stafCount['Wed'], stafCount['Thu'], stafCount['Fri'], stafCount['Sat'], stafCount["Sun"]],
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