

$(document).ready(function() {

  $('#plansprojetdt-btn').on('click', function() {
    $('#plansprojetdt').trigger('click');
  });

  $('#plansprojetdt').on('change', function() {
    var fileName = $(this)[0].files[0].name;
    var files = $(this)[0].files;
    if(files.length > 1)
      $('#plansprojetdt-file').html(files.length+' sélectionnés');
    else
      $('#plansprojetdt-file').html(fileName);
  });

  $('#insertiongraphiquedt-btn').on('click', function() {
    $('#insertiongraphiquedt').trigger('click');
  });

  $('#insertiongraphiquedt').on('change', function() {
    var fileName = $(this)[0].files[0].name;
    var files = $(this)[0].files;

    if(files.length > 1)
      $('#insertiongraphiquedt-file').html(files.length+' sélectionnés');
    else
     $('#insertiongraphiquedt-file').html(fileName);

  });

  $('#phototerraindt-btn').on('click', function() {
    $('#phototerraindt').trigger('click');
  });

  $('#phototerraindt').on('change', function() {
    var fileName = $(this)[0].files[0].name;
    var files = $(this)[0].files;
    if(files.length > 1)
      $('#phototerraindt-file').html(files.length+' sélectionnés');
    else
      $('#phototerraindt-file').html(fileName);
  });

  $("#formdt").submit(function(e){
    var checkdt = false;

    if( document.getElementById("plansprojetdt").files.length == 0 ){
      checkdt = true;
      $('#plansprojetdt').addClass("dt-error");
      $('#plansprojetdtinfo').addClass("dt-error-info");
      $('#plansprojetdtinfo').html('Erreur : Insérer un ou plusieurs fichiers de type gif, jpg, png ou pdf.');
      $('#plansprojetdtinfo').effect( "shake", {times:2}, 1000 );
    }
    if( $('#descriptifprojetdt').val() == '' ){
      checkdt = true;
      $('#descriptifprojetdt').addClass("dt-error");
      $('#descriptifprojetdtinfo').addClass("dt-error-info");
      $('#descriptifprojetdtinfo').html('Erreur : Veuillez inclure une description du projet.');
      $('#descriptifprojetdtinfo').effect( "shake", {times:2}, 1000 );
    }
    if( document.getElementById("insertiongraphiquedt").files.length == 0 ){
      checkdt = true;
      $('#insertiongraphiquedt').addClass("dt-error");
      $('#insertiongraphiquedtinfo').addClass("dt-error-info");
      $('#insertiongraphiquedtinfo').html('Erreur : Insérer un ou plusieurs fichiers de type gif, jpg, png ou pdf.');
      $('#insertiongraphiquedtinfo').effect( "shake", {times:2}, 1000 );
    }
    if( document.getElementById("phototerraindt").files.length == 0 ){
      checkdt = true;
      $('#phototerraindt').addClass("dt-error");
      $('#phototerraindtinfo').addClass("dt-error-info");
      $('#phototerraindtinfo').html('Erreur : Insérer un ou plusieurs fichiers de type gif, jpg, png ou pdf.');
      $('#phototerraindtinfo').effect( "shake", {times:2}, 1000 );
    }

    if(checkdt){
      e.preventDefault();
    }

  });

  $("#descriptifprojetdt").change(function(){
    if( $('#descriptifprojetdt').val() == '' ){
      $('#descriptifprojetdt').addClass("dt-error");
      $('#descriptifprojetdtinfo').addClass("dt-error-info");
      $('#descriptifprojetdtinfo').html('Erreur : Veuillez inclure une description du projet.');
      $('#descriptifprojetdtinfo').effect( "shake", {times:2}, 1000 );
    }else{
      $('#descriptifprojetdt').removeClass("dt-error");
      $('#descriptifprojetdtinfo').removeClass("dt-error-info");
      $('#descriptifprojetdtinfo').html('Description détaillée des travaux prévus, des matériaux utilisés et de l\'impact visuel.');
    }

  });


  $("#plansprojetdt").change(function(){
    $('#plansprojetdt').removeClass("dt-error");
    $('#plansprojetdtinfo').removeClass("dt-error-info");
    $('#plansprojetdtinfo').html('Dessins techniques et schémas illustrant les dimensions et la disposition de la structure.');
  });

  $("#insertiongraphiquedt").change(function(){
    $('#insertiongraphiquedt').removeClass("dt-error");
    $('#insertiongraphiquedtinfo').removeClass("dt-error-info");
    $('#insertiongraphiquedtinfo').html('Simulation ou rendu graphique de l\'intégration de la structure dans l\'environnement existant.');
  });

  $("#phototerraindt").change(function(){
    $('#phototerraindt').removeClass("dt-error");
    $('#phototerraindtinfo').removeClass("dt-error-info");
    $('#phototerraindtinfo').html('Images actuelles de l\'emplacement prévu pour le projet, montrant clairement la zone de construction.');
  });

});
