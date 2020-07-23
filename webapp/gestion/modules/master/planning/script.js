$(document).ready(function(){
    $(".hoverable").fadeOut();


    $(".connectList").each(function(){
        $(this).sortable({
            connectWith: ".connectList",
            receive: function( event, ui ) {
                var url = "../../webapp/gestion/modules/master/planning/ajax.php";
                var formdata = new FormData();
                formdata.append('ticket', $(ui.item).attr("data-id"));
                formdata.append('cible', $(event.target).attr("data-id"));
                formdata.append('action', "planning");
                $.post({url:url, data:formdata, contentType:false, processData:false}, function(data){
                    if (data.status) {
                        Alerter.success('Erreur !', data.message);
                    }else{
                        Alerter.error('Erreur !', data.message);
                    }
                }, 'json')
            }
        }).disableSelection();
    })



    $(".element").hover(
        function() {
            $( this ).find(".hoverable").fadeIn();
        }, function() {
            $( this ).find(".hoverable").hide(0);
        }
        );


});