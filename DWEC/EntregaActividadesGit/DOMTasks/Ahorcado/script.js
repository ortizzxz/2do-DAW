window.onload = () => {


    const words = ['javascript', 'html', 'css', 'programming', 'development'];
    let selectedWord = '';
    let guessedLetters = [];
    let remainingAttempts = 3;

    const wordContainer = document.getElementById('word-container');
    const lettersContainer = document.getElementById('letters-container');
    const messageElement = document.getElementById('message');
    const remainingLifes = document.getElementById('remainingLifes');

    function initGame() {
        selectedWord = words[Math.floor(Math.random() * words.length)];
        guessedLetters = [];
        remainingAttempts = 3;
        messageElement.innerHTML = " ";
        remainingLifes.innerHTML = remainingAttempts;
        updateWordDisplay();
        createLetterButtons();
    }

    function updateWordDisplay() {
        wordContainer.textContent = selectedWord
            .split('')
            .map(letter => guessedLetters.includes(letter) ? letter : '_')
            .join(' ');
    }

    function createLetterButtons() {
        lettersContainer.innerHTML = '';
        for (let i = 65; i <= 90; i++) {
            const letter = String.fromCharCode(i);
            const button = document.createElement('button');
            button.textContent = letter;
            button.classList.add('letter-btn');
            button.addEventListener('click', () => guessLetter(letter));
            lettersContainer.appendChild(button);
        }
    }

    function guessLetter(letter) {
        letter = letter.toLowerCase();
        if (!guessedLetters.includes(letter)) {
            guessedLetters.push(letter);
            if (!selectedWord.includes(letter)) {
                remainingAttempts--;
                remainingLifes.innerHTML = remainingAttempts;
            }
            updateWordDisplay();
            checkGameStatus();
            event.target.disabled = true;
        }
    }

    function checkGameStatus() {
        if (wordContainer.textContent.replace(/ /g, '') === selectedWord) {
            messageElement.textContent = 'Congrats, youve won!';
            disableLetterButtons();
            setTimeout(() => window.location.reload(), 3000);
        } else if (remainingAttempts === 0) {
            messageElement.textContent = `You lost, the word was: ${selectedWord}`;
            disableLetterButtons();
            setTimeout(() => window.location.reload(), 3000);
        }
    }

    function disableLetterButtons() {
        const buttons = document.querySelectorAll('.letter-btn');
        buttons.forEach(button => button.disabled = true);
    }

    initGame();

};