import Alpine from 'alpinejs';
import 'htmx.org';
import * as htmx from "htmx.org";
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);

document.addEventListener('DOMContentLoaded', function () {
    document.body.addEventListener('htmx:configRequest', (event) => {
        event.detail.headers['X-CSRF-Token'] = '{{ csrf_token() }}';
    })
});

htmx.onLoad(function (target) {
    const menuOpen = document.querySelector('.mobile__menu')
    const menuClose = document.querySelector('.mobile__close')
    const menu = document.querySelector('.mobile__dropdown')
    const menuItem = document.querySelectorAll('.mobile__dropdown > div > div > a')
    if(menuOpen && menuClose && menu && menuItem){

        menuOpen.addEventListener('click', () => {
            menu.style.left = '0'
        })

        menuClose.addEventListener('click', () => {
            menu.style.left = '-330px'
        })

        menuItem.forEach((item) => {
            item.addEventListener('click', () => {
                menu.style.left = '-330px'
            })
        })
    }
});

window.Alpine = Alpine;

Alpine.start();
