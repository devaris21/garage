

$(function(){

	$("div.old").hide()
	$("input[name=isclient]").on('ifChanged', function(event){
		if ($(this).val() == 0) {
			$("div.new").fadeIn()
			$("div.old").fadeOut()
		}else{
			$("div.new").fadeOut()
			$("div.old").fadeIn()
		}
	})



	$("#top-search").on("keyup", function() {
		var value = $(this).val().toLowerCase();
		$("table.table-location tr").filter(function() {
			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		});
	});


	$("form#formLocation").find("input").first().change();

	$("form#formLocation").find("input, select").change(function(){
		var url = "../../webapp/gestion/modules/master/newlocation/ajax.php";
		var formData = new FormData($("#formLocation")[0]);
		formData.append('equipements', $("#formLocation").find("select[name=equipement_id]").val());
		formData.append('marques', $("#formLocation").find("select[name=marque_id]").val());
		formData.append('action', 'calculLocation');
		$.post({url:url, data:formData, processData:false, contentType:false}, function(data) {
			$(".nb").html(data.nb+" véhicule(s) trouvée(s)");

			formData.append('action', 'fiche');
			$.post({url:url, data:formData, processData:false, contentType:false}, function(data) {
				$(".fiche").html(data);
			}, 'html');
		}, 'json');
	})

	$("form#formLocation").submit(function(event) {
		return false;
	});


	validerLocation = function(id){
		var url = "../../webapp/gestion/modules/master/locations/ajax.php";
		alerty.confirm("Voulez-vous vraiment continuer ?", {
			title: "Attention",
			cancelLabel : "Non",
			okLabel : "OUI, approuver",
		}, function(){
			Loader.start();
			var url = "../../webapp/gestion/modules/master/newlocation/ajax.php";
			var formData = new FormData($("#formLocation")[0]);
			formData.append('equipements', $("#formLocation").find("select[name=equipement_id]").val());
			formData.append('marques', $("#formLocation").find("select[name=marque_id]").val());
			formData.append('type', id);
			formData.append('action', 'validerLocation');
			$.post({url:url, data:formData, processData:false, contentType:false}, function(data) {
				if (data.status) {
					window.location.reload();
				}else{
					Alerter.error('Erreur !', data.message);
				}
			},"json");
		});
	}



	supVehicule = function(id){
		Loader.start();
		var url = "../../webapp/gestion/modules/master/locations/ajax.php";
		var formData = new FormData();
		formData.append('id', id);
		formData.append('action', 'supVehicule');
		$.post({url:url, data:formData, processData:false, contentType:false}, function(data) {
			$(".affichage").html(data)
			Loader.stop();
		}, 'html');
	}


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

voirVehicule = function(id){
	Loader.start();
	var url = "../../webapp/gestion/modules/master/locations/ajax.php";
	var formData = new FormData();
	formData.append('id', id);
	formData.append('action', 'listevehicules');
	$.post({url:url, data:formData, processData:false, contentType:false}, function(data) {
		$(".modal .listevehicules").html(data)
		modal("#modal-listevehicule");
		Loader.stop();
	}, 'html');
}


terminerLocation = function(id){
	var url = "../../webapp/gestion/modules/master/locations/ajax.php";
	alerty.confirm("Voulez-vous vraiment terminer cette location/Pret de véhicule ?", {
		title: "Location/Pret terminée",
		cancelLabel : "Non",
		okLabel : "OUI, approuver",
	}, function(){
		alerty.prompt("Entrer votre mot de passe pour confirmer l'opération !", {
			title: 'Récupération du mot de passe !',
			inputType : "password",
			cancelLabel : "Annuler",
			okLabel : "Mot de passe"
		}, function(password){
			Loader.start();
			$.post(url, {action:"approuver", id:id, password:password}, (data)=>{
				if (data.status) {
					window.location.reload();
				}else{
					Alerter.error('Erreur !', data.message);
				}
			},"json");
		})
	})
}


annulerLocation = function(id){
	var url = "../../webapp/gestion/modules/master/locations/ajax.php";
	alerty.confirm("Voulez-vous vraiment annuler cette location/Pret de véhicule ?", {
		title: "Annulation de la declaration",
		cancelLabel : "Non",
		okLabel : "OUI, annuler",
	}, function(){
		alerty.prompt("Entrer votre mot de passe pour confirmer l'opération !", {
			title: 'Récupération du mot de passe !',
			inputType : "password",
			cancelLabel : "Annuler",
			okLabel : "Mot de passe"
		}, function(password){
			Loader.start();
			$.post(url, {action:"annuler", id:id, password:password}, (data)=>{
				if (data.status) {
					window.location.reload()
				}else{
					Alerter.error('Erreur !', data.message);
				}
			},"json");
		})
	})
}

})