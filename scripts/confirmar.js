function confirmar(id){
    Swal.fire({
    title: 'Estas seguro',
    text: "No puedes recuperar mantencion",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, borremosla',
    cancelButtonText: 'Cancelar'
    }).then((result) => {
    if (result.isConfirmed) {
        Swal.fire({
            icon: 'success',
            title: 'La peticion ha sido borrada',
            showConfirmButton: false
        })
        window.location = './eliminar.php?idm='+id
    }
    })
}