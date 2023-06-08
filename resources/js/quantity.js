/**
 *  @class
 *  @function Quantity
 *  @param {DOMobject} element to create a quantity wrapper around
 */
export default class QuantityInput {
    constructor(self, decreaseText, increaseText, value = null, label = null) {
        // Create input
        //this.input = document.createElement('input');
        //this.input.type = 'number';
        //this.input.name = 'quantity';
        //this.input.pattern = '[0-9]+';
        this.input = self.querySelector('input');
        this.input.value = value;
        this.input.label = label;

        document.body.style.backgroundColor = 'red !important'
        if (this.input.label === 'fontSize') {
            document.querySelectorAll('.chapter .wysiwyg p').forEach(el => {
                el.style.fontSize = this.input.value.toString() + 'px'
            })
        }
        if (this.input.label === 'lineHeight') {
            document.querySelectorAll('.chapter .wysiwyg *').forEach(div => {
                div.style.lineHeight = this.input.value.toString() + 'px !important'
            })
        }

        // Get text for buttons
        this.decreaseText = decreaseText || 'Decrease quantity';
        this.increaseText = increaseText || 'Increase quantity';

        // Button constructor
        function Button(text, className, label, value){
            this.button = document.createElement('button');
            this.button.type = 'button';
            this.button.innerHTML = text;
            this.button.title = text;
            this.button.classList.add(className);
            this.button.setAttribute('wire:click',
                "changePreferences('" + label + "','" + value + "')" )
            return this.button;
        }

        // Create buttons
        //this.subtract = new Button(this.decreaseText, 'sub', this.input.label, this.input.value-1);
        //this.add = new Button(this.increaseText, 'add', this.input.label, this.input.value++);
        // Add functionality to buttons
        self.querySelector('.sub').addEventListener('click', () => this.change_quantity(-1, self));
        self.querySelector('.add').addEventListener('click', () => this.change_quantity(1, self));

        // Add input and buttons to wrapper
        /*self.appendChild(this.subtract);
        self.appendChild(this.input);
        self.appendChild(this.add);*/
    }

    change_quantity(change, self) {
        // Get current value
        let quantity = Number(this.input.value);

        // Ensure quantity is a valid number
        if (isNaN(quantity)) quantity = 1;

        // Change quantity
        quantity += change;

        // Ensure quantity is always a number
        quantity = Math.max(quantity, 1);

        // Output number
        this.input.value = quantity;

        if (this.input.label === 'fontSize') {
            /*self.querySelectorAll('button').forEach(button => {
                button.setAttribute('wire:click',
                    "changePreferences('" + this.input.label + "','" + quantity + "')" )
            })*/
            document.querySelectorAll('.chapter .wysiwyg p').forEach(el => {
                el.style.fontSize = this.input.value.toString() + 'px'
            })
        }

        if (this.input.label === 'lineHeight') {
            document.querySelectorAll('.chapter .wysiwyg *').forEach(div => {
                div.style.lineHeight = this.input.value.toString() + 'px'
            })
        }
    }
}
