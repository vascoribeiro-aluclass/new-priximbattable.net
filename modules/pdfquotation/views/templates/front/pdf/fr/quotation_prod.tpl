
{**
* Quotation Template
*
* @author Empty
* @copyright  Empty
* @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}
{assign var='checaDescontosCatalogo' value=Product::checaDescontosCatalogo({$id_category_default})}
<div style="width: 100%;"  >
    <h1 style=" font-size: 16px;font-weight: bold;"> {$productname|escape:'htmlall':'UTF-8'} </h1>
        <table style="width: 100%;"  >
            </tbody>
                <tr>
                    <td width="40%">
                        <table style="width: 100%;"  >
                            <tr> <td width="100%"><img  src="{$imgProd|escape:'htmlall':'UTF-8'}" style="width: 250px; height: 250px; position: relative;"> <br>  </td>  </tr>
                            {if {$checaDescontosCatalogo['reduction']} >= 1}
                                <tr> <td width="100%">
                                 <span style="color: red; font-size: 7px;">Offre de {$checaDescontosCatalogo['reduction']} déjà appliquée sur ce prix, offre limitée jusqu'au {$checaDescontosCatalogo['to']|date_format:"%e %B"}.</span>
                                <br>  </td>  </tr>
                            {/if}
                        </table>
                        <table style="width: 100%;"  >
                        {* <tr>
                            <td width="70%"><b>SOUS-TOTAL H.T : </b>    </td> <td width="30%" style="text-align: right;">{displayPrice price=$priceHT} </td>
                        </tr> *}

                        <tr>
                            <td width="70%"><b>FRAIS DE PORT  : </b>    </td> <td width="30%" style="text-align: right;">{displayPrice price=$Portes}</td>
                        </tr>

                        <tr>
                            <td width="70%"><b>TVA {$iva}%  : </b>    </td> <td width="30%" style="text-align: right;">{displayPrice price=$priceIVA}</td>
                        </tr>

                        <tr>
                            <td width="70%"><b>TOTAL PRODUIT T.T.C : </b>    </td> <td width="30%" style="text-align: right;">{displayPrice price=$pricetotalproducts}</td>
                        </tr>
                        <tr>
                            <td width="70%" style="font-weight: bold; color: #fff; background-color: #595959;"><b>TOTAL T.T.C : </b>    </td> <td width="30%" style="text-align: right;font-weight: bold; color: #fff; background-color: #595959;">{displayPrice price=$pricetotal} </td>
                        </tr>
                    </table>
                    </td>
                    <td width="60%">
                        <table style="width: 100%;"  >
                            <tr>
                              <td width="100%">
                                <h1>Description</h1>
                              </td>
                            </tr>
                        </table>
                         <table style="width: 100%;"  >
                         <tr>
                         <td width="100%">
                             {displayPrice price=$description}
                         </td>
                       </tr>


                        </table>
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td>

                    </td>
                </tr>
            </tfoot>
        </table>
</div>
