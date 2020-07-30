$(function(){
	
	$('input.liste').keyup(function(e) {   
		if(e.keyCode == 13) {
			var url = "../../webapp/gestion/modules/master/essais_av/ajax.php";
			val = $(this).val();
			var formData = new FormData();
			formData.append('remarque', val);
			formData.append('action', 'remarque');
			$.post({url:url, data:formData, processData:false, contentType:false}, function(data) {
				$("tbody.liste").html("")
				$("tbody.liste").append(data)
			}, 'html');
			$("input.liste").val("")
			return false;
		}
	});


	supprimerRemarque = function(id){
		var url = "../../webapp/gestion/modules/master/essais_av/ajax.php";
		var formData = new FormData();
		formData.append('key', id);
		formData.append('action', 'supprimerRemarque');
		$.post({url:url, data:formData, processData:false, contentType:false}, function(data) {
			$("tbody.liste").html("")
			$("tbody.liste").append(data)
		}, 'html');
	}



	validerEssai = function(id){
		var url = "../../webapp/gestion/modules/master/essais_av/ajax.php";
		alerty.confirm("Voulez-vous vraiment valider l'essai ?", {
			title: "Validation de l'essai",
			cancelLabel : "Non",
			okLabel : "OUI, valider",
		}, function(){
			var formData = new FormData($("#modal-valider_essai-"+id).find("form")[0]);
			formData.append('action', 'validerEssai');
			$.post({url:url, data:formData, processData:false, contentType:false}, function(data) {
				if (data.status) {
					window.location.reload()
				}else{
					Alerter.error('Erreur !', data.message);
				}
			},"json");
		})
		return false;
	}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


$("form#formValiderEssai").submit(function(){
	return false;
})


})