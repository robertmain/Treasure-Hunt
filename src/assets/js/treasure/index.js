// Show a modal with a treasure clue in when a button is clicked
document.querySelectorAll('[data-toggle="modal"]')
.forEach((ele) => {
    ele.addEventListener('click', ({ target }) => {
        const { title, clue } = target.dataset;

        const [modal] = document.querySelectorAll('.found-treasure-modal');

        const header = modal.querySelector('h3');
        const body = modal.querySelector('.modal-body');

        header.innerText = `Clue for ${title}`;
        body.innerText = clue;

        $(modal).modal('show')
            .on('hidden', () => {
                header.innerText = '';
                body.innerText = '';
            });
    });
});
