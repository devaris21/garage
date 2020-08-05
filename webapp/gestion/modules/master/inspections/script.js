$(function(){

	$('input.i-checks').on('ifChecked', function(event){
		$("input[name=kilometrage]").val($(this).attr("kilometrage"));
	});

	$(".formReservation").submit(function(event) {
		var url = "../../webapp/gestion/modules/master/reservations/ajax.php";
		var formData = new FormData($(this)[0]);
		alerty.confirm("Voulez-vous vraiment valider cette reservation en location ?", {
			title: "Attention",
			cancelLabel : "Non",
			okLabel : "OUI, valider",
		}, function(){
			Loader.start();
			var url = "../../webapp/gestion/modules/master/reservations/ajax.php";
			formData.append('action', 'validerLocation');
			$.post({url:url, data:formData, processData:false, contentType:false}, function(data) {
				if (data.status) {
					window.location.href = data.url;
				}else{
					Alerter.error('Erreur !', data.message);
				}
			},"json");
		});
		return false;
	});


})