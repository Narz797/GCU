const addBox = document.querySelector(".add-box"),
    popupBox = document.querySelector(".popup-box"),
    popupTitle = popupBox.querySelector("header p"),
    closeIcon = popupBox.querySelector("header i"),
    titleTag = popupBox.querySelector("input"),
    descTag = popupBox.querySelector("textarea"),
    addBtn = popupBox.querySelector("button");

const months = ["January", "February", "March", "April", "May", "June", "July",
    "August", "September", "October", "November", "December"];
    let isUpdate = false
// Function to send AJAX requests
function sendRequest(method, url, data, callback) {
    fetch(url, {
        method: method,
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: data
    })
    .then(response => response.text())
    .then(callback)
    .catch(error => console.error('Error:', error));
}

addBox.addEventListener("click", () => {
    popupTitle.innerText = "Add a new Note";
    addBtn.innerText = "Add Note";
    popupBox.classList.add("show");
    document.querySelector("body").style.overflow = "hidden";
    if (window.innerWidth > 660) titleTag.focus();
});

closeIcon.addEventListener("click", () => {
    titleTag.value = descTag.value = "";
    popupBox.classList.remove("show");
    document.querySelector("body").style.overflow = "auto";
});
// var student = "<?php echo isset($_SESSION['stud_user_id']) ? $_SESSION['stud_user_id'] : ''; ?>";

// Function to show notes - assuming this gets data from the server
function showNotes() {
    fetch('../../backend/get_notes.php') // Update the URL to the endpoint that fetches notes from the database
        .then(response => response.json()) // Assuming the response is in JSON format
        .then(notes => {
            document.querySelectorAll(".note").forEach(li => li.remove());
            notes.forEach((note, id) => {
                let filterDesc = note.description.replaceAll("\n", '<br/>');
                let liTag = `<li class="note">
                                <div class="details">
                                    <p>${note.title}</p>
                                    <span>${filterDesc}</span>
                                </div>
                                <div class="bottom-content">
                                    <span>${note.date}</span>
                                    <div class="settings">
                                        <i onclick="showMenu(this)" class="uil uil-ellipsis-h"></i>
                                        <ul class="menu">
                                            <li onclick="updateNote(${note.id}, '${note.title}', '${filterDesc}')"><i class="uil uil-pen"></i>Edit</li>
                                            <li onclick="deleteNote(${note.id})"><i class="uil uil-trash"></i>Delete</li>
                                        </ul>
                                    </div>
                                </div>
                            </li>`;
                            console.log("id: ", note.id);
                addBox.insertAdjacentHTML("afterend", liTag);
            });
        })
        .catch(error => console.error('Error:', error));
}

showNotes();
function showMenu(elem) {
    elem.parentElement.classList.add("show");
    document.addEventListener("click", e => {
        if(e.target.tagName != "I" || e.target != elem) {
            elem.parentElement.classList.remove("show");
        }
    });
}


function deleteNote(id) {
    let confirmDel = confirm("Are you sure you want to delete this note?");
    if (!confirmDel) return;

    // Send a DELETE request to the server to delete the note
    sendRequest('DELETE', `../../backend/notes.php?id=${id}`, data => {
        console.log("deleted",data);
         // Refresh notes or handle success
    });
    showNotes();
}

function updateNote(id, title, filterDesc) {
    let description = filterDesc.replaceAll('<br/>', '\r\n');
    student = id; // Update the student ID for the update action
    isUpdate = true; // Set the update flag to true
    addBox.click();
    titleTag.value = title;
    descTag.value = description;
    popupTitle.innerText = "Update a Note";
    addBtn.innerText = "Update Note";
}


addBtn.addEventListener("click", e => {
    e.preventDefault();
    let title = titleTag.value.trim();
    let description = descTag.value.trim();

    if (title || description) {
        let currentDate = new Date();
        let month = months[currentDate.getMonth()];
        let day = currentDate.getDate();
        let year = currentDate.getFullYear();

        let noteInfo = `title=${title}&description=${description}`;

        if (!isUpdate) {
            // Send an ADD request to the server to add a new note
            sendRequest('POST', '../../backend/notes.php', noteInfo, data => {
                console.log(data);
                showNotes(); // Refresh notes or handle success
                closeIcon.click();
            });
        } else if (isUpdate){
            // Send an UPDATE request to the server with the updated data
            sendRequest('PUT', '../../backend/notes.php', `id=${student}&title=${title}&description=${description}`, data => {
                console.log(data);
                showNotes(); // Refresh notes or handle success
                closeIcon.click(); // Close the form or reset UI after the update
            });
            isUpdate = false; // Reset the update flag after the update action
        }
    }
});

