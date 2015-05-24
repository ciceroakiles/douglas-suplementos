function mascara(o, f) {
    v_obj = o;
    v_fun = f;
    
    v_obj.value = v_fun(v_obj.value);
}

function real(v) {
    v = v.replace(/\D/g, "");                           //Remove tudo o que não é dígito
    v = v.replace(/(\d)(\d{2})$/, "$1.$2"); //Coloca o hífen entre o quinto e o sexto numero
    
    return v;
}