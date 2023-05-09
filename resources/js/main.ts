import './bootstrap';
import tippy from 'tippy.js';
import lightGallery from 'lightgallery';
import lgThumbnail from 'lightgallery/plugins/thumbnail'
import lgZoom from 'lightgallery/plugins/zoom'
import {Tabs} from "./components/Tabs";
import {Rating} from "./components/Rating";
import {NumberInput} from "./components/NumberInput";
import {PasswordVisibility} from "./components/PasswordVisibility";
import {BurgerMenu} from "./components/BurgerMenu";

class Main {


    constructor() {
        const tabs = new Tabs()
        const rating = new Rating()
        const numberInput = new NumberInput()
        const passwordVisibility = new PasswordVisibility()
        const burgerMenu = new BurgerMenu()
    }

}


window.addEventListener('load', () => {
    new Main()

})
