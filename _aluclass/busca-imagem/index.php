<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta imagem</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>

    <div class="container">
        <div class="row justify-content-md-center text-center">
            <div class="col-md-4">
                <h1 class="mb-5">Busca imagem por ID do produto</h1>
                <input type="text" id="id_produto" class="form-control mt-4 mb-4" placeholder="id do produto">
                <button id="pesquisar_produto" class="btn btn-primary mt-3 mb-5">Consultar</button>
                <div id="box_id_imagem" style="display: none;">
                    <strong>Id imagem: <span id="result_id_img"></span></strong>
                </div>
            </div>
            <div class="col-md-4">
                <h1 class="mb-5">Busca produto por ID da imagem</h1>
                <input type="text" id="id_imagem" class="form-control mt-4 mb-4" placeholder="id da imagem">
                <button id="pesquisar_imagem" class="btn btn-success mt-3 mb-5">Consultar</button>
                <div id="box_id_produto" style="display: none;">
                    <strong>Id Produto: <span id="result_id_produto"></span></strong>
                    <a href="" target="_blank" id="link_produto" class="btn btn-sm btn-info">Ver produto</a>
                </div>
            </div>
        </div>
    </div>
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#pesquisar_produto").click(function (){
                var id_produto = $("#id_produto").val();
                console.log(id_produto);
                $.ajax({
                    url : 'busca-imagem.php',
                    type : 'POST',
                    data : 'id_produto='+id_produto,
                    success: function(data){
                        var obj = jQuery.parseJSON(data);
                        $("#box_id_imagem").show();
                        $('#result_id_img').html(obj.id_image);
                        console.log(data);
                    }
                });
            });

            $("#pesquisar_imagem").click(function (){
                var id_imagem = $("#id_imagem").val();
                $.ajax({
                    url : 'busca-produto.php',
                    type : 'POST',
                    data : 'id_imagem='+id_imagem,
                    success: function(data){
                        var obj = jQuery.parseJSON(data);
                        $("#box_id_produto").show();
                        $('#result_id_produto').html(obj.id_product);
                        $('#link_produto').attr("href", obj.link);
                        console.log(data);
                    }
                });
            });
        });
    </script>
    
</body>
</html>