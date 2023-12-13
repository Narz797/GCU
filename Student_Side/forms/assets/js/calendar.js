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
  const currentDate = new Date(year, month, 1);
  const startDate = currentDate.toISOString().slice(0, 10);
  const endDate = lastDay.toISOString().slice(0, 10);
  


  date.innerHTML = months[month] + " " + year;

  let days = "";

  for (let x = day; x > 0; x--) {
    days += `<div class="day prev-date">${prevDays - x + 1}</div>`;
  }

  fetchEventsForMonth(startDate, endDate)
    .then((eventDates) => {
      for (let i = 1; i <= lastDate; i++) {
        const isEventDate = eventDates.includes(`${year}-${String(month + 1).padStart(2, '0')}-${String(i).padStart(2, '0')}`);

        if (
          i === new Date().getDate() &&
          year === new Date().getFullYear() &&
          month === new Date().getMonth()
        ) {
          activeDay = i;
          getActiveDay(i);
          updateEvents(activeDay);
          if (isEventDate) {
            days += `<div class="day today active event">${i}</div>`;
          } else {
            days += `<div class="day today active">${i}</div>`;
          }
        } else {
          if (isEventDate) {
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

})
.catch((error) => {
  console.error("Error fetching events:", error);
});

}



function fetchEventsForMonth(startDate, endDate) {
  return new Promise((resolve, reject) => {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "../backend/get_events_for_month.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4) {
        if (xhr.status === 200) {
          const response = xhr.responseText;
          resolve(response.split("\n").filter(Boolean)); // Split response into an array of event dates
        } else {
          reject(new Error("Error fetching events for the month"));
        }
      }
    };

    xhr.send(`start_date=${startDate}&end_date=${endDate}`);
  });
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
    url: '../backend/get_availability2.php',
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
      console.log("Data", data);


      // Check if there's availability data for the specified date
      if (availabilityData.length > 0) {
        const events = [];
        availabilityData.forEach((event) => {
          events.push({
            day: date,
            month: month + 1, // Note that JavaScript months are zero-based
            year: year,
            title: event.event_title,
            Stime: event.start_time,
            Etime: event.end_time,
            counselor: event.first_name,
            appointmentId: event.appointment_id,
            transactId: event.transact_id
            
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
      const startTime = convertTime(event.Stime);
      const endTime = convertTime(event.Etime);
      eventsHTML += `<div class="event" data-appointment-id="${event.appointmentId}" data-transact-id="${event.transactId}">
        <div class="title">
          <i class="fas fa-circle"></i>
        
        
        <div class="event-time">
        <h3 class="eventS-time">Counserlor: ${event.counselor}</h3>
      </div>
      </div>
        <div class="event-time">
        <h2 class="eventS-time">${startTime} - ${endTime}</h2>
        </div>
      </div><br>
      `;
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


// Add this code inside your $(document).ready(function() { ... });
// document.addEventListener("DOMContentLoaded", function() {
//   // Access the id value passed from the PHP file
//   var id = JSON.parse(document.querySelector("script").getAttribute("id"));

//   // Now you can use the 'id' variable in your JavaScript code
//   console.log(id);
// });
// Event listener for clicking on events
eventsContainer.addEventListener("click", function (e) {
  const clickedEvent = e.target.closest(".event");
  if (clickedEvent) {
    // Get the event data associated with the clicked event
    // const eventTitle = clickedEvent.querySelector(".event-title").textContent;
    // const counselor = clickedEvent.querySelector(".event-time span").textContent;
    // const eventTime = clickedEvent.querySelectorAll(".event-time")[1].textContent;

    // Get the appointmentId from the clicked event's data attribute
    const appointmentId = clickedEvent.dataset.appointmentId;
    const transactId = clickedEvent.dataset.transactId;//gets value of appointment id from function updateEvents()
    aid = appointmentId 
    tid = transactId
    console.log("tranID", transactId );
    console.log("stud ID",id);
    window.location.href = '#divOne';
    // Construct the message to display
    // const eventData = `Event: ${eventTitle}\nCounselor: ${counselor}\nTime: ${eventTime}\nAppointment ID: ${appointmentId}`;
    
    // Display the event data in an alert
    


  }
});




function convertTime(time) {
  const [hour, min] = time.split(":");
  const timeFormat = hour >= 12 ? "PM" : "AM";
  const formattedHour = hour % 12 || 12;
  return `${formattedHour}:${min} ${timeFormat}`;
}
refreshEvents();
});