$(function(){
    events.forEach(element => {
        $("tr[data-id="+element.veh+"] td.grid").each(function(){
            var x = new Date(element.start);
            var y = new Date(element.end);
            var length = Math.floor((y-x)/86400000)+1;
            var date = new Date($(this).attr("id"));
            if ((date >= x) && (date <= y)) {
                if (element.type == "reservation") {
                    $(this).append("<div class='element "+element.className+"' data-id="+element.id+" data-type="+element.type+"  >"+element.title+"</div>");
                }else{
                    $(this).append("<div class='element "+element.className+"' data-id="+element.id+" data-type="+element.type+" >"+element.title+"</div>");
                }

                if ($(this).attr("colspan") == undefined) {
                    $(this).prop("colspan", length) 
                    for (var i = 1; i < length; i++) {
                        $(this).next().remove();
                    }
                }else{
                    length = (length >= $(this).attr("colspan"))?length - $(this).attr("colspan"):0;
                    for (var i = 1; i < length; i++) {
                        $(this).next().remove();
                    }
                }
            }
        })
    })


    $("body").on("click", ".element", function(){
        var type = ($(this).attr("data-type") == "reservation")?"critere":"location";
        var id = $(this).attr("data-id")
        $("#modal-"+type+"-"+id).modal("show");
    })

})