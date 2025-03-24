console.log("Graphs being loaded");
const ctx = document.getElementById('myChart');

//Defaults
let typeSelectedOption = "amountOfSleep";
let timeSelectedOption = "perDay";

const typeDropdown = document.getElementById("myTypeDropdown");
const timeDropdown = document.getElementById("myTimeDropdown");

let sleepDate = sleepLogs.map(data => data.start_date);

let duration = sleepLogs.map(data => data.duration);
let quality = sleepLogs.map(data => data.sleep_quality);

const noLogsMessage = document.getElementById('noLogsMessage');


typeDropdown.addEventListener("change", function() {
    typeSelectedOption = typeDropdown.value;
    console.log(typeSelectedOption);
});
timeDropdown.addEventListener("change", function() {
    timeSelectedOption = timeDropdown.value;
    console.log(timeSelectedOption);
});

console.log(sleepLogs);
// If there are logs of sleep in the database, then show the graph. Else no graph and show the message.
if (sleepLogs.length > 0) {
    console.log("Logs");
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: sleepDate, // X-axis (dates)
            datasets: [{
                label: 'Hours Slept',
                data: duration, // Y-axis (sleep duration)
                borderColor: 'blue',
                backgroundColor: 'rgba(0, 0, 255, 0.2)',
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
    });

    noLogsMessage.style.display = 'none';
} else {
    console.log("No Logs");
    noLogsMessage.style.display = 'block';
}
