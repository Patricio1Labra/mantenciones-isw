
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('CalendarioWeb');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'es',
        headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },        
        eventSources:[
            {
                url: './verMantencion.php'
                

            }
        ] ,        
        themeSystem: 'bootstrap',
        eventClick:function(info) {
            info.jsEvent.preventDefault();

            $('#exampleModal #title').text(info.event.title);  
            $('#exampleModal #description').text(info.event.extendedProps.description);  
            $('#exampleModal #start').text(info.event.start.toLocaleDateString());
            $('#exampleModal #duration').text(info.event.extendedProps.duration);    
            $('#exampleModal').modal('show');
            
        
            
        }

    });

    calendar.render();
    });