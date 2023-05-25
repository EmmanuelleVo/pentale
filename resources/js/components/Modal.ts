export class Modal {
    private modal: HTMLElement;
    private modalBtn: Element;



    constructor() {
        this.modal = document.querySelector('#modal')
        this.modalBtn = document.querySelector('#modalBtn')

        if (this.modal && this.modalBtn) {
            this.modalBtn.addEventListener('click', (e) => {
                e.preventDefault()
                this.open()
            })
        }

    }

    open() {

        if (this.modal.style.display === 'none') {
            this.modal.style.display = 'block'
        } else {
            this.modal.style.display = 'none'
        }
    }
}
