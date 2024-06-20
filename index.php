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

        <!-- Include lunghezza password (1 a 20 caratteri) -->
        <label for="length">Lunghezza Password:</label>
        <input type="number" id="length" name="length" min="1" max="20" required>
        <br>

        <!-- Checkbox numeri -->
        <input type="checkbox" id="numbers" name="numbers" value="true">
        <label for="numbers">Includi numeri</label>
        <br>

        <!-- Checkbox lettere -->
        <input type="checkbox" id="letters" name="letters" value="true">
        <label for="letters">Includi lettere</label>
        <br>

        <!-- Checkbox simboli -->
        <input type="checkbox" id="symbols" name="symbols" value="true">
        <label for="symbols">Includi simboli</label>
        <br>

        <!-- Checkbox no_repeat -->
        <input type="checkbox" id="no_repeat" name="no_repeat" value="true">
        <label for="no_repeat">Evita ripetizioni di caratteri</label>
        <br>
        <button type="submit">Genera</button>
    </form>

    <?php
    session_start(); // Avvia la sessione

    // Verifica se è stata inviata la lunghezza della password tramite GET
    if (isset($_GET['length'])) {
        $length = intval($_GET['length']);
        $include_numbers = isset($_GET['numbers']);
        $include_letters = isset($_GET['letters']);
        $include_symbols = isset($_GET['symbols']);
        $no_repeat = isset($_GET['no_repeat']);

        // Controlla se almeno una opzione è stata selezionata
        if (!$include_numbers && !$include_letters && !$include_symbols) {
            echo '<p>Seleziona almeno un tipo di carattere.</p>';
        } else if ($length > 0 && $length <= 20) {
            // Includi il file functions.php
            include 'functions.php';

            // Genera la password con le opzioni selezionate
            $password = generatePassword($length, $include_numbers, $include_letters, $include_symbols, $no_repeat);

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
