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
    session_start(); // Avvia la sessione

    // Verifica se è stata inviata la lunghezza della password tramite GET
    if (isset($_GET['length'])) {
        $length = intval($_GET['length']);

        // Controlla se la lunghezza è valida (da 1 a 20 caratteri)
        if ($length > 0 && $length <= 20) {

            // Includi il file functions.php
            include 'functions.php';

            // Genera la password
            $password = generatePassword($length);

            // Salva la password nella sessione
            $_SESSION['generated_password'] = $password;

            // Redirect alla pagina che mostrerà la password generata
            header('Location: show_password.php');
            exit;
        } else {
            // Messaggio di errore se la lunghezza non è valida
            echo '<p>Inserisci una lunghezza valida (da 1 a 20).</p>';
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
