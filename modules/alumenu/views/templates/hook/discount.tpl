{assign var='checaDescontosCatalogo' value=Product::checaDescontosCatalogo()}

{if {$checaDescontosCatalogo['reduction']} >= 1}
  <div class="row m-0 mb-1" style="background-color: var(--red);">
    <div class="col-md-12 m-0 text-white p-1">
      <strong>-{$checaDescontosCatalogo['reduction']} sur tout le site du {$checaDescontosCatalogo['from']|date_format:"%e %B"} au {$checaDescontosCatalogo['to']|date_format:"%e %B"}</strong>
    </div>
  </div>
{/if}
