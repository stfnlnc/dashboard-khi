import Alpine from 'alpinejs';

declare global {
    interface Window {
        Alpine:any;
    }
}

const menuOpen = document.querySelector('.mobile__menu')
const menuClose = document.querySelector('.mobile__close')
const menu = document.querySelector<HTMLElement>('.mobile__dropdown')
const menuItem = document.querySelectorAll('.mobile__dropdown > div > div > a')
if(menuOpen && menuClose && menu && menuItem){

    menuOpen.addEventListener('click', () => {
        menu.style.left = '10px'
    })

    menuClose.addEventListener('click', () => {
        menu.style.left = '-100%'
    })

    menuItem.forEach((item) => {
        item.addEventListener('click', () => {
            menu.style.left = '-100%'
        })
    })
}

window.Alpine = Alpine;

Alpine.start();
