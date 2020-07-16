$(function(){

	$(".tabs-container li:nth-child(1) a.nav-link").addClass('active')
	ele = $("#parcs div.tab-pane:first").addClass('active')
	
	$("#top-search").on("keyup", function() {
		var value = $(this).val().toLowerCase();
		$("div.vehicule").filter(function() {
			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		});
	});


	$("#formVehicule").submit(function(event) {
		var url = "../../webapp/gestion/modules/master/parcauto/ajax.php";
		var formdata = new FormData($("#formVehicule")[0]);
		formdata.append('equipements', $(this).find("select[name=equipement_id]").val());
		formdata.append('accessoires', $(this).find("select[name=accessoire_id]").val());
		formdata.append('action', "newVehicule");
		Loader.start();
		$.post({url:url, data:formdata, contentType:false, processData:false}, function(data){
			if (data.status) {
				window.open(data.url, "_blank");
				window.location.reload();
			}else{
				Alerter.error('Erreur !', data.message);
			}
		}, 'json')
		return false;
	});
	
})