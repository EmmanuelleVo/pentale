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
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    //const id = entry.target.getAttribute('id')
                    //console.log(entry.intersectionRatio)
                    if (entry.intersectionRatio > 0) {
                        //document.querySelector(`nav li a[href="#${id}"]`).parentElement.classList.add('active');
                    } else {
                        //document.querySelector(`nav li a[href="#${id}"]`).parentElement.classList.remove('active');
                    }
                })
            });

            // Track all sections that have an `id` applied
            document.querySelectorAll('.chapter__body').forEach((section) => {
                observer.observe(section);
            });

            window.addEventListener('scroll', e => {
                let winScroll = document.body.scrollTop || document.documentElement.scrollTop;
                let height = this.chapterBody.scrollHeight - document.documentElement.clientHeight; //2829 px
                let scrolled = (winScroll / height) * 100; // percentage
                //console.log(document.documentElement.scrollTop)
                this.progressBar.style.width = scrolled + "%";
            })
        }
    }
}
