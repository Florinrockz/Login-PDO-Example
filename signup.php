<?php
include_once('conectare.php');
    if (isset($_POST['email'])) {
      $email=$_POST['email'];
      $nume_utilizator=$_POST['numeutilizator'];
      $parola=$_POST['parola'];
      try{
        $adauga="INSERT INTO utilizatori(nume,email,parola) VALUES(:nume_utilizator,:email,:parola)";

        $stmt=$db->prepare($adauga);
        $stmt->execute(array(':nume_utilizator' =>$nume_utilizator,':email'=>$email,':parola'=>$parola));
        if($stmt->rowCount()==1){
            $rezultat= "<p style='padding:20px; color:green;'>Esti inregistrat cu succes.</p>";
        }
      }catch(PDOException $ex){
        $rezultat= "<p style='padding:20px; color:green;'>O eroare ".$ex->getMessage()."</p>";
      }
      
    } 
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

    <h3>Forma de inregistrare</h3>
    <?php
        if(isset($rezultat)) {
            echo $rezultat;
        }
    ?>
    <form action="signup.php" method="post">
        <table>
        <tr><td>Nume: </td> <td><input type="text" name="numeutilizator" required></td></tr>
        <tr><td>Email: </td><td><input type="text" name="email" required></td></tr>
        <tr><td>Parola: </td><td><input type="password" name="parola" required></td></tr>
        <tr><td></td><td><input type="submit" value="Inregistrare"></td></tr>
        </table>
    </form>

    <p><a href="index.php">Inapoi</a></p>
</body>
</html>