<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BOB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <?php include('nav.php') ?>
  <main>
    <div class="container p-4 d-flex justify-contain-center col-5">
        <div class="col border rounded p-3">
            <h1>Password Change</h1>    
            <form action="password.php" method="post">
                <div class="row m-3">
                    <input type="text" class="form-control" name="OPassword" id="OPassword" placeholder="Enter Old Password" required><br>
                </div>

               <div class="row m-3">
                   <input type="password" class="form-control"  name="NPassword" id="NPassword" placeholder="Enter New Password" required><br>
               </div>
               
               <div class="row m-3">
                   <input type="password" class="form-control"  name="CPassword" id="CPassword" placeholder="Enter Conform Password" required><br>
               </div>

               <div class="row mx-5 my-2">
               <button type="submit" class="btn btn-primary" name="submit" id="submit" >Change Password</button><br>
                </div>
            </form> 
        </div>
    </div>
</main>
</body>
</html>  
