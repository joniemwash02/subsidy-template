<?php

$pdo= new PDO('mysql:host=localhost;port=3306;dbname=subsidy', 'root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$statement=$pdo->prepare('SELECT * FROM farmers ORDER BY date DESC');
$statement->execute();
$farmers=$statement->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer Details</title>
    <link rel="stylesheet" href="/farmers/css/index.css">
   
</head>
<body>
    <h1>Farmer Details</h1>
    <p>
    <div class="add-farmer">
        <button onclick="window.location.href='/farmers/farmers-registration.php'">Add Farmer</button>
        
    </div>
    </p>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Full Name</th>
                <th>ID Number</th>
                <th>Ward</th>
                <th>Village</th>
                <th>Phone Number</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($farmers as $i => $farmer) : ?>
                 <tr>
                 <td><?php echo $i + 1 ?></td>
                 <td><?php echo $farmer['firstname'] ?>  <?php echo $farmer['lastname'] ?></td>
                 <td><?php echo $farmer['idnumber'] ?></td>
                 <td><?php echo $farmer['ward'] ?></td>
                 <td><?php echo $farmer['village'] ?></td>
                 <td><?php echo $farmer['phonenumber'] ?></td>
                 <td class="delete"> 
                    <a href="">Edit</a> 
                    <a href="delete.php?id=<?php echo $farmer['id']?>">Delete</a>
                </td>
             </tr>
           <?php endforeach ?>
           
            <!-- More rows can be added here -->
        </tbody>
    </table>
</body>
</html>


<script>
// Get the modal
var modal = document.getElementById("addFarmerModal");

// Get the button that opens the modal
var btn = document.getElementById("openModalBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

