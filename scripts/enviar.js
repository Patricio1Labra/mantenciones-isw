function enviar(){
    Swal.fire({
    title: 'Estas seguro',
    text: "Revise sus datos antes de enviar",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, enviar',
    cancelButtonText: 'Cancelar'
    }).then((result) => {
    if (result.isConfirmed) {
        document.getElementById("Enviar").value="a";
        document.getElementById("formul").submit();
    }
    })
}