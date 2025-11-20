{if $comments}
  {foreach from=$comments item=comment}
      {if $comment.content}
          <div class="comment clearfix" itemprop="review" itemscope itemtype="https://schema.org/Review">
              <div class="comment_author" >
                  <span>{l s='Grade' mod='productcomments'}&nbsp</span>
                  <div class="star_content clearfix" itemprop="reviewRating" itemscope itemtype="https://schema.org/Rating">
                      {section name="i" start=0 loop=5 step=1}
                          {if $comment.grade le $smarty.section.i.index}
                              <div class="star"></div>
                          {else}
                              <div class="star star_on"></div>
                          {/if}
                      {/section}
                      <meta itemprop="worstRating" content = "0" />
                      <meta itemprop="ratingValue" content = "{$comment.grade}" />
                      <meta itemprop="bestRating" content = "5" />
                  </div>
                  <div class="comment_author_infos" >
                      <strong itemprop="author" itemtype="https://schema.org/Person" itemscope>
    <meta itemprop="name" content="{$comment.customer_name|escape:'html':'UTF-8'}" />{$comment.customer_name|escape:'html':'UTF-8'}</strong><br/>
                      <em>{dateFormat date=$comment.date_add|escape:'html':'UTF-8' full=0}</em>
                      <meta itemprop="datePublished" content="{dateFormat date=$comment.date_add|escape:'html':'UTF-8' full=0}" />
                  </div>
              </div>
              <div class="comment_details">
                  <h4 class="title_block" itemprop="name">{$comment.title}</h4>
                  <p itemprop="reviewBody">{$comment.content|escape:'html':'UTF-8'|nl2br nofilter}</p>
                  <ul>
                      {if $comment.total_advice > 0}
                          <li>{l s='%1$d out of %2$d people found this review useful.' sprintf=[$comment.total_useful,$comment.total_advice] mod='productcomments'}</li>
                      {/if}
                     {*if $logged}
                          {if !$comment.customer_advice}
                              <li>{l s='Was this comment useful to you?' mod='productcomments'}
                                  <button class="usefulness_btn" data-is-usefull="1" data-id-product-comment="{$comment.id_product_comment}">{l s='yes' mod='productcomments'}</button>
                                  <button class="usefulness_btn" data-is-usefull="0" data-id-product-comment="{$comment.id_product_comment}">{l s='no' mod='productcomments'}</button>
                              </li>
                          {/if}
                          {if !$comment.customer_report}
                              <li><span class="report_btn" data-id-product-comment="{$comment.id_product_comment}">{l s='Report abuse' mod='productcomments'}</span></li>
                          {/if}
                      {/if}*}
                  </ul>
                  {hook::exec('displayProductComment', $comment) nofilter}
              </div>
          </div>
      {/if}
  {/foreach}
{else}
  {if (!$too_early AND ($logged OR $allow_guests))}
      <p class="align_center alert alert-info">
          <a id="new_comment_tab_btn" class="open-comment-form" href="#new_comment_form">{l s='Be the first to write your review' mod='productcomments'} !</a>
      </p>
  {else}
      <p class="align_center">{l s='No customer reviews for the moment.' mod='productcomments'}</p>
  {/if}
{/if}
