export class Dropdown {
    private topicSettings: HTMLElement;
    private topicSettingsParent: HTMLElement;
    private commentSettingsLinks: NodeListOf<Element>;
    private commentDropdowns: NodeListOf<Element>;
    private commentLinkId: string;

    constructor() {
        this.topicSettings = document.querySelector('#topic-settings')
        this.topicSettingsParent = document.querySelector('#topic-settings-parent')

        this.commentSettingsLinks = document.querySelectorAll('[id^="toggle-comment-"]')
        this.commentDropdowns = document.querySelectorAll('[id^="dropdown-toggle-comment-"]')

        if (this.topicSettingsParent) {
            this.toggleTopic()
        }

        if (this.commentSettingsLinks) {
            this.toggleComment()
        }
    }

    toggleTopic() {
        this.topicSettingsParent.querySelector('#topic-settings-toggle').addEventListener('click', (e) => {
            e.preventDefault()
            this.topicSettings.classList.toggle('sr-only')
        })
    }

    toggleComment() {
        this.commentSettingsLinks.forEach(commentSettingsLink => {
            commentSettingsLink.addEventListener('click', (e) => {
                e.preventDefault()
                this.commentLinkId = commentSettingsLink.getAttribute('id')
                document.querySelector(`[id^="dropdown-${this.commentLinkId}"]`).classList.toggle('sr-only')
            })
        })
    }


}
