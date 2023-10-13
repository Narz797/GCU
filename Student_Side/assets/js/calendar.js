$(document).ready(function () {
  const calendar = document.querySelector(".calendar"),
    date = document.querySelector(".date"),
    daysContainer = document.querySelector(".days"),
    prev = document.querySelector(".prev"),
    next = document.querySelector(".next"),
    todayBtn = document.querySelector(".today-btn"),
    gotoBtn = document.querySelector(".goto-btn"),
    dateInput = document.querySelector(".date-input"),
    eventDay = document.querySelector(".event-day"),
    eventDate = document.querySelector(".event-date"),
    eventsContainer = document.querySelector(".events"),
    addEventBtn = document.querySelector(".add-event"),
    addEventWrapper = document.querySelector(".add-event-wrapper"),
    addEventCloseBtn = document.querySelector(".close"),
    addEventTitle = document.querySelector(".event-name"),
    addEventStudentName = document.querySelector(".event-student-name"),
    addEventFrom = document.querySelector(".event-time-from"),
    addEventTo = document.querySelector(".event-time-to"),
    addEventSubmit = document.querySelector(".add-event-btn");

  let today = new Date();
  let activeDay;
  let month = today.getMonth();
  let year = today.getFullYear();

  updateEvents(year, month, activeDay);

  const months = [
    "January", "February", "March", "April", "May", "June", "July",
    "August", "September", "October", "November", "December"
  ];

  const eventsArr = [];

  function initCalendar() {
  const firstDay = new Date(year, month, 1);
  const lastDay = new Date(year, month + 1, 0);
  const prevLastDay = new Date(year, month, 0);
  const prevDays = prevLastDay.getDate();
  const lastDate = lastDay.getDate();
  const day = firstDay.getDay();
  const nextDays = 7 - lastDay.getDay() - 1;

  date.innerHTML = months[month] + " " + year;

  let days = "";

  for (let x = day; x > 0; x--) {
    days += `<div class="day prev-date">${prevDays - x + 1}</div>`;
  }

  for (let i = 1; i <= lastDate; i++) {
    // Check if event is present on that day
    let event = false;
    if (
      i === new Date().getDate() &&
      year === new Date().getFullYear() &&
      month === new Date().getMonth()
    ) {
      activeDay = i;
      getActiveDay(i);
      updateEvents(activeDay);
      if (event) {
        days += `<div class="day today active event">${i}</div>`;
      } else {
        days += `<div class="day today active">${i}</div>`;
      }
    } else {
      if (event) {
        days += `<div class="day event">${i}</div>`;
      } else {
        days += `<div class="day">${i}</div>`;
      }
    }
  }

  for (let j = 1; j <= nextDays; j++) {
    days += `<div class="day next-date">${j}</div>`;
  }
  daysContainer.innerHTML = days;
  addListner();
  updateEvents(year, month, activeDay);
}


//function to add month and year on prev and next button
function prevMonth() {
  month--;
  if (month < 0) {
    month = 11;
    year--;
  }
  initCalendar();
}

function nextMonth() {
  month++;
  if (month > 11) {
    month = 0;
    year++;
  }
  initCalendar();
}


prev.addEventListener("click", prevMonth);
next.addEventListener("click", nextMonth);

initCalendar();

//function to add active on day
function addListner() {
  const days = document.querySelectorAll(".day");
  days.forEach((day) => {
    day.addEventListener("click", (e) => {
      getActiveDay(e.target.innerHTML);
      activeDay = Number(e.target.innerHTML);
      
      // Remove active class from all days
      days.forEach((day) => {
        day.classList.remove("active");
      });
      
      // If the clicked day is not a prev-date or next-date, add active class
      if (!e.target.classList.contains("prev-date") && !e.target.classList.contains("next-date")) {
        e.target.classList.add("active");
        // Call getAvailability to fetch and update availability data for the clicked day
        getAvailability(year, month + 1, activeDay);
      }
    });
  });
}




todayBtn.addEventListener("click", () => {
  today = new Date();
  month = today.getMonth();
  year = today.getFullYear();
  initCalendar();
});

dateInput.addEventListener("input", (e) => {
  dateInput.value = dateInput.value.replace(/[^0-9/]/g, "");
  if (dateInput.value.length === 2) {
    dateInput.value += "/";
  }
  if (dateInput.value.length > 7) {
    dateInput.value = dateInput.value.slice(0, 7);
  }
  if (e.inputType === "deleteContentBackward") {
    if (dateInput.value.length === 3) {
      dateInput.value = dateInput.value.slice(0, 2);
    }
  }
});

gotoBtn.addEventListener("click", gotoDate);

function gotoDate() {
  console.log("here");
  const dateArr = dateInput.value.split("/");
  if (dateArr.length === 2) {
    if (dateArr[0] > 0 && dateArr[0] < 13 && dateArr[1].length === 4) {
      month = dateArr[0] - 1;
      year = dateArr[1];
      initCalendar();
      return;
    }
  }
  alert("Invalid Date");
}

//function get active day day name and date and update eventday eventdate
function getActiveDay(date) {
  const day = new Date(year, month, date);
  const dayName = day.toString().split(" ")[0];
  eventDay.innerHTML = dayName;
  eventDate.innerHTML = date + " " + months[month] + " " + year;
}

function getAvailability(year, month, date) {
  $.ajax({
    type: 'GET',
    url: '../backend/get_availability.php',
    data: {
      year: year,
      month: month,
      date: date
    },
    success: function (data) {
      if (data === "Already Added!") {
        alert("data");
    } else {
      //console.log("Raw data received from get_availability.php:", data);
      const availabilityData = JSON.parse(data);
      //console.log(`year: ${year}, month: ${month}, date: ${date}`);
      // console.log(availabilityData); // Verify the structure of the data
      // console.log("Data Length:", availabilityData.length);


      // Check if there's availability data for the specified date
      if (availabilityData.length > 0) {
        const events = [];
        availabilityData.forEach((event) => {
          events.push({
            day: date,
            month: month + 1, // Note that JavaScript months are zero-based
            year: year,
            title: event.event_title,
            time: `${event.start_time} - ${event.end_time}`
          });
        });
        // Use the events data to update the UI
        updateEvents(year, month, date, events);
      } else {
        updateEvents(year, month, date, []);
      }
    }
    }
  });
}




// Function to update events for the selected day
function updateEvents(year, month, date, events) {
  let eventsHTML = "";
  console.log('Data received from get_availability.php:', events);

  if (Array.isArray(events) && events.length > 0) {
    events.forEach((event) => {
      eventsHTML += `<div class="event">
        <div class="title">
          <i class="fas fa-circle"></i>
          <h3 class="event-title">${event.title}</h3>
        </div>
        <div class="event-time">
          <span class="event-time">${event.time}</span>
        </div>
      </div>`;
    });
  } else {
    eventsHTML = `<div class="no-event">
      <h3>No events for this day</h3>
    </div>`;
  }

  eventsContainer.innerHTML = eventsHTML;
}

// Function to fetch new data and update events
function refreshEvents() {
  getAvailability(year, month + 1, activeDay);
}
  



// Call updateEvents when a new day is selected
addListner();





addEventCloseBtn.addEventListener("click", () => {
  addEventWrapper.classList.remove("active");
});

document.addEventListener("click", (e) => {
  if (e.target !== addEventBtn && !addEventWrapper.contains(e.target)) {
    addEventWrapper.classList.remove("active");
  }
});

//allow 50 chars in eventtitle
addEventTitle.addEventListener("input", (e) => {
  addEventTitle.value = addEventTitle.value.slice(0, 60);
});


//allow only time in eventtime from and to
addEventFrom.addEventListener("input", (e) => {
  addEventFrom.value = addEventFrom.value.replace(/[^0-9:]/g, "");
  if (addEventFrom.value.length === 2) {
    addEventFrom.value += ":";
  }
  if (addEventFrom.value.length > 5) {
    addEventFrom.value = addEventFrom.value.slice(0, 5);
  }
});

addEventTo.addEventListener("input", (e) => {
  addEventTo.value = addEventTo.value.replace(/[^0-9:]/g, "");
  if (addEventTo.value.length === 2) {
    addEventTo.value += ":";
  }
  if (addEventTo.value.length > 5) {
    addEventTo.value = addEventTo.value.slice(0, 5);
  }
});




function convertTime(time) {
  const [hour, min] = time.split(":");
  const timeFormat = hour >= 12 ? "PM" : "AM";
  const formattedHour = hour % 12 || 12;
  return `${formattedHour}:${min} ${timeFormat}`;
}
});