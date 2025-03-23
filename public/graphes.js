console.log("Graphs being loaded");
const ctx = document.getElementById('myChart');
const sleepLogs = JSON.parse(document.getElementById('sleepLogs').getAttribute('data-sleep-logs'));

const sleepDuration = sleepLogs.map((data) => {
    data => data.duration;
});
const sleepDate = sleepLogs.map((data) => {
    data => data.start_date;
});
console.log(sleepLogs);

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