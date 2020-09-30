$(function() {
  $( "#select_allergy input:checkbox" ).click(function() {
  	var id_allergy = $(this).attr('id');

  	var allergy_selected = $("#allergy_selected").val();


  	if(allergy_selected == ""){
  		$("#allergy_selected").val(id_allergy);
  	}else{
	  	var res = allergy_selected.split(",");
  		if($.inArray(id_allergy, res) == -1){
	  		res.push(id_allergy);
	  		
  		}else{
  			res.splice( $.inArray(id_allergy, res), 1 );
  		}
  		res.join(',')
	  	$("#allergy_selected").val(res);
  	}
	});
});