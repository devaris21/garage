$(document).ready(function(){

   $(".connectList").each(function(){
    $(this).sortable({
        connectWith: ".connectList",
        receive: function( event, ui ) {
            Loader.start()
            var url = "../../webapp/gestion/modules/master/garage/ajax.php";
            var formdata = new FormData();
            formdata.append('ticket', $(ui.item).attr("data-id"));
            formdata.append('cible', $(event.target).attr("data-id"));
            formdata.append('action', "verification");
            $.post({url:url, data:formdata, contentType:false, processData:false}, function(data){
                Loader.stop()
                if (data.status) {

                }else{
                    alerty.confirm(data.message, {
                        title: "Attention !",
                        cancelLabel : "Non",
                        okLabel : "OUI, continuer",
                    }, function(){
                        if (data.id == 1) {
                            formdata.append('action', "garage");
                            $.post({url:url, data:formdata, contentType:false, processData:false}, function(data){
                                if (data.status) {
                                    window.location.reload()
                                }else{
                                    Alerter.error('Erreur !', data.message);
                                }
                            },"json");
                        }else{
                            formdata.append('action', "garage");
                            $.post({url:url, data:formdata, contentType:false, processData:false}, function(data){
                                if (data.status) {
                                    window.location.reload()
                                }else{
                                    Alerter.error('Erreur !', data.message);
                                }
                            },"json");formdata.append('action', "garage");
                            $.post({url:url, data:formdata, contentType:false, processData:false}, function(data){
                                if (data.status) {
                                    window.location.reload()
                                }else{
                                    Alerter.error('Erreur !', data.message);
                                }
                            },"json");
                        }
                    })
                }
            }, 'json')

                // $(".tab-content .element.col-md-3").removeClass("col-md-3")
                // $("#attente .element").addClass("col-md-3")
            }
        }).disableSelection();
})

});