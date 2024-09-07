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
                <h1>Deposit Amount</h1><br><br>
      <form action="deposit.php" method="post">
        <div class="row">
          <div class="col">
            <input type="text" name='statement' class="form-control" placeholder="Remark">
          </div>
          <div class="col">
            <input type="text" name='amount' class="form-control" placeholder="Amount">
          </div>
        </div>
        <div class="row mx-2 my-3">
          <button type="submit" class="btn btn-primary">Deposit</button>
        </div>
      </form>
    </div>
  </main>
</body>
</html>