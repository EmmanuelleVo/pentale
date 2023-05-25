export class Star {
    private starWrapper: HTMLElement;
    private starContainer: HTMLElement;
    private bookAverage: HTMLElement;
    private number: string;
    private stars: NodeListOf<HTMLElement>;
    private decimal: number;
    private containers: NodeListOf<HTMLElement>;

    constructor() {
        const allStar = document.querySelectorAll('.rating .star') as any as Array<HTMLElement>
        const ratingValue = document.querySelector('.rating input') as HTMLInputElement
        this.starWrapper = document.querySelector('#starContainer')
        this.containers = document.querySelectorAll('.starContainer')
        if (this.starWrapper) {
            this.starContainer = this.starWrapper.querySelector('.star__container')
            this.bookAverage = this.starWrapper.querySelector('.book__average')
            this.stars = this.starContainer.querySelectorAll('.star')
        }

        if (this.containers) {
            this.containers.forEach(container => {
                let average = container.querySelector('.book__average').textContent - 1
                container.querySelectorAll('.star').forEach(star => {
                    for (let i = 0; i < container.querySelectorAll('.star').length; i++) {
                        if (i <= average) {
                            container.querySelectorAll('.star')[i].classList.replace('bx-star', 'bxs-star')
                            container.querySelectorAll('.star')[i].classList.add('active')
                        }
                    }
                })
            })
        }

        if (this.bookAverage) {
            this.number = String(this.bookAverage.textContent - 1)
            this.stars.forEach((item) => {
                for (let i = 0; i < this.stars.length; i++) {
                    if (i <= this.number) {
                        this.stars[i].classList.replace('bx-star', 'bxs-star')
                        this.stars[i].classList.add('active')
                    }
                }
            })
        }

        allStar.forEach((item, idx) => {
            item.addEventListener('click', function () {
                let click = 0
                ratingValue.value = String(idx + 1)

                allStar.forEach(i => {
                    i.classList.replace('bxs-star', 'bx-star')
                    i.classList.remove('active')
                })
                for (let i = 0; i < allStar.length; i++) {
                    if (i <= idx) {
                        allStar[i].classList.replace('bx-star', 'bxs-star')
                        allStar[i].classList.add('active')
                    } else {
                        allStar[i].style.setProperty('--i', click)
                        click++
                    }
                }
            })
        })

    }


}
