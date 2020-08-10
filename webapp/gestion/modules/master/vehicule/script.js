
$(function(){

        /////////////////////////////////////////////////////////////////////////////////////////////////

        $("table tr").click(function(event) {
        	$("table tr").removeClass('selected')
        	$(this).addClass('selected')
        });


        src = function(categorie, dossier, id){
        	var url = "../../webapp/gestionnaire/modules/master/vehicule/ajax.php";
        	$.post(url, {action: dossier, dossier:dossier, id:id}, function(data) {
        		$("div.affichage#"+categorie).html(data);
        	}, "html");
        }



//////////////////////////////////////////////////////////////////////////////////////////////
// DISPONIBILITE

disponibilite = function(i){
	message = (i == 1) ? "Voulez-vous vraiment rendre ce vehicule indisponible pour les futures opérations ? " : "Voulez-vous vraiment rendre ce vehicule de nouvau disponible ?";
	var url = "../../webapp/gestionnaire/modules/master/vehicule/ajax.php";
	alerty.confirm(message, {
		title: "indisponibilité du véhicule",
		cancelLabel : "Non",
		okLabel : "OUI, valider",
	}, function(){
		alerty.prompt("Entrer votre mot de passe pour confirmer l'opération !", {
			title: 'Récupération du mot de passe !',
			inputType : "password",
			cancelLabel : "Annuler",
			okLabel : "Confirmer"
		}, function(password){
			Loader.start()
			$.post(url, {action:"disponibilite", type:i, password:password}, (data)=>{
				if (data.status) {
					window.location.reload()
				}else{
					Alerter.error('Erreur !', data.message);
				}
			},"json");
		})
	})
}


declassement = function(i){
	message = (i == 1) ? "Voulez-vous vraiment déclasser ce véhicule du parc automobile ? " : "Voulez-vous vraiment reclasser de nouveau ce véhicule dans le parc automobile ";
	var url = "../../webapp/gestionnaire/modules/master/vehicule/ajax.php";
	alerty.confirm(message, {
		title: "Disponibilité du véhicule",
		cancelLabel : "Non",
		okLabel : "OUI, valider",
	}, function(){
		alerty.prompt("Entrer votre mot de passe pour confirmer l'opération !", {
			title: 'Récupération du mot de passe !',
			inputType : "password",
			cancelLabel : "Annuler",
			okLabel : "Confirmer"
		}, function(password){
			Loader.start()
			$.post(url, {action:"declassement", type:i, password:password}, (data)=>{
				if (data.status) {
					window.location.reload()
				}else{
					Alerter.error('Erreur !', data.message);
				}
			},"json");
		})
	})
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//ENTRETIEN DU VEHICULE

validerEntretien = function(id){
	var url = "../../webapp/gestionnaire/modules/master/entretiensencours/ajax.php";
	alerty.confirm("Voulez-vous vraiment valider cet entretien comme étant terminé ?", {
		title: "Entretein terminé ",
		cancelLabel : "Non",
		okLabel : "OUI, approuver",
	}, function(){
		$.post(url, {action:"approuver", id:id}, (data)=>{
			if (data.status) {
				window.location.reload();
			}else{
				Alerter.error('Erreur !', data.message);
			}
		},"json");
	})
}


annulerEntretien = function(id){
	var url = "../../webapp/gestionnaire/modules/master/entretiensencours/ajax.php";
	alerty.confirm("Voulez-vous vraiment refuser cette demande d'entretien pour ce véhicule ?", {
		title: "Annulation de la demande",
		cancelLabel : "Non",
		okLabel : "OUI, refuser",
	}, function(){
		$.post(url, {action:"refuser", id:id}, (data)=>{
			if (data.status) {
				window.location.reload()
			}else{
				Alerter.error('Erreur !', data.message);
			}
		},"json");
	})
}



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


$("form#formAffectation").submit(function(){
	Loader.start()
	var url = "../../webapp/gestionnaire/modules/master/vehicule/ajax.php";
	var formData = new FormData($(this)[0]);
	formData.append('action', 'affectation');
	$.post({url:url, data:formData, processData:false, contentType:false}, function(data) {
		if (data.status) {
			location.reload();
		}else{
			Alerter.error('Erreur !', data.message);
		}
	}, 'json');
	return false;
})


	////////////////////////////////////////////////////////////////////
	//ACCESSOIRE ET EQUIPEMENT
	retirer = function(table, id){
		var url = "../../webapp/gestionnaire/modules/master/vehicule/ajax.php";
		alerty.confirm("Voulez-vous vraiment retirer cet element ?", {
			title: "Retirer",
			cancelLabel : "Non",
			okLabel : "OUI, retirer",
		}, function(){
			Loader.start()
			$.post(url, {action:"retirer", table:table, id:id}, (data)=>{
				if (data.status) {
					window.location.reload()
				}else{
					Alerter.error('Erreur !', data.message);
				}
			},"json");
		})
	}


	// usure = function(table, id){
	// 	var url = "../../webapp/gestionnaire/modules/master/vehicule/ajax.php";
	// 	alerty.confirm("Voulez-vous vraiment declarer cet element comme <b>usé</b> ?", {
	// 		title: "Usure",
	// 		cancelLabel : "Non",
	// 		okLabel : "OUI, il est usé",
	// 	}, function(){
	// 		$.post(url, {action:"usure", table:table, id:id}, (data)=>{
	// 			if (data.status) {
	// 				window.location.reload()
	// 			}else{
	// 				iziToast.error({
	// 					title: 'Erreur !',
	// 					message: data.message,
	// 				});
	// 			}
	// 		},"json");
	// 	})
	// }

	///////////////////////////////////////////////////////////////////////////


	// $("table.spe").DataTable({
	// 	"language": {

	// 		"sProcessing":     "Traitement en cours...",
	// 		"sSearch":         "Rechercher&nbsp;:",
	// 		"sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments",
	// 		"sInfo":           "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
	// 		"sInfoEmpty":      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
	// 		"sInfoFiltered":   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
	// 		"sInfoPostFix":    "",
	// 		"sLoadingRecords": "Chargement en cours...",
	// 		"sZeroRecords":    "Aucune donn&eacute;e disponible dans le tableau",
	// 		"sEmptyTable":     "Aucune donn&eacute;e disponible dans le tableau",
	// 		"oPaginate": {
	// 			"sFirst":      "Premier",
	// 			"sPrevious":   "Pr&eacute;c&eacute;dent",
	// 			"sNext":       "Suivant",
	// 			"sLast":       "Dernier"
	// 		},
	// 		"oAria": {
	// 			"sSortAscending":  ": activer pour trier la colonne par ordre croissant",
	// 			"sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
	// 		}
	// 	},
	// 	"iDisplayLength": 10,
	// 	'ordering'    : true,
	// 	'responsive': true,
	// 	"pagination": true,
	// 	"searching": true,
	// })
	

	$(".loading-data").removeClass("loading-data");
})