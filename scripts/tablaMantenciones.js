let tabla = document.querySelector("#tabla");
let dataTable = new DataTable(tabla,{
    perPage:10,
    perPageSelect:[5,10,15,20],
    labels: {
        placeholder: "Buscar:",
        perPage: "Mostrar {select} Registros por página",
        noRows: "Registro no Encontrado",
        info: "Mostrando registros del {start} al {end} de {rows} Registros",
    }
    
});