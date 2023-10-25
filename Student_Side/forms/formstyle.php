<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-color: black;
        }
        .card {
            width: 70%;
            margin: auto;
            margin-top: 100px;
            margin-bottom: 100px;
        }
        .textarea {
            width: 100%;
            min-height: 150px;
        }
        .card-header {
            color: white;
            background-color: green;
        }
        .card-body {
            color: green;
        }
        #submit {
            padding: auto;
            float: right;
        }
        #back_button {
            padding: 10px 30px;
            float: left;
            /* Adjusted the float property */
            position: static;
            /* Fixed position so it stays in place */
            top: 10px;
            /* Positioned at the top */
            left: 50px;
            /* Positioned at the left */
            z-index: 1000;
            background-color: #105c06;
            border: 0px;
        }
    </style>
</head>
<body>
    <a id='back_button' class="btn btn-primary" href="../student-home" role="button">Back</a>
</body>
</html>