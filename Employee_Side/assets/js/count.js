// count.js
function countAppointments(endValue) {
    let valueDisplay = document.getElementById("totalAppointments");
    let startValue = 0;
    let duration = 50;

    let counter = setInterval(function () {
        startValue += 1;
        valueDisplay.textContent = startValue;
        if (startValue >= endValue) {
            clearInterval(counter);
        }
    }, duration);
}

function countForms(endValue) {
    let valueDisplay = document.getElementById("total");
    let startValue = 0;
    let duration = 50;

    let counter = setInterval(function () {
        startValue += 1;
        valueDisplay.textContent = startValue;
        if (startValue >= endValue) {
            clearInterval(counter);
        }
    }, duration);
}
