<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Design</title>
    <!-- Remix icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Stylesheet -->
    <script src="https://kit.fontawesome.com/67c66657c7.js"></script>
    <style>
	*{
		margin: 0;
		padding: 0;
		font-family: 'Poppins', sans-serif;
		box-sizing: border-box;
		outline: none;
		color: white;
	}
	body{
		display: flex;
		min-height: 100vh;
		align-items: center;
		justify-content: center;
	}
	.container{
		width: 500px;
		background-color: black;
		box-shadow: 0 0 8px rgba(250, 250, 250, 0.6);
		opacity: 0.6;
	}
	.container form{
		width: 100%;
		text-align: center;
		padding: 25px 20px;
	}
	form h1{
		padding: 10px 0;
	}
	form .id{
		position: relative;
	}
	form input{
		width: 100%;
		height: 50px;
		margin: 4px 0;
		border-radius: 3px;
		border: 1px solid gray;
		background-color: black;
		padding: 0 15px;
		font-size: 20px;
	}
	form textarea{
		padding: 5px 15px;
		border-radius: 3px;
		border: 1px solid gray;
		background-color: black;
		font-size: 20px;
		width: 100%;
		margin: 4px 0;
	}
	form button{
		margin-top: 5px;
		border-radius: none;
		background-color: #568203;
		color: white;
		padding: 10px 0;
		width: 100%;
		font-size: 20px;
		font-weight: 800 ;
		cursor: pointer;
		border-radius: 3px;
	}
	form button:hover{
		background-color: green;
	}
	form input:focus,
	form textarea:focus{
		border: 1px solid green ;
		color: white;
		transition: all 0.3s ease;
	}
	form input:focus::placeholder,
	form textarea:focus::placeholder{
		padding-left: 4px;
		color: green;
		transition: all 0.3s ease;
	}
	</style>
</head>
<body>
	<div class="container">
		<form>
			<h1>Edit Data</h1>
			<div class="id">
				<input type="text" placeholder="Action Taken">
			</div>
			<div class="id">
				<textarea cols="20" rows="7" placeholder="Remarks about the appointment..."></textarea>
				<button> Edit </button>			
			</div>
		</form>
	</div>
</body>