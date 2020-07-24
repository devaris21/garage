$(function(){

	$('input.tache').keyup(function(e) {   
		if(e.keyCode == 13) {
			var url = "../../webapp/gestion/modules/master/diagnostics/ajax.php";
			val = $(this).val();
			var formData = new FormData();
			formData.append('tache', val);
			formData.append('action', 'tache');
			$.post({url:url, data:formData, processData:false, contentType:false}, function(data) {
				$("tbody.listetache").html("")
				$("tbody.listetache").append(data)
			}, 'html');
			$("input.tache").val("")
			return false;
		}
	});

	supprimerTache = function(id){
		var url = "../../webapp/gestion/modules/master/diagnostics/ajax.php";
		var formData = new FormData();
		formData.append('key', id);
		formData.append('action', 'supprimerTache');
		$.post({url:url, data:formData, processData:false, contentType:false}, function(data) {
			$("tbody.listetache").html("")
			$("tbody.listetache").append(data)
		}, 'html');
	}



	$('input.piece, input.qte').keyup(function(e) {   
		if(e.keyCode == 13) {
			var url = "../../webapp/gestion/modules/master/diagnostics/ajax.php";
			val = $(this).parent("div").parent("div").find("input.piece").val();
			qte = $(this).parent("div").parent("div").find("input.qte").val();
			var formData = new FormData();
			formData.append('piece', val);
			formData.append('qte', qte);
			formData.append('action', 'piece');
			$.post({url:url, data:formData, processData:false, contentType:false}, function(data) {
				$("tbody.listepiece").html("")
				$("tbody.listepiece").append(data)
			}, 'html');
			$("input.piece").val("")
			$("input.qte").val(1)
			return false;
		}
	});

	supprimerPiece = function(id){
		var url = "../../webapp/gestion/modules/master/diagnostics/ajax.php";
		var formData = new FormData();
		formData.append('key', id);
		formData.append('action', 'supprimerPiece');
		$.post({url:url, data:formData, processData:false, contentType:false}, function(data) {
			$("tbody.listepiece").html("")
			$("tbody.listepiece").append(data)
		}, 'html');
	}






	validerDiagnostic = function(id){
		var url = "../../webapp/gestion/modules/master/diagnostics/ajax.php";
		alerty.confirm("Voulez-vous vraiment valider le diagnostic ?", {
			title: "Validation de le diagnostic",
			cancelLabel : "Non",
			okLabel : "OUI, valider",
		}, function(){
			var formData = new FormData($("#modal-valider_diagnostic-"+id).find("form")[0]);
			formData.append('action', 'validerDiagnostic');
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


$("form#formValiderDiagnostic").submit(function(){
	return false;
})


})