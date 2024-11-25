window.onload = () => {
    const addNoteBtn = document.getElementById('add-note-btn');
    const deleteNoteBtn = document.getElementById('delete-note-btn');
    deleteMode = false; 

    const notesContainer = document.body;

    const savedNotes = JSON.parse(localStorage.getItem('stickyNotes')) || [];

    // quitar el modo elminiacion
    
    const createNote = (id = Date.now(), content = '', x = 50, y = 50, width = 200, height = 150) => {
        const note = document.createElement('div');
        note.className = 'note';
        note.contentEditable = 'true';
        note.style.left = `${x}px`;
        note.style.top = `${y}px`;
        note.style.width = `${width}px`; 
        note.style.height = `${height}px`;
        note.dataset.id = id;

        note.textContent = content;

        note.onmousedown = (e) => {
            if (e.target === note && e.offsetX > note.clientWidth - 10 || e.offsetY > note.clientHeight - 10) {
                return;
            }

            let shiftX = e.clientX - note.getBoundingClientRect().left;
            let shiftY = e.clientY - note.getBoundingClientRect().top;

            const moveAt = (pageX, pageY) => {
                note.style.left = `${pageX - shiftX}px`;
                note.style.top = `${pageY - shiftY}px`;
            };

            const onMouseMove = (event) => {
                moveAt(event.pageX, event.pageY);
            };

            document.addEventListener('mousemove', onMouseMove);

            note.onmouseup = () => {
                document.removeEventListener('mousemove', onMouseMove);
                note.onmouseup = null;
                saveNotes();
            };

            note.ondragstart = () => false;
        };

        note.addEventListener('mouseup', saveNotes);

        note.addEventListener('click', (e) => {
            if (deleteMode) {
                e.stopPropagation();
                notesContainer.removeChild(note);
                saveNotes();
                deleteMode = false; 
                deleteNoteBtn.style.backgroundColor = ''; 
            }
        });

        notesContainer.appendChild(note);
    };

    const saveNotes = () => {
        const notes = [...document.querySelectorAll('.note')].map(note => ({
            id: note.dataset.id,
            content: note.textContent,
            x: parseInt(note.style.left, 10),
            y: parseInt(note.style.top, 10),
            width: parseInt(note.style.width, 10),
            height: parseInt(note.style.height, 10),
        }));
        localStorage.setItem('stickyNotes', JSON.stringify(notes));
    };

    deleteNoteBtn.addEventListener('click', () => {
        if(!deleteMode){
            deleteMode = true;
            deleteNoteBtn.style.backgroundColor = 'red'; 
        }else{
            deleteMode = false;
            deleteNoteBtn.style.backgroundColor = '#e95252'; 
        }
    });

    savedNotes.forEach(({ id, content, x, y, width, height }) => createNote(id, content, x, y, width, height));

    addNoteBtn.addEventListener('click', () => createNote());
};
