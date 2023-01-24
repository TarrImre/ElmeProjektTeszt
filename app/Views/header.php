<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pénzváltó projekt</title>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://elmeprojekt.hu/img/faviconelme.png" rel="icon">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap");

        html,
        body {
            background-color: #f3f3f3;
            font-family: "Poppins", sans-serif;
            font-weight: 100;
        }

        .square-box {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            height: 450px;
            background-color: #fff;
            box-shadow: 0px 0px 11px 0px rgba(0, 0, 0, 0.2);
            border-radius: 20px;
        }

        .btnpurple {
            background-color: #7066e0;
            color: #fff;
            border: 3px solid #b7b2ef;
            transition: none;
        }

        .btn:focus,
        .btn:active {
            outline: none !important;
            box-shadow: none;
        }

        .btnpurple:hover {
            background-color: #655cc9;
            color: #fff;
            border: 3px solid #b7b2ef;
        }

        .btnpurple:active {
            background-color: #655cc9;
            color: #fff;
            border: 3px solid #b7b2ef;
        }

        .textpurple {
            color: #655cc9;
        }
    </style>
</head>

<body>