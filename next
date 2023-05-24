<?php
$servername = "gratugdev.cluster-ctpgj3s4yvki.us-east-2.rds.amazonaws.com";
$dbname = "fifi";
$username = "gratugdevuser";
$password = "Hjwk378$1258";


  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 echo "<a href=\"index.php\">Back to login</a>";





if(isset($_POST['submit'])){

  

try {
  $stmt = $conn->prepare("INSERT INTO user_id (user_name,  user_password) VALUES (:user_name, :user_password)");


  $name= $_POST['name'];
  $password= $_POST['password'];

  $stmt->bindparam(":user_name", $name);
  $stmt->bindparam(":user_password", $password);

  $stmt->execute();
} catch (Exception $e) {
    die("Error : " . $e);
  } 
  
}


if ($_GET['id'] != "") {
  try {
    $stmt = $conn->prepare("DELETE FROM user_id WHERE iduser_id = :iduser_id");
    $stmt->bindparam(":iduser_id",$_GET['id']);
    $stmt->execute();
    
    } catch (Exception $e) {
      die($e);
    }
    
    header("Location: next.php");

}



if ($_POST['id'] != "") {
  try {
    $stmt = $conn->prepare("UPDATE user_id SET user_name =:user_name, user_password =:user_password WHERE iduser_id = :iduser_id");
    $stmt->bindparam(":iduser_id",$_POST['id']);
    $stmt->bindparam(":user_name",$_POST['name']);
    $stmt->bindparam(":user_password",$_POST['password']);
    $stmt->execute();
    
    } catch (Exception $e) {
      die($e);
    }
    
    header("Location: next.php");

}






  try {
    $stmt = $conn->prepare("SELECT * FROM user_id ");
  
    $stmt->execute();
    $user_results = $stmt->fetchAll();
  } catch (Exception $e) {
    die("Error : " . $e);
  }

 
  ?>


  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <title>Document</title>
  </head>
  <body>
  <div class=" container d-grid my-5 ">
    <table class="table table-bordered">
        <thead class="thead-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">NAME</th>
            <th scope="col">PASSWORD</th>
            <th scope="col">ACTIONS</th>
          </tr>
        </thead>
        <tbody>

  </body>
  </html>
  <?php
foreach ($user_results as $user_results_inst) {
  echo "
  <tr>
        
            <td>" .$user_results_inst['iduser_id']. "</td>
            <td>". $user_results_inst['user_name']."</td>
            <td>". $user_results_inst['user_password']."</td>
            <td>
                <a href=\"next.php?id=".$user_results_inst['iduser_id']."\" style=\"margin-right: 20px\">DELETE</a>
                <a href=\"edit.php?id=".$user_results_inst['iduser_id']."\">EDIT</a>
            </td>

          </tr>
  
  ";
}







