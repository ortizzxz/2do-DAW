window.onload = () => {
    const inputField = document.querySelector('input[type="text"]');
    const submitButton = document.querySelector('button');
    const groceryList = document.querySelector('ul');
  
    submitButton.addEventListener('click', addGroceryItem);
  
    function addGroceryItem() {
      const newItem = inputField.value.trim();
  
      if (newItem !== '') {
        const listItem = document.createElement('li');
        listItem.innerHTML = `
          <span>${newItem}</span>
          <div>
            <button class="edit">🖋️</button>
            <button class="delete">🗑️</button>
          </div>
        `;
  
        listItem.querySelector('.edit').addEventListener('click', editItem);
        listItem.querySelector('.delete').addEventListener('click', deleteItem);
  
        groceryList.appendChild(listItem);
        inputField.value = ''; 
      }
    }
  
    function editItem(event) {
      const listItem = event.target.closest('li');
      const itemName = listItem.querySelector('span');
      const editText = prompt('Edit item:', itemName.textContent);
  
      if (editText !== null && editText.trim() !== '') {
        itemName.textContent = editText.trim();
      }
    }
  
    function deleteItem(event) {
      const listItem = event.target.closest('li');
      groceryList.removeChild(listItem);
    }

    const clearButton = document.getElementById('clear');
    clearButton.addEventListener('click', () => {
      groceryList.innerHTML = ''; 
    });
  
  };
  