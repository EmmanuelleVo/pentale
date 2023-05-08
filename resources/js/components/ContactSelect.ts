export class ContactSelect {
    private select: Element;
    private objectValue: any;


    constructor() {
        this.select = document.querySelector('#object')
        this.objectValue = 'question'

        if (this.select) {
            this.select.addEventListener('change', (e) => {
                this.objectValue = (e.target as HTMLInputElement).value

                let url = `http://ddw.test/fr/contact/ajax?object=${this.objectValue}`
                window.location.href = url
            })
        }


    }


}
