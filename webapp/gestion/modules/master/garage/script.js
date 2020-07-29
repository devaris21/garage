$(document).ready(function(){

   $(".connectList").each(function(){
    var my = $(this);
    $(this).sortable({
        connectWith: ".connectList",
        update: function( event, ui ) {
            Loader.start()
            var url = "../../webapp/gestion/modules/master/garage/ajax.php";
            var formdata = new FormData();
            formdata.append('ticket', $(ui.item).attr("data-id"));
            formdata.append('cible', $(event.target).attr("data-id"));
            formdata.append('action', "verification");
            $.post({url:url, data:formdata, contentType:false, processData:false}, function(data){
                Loader.stop()
                if (data.status) {
                    if (data.modal) {
                        $("#modal-choisir_meca").modal("show");
                    }
                }else{
                    if (data.id != null) {
                        alerty.confirm(data.message, {
                            title: "Attention !",
                            cancelLabel : "Non",
                            okLabel : "OUI, continuer",
                        }, function(){
                            if (data.id == 1) {
                                //retrograde
                                formdata.append('action', "retrograde");
                                $.post({url:url, data:formdata, contentType:false, processData:false}, function(data){
                                    if (data.status) {
                                        window.location.reload()
                                    }else{
                                        my.sortable('cancel');
                                        Alerter.error('Erreur !', data.message);
                                    }
                                },"json");
                            }else{
                                //avance++
                                if (data.modal) {
                                    $("#modal-choisir_meca").modal("show");
                                }
                            }
                        })
                    }else{
                        my.sortable('cancel');
                        Alerter.error('Erreur !', data.message); 
                    }
                }
            }, 'json')
        }
    }).disableSelection();
})



   validerTache =  function(id){
    Loader.start()
    var url = "../../webapp/gestion/modules/master/garage/ajax.php";
    var formdata = new FormData();
    formdata.append('mecanicien', id);
    formdata.append('action', "validerTache");
    $.post({url:url, data:formdata, contentType:false, processData:false}, function(data){
        if (data.status) {
            window.location.reload()
        }else{
            Alerter.error('Erreur !', data.message);
        }
    },"json");
}
});