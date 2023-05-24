

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>
<form method="post" action="db.php" class="form-group">
          <div class=" container d-grid my-5 shadow-lg pt-5 pb-5">
                <div class=" col-lg-4 form-group mx-auto">
                  <label>name</label>
                  <input type="text" class="form-control" name = "name"  required >
                </div>


                <div class=" col-lg-4 form-group mx-auto">
                  <label >email</label>
                  <input type="email" class="form-control" name = "email" required>
                </div>

                <div class=" col-lg-4 form-group mx-auto">
                     <button type="submit" class="btn btn-primary mx-auto" name ="submit">Submit</button>
                 </div> 
          </div> 
      </form>
    
</body>
</html>
