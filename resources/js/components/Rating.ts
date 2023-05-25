export class Rating {

    constructor() {
        const allStar = document.querySelectorAll('.rating .star') as any as Array<HTMLElement>
        const ratingValue = document.querySelector('.rating input') as HTMLInputElement


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
