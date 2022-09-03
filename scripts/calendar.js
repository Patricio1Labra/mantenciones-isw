
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
                url: './verMantencion.php',
                color:function(info){
                    if(info.event.extendedProps.estado.indexOf('P') > -1 ){
                        return '#gray';
                    }else{
                        return '#111B54';
                    }
                }
            }
        ] ,        
        themeSystem: 'bootstrap',
        eventClick:function(info) {
            info.jsEvent.preventDefault();

            function capitalizeFirstLetter(string){
                return string.charAt(0).toUpperCase() + string.slice(1);
            }

            function completarEstado(estadoev){
                if(estadoev.indexOf('P') > -1){
                    return 'Pendiente';
                }else{
                    return 'Terminado';
                }
            }
            var estadoev = info.event.extendedProps.estado;
            var estadonuevo = completarEstado(estadoev);
            
            

            var titulo = capitalizeFirstLetter(info.event.title);
            var descripcion = capitalizeFirstLetter(info.event.extendedProps.description);
            var duracionfecha = info.event.extendedProps.fduration;
            
             


            $('#exampleModal #title').text(titulo);  
            $('#exampleModal #description').text(descripcion);  
            $('#exampleModal #estadoev').text(estadonuevo);
            $('#exampleModal #start').text(info.event.start.toLocaleDateString());
            $('#exampleModal #duration').text(duracionfecha);    
            $('#exampleModal').modal('show');
            
        
            
        }
        

    });

    calendar.render();
    });