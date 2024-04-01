<?Php

$pdo= new PDO('mysql:host=localhost;port=3306;dbname=subsidy', 'root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$firstname='';
$middlename='';
$lastname='';
$idnumber='';
$county='';
$subcounty='';
$ward='';
$village='';
$phonenumber='';
$hectares='';
$date='';



if($_SERVER['REQUEST_METHOD']=='POST'){
    $firstname= $_POST['firstname'];
    $middlename= $_POST['middlename'];
    $lastname= $_POST['lastname'];
    $idnumber= $_POST['idnumber'];
    $county= $_POST['county'];
    $subcounty= $_POST['subcounty'];
    $ward= $_POST['ward'];
    $village= $_POST['village'];
    $phonenumber= $_POST['phonenumber'];
    $hectares= $_POST['hectares'];
    $date= date('Y-m-d H:i:s');


    $statement=$pdo->prepare('INSERT INTO farmers(firstname, middlename, lastname, idnumber, county, subcounty, ward, village, phonenumber, hectares, date) VALUES (:firstname, :middlename, :lastname, :idnumber, :county, :subcounty, :ward, :village, :phonenumber, :hectares, :date )');

    $statement->bindValue(':firstname', $firstname);
    $statement->bindValue(':middlename', $middlename);
    $statement->bindValue(':lastname', $lastname);
    $statement->bindValue(':idnumber', $idnumber);
    $statement->bindValue(':county', $county);
    $statement->bindValue(':subcounty', $subcounty);
    $statement->bindValue(':ward', $ward);
    $statement->bindValue(':village', $village);
    $statement->bindValue(':phonenumber', $phonenumber);
    $statement->bindValue(':hectares', $hectares);
    $statement->bindValue(':date', $date);

    $statement->execute();
    header('Location: index.php');
    exit();

}





?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer Registration</title>
    <link rel="stylesheet" href="/farmers/css/farmers-reg.css">

</head>
<body>
    <h1>Farmer Registration Form</h1>
    <p>
    <div class="add-farmer">
        <button onclick="window.location.href='/farmers/index.php'">Return Home</button>
        
    </div>
    </p>
    <form action="" method="POST">
        <label for="firstname">First Name:</label>
        <input type="text" id="firstname" name="firstname" required>

        <label for="middlename">Middle Name:</label>
        <input type="text" id="middlename" name="middlename">

        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" name="lastname" required>

        <label for="idnumber">ID Number:</label>
        <input type="text" id="idnumber" name="idnumber" required>

        <label for="county">County:</label>
        <input type="text" id="county" name="county" required>

        <label for="subcounty">Subcounty:</label>
        <input type="text" id="subcounty" name="subcounty" required>

        <label for="ward">Ward:</label>
        <input type="text" id="ward" name="ward" required>

        <label for="village">Village:</label>
        <input type="text" id="village" name="village" required>

        <label for="phonenumber">Phone Number:</label>
        <input type="number" id="phonenumber" name="phonenumber" required>

        <label for="hectares">Number of Hectares:</label>
        <input type="number" step="2" id="hectares" name="hectares" required>

        <input type="submit" value="Register">
    </form>
</body>
</html>
