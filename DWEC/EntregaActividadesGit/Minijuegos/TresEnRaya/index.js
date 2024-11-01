document.addEventListener('DOMContentLoaded', function() {
    writeTable();
    
    var squares = document.getElementsByTagName('td');
    var firstPlayerTurn = true;

    Array.from(squares).forEach(square => {
        square.addEventListener('click', () => {
            if(firstPlayerTurn){
                firstPlayerTurn = pintarTurno(firstPlayerTurn, square);
                                
                if(checkWin(squares)){
                    alert("¡El jugador X ha ganado el juego!")
                    newGame(squares);
                }
            }else{
                firstPlayerTurn = pintarTurno(firstPlayerTurn, square);
                
                if(checkWin(squares)){
                    alert("¡El jugador O ha ganado el juego!")
                    newGame(squares);
                }
            }
        })
    })

    function pintarTurno(jugador, square){
        if(! (square.innerHTML != "")){

            if(jugador){
                square.innerHTML = "X";
                jugador = false;
                return jugador;
            }else{
                square.innerHTML = "O";
                jugador = true;
                return jugador;
            }
        }

        
    }

});

function writeTable() {
    let tableHTML = '<table>';
    
    for(let i = 0; i < 3; i++) {
        tableHTML += '<tr>';
        for(let j = 0; j < 3; j++) {
            tableHTML += '<td></td>';
        }
        tableHTML += '</tr>';
    }
    
    tableHTML += '</table>';
    
    document.getElementById('tableContainer').innerHTML = tableHTML;
}

function checkWin(arr){
    const winningCombos = [
        [0, 1, 2], [3, 4, 5], [6, 7, 8], 
        [0, 3, 6], [1, 4, 7], [2, 5, 8], 
        [0, 4, 8], [2, 4, 6]             
    ];

    for (let combo of winningCombos) {
        if (arr[combo[0]].innerHTML &&
            arr[combo[0]].innerHTML == arr[combo[1]].innerHTML &&
            arr[combo[1]].innerHTML == arr[combo[2]].innerHTML) {
            return true;
        }
    }

    return false;
}

function newGame(squares){
    Array.from(squares).forEach(square => {
        square.innerHTML = "";
    })
}