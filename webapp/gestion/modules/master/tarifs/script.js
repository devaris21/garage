$(function(){

	$(".tabs-container li:nth-child(1) a.nav-link").addClass('active')
	ele = $("#parcs div.tab-pane:first").addClass('active')
	
	$("#top-search").on("keyup", function() {
		var value = $(this).val().toLowerCase();
		$("div.vehicule").filter(function() {
			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		});
	});


	$("#formTarif").submit(function(event) {
		var url = "../../webapp/gestion/modules/master/tarifs/ajax.php";
		var formdata = new FormData($("#formTarif")[0]);
		formdata.append('fonctions', $(this).find("select[name=fonctionvehicule_id]").val());
		formdata.append('action', "newTarif");
		Loader.start();
		$.post({url:url, data:formdata, contentType:false, processData:false}, function(data){
			if (data.status) {
				window.location.reload();
			}else{
				Alerter.error('Erreur !', data.message);
			}
		}, 'json')
		return false;
	});
	
})