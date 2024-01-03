const buttons = document.querySelectorAll('.password-edit-button');

buttons.forEach(button => {
    button.addEventListener('click', () => {
        event.preventDefault();

        const id = button.value;
        console.log(id)
        const container = document.querySelector(`.password-edit-${id}`);
        if(container.style.display == 'block'){
            container.style.display = 'none';
        }else{
            container.style.display = 'block';
        }
    });
});
