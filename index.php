<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generatore di Password Sicure</title>
</head>
<body>
    <!-- Titolo -->
    <h1>Generatore di Password Sicure</h1>

    <!-- Form per inserire la lunghezza della password -->
    <form action="index.php" method="get">
        <label for="length">Lunghezza Password:</label>
        <input type="number" id="length" name="length" min="1" max="20" required>
        <button type="submit">Genera</button>
    </form>

    <?php
    // Inclusione del file functions.php
    include 'functions.php';

    // Verifica se è stata inviata la lunghezza della password
    if (isset($_GET['length'])) {
        $length = intval($_GET['length']);

        // Controlla se la lunghezza è valida (tra 1 e 20 caratteri)
        if ($length > 0 && $length <= 20) {
            echo '<p>La tua password generata è: <strong>' . generatePassword($length) . '</strong></p>';
        } else {
            echo '<p>Inserisci una lunghezza valida.</p>';
        }
    }
    ?>

    <style>
        body {
            font-family: Arial, sans-serif;
        }
    </style>
</body>
</html>