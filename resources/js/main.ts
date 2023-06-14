import './bootstrap';
import Alpine from 'alpinejs'
import {NumberInput} from "./components/NumberInput";
import {PasswordVisibility} from "./components/PasswordVisibility";
import {BurgerMenu} from "./components/BurgerMenu";
import {Modal} from "./components/Modal";
import {Accordion} from "./components/Accordion";
import {Commons} from "./components/Commons";
import {Slider} from "./components/Slider.js";
import {Star} from "./components/Star";
import {Search} from "./components/Search.js";
import {ProgressBar} from "./components/ProgressBar";

class Main {

    constructor() {
        const commons = new Commons()
        const numberInput = new NumberInput()
        const passwordVisibility = new PasswordVisibility()
        const burgerMenu = new BurgerMenu()
        const modal = new Modal()
        const accordion = new Accordion()
        const swiper = new Slider()
        const star = new Star()
        const progressBar = new ProgressBar()
        const search = new Search()


    }

}


window.addEventListener('load', () => {
    new Main()
    Alpine.start()

})
