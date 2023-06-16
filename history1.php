<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    /* Common styles for all screen sizes */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
     
     background-color: gray;
    }

    .container {
      max-width: 960px;
      margin: 0 auto;
      padding: 20px;
       border-radius: 10px;
       background-color: skyblue;

    }

    header {
      background-color: #333;
      color: #fff;
      padding: 20px;
      text-align: center;
    }

    h1 {
      margin: 0;
    }

    main {
      padding: 20px;
    }

    section {
      margin-bottom: 30px;
    }

    h2 {
      font-size: 24px;
    }

    p {
      font-size: 16px;
      line-height: 1.5;
    }

    footer {
      background-color: #333;
      color: #fff;
      padding: 10px;
      text-align: center;
    }

    /* Media queries for different screen sizes */
    @media only screen and (max-width: 600px) {
      h2 {
        font-size: 20px;
      }

      p {
        font-size: 14px;
      }
    }

    @media only screen and (max-width: 400px) {
      h2 {
        font-size: 18px;
      }

      p {
        font-size: 12px;
      }
    }
  </style>
</head>
<body>

  <div class="container">
    <header>
       <img src="assets/img/GCU.png" alt="Logo" width="90" height="90">
      <h1>History Page</h1>
    </header>
    <main>
      <section>
        <h2>Year 1</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean tristique ultrices est ac fermentum.</p>
      </section>
      <section>
        <h2>Year 2</h2>
        <p>Sed eget sem in nisl elementum placerat vel a elit. Nulla ut est at lectus facilisis pellentesque.</p>
      </section>
      <!-- Add more sections for different years -->
    </main>
    <footer>
      <p>&copy; 2023 BSU-GCU. All rights reserved.</p>
    </footer>
  </div>
</body>
</html>
