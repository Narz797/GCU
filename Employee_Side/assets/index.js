//Toggle theme
const bodyElement = document.body;
const themeToggleBtn = document.querySelector('.theme-toggle-btn');
const currentTheme = localStorage.getItem('currentTheme');

if(currentTheme){
	bodyElement.classList.add('theme-light');
}

themeToggleBtn.addEventListener('click', () => {
	bodyElement.classList.toggle('theme-light');
	if(bodyElement.classList.contains('theme-light')){
		localStorage.setItem('currentTheme', 'themeActive');
	}else{
		localStorage.removeItem('currentTheme', 'themeActive');
	}
});


$("#Login_Student_User").on("submit", function (event) {
	console.log('check');
	var source = "student_side_login";
	event.preventDefault();

	$.ajax({
	  type: 'POST',
	  url: '../backend/validate_user.php',
	  data: {
		email:$("#email").val(),
		password:$("#password").val(),
		source: source
	  },
	  success: function(data) {
		alert(data);
		event.preventDefault()
	  }
	});
  });