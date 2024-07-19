import Alpine from 'alpinejs';
const menuOpen = document.querySelector('.mobile__menu');
const menuClose = document.querySelector('.mobile__close');
const menu = document.querySelector('.mobile__dropdown');
const menuItem = document.querySelectorAll('.mobile__dropdown > div > div > a');
if (menuOpen && menuClose && menu && menuItem) {
    menuOpen.addEventListener('click', () => {
        menu.style.left = '0';
    });
    menuClose.addEventListener('click', () => {
        menu.style.left = '-330px';
    });
    menuItem.forEach((item) => {
        item.addEventListener('click', () => {
            menu.style.left = '-330px';
        });
    });
}
window.Alpine = Alpine;
Alpine.start();
