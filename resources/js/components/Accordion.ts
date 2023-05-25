export class Accordion {
    private accordionBtn: HTMLElement;
    private accordionContainer: HTMLElement;
    private accordionContent: HTMLElement;


    constructor() {
        this.accordionContainer = document.querySelector('.accordion__container')
        this.accordionBtn = document.querySelector('.accordion__button')
        this.accordionContent = document.querySelector('.accordion__content')

        if (this.accordionContainer) {
            this.accordionBtn.addEventListener('click', (e) => {
                e.preventDefault()

                if (this.accordionContainer.clientHeight) {
                    this.accordionContainer.style.height = '0px';
                } else {
                    this.accordionContainer.style.height = this.accordionContent.clientHeight + "px";
                }
            })
        }
    }
}
