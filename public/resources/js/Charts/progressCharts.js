//  ali changed
const patient = document.querySelector('#patientProgress').getContext('2d')
const doctor = document.querySelector('#doctorProgress').getContext('2d')
const staff = document.querySelector('#staffProgress').getContext('2d')

// ali added --
const patientCount = document.querySelector('#patientProgress').dataset.patient
const doctorCount = document.querySelector('#doctorProgress').dataset.doctor
const staffCount = document.querySelector('#staffProgress').dataset.staff
const totalCount = document.querySelector('#patientProgress').dataset.total

// ----

// chart.js default config
Chart.defaults.global.defaultFontFamily = 'Montserrat'
Chart.defaults.global.defaultFontSize = 12
Chart.defaults.global.defaultFontColor = '#666'

// users progress chart
// ali changed
const patientProgress = new Chart(patient, {
    type: 'doughnut',
    data: {
        datasets: [{
            label: 'patients',
            percent: patientCount,
            backgroundColor: ['#0052E9']
        }]
    },
    plugins: [{
            beforeInit: (chart) => {
                const dataset = chart.data.datasets[0];
                chart.data.labels = [dataset.label];
                dataset.data = [dataset.percent, totalCount - (dataset.percent)]; //calculates the dataset as a fraction of 3000, 3000 being the max number of users(just for demo purposes)
            }
        },
        {
            beforeDraw: (chart) => {
                var width = chart.chart.width,
                    height = chart.chart.height,
                    ctx = chart.chart.ctx;
                ctx.restore();
                var fontSize = (height / 70).toFixed(2); //sets the fontsize of the center text as a function of the canvas height
                ctx.font = fontSize + "em Montserrat"; //sets the font(font family and font size to em unit)
                ctx.fillStyle = "#0052E9"; // sets the font color
                ctx.textBaseline = "middle"; //positions the text in the center of the doughnut
                var text = chart.data.datasets[0].percent, //sets the text to be equal to the percent
                    textX = Math.round((width - ctx.measureText(text).width) / 2), //horizontal positioning
                    textY = height / 2; //vertical position
                ctx.fillText(text, textX, textY);
                ctx.save();
            }
        }
    ],
    options: {
        maintainAspectRatio: false,
        cutoutPercentage: 70, //width of the circumference
        rotation: 30, // point on the circle from which the progress starts to fill out from
        legend: {
            display: false,
        },
        tooltips: {
            filter: tooltipItem => tooltipItem.index == 0,
            bodyFontSize: 10
        }
    }
});

// course progress chart
// ali changed
const doctorProgress = new Chart(doctor, {
    type: 'doughnut',
    data: {
        datasets: [{
            label: 'users',
            percent: doctorCount,
            backgroundColor: ['#0052E9']
        }]
    },
    plugins: [{
            beforeInit: (chart) => {
                const dataset = chart.data.datasets[0];
                chart.data.labels = [dataset.label];
                dataset.data = [Math.round(dataset.percent), totalCount - (dataset.percent)];
            }
        },
        {
            beforeDraw: (chart) => {
                var width = chart.chart.width,
                    height = chart.chart.height,
                    ctx = chart.chart.ctx;
                ctx.restore();
                var fontSize = (height / 70).toFixed(2);
                ctx.font = fontSize + "em Montserrat";
                ctx.fillStyle = "#0052E9";
                ctx.textBaseline = "middle";
                var text = chart.data.datasets[0].percent,
                    textX = Math.round((width - ctx.measureText(text).width) / 2),
                    textY = height / 2;
                ctx.fillText(text, textX, textY);
                ctx.save();
            }
        }
    ],
    options: {
        maintainAspectRatio: false,
        cutoutPercentage: 70,
        rotation: 30,
        legend: {
            display: false,
        },
        tooltips: {
            filter: tooltipItem => tooltipItem.index == 0,
            bodyFontSize: 10
        }
    }
});

// provider progress chart
// ali changed
const staffProgress = new Chart(staff, {
    type: 'doughnut',
    data: {
        datasets: [{
            label: 'users',
            percent: staffCount,
            backgroundColor: ['#0052E9']
        }]
    },
    plugins: [{
            beforeInit: (chart) => {
                const dataset = chart.data.datasets[0];
                chart.data.labels = [dataset.label];
                dataset.data = [dataset.percent, totalCount - (dataset.percent)];
            }
        },
        {
            beforeDraw: (chart) => {
                var width = chart.chart.width,
                    height = chart.chart.height,
                    ctx = chart.chart.ctx;
                ctx.restore();
                var fontSize = (height / 70).toFixed(2);
                ctx.font = fontSize + "em Montserrat";
                ctx.fillStyle = "#0052E9";
                ctx.textBaseline = "middle";
                var text = chart.data.datasets[0].percent,
                    textX = Math.round((width - ctx.measureText(text).width) / 2),
                    textY = height / 2;
                ctx.fillText(text, textX, textY);
                ctx.save();
            }
        }
    ],
    options: {
        maintainAspectRatio: false,
        cutoutPercentage: 70,
        rotation: 30,
        legend: {
            display: false,
        },
        tooltips: {
            filter: tooltipItem => tooltipItem.index == 0,
            bodyFontSize: 10
        }
    }
});