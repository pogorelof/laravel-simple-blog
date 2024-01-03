const buttons = document.querySelectorAll('.text-edit-button');
const title_buttons = document.querySelectorAll('.title-edit-button')

buttons.forEach(button => {
    button.addEventListener('click', () => {
        event.preventDefault();

        const id = button.value;
        console.log(id)
        const container = document.querySelector(`.text-edit-${id}`);
        if(container.style.display == 'block'){
            container.style.display = 'none';
        }else{
            container.style.display = 'block';
        }
    });
});

title_buttons.forEach(button => {
    button.addEventListener('click', () => {
        event.preventDefault();

        const id = button.value;
        const container = document.querySelector(`.title-edit-${id}`)
        if(container.style.display == 'block'){
            container.style.display = 'none';
        }else{
            container.style.display = 'block';
        }
    });
});
