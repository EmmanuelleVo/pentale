export class BurgerMenu {
    menu: HTMLMenuElement;
    burger: HTMLAnchorElement;
    private logoText: Element;
    private header: Element;
    private main: HTMLElement;
    private menuList: string[];
    private headerList: string[];
    private logoSite: Element;

    constructor() {
        this.menu = document.querySelector('.menu-js')
        this.burger = document.querySelector('.burger-js')
        this.logoText = document.querySelector('.logo-text')
        this.header = document.querySelector('.header')
        this.main = document.querySelector('main')
        this.logoSite = document.querySelector('.logo-ddw')

        this.menuList = ['bg-dark-blue', 'text-white', 'z-50', 'fixed', 'inset-0', 'top-[125px]', 'opacity-100', 'h-screen', 'w-screen', 'overflow-x-hidden']
        this.headerList = ['inset-x-0', 'z-50', 'fixed', 'w-full']

        this.burger.addEventListener('click', (e)=>{
            this.toggleMenu()
        })
    }

    toggleMenu() {
        if(!this.menu.classList.contains('max-lg:hidden')){ // desktop
            //this.menu.className += "max-lg:hidden absolute";
            document.body.classList.add('fixed')
            this.menu.classList.add('max-lg:hidden')
            this.menu.classList.remove(...this.menuList)
            //this.logoText.classList.remove('hidden')
            this.header.classList.remove(...this.headerList)
            this.burger.querySelectorAll('p').forEach(burgerLine => {
                burgerLine.classList.add('bg-dark-blue')
                burgerLine.classList.remove('bg-white')

            })
        } else { // mobile
            this.menu.classList.remove('max-lg:hidden')
            this.menu.classList.add(...this.menuList)
            //this.logoText.classList.add('hidden')
            this.header.classList.add(...this.headerList)
            document.body.classList.remove('fixed')
            this.burger.querySelectorAll('p').forEach(burgerLine => {
                burgerLine.classList.remove('bg-dark-blue')
                burgerLine.classList.add('bg-white')
            })
        }

        if (this.menu.classList.contains('bg-dark-blue')) {
            this.logoText.classList.add('text-white')
            this.logoSite.querySelector('#W').classList.add('fill-white')
            //document.querySelector('#logo-bar').classList.add('')
        } else {
            this.logoText.classList.remove('text-white')
            this.logoSite.querySelector('#W').classList.remove('fill-white')

        }
    }
}
