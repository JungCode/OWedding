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
// card setting modal
// const CSModal = document.querySelector('.card-setting-modal');
// const childElementItemCS = CSModal.querySelector(':first-child');
// const showCSModal = document.querySelectorAll('.show-card-setting-modal');
// showCSModal.forEach(function (element) {
//     element.addEventListener('click', function () {
//         CSModal.classList.remove('hidden');
//         CSModal.classList.remove('modal-close');
//         CSModal.classList.add('modal-open');
//         childElementItemCS.classList.remove('slide-up');
//         childElementItemCS.classList.add('slide-down');
//     });
// });
// const closeCSModal = document.querySelector('.clo');
// CSModal.addEventListener('click', closeCSM);
// closeCSModal.addEventListener('click', closeCSM);
// function closeCSM(e) {
//     if (!childElementItemCS.contains(e.target) || closeCSModal.contains(e.target)) {
//         CSModal.classList.remove('modal-open');
//         CSModal.classList.add('modal-close');
//         childElementItemCS.classList.add('slide-up');
//         childElementItemCS.classList.remove('slide-down');

//         setTimeout(() => {
//             CSModal.classList.add('hidden');
//         }, 250);
//     }
// };



//edit groups
editbtn = document.querySelectorAll('.editbtn');
editbtn.forEach(editbtn =>{
    // id = '#' + editbtn.getAttribute("id");
    // const cell = document.querySelector(id);

    // input = cell.querySelector('.input');
    // console.log(input);
    // saveButton = cell.querySelector('.save-button');
    // cancelButton = cell.querySelector('.cancel-button');
    editbtn.addEventListener('click', function(e){
        const rowedit = e.target.closest('.rowedit');
        // saveButton.classList.remove("hidden");
        // saveButton.classList.addEventListener('click',function(){     

        // });


        // saveButton.addEventListener('click',function(){
        //     cancelButton.classList.add("hidden");
        //     saveButton.classList.add("hidden");
        // })
        // cancelButton.addEventListener('click',function(){
        //     cancelButton.classList.add("hidden");
        //     saveButton.classList.add("hidden");
        // })
        const input = rowedit.querySelector('.input');
        const oldValue = input.value; 
        const savebtn = rowedit.querySelector('.save-button');
        const cancelbtn = rowedit.querySelector('.cancel-button');
        cancelbtn.classList.remove("hidden");
        savebtn.classList.remove("hidden");

        cancelbtn.addEventListener('click', function () {
            cancelbtn.classList.add("hidden");
            savebtn.classList.add("hidden");
            input.setAttribute('readonly', 'true');
            input.value = oldValue;
        });
        savebtn.addEventListener('click', function () {
            savebtn.classList.add("hidden");
            cancelbtn.classList.add("hidden");
            input.setAttribute('readonly', 'true');
        });

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

////////////////////////

document.getElementById('exportexcel').addEventListener('click',function () {
    var table2excel = new Table2Excel();
    table2excel.export(document.querySelectorAll("#table")); 
});


//////////////////
