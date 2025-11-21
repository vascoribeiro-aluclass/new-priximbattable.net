/* ********************** MESAS DE JARDIM ***************************************** */
//Joana e Miguel - Oculta inicilamente os campos cor, tecido e cerâmica das opções Cadeiras / Mesas de Apoio nos produtos Mesas / Espreguiçadeiras
$(window).on("load", function () {
  RemoveField('5268'); // Cor - Oculta inicialmente campo de cor das cadeiras
  RemoveField('5269'); // Tecido - Oculta inicialmente campo de tecido das cadeiras
  RemoveField('5280'); // Cerâmica - Oculta inicilamente campo de cerâmica da mesa Majorque
  RemoveField('5281'); // Cor - Oculta inicilamente campo de cor da mesa Majorque
  RemoveField('5287'); // Cerâmica - Oculta inicilamente campo cerâmica da mesa Formentera
  RemoveField('5288'); // Cor - Oculta inicilamente campo cor da mesa Formentera


//Remove preview dos campos NDK de tecidos e cerâmicas dos sofás e mesas de centro
var aluclass_id_product = ["640235","640236","640237","640243","640244","640245","640246"];
if ($.inArray(id_product, aluclass_id_product) !== -1) {
    var aluclass_remove_preview = [];
    aluclass_remove_preview[0] = [5271, 5283, 5290, 5296, 5298, 5300, 5302];
    aluclass_remove_preview[0].forEach(function (num) {
        $('.img-value-' + num).data("title", $(this).attr("title")).removeAttr("title");
    });
}

});


// Joana - Habilitar ou desabilitar campos de cor e tecido das cadeiras se tiver 1 ou mais cadeiras selecionadas nas mesas
$(document).on('click', 'li[data-id-value="29772"]', function () {
  if ($('input[data-value-id="5267-29772"]').val() < 1 && $('input[data-value-id="5267-29773"]').val() < 1) {
    RemoveField('5268'); //Cor
    RemoveField('5269'); //Tecido
    ProgressBar();
  }
  else {
     ShowField('5268'); //Cor
    ShowField('5269'); //Tecido
    ProgressBar();
  }
});

$(document).on('click', 'li[data-id-value="29773"]', function () {
if ($('input[data-value-id="5267-29772"]').val() < 1 && $('input[data-value-id="5267-29773"]').val() < 1) {
  RemoveField('5268'); //Cor
  RemoveField('5269'); //Tecido
  ProgressBar();
}
else {
  ShowField('5268'); //Cor
  ShowField('5269'); //Tecido
  ProgressBar();
}
});

/* ********************************************************************************* */

// Miguel - Habilitar ou desabilitar campos de cor e ceramica das mesas Majorque se tiver 1 ou mais mesas selecionadas nas espreguiçadeiras
$(document).on('click', 'li[data-id-value="29829"]', function () {
  if ($('input[data-value-id="5279-29829"]').val() < 1) {
    RemoveField('5280'); //Cerâmica
    RemoveField('5281'); //Cor
    ProgressBar();
  }
  else {
    ShowField('5280'); //Cerâmica
    ShowField('5281'); //Cor
    ProgressBar();
  }
});

// Miguel - Habilitar ou desabilitar campos de cor e ceramica das mesas Formentera se tiver 1 ou mais mesas selecionadas nas espreguiçadeiras
$(document).on('click', 'li[data-id-value="29865"]', function () {
  if ($('input[data-value-id="5286-29865"]').val() < 1) {
    RemoveField('5287'); //Cerâmica
    RemoveField('5288'); //Cor
    ProgressBar();
  }
  else {
    ShowField('5287'); //Cerâmica
    ShowField('5288'); //Cor
    ProgressBar();
  }
});
