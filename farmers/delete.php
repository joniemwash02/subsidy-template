<?php 
$pdo= new PDO('mysql:host=localhost;port=3306;dbname=subsidy', 'root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id=$_GET['id']??null;

if(!$id){
    header('Location: index.php');
}

$statement=$pdo->prepare('DELETE FROM farmers WHERE id=:id ');
$statement->bindValue(':id',$id);
$statement->execute();

header('Location: index.php');

