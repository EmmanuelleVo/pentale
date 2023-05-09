export class BurgerMenu {
    menu: HTMLMenuElement;
    burger: HTMLAnchorElement;
    private overlay: Element;
    private top: Element;
    private nav: Element;

    constructor() {
        this.top = document.querySelector('.top')
        this.nav = document.body.querySelector('.nav__links-container')
        this.burger = document.querySelector('.hamburger')
        this.overlay = document.querySelector('.overlay')

        this.burger.addEventListener('click', (e) => {
            e.preventDefault()
            this.toggleMenu()
        })

        document.addEventListener('click', (e) => {
            if (this.top.classList.contains('menu-open')) {
                console.log(e.target)
                if (e.target !== this.nav
                    && e.target !== this.burger
                    && e.target !== document.querySelector('.hamburger-inner')
                    && e.target !== document.querySelector('.hamburger-box')
                    && e.target !== document.querySelector('input[type="search"]')
                    && e.target !== document.querySelector('.nav__link-dropdown .nav__link__textWrapper')
                ) {
                    this.top.classList.remove('menu-open')
                    this.burger.classList.remove('is-active')
                    //this.overlay.classList.remove('is-active')
                }
            }


        })
    }

    toggleMenu() {
        this.top.classList.toggle('menu-open')
        this.burger.classList.toggle('is-active')
        //this.overlay.classList.toggle('is-active')

    }
}

