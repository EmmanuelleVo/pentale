import {instantMeiliSearch, InstantMeiliSearchInstance} from '@meilisearch/instant-meilisearch'
import instantsearch from 'instantsearch.js';
import {searchBox, hits} from 'instantsearch.js/es/widgets';

export class Search {
    /*private searchGroup: HTMLFormElement;
    private search: any;
    private options: InstantMeiliSearchOptions;*/

    constructor() {
        this.searchGroup = document.querySelector('.searchContainer')
        //this.searchGroup.querySelector('[type="submit"]').remove()

        if (this.searchGroup) {
            this.searchGroup.querySelector('.form__search').remove()

            this.searchGroup.insertAdjacentHTML('beforeend', `
                <div>
                    <div id="searchbox" class="searchbox"></div>
                    <div id="hits" class="hits"></div>
                </div>
            `)


            this.search = instantsearch({
                indexName: "posts_index",
                searchClient: instantMeiliSearch(
                    "https://meilisearch.captain.knok.be",
                    'febb49a839e211c5dc4b7f64a92e1ddf4523f2bec6d20a89a02adf7ed3744d59',
                    /*"http://127.0.0.1:7700/",
                    '',*/
                    {
                        paginationTotalHits: 15,
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

                                    <div class="hit-name hover:bg-light-blue">
                                        <a href="/novels/${hit.slug}" class="u-absolute"></a>
                                        <figure>
                                            <img src="${hit.cover}" alt="Cover of ${hit.title}">
                                        </figure>
                                        <div>
                                            <span class="hit-link">
                                                ${components.Highlight({hit, attribute: 'title'})}
                                            </span>
                                            <span class="hit-link">
                                                ${components.Highlight({ hit, attribute: 'author' })}
                                            </span>
                                        </div>
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

            document.querySelector('.ais-SearchBox-input').insertAdjacentHTML('beforebegin',
                '<label for="meilisearch" class="u-visually-hidden">Search a novel</label>'
                )
            document.querySelector('.ais-SearchBox-input').setAttribute('id', 'meilisearch')

        }

    }


}
