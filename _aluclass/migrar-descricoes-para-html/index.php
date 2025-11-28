<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buscar e Salvar</title>
  <link rel="shortcut icon" href="assets/favicon.png" type="image/x-icon">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>

  <div class="p-5 mb-4 bg-body-tertiary rounded-3">
    <div class="container-fluid">
      <h1 class="display-5 fw-bold">Exportar descrições</h1>
      <p class="col-md-12 fs-4">Busca descrições dos produtos na base de dados e exporta magicamente 🎩 para um ficheiro HTML aqui na pasta <em>descricoes</em>. <br />Depois basta verificar se correu tudo bem e copiar para a pasta do site (dev e/ou prod).</p>
      <small>Algum problema, chame o menino da impressora 🖨️.</small>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                Exportar descrições em lote
              </div>
              <div class="card-body">
                <div class="mt-2 mb-3">
                  <label for="select_category_id" class="form-label">Selecione a categoria de produto</label>
                  <select class="form-select" id="select_category_id">
                  </select>
                </div>

                <div class="mt-2 mb-5" id="block_select_subcategory_id">
                  <label for="select_subcategory_id" class="form-label">Selecione a subcategoria</label>
                  <select class="form-select" id="select_subcategory_id">
                  </select>
                </div>

                <div class="text-end mb-1">
                  <button id="btn_submit" class="btn btn-success mt-2">Fazer a mágica acontecer 🪄</button>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-12 mt-4">
            <div class="card">
              <div class="card-header">
                Exportar uma descrição específica
              </div>
              <div class="card-body">
                <div class="mt-2 mb-3">
                  <label for="specific_product_id" class="form-label">Digite o ID do produto</label>
                  <input class="form-control" type="text" id="specific_product_id">
                </div>

                <div class="text-end mb-1">
                  <button id="btn_submit_one" class="btn btn-primary mt-2">Fazer a mágica acontecer 🪄</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            Log
          </div>
          <div class="card-body" id="log">
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="assets/script.js"></script>

</body>
</html>