export class Tabs {
    private tabLinks: NodeListOf<Element>;
    private tabContents: NodeListOf<Element>;
    private tabBar: Element;
    private tabContainer: Element;
    private tabNumber: any;
    private tabToActivate: Element;



    constructor() {
        this.tabLinks = document.querySelectorAll('#tabLink')
        this.tabContents = document.querySelectorAll('.tab__content')
        this.tabBar = document.querySelector('.tab')
        if (this.tabLinks && this.tabLinks.length !== 0) {
            this.openTab()
        }
    }

        openTab() {
            this.tabLinks.forEach((tabLink: HTMLElement) => {
                tabLink.addEventListener('click', (e) => {
                    e.preventDefault()
                    const id = e.target.dataset.id;
                    if (id) {
                        this.tabLinks.forEach(link => {
                            link.classList.remove('tab__link--active')
                        })
                        tabLink.classList.add('tab__link--active')

                        this.tabContents.forEach(content => {
                            content.classList.remove("tab__content--active");
                        });
                        const element = document.getElementById(id);
                        console.log(element)
                        element.classList.add("tab__content--active");
                    }

                })
            })
        }
}
