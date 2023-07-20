document.addEventListener('DOMContentLoaded', function () {
    // Attach event handlers once the DOM is loaded
    document.getElementById("editButton").addEventListener("click", openEditModal);
    document.getElementById("closeButton").addEventListener("click", closeEditModal);

    //line chart
    var ctxL = document.getElementById("lineChart").getContext('2d');
    var myLineChart = new Chart(ctxL, {
    type: 'line',
    data: {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [
        {
            label: "Avrage workout accuracy",
            data: [35, 38, 44, 40, 46, 44, 55],
            backgroundColor: ['#004AAD'],
            borderColor: ['#004AAD'],
            borderWidth: 2
        }
        ]
    },
    options: {
        responsive: true
    }
    });
});

function openEditModal() {
    document.getElementById("editModal").style.display = "block";
}

function closeEditModal() {
    document.getElementById("editModal").style.display = "none";
}
