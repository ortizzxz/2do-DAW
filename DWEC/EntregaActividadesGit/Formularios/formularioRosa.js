window.onload = () => {
    const elementosLista = Array.from(document.getElementsByTagName('li'));
    const usuarioInput = document.getElementById('username');
    const submitBtn = document.getElementById('submit');
    submitBtn.disabled = true;
    var username = usuarioInput.value;
    
    usuarioInput.addEventListener('input', (e) => {
        username = usuarioInput.value;
        console.log(testLowerCase(username));
        
        if((testLowerCase(username)) ? elementosLista[0].style.textDecoration = "line-through" : elementosLista[0].style.textDecoration = "none");

        if((testUpperCase(username)) ? elementosLista[1].style.textDecoration = "line-through" : elementosLista[1].style.textDecoration = "none");

        if((testLength(username)) ? elementosLista[2].style.textDecoration = "line-through" : elementosLista[2].style.textDecoration = "none");

        if( testLength(username) && testUpperCase(username) && testLowerCase(username) ){
            submitBtn.style.borderWidth = "2px";
            submitBtn.disabled = false;
        }else{
            submitBtn.style.borderWidth = "0px";
            submitBtn.disabled = true;
        }
    });
}

function testLowerCase(str){
    var regExp = /[a-z]/;
    
    return regExp.test(str);
}


function testUpperCase(str){
    var regExp = /[A-Z]/;
    
    return regExp.test(str);
}


function testLength(str){
    var regExp = /^.{6,}$/;

    return regExp.test(str);
}

