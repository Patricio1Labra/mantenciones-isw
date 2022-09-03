
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

            function capitalizeFirstLetter(string){
                return string.charAt(0).toUpperCase() + string.slice(1);
            }

            var titulo = capitalizeFirstLetter(info.event.title);
            var descripcion = capitalizeFirstLetter(info.event.extendedProps.description);


            $('#exampleModal #title').text(titulo);  
            $('#exampleModal #description').text(descripcion);  
            $('#exampleModal #start').text(info.event.start.toLocaleDateString());
            $('#exampleModal #duration').text(info.event.extendedProps.duration);    
            $('#exampleModal').modal('show');
            
        
            
        }

    });

    calendar.render();
    });