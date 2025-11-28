<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Projeto Robin Hood</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

  <div class="container">
    <div class="row mt-2 mb-3">
      <div class="col-12">
        <h1>Projeto Robin Hood</h1>
        <p>Roubando imagens dos ricos (FR) para dar aos pobres (PT e ES).</p>
      </div>
    </div>
  </div>

  <div class="container bg-light">
    <div class="row m-3 p-3">
      <div class="col-6 text-center">
        <p>Informe o ID do campo NDK para baixar as imagens.</p>
        <a href="get.php" class="btn btn-primary btn-lg download">Baixar imagens</a>
      </div>
      <div class="col-6 text-center">
        <p>Execute esta página localmente para enviar imagens para PT e ES.</p>
        <a href="put.php" class="btn btn-info btn-lg upload">Enviar imagens</a>
      </div>
    </div>
  </div>

  
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <script>
    $(document).on("click", ".download", function() {
      $(this).html("Por favor, aguarde...");
      $(this).addClass("disabled");
    });

    $(document).on("click", ".upload", function() {
      $(this).html("Por favor, aguarde...");
      $(this).addClass("disabled");
    });
  </script>

</body>
</html>