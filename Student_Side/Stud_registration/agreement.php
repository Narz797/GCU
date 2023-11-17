<!doctype html>

<html>
<head>
  <meta charset="utf-8">
  <title>Withdrawal/Dropping/Shifting slip</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="../assets/img/GCU_logo.png" rel="icon">
  <style>

@media only screen and (max-width: 600px) {
            body {
                font-size: 14px; /* Adjust the font size for smaller screens */
            }
            .card {
                max-width: 100%; /* Make the card full width on small screens */
                margin: 10px auto; /* Adjust margin for smaller screens */
            }
            .card-body {
                padding: 10px; /* Adjust padding for smaller screens */
            }
            /* Add more responsive styles as needed */
        }

  

    body {
      /* font-family: Arial, sans-serif; */
      background-color: #f4f4f4;
      
      padding: 0;
     
     
      /* background: linear-gradient(
    142deg,
    green  0%,
    black 100%
  ); */
}

  .card {
      max-width: 800px;
      margin: 50px auto;
     background:white;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      padding: 20px;
      border-radius: 8px;
      box-sizing: border-box;
      
      box-shadow: 0 18px 40px rgba(0, 0, 0, 1); 
      

      animation: fadeInUp 1s ease-in-out; /* Animation */
    }
 

      
    .card-header {
      background: #007bff;
      color: #fff;
      padding: 10px;
      text-align: center;
      border-radius: 8px 8px 0 0;
    }
    .card-body {
      padding: 20px;
    }

    .button {
      text-align: center;
    
      
    }

    label {
      display: block;
      margin-bottom: 8px;
      /* font-weight: bold;
      font-size:18px; */
      text-align: justify;
      font-family: "Century Gothic", sans-serif;
    }

    label {
      box-shadow: 0 5px 10px rgba(0, 0, 0, 1); /* Solid black box shadow */
      width: 100%;
      padding: 8px;
      height:180px;
      margin-bottom: 16px;
      box-sizing: border-box;
      border: 1px solid #ccc;
      border-radius: 4px;
      resize: vertical;
      font-family: "Century Gothic", sans-serif;

      font-size:18px;
    }

    .button {
      text-align: center;
    
      
    }

   button {
      padding: 10px 20px;
      background-color: green;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }


    button:hover {
      background-color: #008080;
    }

    .button-container {
      display: flex;
   
      
      
    }
    .button {
      margin-right: 10px; /* Adjust the margin to create space between buttons */
    }



    /* Define the fadeInUp animation */
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .logo-container {
      display: flex;
      /* text-align: center; */
     
      
    
      /* animation: fadeInUp 1s ease-in-out;  */
    }

    .logo-container img {
      width: 20px;
      height: 20px;
    }
    h1
    {
      /* margin-left:2%; */
      text-align: center;
      font-family: "Century Gothic", sans-serif;
      margin-top: 3%;
    }

    /* Style for the select container */
select {
  padding: 10px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 4px;
  width: 100%;
  box-sizing: border-box;
  font-family: "Century Gothic", sans-serif;

}

/* Style for the select options */
select option {
  background-color: #fff;
  color: #333;
}

/* Style for the select container when focused */
select:focus {
  outline: none;
  border-color: #007bff; /* Change the border color when focused */
  box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Add a subtle box shadow when focused */
}
p {
            text-align: center;
            margin: 0; /* Remove default margin to ensure full centering */
        }

   
        /* img {
            position: absolute;
            height: 10%;
            width: auto;
           
        } */

        img {
      max-width: 10%;
      height: auto;
      display: block; /* This ensures that the image does not have extra spacing below it */
      margin: auto; /* Center the image */
    }

   


  </style>
</head>
<body>
  
  <div class="card">
  
   
     
      <div  >
        
    <img   src="../assets/img/bsu.png"  alt="BSU Logo">
    <!-- <img src="../assets/img/GCU_logo.png" alt="GCU Logo" style="margin-left:31%;"> -->
<br>
    <p>Republic of the Philippines</p>
    <p>Benguet State University</p>
    <p>OFFICE OF STUDENT WELLNESS SERVICES</p>
    <p>La Trinidad, Benguet</p>
    <br>
   
 
  </div>
  

  


   
    <div class="card-body">
      <form id="form_transact" name="form1" method="post">
       
        <p>
        CLIENT INFORMATION FORM
        <br>
        <hr>
        <b>DATA PRIVACY NOTICE:</b>
        <br>
        <br>
       
       
          
          <label > I hereby give my consent to the Office of Student Service -
             Student Wellness - Guidance and Counseling Unit to process my personal data according to the University's Data Privacy Policy.
             I understand that my consent does not prevent the existence of another criteria for lawful processing of personal data, 
             and does not waive any of my rights under the Data privacy Act of 2012 and other apllicable laws.
          </label>
        </p>
       
        <div class="button-container">
          <div class="button">
            <p>
              <!-- Change type from submit to button, and use onclick to handle the back button -->
              <button type="button" class="btn btn-primary" onclick="window.location.href='./page1.php'">AGREE</button>
            </p>
          </div>
          <div class="button">
            <p>
              <!-- Change type from submit to button and add onclick attribute to call the function to check the form before submitting -->
              <button type="button" class="btn btn-primary" onclick="window.location.href='../../home'">DISAGREE</button>

            </p>
          </div>
        </div>


      </form>
      
    
    </div>
  </div>



</body>
</html>