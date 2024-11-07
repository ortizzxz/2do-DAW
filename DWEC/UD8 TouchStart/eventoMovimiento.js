window.onload = () => {
    const ball = document.querySelector(".ball");
    const garden = document.querySelector(".garden");
    const output = document.querySelector(".output");

    const maxX = garden.clientWidth - ball.clientWidth;
    const maxY = garden.clientHeight - ball.clientHeight;

    function handleOrientation(event) {
        let x = event.beta; 
        let y = event.gamma;

        output.textContent = `beta: ${x}\n`;
        output.textContent += `gamma: ${y}\n`;

        if (x > 90) {
            x = 90;
        }
        if (x < -90) {
            x = -90;
        }

        x += 90;
        y += 90;

        ball.style.left = `${(maxY * y) / 180 - 10}px`;
        ball.style.top = `${(maxX * x) / 180 - 10}px`;
    }

    window.addEventListener("deviceorientation", handleOrientation);

}
