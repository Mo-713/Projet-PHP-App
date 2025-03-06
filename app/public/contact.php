<?php
var_dump($_POST);
if (
    !empty($_GET['name'])
    && !empty($_GET['email'])
    && !empty($_GET['message'])
) {
    $name = strip_tags($_GET['name']);
    $email = strip_tags($_GET['email']);
    $message = strip_tags($_GET['message']);
} else {
    header('Location: /');
    exit(302);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="/assets/styles/main.css">
</head>

<body>
    <?php require_once '/app/public/layout/_header.php'; ?>
    <main>
        <?php require_once '/app/public/layout/_messages.php'; ?>
        <h1>Votre message</h1>
        <p><?= $name; ?></p>
        <p><?= $email; ?></p>
        <p><?= $message; ?></p>
    </main>
</body>

</html>