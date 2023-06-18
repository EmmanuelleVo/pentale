export class BurgerMenu {
    menu: HTMLMenuElement;
    burger: HTMLAnchorElement;
    private overlay: Element;
    private top: Element;
    private nav: Element;
    private dropdownBtn: NodeListOf<HTMLElement>;

    constructor() {
        this.top = document.querySelector('.top')
        this.nav = document.body.querySelector('.nav__links-container')
        this.burger = document.querySelector('.hamburger')
        this.overlay = document.querySelector('.overlay')
        this.dropdownBtn = document.querySelectorAll('.dropdownBtn')

        this.burger.addEventListener('click', (e) => {
            e.preventDefault()
            this.toggleMenu()
        })

        document.addEventListener('click', (e) => {
            if (this.top.classList.contains('menu-open')) {
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


        if (this.dropdownBtn) {
            this.dropdownBtn.forEach(button => {
                button.addEventListener('click', (e) => {
                    e.preventDefault()
                    if (button.parentNode.classList.contains("dropdown") && !button.parentNode.classList.contains("open")) {
                        button.parentNode.classList.add('open');
                        button.setAttribute('aria-expanded', "true");
                    } else {
                        button.parentNode.classList.remove('open');
                        button.setAttribute('aria-expanded', "false");
                    }
                    return false
                })
            })
        }
    }

    toggleMenu() {
        this.top.classList.toggle('menu-open')
        this.burger.classList.toggle('is-active')
        //this.overlay.classList.toggle('is-active')

    }
}

