window.onload = () => {
    const el = document.getElementById('elemento');

    el.addEventListener('touchstart', handleStart);
    el.addEventListener('touchend', handleEnd);
    el.addEventListener('touchmove', handleMove);


    function handleStart(e){
        document.getElementById('elemento').innerText = "Has pulsado " + e.changedTouches.length;
    }
    
    function handleMove(e){
        cadena = "";    
        for(punto of e.changedTouches){
            cadena += punto.pageX + " ";
            document.getElementById('elemento').innerText = cadena;
        }
    }
    
    function handleEnd(e){
        document.getElementById('elemento').innerText = "Has levantado el dedo";
    }
};