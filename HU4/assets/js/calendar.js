
document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('CalendarioWeb');
  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    locale:"es",
    headerToolbar:{
      left: 'prev,next today',
      center:'title',
      right:'dayGridMonth,timeGridWeek,timeGridDay'
    },

    dateClick:function(info){
      console.log(info);      
      $('#exampleModal').modal();
    },

    
    events:'http://localhost/mantenciones-isw/HU4/verMantencion.php'
    ,
    
    eventClick:function(calEvent,jsEvent,view){
      $('#tituloEvento').html(calEvent.title);
      $('#descripcionEvento').html(calEvent.descripcion);
      $('#exampleModal').modal();

    }

    
    
    
  });
  calendar.render();
});
