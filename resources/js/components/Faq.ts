export class Faq {
    private toggleLinks: NodeListOf<Element>;
    private toggleContents: NodeListOf<Element>;
    private toggleNumber: any;
    private toggleToActivate: HTMLElement;
    private container: HTMLElement;


    constructor() {
        this.toggleLinks = document.querySelectorAll('#toggle-link')
        this.toggleContents = document.querySelectorAll('.toggle-content')
        this.container = document.querySelector('#faq-card')
        this.toggle()
    }
        toggle() {
            this.toggleLinks.forEach((toggleLink : HTMLElement) => {
                toggleLink.addEventListener('click', (e) => {
                    e.preventDefault()
                    //this.topicSettings.classList.toggle('sr-only')
                    this.toggleNumber = toggleLink.dataset.forToggle
                    this.toggleToActivate = document.body.querySelector(`[data-toggle="${this.toggleNumber}"]`)

                    this.toggleToActivate.classList.toggle('sr-only')
                })
            })
        }


}
