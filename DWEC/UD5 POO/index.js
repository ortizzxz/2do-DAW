class Rectangle { 
    constructor(height, width){
        this.height = height;
        this.width = width;
    }

    // metodos 

    muestraHeight(){
        console.log('Height: ' + this.height);
    }

    muestraWidth(){
        console.log('Width: ' + this.width);
    }

    // getter setter

    get area() { 
        return this.calcArea();
    }

    calcArea(){
        return (this.height * this.width);
    }
}

miRectangulo = new Rectangle(20, 15);
