<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
	<h3 class="py-2 text-center"> Seleccione filtros de Intolerancias y Alergias</h3>
	<form id="select_allergy" action="{$link->getModuleLink('intolerancias', 'intolerancias', [], true)|escape:'html'}" method="post">
		<input type="hidden" id="allergy_selected" name="allergy_selected" value="">
		<div class="row">
		{foreach $reason_data as $item}
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-2 col-xl-2">
			  <input type="checkbox" id="{$item.id}" name="{$item.id}" value="{$item.intolerance_allergy}">
			  <label for="{$item.id}">{$item.intolerance_allergy}</label><br>
			</div>
		{/foreach}
		</div>
		<div class="row text-center py-2">
	  	<input type="submit" value="{l s='Filtrar' mod='intolerancias'}" class="btn btn-primary"/>
	  </div>

	</form>
</div>