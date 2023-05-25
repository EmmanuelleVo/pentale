export class Commons {
    private search: HTMLFormElement;
    private searchBtn: HTMLElement;

    constructor() {
        this.search = document.querySelector('.form__search--nav')

        if (this.search) {
            this.searchBtn = this.search.querySelector('[type="submit"]')
            this.searchBtn.setAttribute('style', 'display:none !important');
        }
    }
}
