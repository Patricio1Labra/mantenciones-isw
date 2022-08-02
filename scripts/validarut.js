function valideKey(evt){
    var code = (evt.which) ? evt.which : evt.keyCode;
    var ultima = document.getElementById('rut').value.substr(-1);
    if(ultima == 'k' || ultima == 'K'){
        return false;
    }else{
        if(code >= 48 && code <= 57){
            return true;
        } else {
            if(code == 75 || code == 107){
                return true;
            }else{
                return false;
            }
        }
    }
}