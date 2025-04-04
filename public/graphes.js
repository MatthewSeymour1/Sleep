const ctx = document.getElementById('myChart');
let charts = [];

//Defaults
let typeSelectedOption = "amountOfSleep";
let timeSelectedOption = "perDay";
let graphTypeSelectedOption = "line";

const typeDropdown = document.getElementById("myTypeDropdown");
const timeDropdown = document.getElementById("myTimeDropdown");
const graphTypeDropdown = document.getElementById("myGraphType");

let sleepDate = sleepLogs.map(data => data.start_date);
let sleepWeek = sleepLogs.map(data => data.start_week);
let uniqueSleepWeek = [...new Set(sleepWeek)];
console.log(uniqueSleepWeek);
let sleepMonth = sleepLogs.map(data => data.start_month);
let uniqueSleepMonth = [...new Set(sleepMonth)];

let duration = sleepLogs.map(data => data.duration);
let durationWeek = uniqueSleepWeek.map(week => {
    let weekLogs = sleepLogs.filter(data => data.start_week === week);
    let totalDuration = weekLogs.reduce((sum, log) => sum + log.duration, 0);
    return totalDuration;
});
let durationMonth = uniqueSleepMonth.map(month => {
    let monthLogs = sleepLogs.filter(data => data.start_month === month);
    let totalDuration = monthLogs.reduce((sum, log) => sum + log.duration, 0);
    return totalDuration;
});

console.log(durationWeek);
let quality = sleepLogs.map(data => data.sleep_quality);
let qualityWeek = uniqueSleepWeek.map(week => {
    let weekLogs = sleepLogs.filter(data => data.start_week === week);
    let totalQuality = weekLogs.reduce((sum, log) => sum + log.sleep_quality, 0);
    return totalQuality;
});
let qualityMonth = uniqueSleepMonth.map(month => {
    let monthLogs = sleepLogs.filter(data => data.start_month === month);
    let totalQuality = monthLogs.reduce((sum, log) => sum + log.sleep_quality, 0);
    return totalQuality;
});


const noLogsMessage = document.getElementById('noLogsMessage');
const logsDropdown = document.getElementById('logsDropdown');


typeDropdown.addEventListener("change", function() {
    typeSelectedOption = typeDropdown.value;
    console.log(typeSelectedOption);
    renderAnyGraph();

});
timeDropdown.addEventListener("change", function() {
    timeSelectedOption = timeDropdown.value;
    console.log(timeSelectedOption);
    renderAnyGraph();
});
graphTypeDropdown.addEventListener("change", function() {
    graphTypeSelectedOption = graphTypeDropdown.value;
    console.log(graphTypeSelectedOption);
    renderAnyGraph();
});

renderAnyGraph();


function renderAnyGraph() {
    let yAxis, xAxis, titleLabel, typeOfGraph;
    typeOfGraph = graphTypeSelectedOption;

    if (typeSelectedOption == "amountOfSleep") {
        titleLabel = "Hours Slept";
        if (timeSelectedOption == "perDay") {
            yAxis = duration;
            xAxis = sleepDate;
        }
        else if (timeSelectedOption == "perWeek") {
            yAxis = durationWeek;
            xAxis = uniqueSleepWeek;
        }
        else if (timeSelectedOption == "perMonth") {
            yAxis = durationMonth;
            xAxis = uniqueSleepMonth;
        }
    }
    else if (typeSelectedOption == "qualityOfSleep") {
        titleLabel = "Quality of Sleep";
        if (timeSelectedOption == "perDay") {
            yAxis = quality;
            xAxis = sleepDate;
        }
        else if (timeSelectedOption == "perWeek") {
            yAxis = qualityWeek;
            xAxis = uniqueSleepWeek;
        }
        else if (timeSelectedOption == "perMonth") {
            yAxis = qualityMonth;
            xAxis = uniqueSleepMonth;
        }
    }

    renderGraph(yAxis, xAxis, titleLabel, typeOfGraph);
}

function renderGraph(yAxis, xAxis, titleLabel, typeOfGraph) {
    if (charts.length > 0) {
        charts.forEach((chart) => {
            chart.destroy();
        });
    };
    console.log(sleepLogs);
    // If there are logs of sleep in the database, then show the graph. Else no graph and show the message.
    if (sleepLogs.length > 0) {
        console.log("Logs");
        charts.push(new Chart(ctx, {
            type: typeOfGraph,
            data: {
                labels: xAxis, // X-axis (dates)
                datasets: [{
                    label: titleLabel,
                    data: yAxis, // Y-axis (sleep duration)
                    borderColor: 'rgb(59, 130, 246)',
                    backgroundColor: 'rgba(59, 130, 246, 0.2)',
                    borderWidth: 2,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        }));
    
        logsDropdown.style.display = 'block';
        noLogsMessage.style.display = 'none';
    } else {
        console.log("No Logs");
        noLogsMessage.style.display = 'block';
        logsDropdown.style.display = 'none';
    }
}
