
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('CalendarioWeb');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'timeGridWeek',
        locale: 'es',
        dayMaxEventRows: true,
        allDaySlot: false,
        headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay',
        
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
            $('#exampleModal #start').text(info.event.start.toLocaleDateString());
            $('#exampleModal #starttime').text(info.event.start.toLocaleTimeString());
            $('#exampleModal #endtime').text(info.event.end.toLocaleTimeString());
            $('#exampleModal #duration').text(duracionfecha+" (min)");    
            $('#exampleModal').modal('show');
            
        
            
        },
        eventDidMount:function(info){
            if(info.event.extendedProps.estado.indexOf('P') > -1){
                info.el.style.backgroundColor = "#C4AB55"
                info.el.style.borderColor = "#C4AB55"
                info.event.extendedProps.estado.textColor = 'white'
                
            }
            if(info.event.extendedProps.estado.indexOf('T') > -1){
                info.el.style.backgroundColor = "#107135"
                info.el.style.borderColor = "#107135"
                info.event.extendedProps.estado.textColor = 'white'
                
            }
            
        }
        

    });

    calendar.render();
    });