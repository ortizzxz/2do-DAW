window.onload = () => {
    const gameBoard = document.getElementById("game-board");
    const movesDisplay = document.getElementById("moves");
    const resetButton = document.getElementById("resetButton");
    let cards = ["A", "A", "B", "B", "C", "C", "D", "D"];
    let flippedCards = [];
    let moves = 0;
    let matchedPairs = 0; 
    const totalPairs = cards.length / 2; 

    var intervalWatch;
    var startTime;
    var pausedTime = 0;
    var gameStarted = false;

    function shuffleCards() {
        for (let i = cards.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [cards[i], cards[j]] = [cards[j], cards[i]];
        }
    }

    function createBoard() {
        shuffleCards();
        matchedPairs = 0;
        gameBoard.innerHTML = "";
        cards.forEach((card, index) => {
            const cardElement = document.createElement("div");
            cardElement.classList.add("card");
            cardElement.dataset.cardValue = card;
            cardElement.dataset.index = index;
            cardElement.addEventListener("click", handleCardClick);
            gameBoard.appendChild(cardElement);
        });
    }

    function handleCardClick() {
        if (!gameStarted) {
            startWatch();
            gameStarted = true;
        }
        flipCard.call(this);
    }

    function flipCard() {
        if (flippedCards.length < 2 && !this.classList.contains("flipped")) {
            this.classList.add("flipped");
            this.textContent = this.dataset.cardValue;
            flippedCards.push(this);

            if (flippedCards.length === 2) {
                moves++;
                movesDisplay.textContent = moves;
                setTimeout(checkMatch, 500);
            }
        }
    }

    function checkMatch() {
        const [card1, card2] = flippedCards;
        if (card1.dataset.cardValue === card2.dataset.cardValue) {
            card1.removeEventListener("click", handleCardClick);
            card2.removeEventListener("click", handleCardClick);
            matchedPairs++;

            if (matchedPairs === totalPairs) {
                endGame(); 
            }
        } else {
            card1.classList.remove("flipped");
            card2.classList.remove("flipped");
            card1.textContent = "";
            card2.textContent = "";
        }
        flippedCards = [];
    }

    function endGame() {
        stopWatch(); 
        const finalTime = document.getElementById("tiempo").innerHTML;

        setTimeout(() => {
            alert(`¡Felicidades! Has completado el juego en ${moves} movimientos y ${finalTime}.`);
            
            if (confirm("¿Quieres jugar otra vez?")) {
                resetGame();
            }
        }, 500);
    }

    function resetGame() {
        moves = 0;
        movesDisplay.textContent = moves;
        resetWatch();
        gameStarted = false;
        createBoard();
    }

    resetButton.addEventListener("click", resetGame);

    createBoard();

    function startWatch() {
        if (!intervalWatch) {
            startTime = new Date().getTime() - pausedTime;
            intervalWatch = setInterval(updateWatch, 1000);
        }
    }

    function stopWatch() {
        clearInterval(intervalWatch);
        pausedTime = new Date().getTime() - startTime;
        intervalWatch = null;
    }

    function resetWatch() {
        stopWatch();
        pausedTime = 0;
        document.getElementById("tiempo").innerHTML = "00:00";
    }

    function updateWatch() {
        var currentTime = new Date().getTime();
        var elapsedTime = currentTime - startTime;
        var seconds = Math.floor(elapsedTime / 1000) % 60;
        var minutes = Math.floor(elapsedTime / 1000 / 60) % 60;
        var hours = Math.floor(elapsedTime / 1000 / 60 / 60);

        var displayTime = agregarCero(hours) + ":" + agregarCero(minutes) + ":" + agregarCero(seconds);
        document.getElementById("tiempo").innerHTML = displayTime;
    }

    function agregarCero(n) {
        return (n < 10 ? "0" : "") + n;
    }
};