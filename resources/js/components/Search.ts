/*
import {instantMeiliSearch, InstantMeiliSearchInstance} from '@meilisearch/instant-meilisearch'
import instantsearch from 'instantsearch.js';
import { searchBox, hits } from 'instantsearch.js/es/widgets';



export class Search {
    private searchGroup: HTMLFormElement;
    private search: any;
    private options: InstantMeiliSearchOptions;

    constructor() {
        this.searchGroup = document.querySelector('.search-group')
        //this.searchGroup.querySelector('[type="submit"]').remove()
        this.searchGroup.querySelector('form').remove()

        this.searchGroup.insertAdjacentHTML('beforeend', `
            <div>
                <div id="searchbox" class="border border-dark-blue outline outline-2 outline-dark-blue/50 hover:outline-dark-blue rounded-md p-2"></div>
                <div id="hits" class=""></div>
            </div>
        `)


        this.search = instantsearch({
            indexName: "projects",
            searchClient: instantMeiliSearch(
                "http://127.0.0.1:7700/",
                '',
                {
                    paginationTotalHits: 10,
                    placeholderSearch: false,
                }
            )
        });

        this.search.addWidgets([
            searchBox({
                container: '#searchbox',
                placeholder: 'Search',
            }),
            hits({
                container: '#hits',
                templates: {
                    item(hit,
                         {
                             html, components,
                         }
                    ) {
                        return html`
                            <div>
                                <div class="hit-name hover:bg-light-blue">
                                    <a href="/fr/projects/${hit.slug}">
                                        ${components.Highlight({hit, attribute: 'title'})}
                                    </a>
                                </div>
                            </div>`
                    },
                    empty(results, {html}) {
                        return html``;
                    },
                },
            }),
        ])

        this.search.start()
    }


}
*/
