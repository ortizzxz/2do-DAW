/*
    <div class="cabecera">
        <h1>StopWatch</h1>
        <h2>Vanilla Javascript StopWatch</h2>
        <h2 id="tiempo">00:00</h2>
    </div>

    <div class="btn">
        <button id="start">Start</button>
        <button id="stop">Stop</button>
        <button id="Reset">Reset</button>
    </div>

*/

window.onload = () => {
    var intervalWatch;
    var updateWatch;
    var pausedTime = 0;

    var startBtn = document.getElementById('start');
    var stopBtn = document.getElementById('stop');
    var resetBtn = document.getElementById('reset');

    /**Botones */
    startBtn.addEventListener('click', () => {
        startWatch();
    });

    stopBtn.addEventListener('click', () => {
        stopWatch();
    });

    resetBtn.addEventListener('click', () => {
        resetWatch();
    });

    /**Funciones */
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
};

function agregarCero(n) {
    return (n < 10 ? "0" : "") + n;
}