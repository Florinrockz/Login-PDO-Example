<?php
include('sesiuni.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Autentificare Utilizator</h2>
<?php
if(!isset($_SESSION['nume'])):
?>
    <p>Nu esti conectat? <a href="signin.php">Login</a> Nu esti inca membru? <a href="signup.php">Inregistereaza-te!</a></p>
<?php else: ?>
    <p>Esti conectat ca <?php echo $_SESSION['nume']; ?> <a href="signout.php">Logout</a></p>
<?php
    endif
?>
</body>
</html>