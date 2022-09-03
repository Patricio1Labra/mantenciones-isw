function cont(obj,txt,lng,id){
    var maxLength = lng;
    var strLength = obj.value.length;
    var charRemain = (maxLength - strLength);
    
    if(charRemain < 0){
        document.getElementById(id).innerHTML = '<span style="color: red;">You have exceeded the limit of '+maxLength+' characters</span>';
    }else{
        document.getElementById(id).innerHTML = txt + ' (' + charRemain + '/' + maxLength + ')';
    }
}