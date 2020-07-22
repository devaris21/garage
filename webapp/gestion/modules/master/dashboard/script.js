$(function(){
	$(".tabs-container li:nth-child(1) a.nav-link").addClass('active')
	ele = $("#produits div.tab-pane:first").addClass('active')


	$("#search").on("keyup", function() {
		var value = $(this).val().toLowerCase();
		$(".clients").filter(function() {
			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		});
	});


	$("input[name=equipementauto]").on('ifChanged', function(){
		id = $(this).attr("id")
		if ($(this).is(":checked")) {
			$("input[name=equipementauto-"+id+"]").prop("disabled", false);
		}else{
			$("input[name=equipementauto-"+id+"]").prop("disabled", true);
		}
	})


	newTicket = function(){
		alerty.confirm("Voulez-vous vraiment valider cette reservation de véhicule ?", {
			title: "Nouvelle reservation",
			cancelLabel : "Non",
			okLabel : "OUI,  valider",
		}, function(){
			Loader.start();
			var url = "../../webapp/gestion/modules/master/dashboard/ajax.php";
			var formData = new FormData($("#formTicket")[0]);
			var tab = new Array();
			$("input[name=typereparation]").each(function(){
				if ($(this).is(":checked")){
					tab.push($(this).attr('id'));
				}
			})
			formData.append('typereparations', tab);

			tab = new Array();
			$("input[name=equipementauto]").each(function(){
				if ($(this).is(":checked")){
					tab.push($(this).attr('id'));
				}
			})
			formData.append('equipementautos', tab);

			tab = new Array();
			$("input[name=enjoliveurs]").each(function(){
				if ($(this).is(":checked")){
					tab.push($(this).attr('id'));
				}
			})
			formData.append('enjoliveurs', tab);

			formData.append('action', 'newTicket');
			$.post({url:url, data:formData, processData:false, contentType:false}, function(data) {
				if (data.status) {
					location.reload();
				}else{
					Alerter.error('Erreur !', data.message);
				}
			}, 'json');
		})
	};


	$("#formEssai_av").submit(function(){
		Loader.start();
		var url = "../../webapp/gestion/modules/master/dashboard/ajax.php";
		var formData = new FormData($(this)[0]);
		formData.append('action', 'newEssai');
		$.post({url:url, data:formData, processData:false, contentType:false}, function(data) {
			if (data.status) {
				location.reload();
			}else{
				Alerter.error('Erreur !', data.message);
			}
		}, 'json');
		return false;
	})
})