<?php
include('sesiuni.php');
include('conectare.php');
include('utilitati.php');
if (isset($_POST['login'])) {
    $nume_utilizator=$_POST['numeutilizator'];
    $parola=$_POST['parola'];
    
    $sql="SELECT * FROM utilizatori WHERE nume=:nume_utilizator AND parola=:parola";
    $stmt=$db->prepare($sql);
    $stmt->execute(array(':nume_utilizator'=>$nume_utilizator,':parola'=>$parola));
    while($row=$stmt->fetch()){
        $id=$row['u_id'];
        $nume_u=$row['nume'];
        $email=$row['email'];
        $parola_u=$row['parola'];
        $_SESSION['id']=$id;
        $_SESSION['nume']=$nume_u;
        header('location: index.php');
    }
}
//numarul de erori
    $forma_erori=array();
    //validare
    $campuri_cerute=array('numeutilizator','parola');
    $forma_erori=array_merge($forma_erori,check_empty_fields($campuri_cerute));
    if(empty($forma_erori)){
        //verificam daca utilizatorul exista in baza de date

    }else{
        if(count($forma_erori)==1){
            $rezultat="<p style='color:red;'>A aparut o eroare</p>";
        }else{
            $rezultat="<p style='color:red;'>Au aparut doua erori</p>";
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

    <h3>Forma de conectare</h3>
    <?php
        if(isset($rezultat)){
            echo $rezultat;
        }
     ?>
    <form action="signin.php" method="post">
        <table>
        <tr><td>Utilizator: </td> <td><input type="text" name="numeutilizator"></td></tr>
        <tr><td>Parola: </td><td><input type="password" name="parola" ></td></tr>
        <tr><td></td><td><input type="submit" name="login" value="Login"></td></tr>
        </table>
    </form>

    <p><a href="index.php">Inapoi</a></p>
</body>
</html>