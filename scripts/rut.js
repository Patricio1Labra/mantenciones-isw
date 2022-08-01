document.getElementById('rut').addEventListener('input', function(evt) {
    let value = this.value.replace(/\./g, '').replace('-', '').replace('k', 'K');

    if (value.match(/^(\d{1,3})(\d{3})(\d{3})(\w{1})$/)) {value = value.replace(/^(\d{1,3})(\d{3})(\d{3})(\w{1})$/, '$1.$2.$3-$4');} 
    else if (value.match(/^(\d{1,3})(\d{3})(\w{1})$/)) {value = value.replace(/^(\d{1,3})(\d{3})(\w{1})$/, '$1.$2-$3');}
          else if (value.match(/^(\d{0,3})(\w{1})$/)) {value = value.replace(/^(\d{1,3})(\w{1})$/, '$1-$2');}
    this.value = value;
}); 