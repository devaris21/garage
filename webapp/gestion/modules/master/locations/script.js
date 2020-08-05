

$(function(){


	$("tr.fini").hide()

	$("input[type=checkbox].onoffswitch-checkbox").change(function(event) {
		if($(this).is(":checked")){
			Loader.start()
			setTimeout(function(){
				Loader.stop()
				$("tr.fini").fadeIn(400)
			}, 500);
		}else{
			$("tr.fini").fadeOut(400)
		}
	});

	$("#top-search").on("keyup", function() {
		var value = $(this).val().toLowerCase();
		$("table.table-location tr").filter(function() {
			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		});
	});





	$("form#formVehicule").submit(function(event) {
		Loader.start();
		var url = "../../webapp/gestion/modules/master/locations/ajax.php";
		var formData = new FormData($(this)[0]);
		formData.append('action', 'vehicule-louer');
		$.post({url:url, data:formData, processData:false, contentType:false}, function(data) {
			$(".affichage").html(data);
			$("#modal-vehicule-preter").find("form input").val("");
			$("#modal-vehicule-preter").modal("hide");
			Loader.stop();
		}, 'html');
		return false;
	});



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



	$("form#formLocation").submit(function(event) {
		alerty.confirm("Voulez-vous vraiment valider cette location de véhicule ?", {
			title: "Locations de véhicules",
			cancelLabel : "Non",
			okLabel : "OUI,  valider",
		}, function(){
			var url = "../../webapp/gestion/modules/master/locations/ajax.php";
			var formData = new FormData($("form#formLocation")[0]);
			formData.append('action', 'location');
			$.post({url:url, data:formData, processData:false, contentType:false}, function(data) {
				Loader.stop();
				if (data.status) {
					location.reload();
				}else{
					Alerter.error('Erreur !', data.message);
				}
			}, 'json');
		})
		return false;
	});

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

dsqsd = function(id){
	var formData = new FormData();
	alerty.confirm("Voulez-vous vraiment terminer cette location ?", {
		title: "Attention",
		cancelLabel : "Non",
		okLabel : "OUI, approuver",
	}, function(){
		Loader.start();
		var url = "../../webapp/gestion/modules/master/locations/ajax.php";
		formData.append('id', id);
		formData.append('action', 'approuver');
		$.post({url:url, data:formData, processData:false, contentType:false}, function(data) {
			if (data.status) {
				window.location.reload();
			}else{
				Alerter.error('Erreur !', data.message);
			}
		},"json");
	});
	return false;
};


terminerLocation = function(id){
	var url = "../../webapp/gestion/modules/master/locations/ajax.php";
	alerty.confirm("Voulez-vous vraiment terminer cette location/Pret de véhicule ?", {
		title: "Location/Pret terminée",
		cancelLabel : "Non",
		okLabel : "OUI, approuver",
	}, function(){
		Loader.start();
		$.post(url, {action:"approuver", id:id}, (data)=>{
			if (data.status) {
				window.location.reload();
			}else{
				Alerter.error('Erreur !', data.message);
			}
		},"json");
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