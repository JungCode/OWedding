// document.addEventListener("click", function (e) {
//     console.log(e.target);
// })

// group-guest-modal 
const guestGroupModal = document.querySelector('.guest-group-modal');
const childElementItemGuestGroupModal = guestGroupModal.querySelector(':first-child');
const showGroupGuestModal = document.querySelectorAll('.show-guest-group-modal');
showGroupGuestModal.forEach(function (element) {
    element.addEventListener('click', function () {
        guestGroupModal.classList.remove('hidden');
        guestGroupModal.classList.remove('modal-close');
        guestGroupModal.classList.add('modal-open');
        childElementItemGuestGroupModal.classList.remove('slide-up');
        childElementItemGuestGroupModal.classList.add('slide-down');
    });
});
const closeGuestGroupModal = document.querySelector('.closeGGM');
guestGroupModal.addEventListener('click', closeGGM);
closeGuestGroupModal.addEventListener('click', closeGGM);
function closeGGM(e) {
    if (!childElementItemGuestGroupModal.contains(e.target) || closeGuestGroupModal.contains(e.target)) {
        guestGroupModal.classList.remove('modal-open');
        guestGroupModal.classList.add('modal-close');
        childElementItemGuestGroupModal.classList.add('slide-up');
        childElementItemGuestGroupModal.classList.remove('slide-down');

        setTimeout(() => {
            guestGroupModal.classList.add('hidden');
        }, 250);
    }
};
editGroups = document.querySelectorAll('.editGroup');
editGroups.forEach(editGroup =>{
    const row = editGroup.closest("tr");
    const cell = row.cells[1];
    input = cell.querySelector('input');
    buttons = cell.querySelectorAll('button');
    editGroup.addEventListener('click', function(){
        buttons.forEach(button => {
            button.classList.remove("hidden");
            button.addEventListener('click',function(){     
            });
        });
        buttons[0].addEventListener('click',function(){
            buttons[0].classList.add("hidden");
            buttons[1].classList.add("hidden");
        })
        buttons[1].addEventListener('click',function(){
            buttons[0].classList.add("hidden");
            buttons[1].classList.add("hidden");
        })
        input.focus();
        input.removeAttribute("readonly");
    });
})
// table searching
const tableRows = document.querySelector('#table').querySelectorAll('tbody tr');
const searchableCells = Array.from(tableRows).map(row => row.querySelectorAll("td")[3]);



const searchBar = document.querySelector('#searchbar');
searchBar.addEventListener('input', () => {
    const searchQuery = searchBar.value.toLowerCase();
    for (const tableCell of searchableCells) {
        const row = tableCell.closest("tr");
        const value = tableCell.textContent.toLowerCase().replace(",", "");
        row.style.visibility = null;
        if (value.search(searchQuery) === -1) {
            row.style.visibility = "collapse";
        }
    }
});

// table selecting

const selectors = document.querySelectorAll('.selector');
selectors.forEach(selector => {
    let index = 0;
    switch (selector.id) {
        case "selector5":
            index = 5;
            break;
        case "selector6":
            index = 6;
            break;
        case "selector7":
            index = 7;
            break;
    };
    const selectableCells = Array.from(tableRows).map(row => row.querySelectorAll("td")[index]);
    selector.addEventListener('change', () => {
        const option = selector.value.toLowerCase();
        for (const tableCell of selectableCells) {
            const row = tableCell.closest("tr");
            const value = tableCell.textContent.toLowerCase().replace(",", "");
            row.style.visibility = null;
            if (value.search(option) === -1) {
                row.style.visibility = "collapse";
            }
        }
    });
});
