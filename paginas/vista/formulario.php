<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech-Inspired Email Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    $ruta = "../..";
    $titulo = "AplicaciÃ³n de Ventas - Consultar Empleado";
    include("../includes/cabecera.php");
    include("../includes/menu.php");
    ?>
    <div class="container">
        <h2 class="heroic-title">Innovatech</h2>
        <form action="enviar_correo.php" method="post" class="heroic-form">
            <label for="subject" class="heroic-label">Titulo</label><br>
            <input type="text" id="subject" name="subject" class="heroic-input" required><br><br>

            <label for="message" class="heroic-label">Correo y Asunto</label><br>
            <textarea id="message" name="message" rows="5" cols="40" class="heroic-textarea" required></textarea><br><br>

            <input type="submit" value="Send Email" class="heroic-button">
        </form>
    </div>

    <style>
        /* Base styles for a clean and modern look */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #B5C1C4; /* Dark background */
            color: #fff; /* White text */
        }

        /* Improved centering with margin: auto; */
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: auto; /* Center the container horizontally */
            width: 450px; /* Set a fixed width for better layout control */
        }

        /* Improved form width and styling */
        .heroic-form {
            background-color: #343a40; /* Darker background for form */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Subtle shadow */
            width: 100%; /* Make the form fill the container width */
        }

        /* Heroic theme styles */
        .heroic-title {
            font-size: 2em;
            margin-bottom: 20px;
            text-align: center;
        }

        .heroic-label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .heroic-input,
        .heroic-textarea {
            padding: 10px;
            border: 1px solid #6c757d; /* Light border */
            border-radius: 3px;
            background-color: #495057; /* Darker background for input fields */
            color: #fff; /* White text for input fields */
        }

        .heroic-textarea {
            resize: vertical;
        }

        .heroic-button {
            background-color: #e74c3c; /* Red button color */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.2s ease-in-out;
        }

        .heroic-button:hover {
            background-color: #c0392b; /* Darken button on hover */
        }
    </style>
</body>
</html>