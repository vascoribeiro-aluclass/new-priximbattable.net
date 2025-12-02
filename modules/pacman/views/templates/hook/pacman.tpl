<div id="custom-text">
  <input type="text" id="playerpacman" name="playerpacman" value = "Player">
  <img onclick="StartPACMAN()" src="/img/pacman.png" style="width: 68px; margin: 0; margin-top: -30px;">
	<div id="pacman"></div>
</div>

<!-- Modal -->
<div class="modal" id="winpopup" tabindex="1000" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ganhou desconto!</h5>
      </div>
      <div class="modal-body">
          <div id="messagemCode">
          </div>
          <br><br>
          <label for="lname">Mails: </label><input type="text" id="lname" name="lname"><br><br>
           <button type="button"  onclick="CloseCode()" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
           <button type="button"  id="SendCode" onclick="SendCode()" class="btn btn-primary">Enviar</button>
      </div>

    </div>
  </div>
</div> 