
window.addEventListener('scroll', function () {
    var scrollPosition = window.scrollY;
    var navbar = document.querySelector(".header");
    var logored = document.querySelector(".logo-red");
    var logowhite = document.querySelector(".logo-white");
    var headbtn = document.querySelector(".header-btn");
    // Điều kiện kiểm tra vị trí cuộn và thay đổi màu nền
    if (scrollPosition > 0) {
        navbar.style.backgroundColor = 'white';
        navbar.style.position = 'fixed';
        navbar.style.boxShadow = '5px 5px 5px rgba(45, 45, 45, 0.147)';
        /////////////////
        navbar.classList.add("scroll");
        logored.classList.add("logoactive");
        logowhite.classList.remove("logoactive");
        //////////////
        headbtn.classList.add("btnactive");

    } else {
        navbar.style.backgroundColor = 'transparent';
        navbar.style.boxShadow = 'none';
        navbar.classList.remove("scroll");
        logowhite.classList.add("logoactive");
        logored.classList.remove("logoactive");
        headbtn.classList.remove("btnactive");
    }
});

// 
const profile = document.querySelector('.header-btn');
const dropdown = document.querySelector('.dropdown__wrapper');

profile.addEventListener('click', () => {
    dropdown.classList.remove('none');
    dropdown.classList.toggle('hide');
})


document.addEventListener("click", (event) => {
    const isClickInsideDropdown = dropdown.contains(event.target);
    const isProfileClicked = profile.contains(event.target);

    if (!isClickInsideDropdown && !isProfileClicked) {
        dropdown.classList.add('hide');
        dropdown.classList.add('dropdown__wrapper--fade-in');
    }
});
