window.onload = () => {

    let btn = document.getElementById('cambiarTitulo');
    let miH1 = document.getElementById('titulo');

    btn.addEventListener("click", cambiarTitulo);

    miH1.addEventListener('click', (event) => {
        event.target.style.backgroundColor = "blue";    
    });
}

function cambiarTitulo(){
    let inpBox = document.getElementById('text');
    
    
    if(inpBox.value != ''){
        document.getElementById('titulo').innerText = inpBox.value;  
        inpBox.value = '';  

    }
}

function cambiarEstiloTitulo(){
    document.getElementById('titulo').style.backgroundColor = "red";  
}

