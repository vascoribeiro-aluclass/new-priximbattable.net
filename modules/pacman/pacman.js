function getIp(callback)
{
    function response(s)
    {
        callback(window.userip);

        s.onload = s.onerror = null;
        document.body.removeChild(s);
    }

    function trigger()
    {
        window.userip = false;

        var s = document.createElement("script");
        s.async = true;
        s.onload = function() {
            response(s);
        };
        s.onerror = function() {
            response(s);
        };

        s.src = "https://l2.io/ip.js?var=userip";
        document.body.appendChild(s);
    }

    if (/^(interactive|complete)$/i.test(document.readyState)) {
        trigger();
    } else {
        document.addEventListener('DOMContentLoaded', trigger);
    }
}

     
     
     
     if (navigator.userAgent.match(/Tablet|iPad/i))
     {
         // do tablet stuff
     } else if(navigator.userAgent.match(/Mobile|Windows Phone|Lumia|Android|webOS|iPhone|iPod|Blackberry|PlayBook|BB10|Opera Mini|\bCrMo\/|Opera Mobi/i) )
     {
      document.getElementById("gameVR").innerHTML = '<p><input type="hidden" id="statusgame" name="statusgame" value="0" /> <input type="hidden" id="soundgame"'+
      'name="soundgame" value="0" /> <input type="hidden" id="soundgameplay" name="soundgame" value="0" /><input'+
      'type="hidden" id="reduction" name="reduction" value="0" /> <input type="hidden" id="scoreplayer" name="scoreplayer"'+
      'value="0" /> <input type="hidden" id="hallplayer" name="hallplayer" value="" /> <input type="hidden" id="position"'+
      'name="position" value="13" /> <input type="hidden" id="timewalk" name="position" value="13" /> <input type="hidden"'+
      'id="nameplayer" name="nameplayer" value="0" /></p>'+
      '<p><input type="hidden" id="positionHTML" name="positionHTML" value="0" /></p>'+
      '<!--<div class="row TimePACMAN colorgroundblackMail ">'+
      '<h5 style="text-align: center;">Jouez à Pacman et gagnez un code de réduction vous permettant d\'avoir jusqu\'à 20% de remise sur tous nos produits.</h5>'+
      '</div>-->'+
      '<div class="row pt-1 paddingPacman">'+
        '<div class="col-md-6 colorgroundblack colorgroundblackMail">'+
          '<div class="row">'+
            '<div id="infoTIME" class="col-md-12"></div>'+
          '</div>'+
          '<div class="row ">'+
          ' <div class="col-md-12">'+
              '<div style="text-align: center;" id="pacman2"></div>'+
            '</div>'+
          '</div>'+
          '</div>'+
          '<div class="col-md-6">'+
          '<div class="row">'+
            '<div class="col-md-12">'+
              '<div class = "menuC" id="menu" ></div>'+
            '</div>'+
          '</div>'+
        '</div>'+
      '</div>'+
      '<div class="modal" id="winpopup" tabindex="1000" role="dialog" aria-labelledby="exampleModalLabel" style="background-color: rgba(128, 128, 128, 0.4);" >'+
      '<div class="modal-dialog" role="document">'+
      ' <div class="modal-content">'+
      ' <div class="modal-body">'+
      '    <div class="row  pb-1">'+
      '      <div class="col-xs-12">'+
      '        <div id="hallfame"></div>'+
      '       </div>'+
      '        </div>'+
      '       <div class="row ">'+
      '        <div class="col-xs-12">'+
      '          <div class="pb-1" id="sendMail"></div>'+
      '        </div>'+
      '       </div>'+
      '        <button type="button"  onclick="CloseCode()" class=" btn btn-primary" data-dismiss="modal">Fermer</button>'+
      
      '   </div>'+
      ' </div>'+
      '</div>'+
      '</div> ';

     } else {
      document.getElementById("gameVR").innerHTML = '<p><input type="hidden" id="statusgame" name="statusgame" value="0" /> <input type="hidden" id="soundgame" name="soundgame" value="0" /> <input type="hidden" id="soundgameplay" name="soundgame" value="0" /><input type="hidden" id="reduction" name="reduction" value="0" /> <input type="hidden" id="scoreplayer" name="scoreplayer" value="0" /> <input type="hidden" id="hallplayer" name="hallplayer" value="" /> <input type="hidden" id="position" name="position" value="13" /> <input type="hidden" id="timewalk" name="position" value="13" /> <input type="hidden" id="nameplayer" name="nameplayer" value="0" /><input type="hidden" id="positionHTML" name="positionHTML" value="0" /></p>'+
      '<!--<div class="TimePACMAN colorgroundblackMail pb-3">'+
      '<h3 style="text-align: center;">Jouez à Pacman et gagnez un code de réduction vous permettant d\'avoir jusqu\'à 20% de remise sur tous nos produits.</h3>'+
      '</div>-->'+
      '<div class="row pt-2 pl-1">'+
      '<div class="col-md-6  col-md-6  pl-2 colorgroundblackMail">'+
      '<div class=" pb-2">'+
      '<div id="infoTIME" class="col-md-12"></div>'+
      '</div>'+
      '<div class="row">'+
      '<div class="col-md-12">'+
      '<div style="text-align: center;" id="pacman2"></div>'+
      '</div>'+
      '</div>'+
      '</div>'+
      '<div class="col-md-6">'+
      '<div class="row">'+
      '<div class="col-md-12">'+
      '<div id="menu"></div>'+
      '</div>'+
      '</div>'+
      '<div class="row">'+
      '<div class="col-md-12">'+
      '<div id="hallfame"></div>'+
      '</div>'+
      '</div>'+
      '<div class="row">'+
      '<div class="col-md-12">'+
      '<div class="pt-1" id="sendMail"></div>'+
      '</div>'+
      '</div>'+
      '</div>'+
      '</div>';
     }
     
     /*
     if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){
       if(navigator.userAgent.match(/Tablet|iPad/i)){

       }else{
      
       }
       
  }else{

  }*/

var elpacman = document.getElementById("pacman2");
PACMAN.init(elpacman, "../");

var x = document.getElementsByClassName("page-header");
x[0].innerHTML = '<h1>PACMAN<img src="/img/cms/PACMAN/pacman.gif" style="width: 68px; margin-bottom: 5px"></img></h1>';


mintus = parseInt(780/60);
sec = (parseFloat(780/60) -  parseInt(780/60))*60;
if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) && !/ipad|tablet/i.test(navigator.userAgent)){
  TempoText =  "<h5 class = 'TimePACMAN' >13 minutes de jeux : "+mintus+ ":0"+parseInt(sec)+"</h5>";
}else{
  TempoText =  "<h2 class = 'TimePACMAN' >Vous avez 13 minutes de temps de jeux <br><div class='pt-1'>"+mintus+ ":0"+parseInt(sec)+"</div></h2 >";
}
document.getElementById('infoTIME').innerHTML = TempoText;

function SendCode(scoreplayer,timeplay) {
  reduction = document.getElementById("reduction").value;
  mailuser = document.getElementById("mailuser").value;
  getIp(function (ip) {
    
    var xhttpcheck;
    xhttpcheck = new XMLHttpRequest();
    xhttpcheck.onreadystatechange = function() {
      if (xhttpcheck.readyState == 4 && xhttpcheck.status == 200) {
        if(xhttpcheck.response == '0'){
            var xhttp;
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
              if (xhttp.readyState == 4 && xhttp.status == 200) {
                  document.getElementById("sendMail").innerHTML  = '<div class="p-1 colorgroundblackMail" >'+
                  '<div class = "row">'+
                  '<div class = "col-md-12 TimePACMAN"> <h2>Courriel envoyé!</h2></div>'+
                  '</div></div>'; 
              }
            };
            var name = document.getElementById("nameplayer").value; 
            xhttp.open("GET", "../modules/pacman/resquest.php?q=insert$mail="+mailuser+"$reduction="+reduction+"$name="+name+"$score="+scoreplayer+"$timeplay="+timeplay+"$ip="+ip, true);
            xhttp.send(); 
        }else{
                   document.getElementById("sendMail").innerHTML  = '<div class="p-1 colorgroundblackMail" >'+
                        '<div class = "row">'+
                        '<div class = "col-md-12 TimePACMAN"> <h2>Vous avez déjà reçu un coupon. Vous ne pouvez recevoir plus.</h2></div>'+
                        '</div></div>'; 
        }
      }
    };

      xhttpcheck.open("GET", "../modules/pacman/resquest.php?q=check$mail="+mailuser+"$ip="+ip, true);
      xhttpcheck.send(); 
    
   
    });
 


}

function startgame() {
  document.getElementById("statusgame").value = 1;
  document.getElementById("sendMail").innerHTML  = '';
  document.getElementById("hallfame").innerHTML  = '';
  document.getElementById("reduction").value = 0;
  document.getElementById("scoreplayer").value = 0;
  document.getElementById("hallplayer").value = '0';
  document.getElementById("nameplayer").value = '0';
  document.getElementById("timewalk").value = 2;
}

function disbleSound() {
  var sound = document.getElementById("soundgameplay").value
  if(sound == 0){
    document.getElementById("soundgame").value = 1;
    document.getElementById("soundgameplay").value = 1;
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) && !/ipad|tablet/i.test(navigator.userAgent))
      document.getElementById("disbleSound").innerHTML  = '<img src="../modules/pacman/pacman/assets/img/volume-up.svg"  height="20" width="20">';
    else
      document.getElementById("disbleSound").innerHTML  = 'Allumez le son';
  }
  else{
    document.getElementById("soundgame").value = 1;
    document.getElementById("soundgameplay").value = 0;
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) && !/ipad|tablet/i.test(navigator.userAgent))
    document.getElementById("disbleSound").innerHTML  = '<img src="../modules/pacman/pacman/assets/img/volume-mute.svg"  height="20" width="20">';
  else
    document.getElementById("disbleSound").innerHTML  = 'Éteindre le son';
  }
    
}

function CloseCode() {
  document.getElementById("sendMail").innerHTML  = '';
  document.getElementById("hallfame").innerHTML  = '';
  document.getElementById("reduction").value = 0;
  document.getElementById("scoreplayer").value = 0;
  document.getElementById("hallplayer").value = '0';
  var y= document.getElementById("winpopup");
  y.style.display = "none";
}
function HallFame(timeplay) {
  var name = document.getElementById("HallFameprovi").value;
  document.getElementById("hallplayer").value = name ;
  document.getElementById("nameplayer").value = name ;
  position = document.getElementById("position").value;
  score = document.getElementById("scoreplayer").value;
  var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {

      }
    };

    document.getElementById("hallfame").innerHTML  = '<div class="p-1 colorgroundblackMail" >'+
    '<div class = "row">'+
    '<div class = "col-md-12 TimePACMAN"> <h2>Vous êtes dans le hall of fame.</h2></div>'+
    '</div></div>'; 
    xhttp.open("GET", "../modules/pacman/resquest.php?q=update$score="+score+"$name="+name+"$position="+position+"$timeplay="+timeplay, true);
    xhttp.send(); 
}


