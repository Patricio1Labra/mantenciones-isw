let dataTable = new DataTable("table",{
perPage:10,
perPageSelect:[5,10,15,20],
columns: [{
    select:4,
    sortable:false,
}],
labels: {
    placeholder: "Buscar:",
    perPage: "Mostrar {select} Registros por página",
    noRows: "Registro no Encontrado",
    info: "Mostrando registros del {start} al {end} de {rows} Registros",
}
});