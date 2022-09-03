
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
            $('#exampleModal #start').text(info.event.start.toLocaleString());
            $('#exampleModal #duration').text(duracionfecha);    
            $('#exampleModal').modal('show');
            
        
            
        },
        eventDidMount:function(info){
            if(info.event.extendedProps.estado.indexOf('P') > -1){
                info.el.style.backgroundColor = "#C4AB55"
                info.el.style.borderColor = "#C4AB55"
            }else{
                info.el.style.backgroundColor = "#FFE480"
                info.el.style.borderColor = "#FFE480"
            }
        }
        

    });

    calendar.render();
    });