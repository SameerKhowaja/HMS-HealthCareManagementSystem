if (document.querySelector('#age_wise')) {
    const ageCanvas = document.querySelector('#age_wise').getContext('2d');
    // ali added --
    const age_wise_graph = JSON.parse(document.querySelector('#age_wise').dataset.research_age);
    console.log(age_wise_graph);
    // ----
    // chart.js default config
    Chart.defaults.global.defaultFontFamily = 'Montserrat'
    Chart.defaults.global.defaultFontSize = 12
    Chart.defaults.global.defaultFontColor = '#666'

    // users growth chart
    const age_res = new Chart(ageCanvas, {
        type: 'bar',
        responsive: true,
        data: {
            labels: ["0-10", "11-20", "21-30", "31-40", "41-50", "51-60", "61-70", "71-80", "81-90"],
            datasets: [{
                    label: 'Cured',
                    data: [age_wise_graph['cured']["0-10"], age_wise_graph['cured']["11-20"], age_wise_graph['cured']["21-30"], age_wise_graph['cured']["31-40"], age_wise_graph['cured']["41-50"], age_wise_graph['cured']["51-60"], age_wise_graph['cured']["61-70"], age_wise_graph['cured']["71-80"], age_wise_graph['cured']["81-90"]],
                    backgroundColor: "#2e86c1",
                    hoverBorderWidth: 2,
                    hoverBorderColor: '#333',
                    barThickness: 20
                },
                {
                    label: 'Not Cured',
                    data: [age_wise_graph['not_cured']["0-10"], age_wise_graph['not_cured']["11-20"], age_wise_graph['not_cured']["21-30"], age_wise_graph['not_cured']["31-40"], age_wise_graph['not_cured']["41-50"], age_wise_graph['not_cured']["51-60"], age_wise_graph['not_cured']["61-70"], age_wise_graph['not_cured']["71-80"], age_wise_graph['not_cured']["81-90"]],
                    backgroundColor: "#ff5733",
                    hoverBorderWidth: 2,
                    hoverBorderColor: '#0052E9',
                    barThickness: 20
                }
            ]
        },
        options: {
            title: {
                display: true,
                text: 'Statistics of ' + age_wise_graph['disease'] + ' Disease (Age Wise)'
            },
            scales: {
                x: {
                    stacked: true,
                },
                y: {
                    stacked: true
                },
                yAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: age_wise_graph['disease']
                    }
                }],
                xAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: 'Age'
                    }
                }]
            }
        }
    })


}

if (document.querySelector('#gender_wise')) {
    const genderCanvas = document.querySelector('#gender_wise').getContext('2d');
    // ali added --
    const gender_wise_graph = JSON.parse(document.querySelector('#gender_wise').dataset.research_gender);
    console.log(gender_wise_graph);
    // ----
    // chart.js default config
    Chart.defaults.global.defaultFontFamily = 'Montserrat'
    Chart.defaults.global.defaultFontSize = 12
    Chart.defaults.global.defaultFontColor = '#666'

    // users growth chart
    const gender_res = new Chart(genderCanvas, {
        type: 'bar',
        responsive: true,
        data: {
            labels: ["male", "female"],
            datasets: [{
                    label: 'Cured',
                    data: [gender_wise_graph['cured']["male"], gender_wise_graph['cured']["female"]],
                    backgroundColor: "#2e86c1",
                    hoverBorderWidth: 2,
                    hoverBorderColor: '#333',
                    barThickness: 30
                },
                {
                    label: 'Not Cured',
                    data: [gender_wise_graph['not_cured']["male"], gender_wise_graph['not_cured']["female"]],
                    backgroundColor: "#ff5733",
                    hoverBorderWidth: 2,
                    hoverBorderColor: '#0052E9',
                    barThickness: 30
                }
            ]
        },
        options: {

            title: {
                display: true,
                text: 'Statistics of ' + gender_wise_graph['disease'] + ' Disease (Gender Wise)'
            },
            scales: {
                x: {
                    stacked: true,
                },
                y: {
                    stacked: true
                },
                yAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: gender_wise_graph['disease'],
                    },
                    ticks: {
                        min: 0
                    }
                }],
                xAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: 'Gender'
                    }
                }]
            }
        }
    })


}

if (document.querySelector('#medicine_wise')) {
    const medicineCanvas = document.querySelector('#medicine_wise').getContext('2d');
    // ali added --
    const medicine_wise_graph = JSON.parse(document.querySelector('#medicine_wise').dataset.research_medicine);
    console.log(medicine_wise_graph);
    // ----
    // chart.js default config
    Chart.defaults.global.defaultFontFamily = 'Montserrat'
    Chart.defaults.global.defaultFontSize = 12
    Chart.defaults.global.defaultFontColor = '#666'

    // users growth chart
    let cured = [];
    let not_cured = [];
    for (let i = 0; i < medicine_wise_graph['meds'].length; i++) {
        if (medicine_wise_graph['cured'][medicine_wise_graph['meds'][i]]) {
            cured[i] = medicine_wise_graph['cured'][medicine_wise_graph['meds'][i]];
        } else {
            cured[i] = 0;
        }

        if (medicine_wise_graph['not_cured'][medicine_wise_graph['meds'][i]]) {
            not_cured[i] = medicine_wise_graph['not_cured'][medicine_wise_graph['meds'][i]];
        } else {
            not_cured[i] = 0;
        }

    }

    const medicine_res = new Chart(medicineCanvas, {
        type: 'bar',
        responsive: true,
        data: {
            labels: medicine_wise_graph['meds'],
            datasets: [{
                    label: 'Cured',
                    data: cured,
                    backgroundColor: "#2e86c1",
                    hoverBorderWidth: 2,
                    hoverBorderColor: '#333',
                    barThickness: 30
                },
                {
                    label: 'Not Cured',
                    data: not_cured,
                    backgroundColor: "#ff5733",
                    hoverBorderWidth: 2,
                    hoverBorderColor: '#0052E9',
                    barThickness: 30
                }
            ]
        },
        options: {

            title: {
                display: true,
                text: 'Statistics of ' + medicine_wise_graph['disease'] + ' Disease (Medicine Wise)'
            },
            scales: {
                x: {
                    stacked: true,
                },
                y: {
                    stacked: true
                },
                yAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: medicine_wise_graph['disease'],
                    },
                    ticks: {
                        min: 0
                    }
                }],
                xAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: 'Medicine'
                    }
                }]
            }
        }
    })


}