export class Commons {
    private search: HTMLFormElement;
    private searchBtn: HTMLElement;
    private filterButton: HTMLElement;

    constructor() {
        this.search = document.querySelector('.form__search--nav')
        this.filterButton = document.querySelector('.form.accordion__content input[type="submit"]')

        if (this.search) {
            this.searchBtn = this.search.querySelector('[type="submit"]')
            this.searchBtn.setAttribute('style', 'display:none !important');
        }

        // Hide the JavaScript disabled message
        if (document.getElementById('js-disabled-message')) {
            document.getElementById('js-disabled-message').style.display = 'none';
        }
        if(this.filterButton) {
        console.log(this.filterButton)
            this.filterButton.classList.add('u-visually-hidden')
        }
    }
}
