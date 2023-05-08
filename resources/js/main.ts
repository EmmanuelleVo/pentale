import './bootstrap';
import tippy from 'tippy.js';
import lightGallery from 'lightgallery';
import lgThumbnail from 'lightgallery/plugins/thumbnail'
import lgZoom from 'lightgallery/plugins/zoom'
import {Tabs} from "./components/Tabs";
import {Rating} from "./components/Rating";

class Main {


    constructor() {
        const tabs = new Tabs()
        const rating = new Rating()
    }

}


window.addEventListener('load', () => {
    new Main()

})
