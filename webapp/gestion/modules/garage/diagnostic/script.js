$(function(){
	$("#formDiagnostic").submit(function(){
		return false;
	})

	enregistrerDiagnostic = function(){
		Loader.start();
		var url = "../../webapp/gestion/modules/garage/diagnostic/ajax.php";

		var formdata = new FormData($("#formDiagnostic")[0]);
		formdata.append('mecaniciens', $("select[name=mecanicien_id]").val());
		formdata.append('action', "enregistrerDiagnostic");

		$.post({url:url, data:formdata, contentType:false, processData:false}, function(data){
			if (data.status) {
				window.open(data.url, "_blank");
				window.location.reload();
			}else{
				Alerter.error('Erreur !', data.message);
			}
		}, 'json')
		
	}
})