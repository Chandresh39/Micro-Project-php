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
            <h1>Login</h1>
            <form action="login.php" method="post">
                <div class="row m-3">
                    <input type="text" class="form-control" name="username" id="UserName" placeholder="Enter User Name" required><br>
                </div>

               <div class="row m-3">
                   <input type="password" class="form-control"  name="password" id="password" placeholder="Enter Password" required><br>
               </div>

               <div class="row mx-5 my-2">
               <button type="submit" class="btn btn-primary" name="submit" id="submit" >login</button><br>
                </div>
              <a href="createacc.php">Create new account</a>
            </form> 
        </div>
    </div>
</body>
</html>  
