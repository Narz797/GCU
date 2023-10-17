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
            aID:event.appointment_id,
            eID:event.employee_id,
            day: date,
            month: month + 1, // Note that JavaScript months are zero-based
            year: year,
            title: event.event_title,
            time: `${event.start_time} - ${event.end_time}`,
            stime: event.start_time,
            etime: event.end_time
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
        <div class="event-actions">
          <button class="delete-event">Delete</button>
          <button class="edit-event">Edit</button>
          <button class="mark-as-done">Marked as Done</button>
        </div>
      </div>`;
    });
  } else {
    eventsHTML = `<div class="no-event">
      <h3>No events for this day</h3>
    </div>`;
  }

  eventsContainer.innerHTML = eventsHTML;

  // Add event listeners to the "Delete," "Edit," and "Marked as Done" buttons
  const deleteButtons = document.querySelectorAll(".delete-event");
  const editButtons = document.querySelectorAll(".edit-event");
  const markAsDoneButtons = document.querySelectorAll(".mark-as-done");

  deleteButtons.forEach((button, index) => {
    button.addEventListener("click", () => {
      const event = events[index];
      if (confirm("Are you sure you want to delete this event?")) {
        console.log(event.aID);
  
        $.ajax({
          type: "POST",
          url: "../backend/delete_appointment.php",
          data: {
            appointment_id: event.aID, // Change key to "appointment_id"
          },
          
          success: function (data) {
            // Handle the successful delete operation.
            console.log("Event deleted successfully.");
            console.log(data);
  
            // Remove the event from the UI here.
            // Example: eventDiv.remove();
          },
          error: function (xhr, status, error) {
            // Handle the error case, e.g., show an error message to the user.
            console.error("Error deleting event:", error);
            alert("Error deleting event: " + error);
          },
        });
      }
    });
  });
  
  

  editButtons.forEach((button, index) => {
    button.addEventListener("click", () => {
      // Handle edit event logic here using events[index]
      // You can open a modal or form to edit the event details.
      console.log("Edit event clicked for event:", events[index]);
    });
  });

  markAsDoneButtons.forEach((button, index) => {
    button.addEventListener("click", () => {
      // Handle marking the event as done logic here using events[index]
      console.log("Marked as Done clicked for event:", events[index]);
      // You can update the event's status or appearance to indicate it's done.
    });
  });
}


// Function to fetch new data and update events
function refreshEvents() {
  getAvailability(year, month + 1, activeDay);
}
  



// Call updateEvents when a new day is selected
addListner();








//function to add event
addEventBtn.addEventListener("click", () => {
  addEventWrapper.classList.toggle("active");
});

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

addEventStudentName.addEventListener("input", (e) =>{
  addEventStudentName.value = addEventStudentName.value.slice(0,60);
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

//function to add event to eventsArr
addEventSubmit.addEventListener("click", () => {
  const eventTitle = addEventTitle.value;
  const eventDate = `${year}-${month + 1}-${activeDay}`;
  const eventTimeFrom = addEventFrom.value;
  const eventTimeTo = addEventTo.value;
  const eID = window.sessionID; //value of employee id

  // Validate the event data here.

  $.ajax({
    type: 'POST',
    url: '../backend/add_availablity.php',
    data: {
      title: eventTitle,
      date: eventDate,
      start_time: eventTimeFrom,
      end_time: eventTimeTo,
      ID: eID
    },
    success: function (data) {
      // You can handle the response from the PHP script here, e.g., displaying a success message.
      alert(data);
      // Clear the input fields and refresh events to fetch the new data.
      addEventTitle.value = "";
      addEventFrom.value = "";
      addEventTo.value = "";
      refreshEvents();
      location.reload();
    }
  });
});


function convertTime(time) {
  const [hour, min] = time.split(":");
  const timeFormat = hour >= 12 ? "PM" : "AM";
  const formattedHour = hour % 12 || 12;
  return `${formattedHour}:${min} ${timeFormat}`;
}
});