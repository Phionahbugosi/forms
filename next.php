<?php
$servername = "gratugdev.cluster-ctpgj3s4yvki.us-east-2.rds.amazonaws.com";
$dbname = "fifi";
$username = "gratugdevuser";
$password = "Hjwk378$1258";
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



// edit 
if (isset($_POST['save'])){
   
    try {
        $stmt=$conn->prepare("UPDATE login SET user_name=:user_name,user_email=:user_email WHERE user_id=:user_id" );
        $stmt->bindparam(":user_name",$_POST['name']);
        $stmt->bindparam(":user_email",$_POST['email']);
        $stmt->bindparam(":user_id",$_POST['id']);
         $stmt->execute();



    } catch (Exeption $e) {
        die("error".$e);
    }

}


if($_GET['id']!=""&& $_GET['id']!="undefined"){
    try {
    $stmt=$conn->prepare("DELETE FROM login WHERE user_id=:user_id");
    $stmt->bindparam(":user_id",$_GET['id']);
    $stmt->execute();
    } catch (Exeption $e) {
        die("error".$e);
    }
    header("Location:db.php");

}

if(isset ($_POST['submit'])){

    $name =$_POST['name'];
    $email=$_POST['email'];
    try {
            $stmt= $conn->prepare("INSERT INTO login(user_id, user_name,user_email)VALUES(:user_id,:user_name,:user_email)");
            $val_id = "US" . uniqid();

            $stmt->bindparam(":user_id",$val_id);
            $stmt->bindparam(":user_name",$name);
            $stmt->bindparam(":user_email",$email);
            $stmt->execute();
    } catch (Exception $e) {
        die("error" .$e);
    }
}




try {
    $stmt= $conn->prepare("SELECT * FROM login");
    $stmt->execute();
    $user_results = $stmt->fetchAll();
    

} catch (Exception $e) {
    die("error" .$e);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" >
    <title>Document</title>
</head>
<body>
    <div class="container d-grid my-5 justify-content-center shadow-lg ">
<table class="table table-bordered ">
  <thead class="thead-dark">
    <tr>
      <th scope="col">USER ID</th>
      <th scope="col">NAME</th>
      <th scope="col">EMAIL</th>
      <th scope="col">ACTION</th>
    </tr>
  </thead>
  <tbody>
    
    
      <!-- <th scope="row"></th> -->
      <?php
      foreach($user_results as $user_results_inst){
      echo"
      <tr>
      <td>".$user_results_inst['user_id']."</td>
      <td>".$user_results_inst['user_name']."</td>
      <td>".$user_results_inst['user_email']."</td>
      <td> <a href=\"db.php?id=".$user_results_inst['user_id']."\" style=\"margin-right: 20px\">DELETE</a>
      <a href=\"edit_form.php?id=".$user_results_inst['user_id']."\">EDIT</a>
      
      </tr>
      "; 
    }
      
      ?>
    
  </tbody>
</table>
</div>
</body>
</html>
