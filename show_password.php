<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Generata</title>
</head>
<body>
    <?php
    session_start(); // Avvia la sessione

    // Verifica se la password generata è presente nella sessione
    if (isset($_SESSION['generated_password'])) {
        $password = $_SESSION['generated_password'];
        // Rimuovi la password dalla sessione dopo averla mostrata
        unset($_SESSION['generated_password']);
    } else {
        // Se la password non è presente, reindirizza alla pagina principale
        header('Location: index.php');
        exit;
    }
    ?>

    <h1>Password Generata</h1>
    <p>La tua password generata è: <strong><?php echo htmlspecialchars($password); ?></strong></p>
    <p><a href="index.php">Genera un'altra password</a></p>
</body>
</html>
