<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="product.css" rel="stylesheet" type="text/css" />
<div style="text-align:center;clear:both;">
 <script src="images/gg_bd_ad_720x90.js" type="text/javascript"></script>
 <script src="images/follow.js" type="text/javascript"></script>
</div>
<!-- {if $recommend_product} -->
<div class="incBox">
 <!-- {foreach from=$recommend_product name=recommend_product item=product} -->
 <input checked id="{$product.cat_id}" name="tabs" type="radio">
 <label for="{$product.cat_id}">{$product.cat_name}</label>
 <!-- {/foreach} -->
 <div class="panels">
  <!-- {foreach from=$recommend_product name=recommend_product item=product} -->
 <!-- {foreach from=$product.child name=product_child item=product_child} -->

  <div class="panel">
 <li<!-- {if $smarty.foreach.product_child.iteration % 4 eq 0} --> class="clearBorder"<!-- {/if} -->>
 <p class="name"><a href="{$product_child.url}">{$product_child.cat_name}</a></p>
 </li>
  </div>
 <!-- {/foreach} -->
  <!-- {/foreach} -->
 </div>
</div>
<!-- {/if} -->