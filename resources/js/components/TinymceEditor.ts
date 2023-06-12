import tinymce from "tinymce";

export class TinymceEditor {
    private textareas: NodeListOf<HTMLElement>;
    private chapterBody: HTMLTextAreaElement;

    constructor() {
        this.textareas = document.querySelectorAll('textarea')
        this.chapterBody = document.querySelector('textarea[id="note"]')

        /*if (this.chapterBody) {
            tinymce.init({
                selector: '#note',
                width: 900,
                height: 300,
            });
        }*/
    }

}
