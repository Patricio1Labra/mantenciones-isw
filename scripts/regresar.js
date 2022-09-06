function regresar(){
    Swal.fire({
    title: 'Estas seguro',
    text: "No se guardaran los cambios",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, salir',
    cancelButtonText: 'Cancelar'
    }).then((result) => {
    if (result.isConfirmed) {
        window.location = './index.php'
    }
    })
}