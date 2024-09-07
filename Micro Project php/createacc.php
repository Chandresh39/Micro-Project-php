<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BOB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container p-4 d-flex justify-contain-center col-5">
        <div class="col border rounded p-3">
            <h1>Create Account</h1>
            <form action="passdata.php" method="post">
               <div class="row m-3">
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name" required>
                </div>

               <div class="row m-3">
               <input type="number" class="form-control" name="mobileno" id="MobileNo" placeholder="Enter Mobile Number" required>
                </div>

               <div class="row m-3">
               <input type="email" class="form-control" name="email" id="email" placeholder="Enter Your E-Mail" required>
                </div>

               <div class="row m-3">
               <input type="text" class="form-control" name="username" id="username" placeholder="Enter User Name" required>
                </div>

               <div class="row m-3">
               <input type="password" class="form-control" name="password" id="password" placeholder="Enter Your Password" required><br>
                </div>

               <button type="submit" class="btn btn-primary" name="submit" id="submit" >submit</button>
            </form> 
        </div>
    </div>
</body>
</html>  