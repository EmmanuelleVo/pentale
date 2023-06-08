import QuantityInput from '../quantity.js';

export class NumberInput {

    constructor() {
        let quantities = document.querySelectorAll('[data-quantity]') as NodeListOf<HTMLElement>;
        if (quantities && quantities.length !== 0) {
            if (quantities instanceof Node) quantities = [quantities];
            if (quantities instanceof NodeList) quantities = [].slice.call(quantities);
            if (quantities instanceof Array) {
                quantities.forEach(div => (
                    div.quantity = new QuantityInput(div, 'Down', 'Up', div.dataset.number, div.dataset.label)));
            }
        }
    }


}
