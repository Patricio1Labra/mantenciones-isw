function valideKey(evt){
    var code = (evt.which) ? evt.which : evt.keyCode;
    if(code >= 48 && code <= 57){
        return true;
    } else {
        if(code >= 65 && code <= 90){
            return true;
        }else{
            if(code >= 97 && code <= 122){
                return true;
            }else{
                if(code == 32){
                    return true;
                }else{
                    return false;
                }
             }
        }
    }
}