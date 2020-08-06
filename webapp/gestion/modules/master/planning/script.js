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
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
      },
      initialDate: '2020-08-01',
      locale: 'fr',
      buttonIcons: true,
      weekNumbers: true,
      navLinks: true, 
      editable: true,
      droppable: true, 
      selectable: true,
      selectMirror: true, 
      dayMaxEvents: true, 

      eventResize: function(info) {
        changement(info, "resize", "Vous êtes sur le point de modifier la durée de cette "+info.event.extendedProps.type+", voulez-vous continer ?");
      },

      select: function(arg) {
        var title = prompt('Event Title:');
        if (title) {
          calendar.addEvent({
            title: title,
            start: arg.start,
            end: arg.end,
            allDay: arg.allDay
          })
        }
        calendar.unselect()
      },
      eventDrop: function(info) {
        changement(info, "drop", "Vous êtes sur le point de modifier la période de cette "+info.event.extendedProps.type+", voulez-vous continer ?");
      },
      eventClick: function(arg) {
        if (confirm('Are you sure you want to delete this event?')) {
          arg.event.remove()
        }
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