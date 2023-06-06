export class Rating {

    constructor() {
        const containers = document.querySelectorAll('.form__field.rating') as Array<HTMLElement>
        if (containers) {
            containers.forEach(container => {
                const ratingValue = container.querySelector('.rating input') as HTMLInputElement
                const allStar = container.querySelectorAll('.rating .star') as any as Array<HTMLElement>


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

            })
        }
    }


}
