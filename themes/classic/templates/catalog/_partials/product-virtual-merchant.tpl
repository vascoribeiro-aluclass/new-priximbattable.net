{if isset($virtual_merchant) && $virtual_merchant}
<div id="pp_review_merchant">
   
    <div id="pp_review_comment">
        <!--<span id="pp_review_title">
            <img src="{$urls.img_ps_url}medal.png" id="pp_medal"/>{l s='Avis du marchand'}
        </span>-->

        <div id="pp_typed"></div>

        <div id="pp_real_text" style="display: none;">
            <span>
            {$virtual_merchant.texte|escape:'htmlall':'UTF-8'}</span>
        </div>
    </div>
	 <div id="pp_pic_merchant">
        <img src="{$urls.img_ps_url}vendeur-virtuel/{$virtual_merchant.image}" />    
    </div>
</div>
{/if}
