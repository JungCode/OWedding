const modal = document.querySelector('.modal');
const childElement = modal.querySelector(':first-child');
const showModal = document.querySelectorAll('.show-modal');

const btnSubmit = document.querySelector('#btn-submit');
showModal.forEach(function (element) {
    element.addEventListener('click', function () {
        modal.classList.remove('hidden');
        modal.classList.remove('modal-close');
        modal.classList.add('modal-open');
        childElement.classList.remove('slide-up');
        childElement.classList.add('slide-down');
    });
});
const closeModal = document.querySelector('.close');
modal.addEventListener('click', closeGAM);
closeModal.addEventListener('click', closeGAM);

function closeGAM(e) {
    if (!childElement.contains(e.target) || closeModal.contains(e.target)) {
        modal.classList.remove('modal-open');
        modal.classList.add('modal-close');
        childElement.classList.add('slide-up');
        childElement.classList.remove('slide-down');
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 250);
    }
}