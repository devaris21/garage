$(document).ready(function(){

    $(".tabs-container li:nth-child(1) a.nav-link").addClass('active')
    ele = $("#produits div.tab-pane:first").addClass('active')
    
    $(".hoverable").fadeOut();


    $(".connectList").each(function(){
        $(this).sortable({
            connectWith: ".connectList",
            receive: function( event, ui ) {
                Loader.start()
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

                $(".tab-content .element.col-md-3").removeClass("col-md-3")
                $("#attente .element").addClass("col-md-3")
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