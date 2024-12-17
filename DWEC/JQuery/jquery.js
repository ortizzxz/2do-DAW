window.onload = () => {

    // 1. Crea tabla de 8 filas - las que esten por encima de la 3ra: fondo rojo, por debajo de la tercera: fondo azul.
        $('td:gt(2)').css("background-color", "red");
        $('td:lt(2)').css("background-color", "blue");
        $('td:empty').css("background-color", "yellow");

    //2. Selecciona todo los párrafos de un documento que contenga eu y ponles un color de fondo rojo.
        $( "h1:contains('Eu')" ).css( "text-decoration", "underline" );
        $( "h1:contains('eu')" ).css( "text-decoration", "underline" );

}
