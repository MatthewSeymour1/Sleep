console.log("Graphs being loaded");
const ctx = document.getElementById('myChart');

const sleepDate = sleepLogs.map(data => data.start_date);
const sleepDuration = sleepLogs.map(data => data.duration);
const noLogsMessage = document.getElementById('noLogsMessage');
console.log(sleepLogs);
// console.log(sleepDate);
// console.log(sleepDuration);


//If there are logs of sleep in the database, then show the graph. Else no graph and show the message.
if (sleepLogs.length > 0) {
    console.log("Logs");
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: sleepDate, // X-axis (dates)
            datasets: [{
                label: 'Hours Slept',
                data: sleepDuration, // Y-axis (sleep duration)
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
