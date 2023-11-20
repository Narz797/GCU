function countAppointments(endValue) {
    let valueDisplay = document.getElementById("totalAppointments");
    let startValue = 0;
    let duration = 50;

    let counter = setInterval(function () {
        valueDisplay.textContent = startValue; // Update the display immediately
        if (startValue >= endValue) {
            clearInterval(counter);
        } else {
            startValue += 1;
        }
    }, duration);
}

function countForms(endValue) {
    let valueDisplay = document.getElementById("total");
    let startValue = 0;
    let duration = 50;

    let counter = setInterval(function () {
        valueDisplay.textContent = startValue; // Update the display immediately
        if (startValue >= endValue) {
            clearInterval(counter);
        } else {
            startValue += 1;
        }
    }, duration);
}

function countLOA(endValue) {
    let valueDisplay = document.getElementById("total");
    let startValue = 0;
    let duration = 50;

    let counter = setInterval(function () {
        valueDisplay.textContent = startValue; // Update the display immediately
        if (startValue >= endValue) {
            clearInterval(counter);
        } else {
            startValue += 1;
        }
    }, duration);
}

function countRA(endValue) {
    let valueDisplay = document.getElementById("total");
    let startValue = 0;
    let duration = 50;

    let counter = setInterval(function () {
        valueDisplay.textContent = startValue; // Update the display immediately
        if (startValue >= endValue) {
            clearInterval(counter);
        } else {
            startValue += 1;
        }
    }, duration);
}

function countRS(endValue) {
    let valueDisplay = document.getElementById("total");
    let startValue = 0;
    let duration = 50;

    let counter = setInterval(function () {
        valueDisplay.textContent = startValue; // Update the display immediately
        if (startValue >= endValue) {
            clearInterval(counter);
        } else {
            startValue += 1;
        }
    }, duration);
}

function countWDS(endValue) {
    let valueDisplay = document.getElementById("total");
    let startValue = 0;
    let duration = 50;

    let counter = setInterval(function () {
        valueDisplay.textContent = startValue; // Update the display immediately
        if (startValue >= endValue) {
            clearInterval(counter);
        } else {
            startValue += 1;
        }
    }, duration);
}