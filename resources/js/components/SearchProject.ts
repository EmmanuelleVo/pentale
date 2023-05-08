
export class SearchProject {

    private perPage: string;
    private searchTerm: string;
    private sortField: string;
    private sortOrder: string;
    private page: string;

    constructor() {
        this.perPage = '10'
        this.searchTerm = ''
        this.sortField = 'name'
        this.sortOrder = 'ASC'
        this.page = '1'

        let perPage = '10'
        let searchTerm = 'a'
        let sortField = 'name'
        let sortOrder = 'asc'
        let page = '1'


        // @ts-ignore
        //Array.from(document.forms).forEach(form => form.addEventListener("submit", e => e.preventDefault()))

        /*document.querySelector('select').value = String(perPage)
        document.querySelector('select').addEventListener('change', function (e) {
            perPage = (e.target as HTMLSelectElement).value
            this.makeRequest()
        })*/

        if (document.querySelector('#search-term')) {
            this.addEventListeners()
        }


    }

    addEventListeners() {
        document.querySelector('#search-term').addEventListener('keyup',  (e) => {
            //let searchTerm = (e.target as HTMLInputElement).value
            //this.searchTerm = e.currentTarget.value
            this.searchTerm = (e.target as HTMLInputElement).value
            this.page = '1'
            //this.makeRequest()
        })
    }

     makeRequest() {
        let url = `http://ddw.test/fr/projects/ajax?perPage=${this.perPage}&searchTerm=${this.searchTerm}` //&sortField=${this.sortField}&sortOrder=${this.sortOrder}
        fetch(url)
            .then((response) => response.text())
            .then((data) => this.updateList(data))
    }

    updateList(data) {
        document.querySelector('#contacts-table-container > table').remove()
        document.querySelector('#contacts-table-container').insertAdjacentHTML('beforeend', data)
    }

}
