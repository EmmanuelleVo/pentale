export class FileInput {
    private input: HTMLInputElement;
    private img: HTMLImageElement;

    constructor() {
        this.input = document.querySelector('[type="file"]')
        this.img = document.querySelector('#imgCover')

        if (this.input) {
            this.input.addEventListener('change', (e) => {
                const [file] = this.input.files
                if (file) {
                    this.img.src = URL.createObjectURL(file)
                }
            })
        }
    }


}
