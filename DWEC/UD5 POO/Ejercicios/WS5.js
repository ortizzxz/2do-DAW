class Book{
    constructor(title, genre, author, isRead, readDate){
        this.title = title;
        this.genre = genre;
        this.author = author;
        this.isRead = isRead;

        // 
        if (readDate instanceof Date){
            this.readDate = readDate;
        }else{
            this.readDate = null;
        }  // :) 
    }
}


class BookList{
    constructor(){
        this.nBooksRead = 0;
        this.nBooksNotRead = 0;
        this.nextBookToRead = null;
        this.bookBeingRead = null;
        this.lastBookRead = null;
        this.books = [];
    }

    add(book){
        this.books.push(book);

        if(book.isRead){
            this.nBooksRead++;
        }else{
            this.nBooksNotRead++;
            if (!this.nextBookToRead) {
                this.nextBookToRead = book;
            }
        }
    }

    finishCurrentBook(){
        if(this.bookBeingRead){
            this.bookBeingRead.isRead = true;
            this.bookBeingRead.readDate = new Date();

            this.lastBookRead = this.bookBeingRead;
            this.nBooksRead++;
            this.nBooksNotRead--;
        }
        
        this.bookBeingRead = this.nextBookToRead;
        this.nextBookToRead = null;

        for(let book of this.books){
            if(!book.isRead && book !== this.bookBeingRead){
                this.nextBookToRead = book;
                break;
            }
        }
    }

    startReadingBook(book){
        if(this.books.includes(book) && !book.isRead){
            this.bookBeingRead = book;

            if(this.nextBookToRead == book){
                this.nextBookToRead = null; 

                for(let b of this.books){
                    if (!b.isRead && b != book){
                        this.nextBookToRead = b;
                        break;
                    }
                }
            }
        }
    }
}



let myList = new BookList();
let book1 = new Book("1984", "Distopia", "George Orwell", false);
let book2 = new Book("100 años de soledad", "Novela", "Gabriel Garcia Marquez", false);

myList.add(book1);
myList.add(book2);

myList.startReadingBook(book1);
myList.finishCurrentBook();

console.log(myList.nBooksRead); 
console.log(myList.nBooksNotRead); 
console.log(myList.lastBookRead.title); 
console.log(myList.bookBeingRead.title);