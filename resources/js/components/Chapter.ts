export class Chapter {
    private chapterContainer: HTMLElement;
    private paragraphs: NodeListOf<HTMLElementTagNameMap[string]>;


    constructor() {
        this.chapterContainer = document.body.querySelector('.chapter__content')

        if (this.chapterContainer) {
            this.paragraphs = this.chapterContainer.querySelectorAll('p')
            this.paragraphs.forEach(paragraph => {
                paragraph.insertAdjacentHTML('beforeend',
                    `<div class="chapter__paragraph">
                    <button class="chapter__paragraph-btn">
                        <i class='bx bxs-comment' style='color:#626262'></i>
                        <span class="chapter__paragraph-number"></span>
                    </button>
                    </div>`
                    )
            })
        }
    }
}
