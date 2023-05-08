export class Reply {
    private replyLinks: NodeListOf<Element>;
    private replyForms: NodeListOf<Element>;
    private replyLinkId: string;

    constructor() {
        this.replyLinks = document.querySelectorAll('[id^="reply-"]')
        this.replyForms = document.querySelectorAll('[id^="formreply-"]')

        if (this.replyLinks) {
            this.toggle()
        }
    }
        toggle() {
            this.replyLinks.forEach(replyLink => {
                replyLink.addEventListener('click', () => {
                    this.replyLinkId = replyLink.getAttribute('id')
                    document.querySelector(`[id^="form${this.replyLinkId}"]`).classList.toggle('hidden')
                })
            })
        }

}
