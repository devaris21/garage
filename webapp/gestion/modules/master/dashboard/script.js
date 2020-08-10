$(function(){
	$(".tabs-container li:nth-child(1) a.nav-link").addClass('active')
	ele = $("#produits div.tab-pane:first").addClass('active')


	$("#search").on("keyup", function() {
		var value = $(this).val().toLowerCase();
		$(".clients").filter(function() {
			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		});
	});
})

document.addEventListener('DOMContentLoaded', function() {


    // var containerEl = document.getElementById('external-events-list');
    // new FullCalendar.Draggable(containerEl, {
    //   itemSelector: '.fc-event',
    //   eventData: function(eventEl) {
    //     return {
    //       title: eventEl.innerText.trim()
    //     }
    //   }
    // });


    var localeSelectorEl = document.getElementById('locale-selector');
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
    	headerToolbar: {
    		left: 'prev,next',
    		center: 'title',
    		right: 'listMonth'
    	},
    	initialDate: '2020-08-01',
    	locale: 'fr',
    	buttonIcons: true,
    	weekNumbers: false,
    	navLinks: true, 
    	editable: false,
    	droppable: true, 
    	selectable: false,
    	selectMirror: true, 
    	dayMaxEvents: true, 

    	eventResize: function(info) {
    		changement(info, "resize", "Vous êtes sur le point de modifier la durée de cette "+info.event.extendedProps.type+", voulez-vous continer ?");
    	},
    	eventDrop: function(info) {
    		changement(info, "drop", "Vous êtes sur le point de modifier la période de cette "+info.event.extendedProps.type+", voulez-vous continer ?");
    	},
    	select: function(arg) {
    		alerty.confirm("Voulez-vous créer une Location/Reservation à cette période ?", {
    			title: "Nouvelle période",
    			cancelLabel : "Annuler",
    			okLabel : "OUI, Créer",
    		}, function(){
    			console.log(arg);
    			session("date1", arg.startStr);
    			session("date2", arg.endStr);
    			alerty.confirm("Quel evenement voulez-vous ajouter à cette période ?", {
    				title: "Quel evenement ?",
    				cancelLabel : "Une reservation",
    				okLabel : "Une location",
    			}, function(){
    				window.location.href = "../../gestion/master/newlocation";
    			}, function(){
    				window.location.href = "../../gestion/master/newreservation";
    			})
    		}, function(){
    			calendar.unselect()          
    		})
    	},
    	events: events
    });

    calendar.render();

    $(".fc-button").removeClass("fc-button").addClass("btn btn-xs btn-white");
    $("#calendar button").click(function(){
    	$("#calendar .fc-button").removeClass("fc-button").addClass("btn btn-xs btn-white");
    })


    changement = function(info, mode, message){
    	alerty.confirm(message, {
    		title: "Validation du changement",
    		cancelLabel : "Annuler",
    		okLabel : "OUI, Changer",
    	}, function(){
    		var url = "../../webapp/gestion/modules/master/planning/ajax.php";
    		$.post(url, {action:"changement", mode:mode, type:info.event.extendedProps.type, id:info.event.extendedProps.id, start:info.event.start.toISOString(), end:info.event.end.toISOString()}, (data)=>{
    			if (data.status) {
    				Alerter.success('Succès !', "Modification effectuée avec succès !!");
    			}else{
    				Alerter.error('Erreur !', data.message);
    			}
    		},"json");
    	}, function(){
    		info.revert();          
    	})
    }

});