export class ProgressBar {
    private progressBar: HTMLElement;
    private chapterBody: HTMLElement;
    private header: HTMLElement;
    private chapterNote: HTMLElement;

    constructor() {
        this.progressBar = document.querySelector('#myBar')
        this.chapterBody = document.querySelector('.chapter__body')
        this.header = document.querySelector('.header__container')
        this.chapterNote = document.querySelector('.chapter__note')

        if (this.progressBar) {
            window.addEventListener('scroll', e => {
                let winScroll = document.body.scrollTop || document.documentElement.scrollTop;
                let height = this.chapterBody.scrollHeight - document.documentElement.clientHeight;
                let scrolled = (winScroll / height) * 100;
                console.log(winScroll) // 2400 px
                this.progressBar.style.width = scrolled + "%";
            })
        }
    }
}
