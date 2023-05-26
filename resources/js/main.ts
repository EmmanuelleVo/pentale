import './bootstrap';
import tippy from 'tippy.js';
import {Tabs} from "./components/Tabs";
import {Rating} from "./components/Rating";
import {NumberInput} from "./components/NumberInput";
import {PasswordVisibility} from "./components/PasswordVisibility";
import {BurgerMenu} from "./components/BurgerMenu";
import {Modal} from "./components/Modal";
import {FileInput} from "./components/FileInput";
import {Accordion} from "./components/Accordion";
import {Commons} from "./components/Commons";
import {Chapter} from "./components/Chapter";
import {Slider} from "./components/Slider.js";
import {Star} from "./components/Star";
import {ProgressBar} from "./components/ProgressBar";

class Main {

    constructor() {
        const commons = new Commons()
        const tabs = new Tabs()
        const rating = new Rating()
        const numberInput = new NumberInput()
        const passwordVisibility = new PasswordVisibility()
        const burgerMenu = new BurgerMenu()
        const modal = new Modal()
        const fileInput = new FileInput()
        const accordion = new Accordion()
        const chapter = new Chapter()
        const swiper = new Slider()
        const star = new Star()
        const progressBar = new ProgressBar()
    }

}


window.addEventListener('load', () => {
    new Main()

})
