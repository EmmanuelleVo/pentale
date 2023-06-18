export class PasswordVisibility {
    private passwordVisibilityCheckbox: Element;
    private password: HTMLInputElement;
    private passwordConfirmationVisibilityCheckbox: Element;
    private passwordConfirmation: HTMLInputElement;
    private registerPasswordVisibilityCheckbox: Element;
    private registerPassword: HTMLInputElement;
    private passwordCheckboxLabel: Element;
    private passwordConfirmationCheckboxLabel: Element;
    private registerPasswordCheckboxLabel: Element;
    private newPasswordVisibilityCheckbox: Element;
    private newPassword: HTMLInputElement;
    private newPasswordCheckboxLabel: Element;


    constructor() {
        this.passwordVisibilityCheckbox = document.querySelector('#password-visibility')
        this.password = document.querySelector('#password')
        this.passwordConfirmationVisibilityCheckbox = document.querySelector('#password-confirmation-visibility')
        this.passwordConfirmation = document.querySelector('#password_confirmation')
        this.registerPasswordVisibilityCheckbox = document.querySelector('#register-password-visibility')
        this.registerPassword = document.querySelector('#register-password')
        this.newPasswordVisibilityCheckbox = document.querySelector('#new-password-visibility')
        this.newPassword = document.querySelector('#new_password')

        this.passwordCheckboxLabel = document.querySelector('label[for="password-visibility"]')
        this.passwordConfirmationCheckboxLabel = document.querySelector('label[for="password-confirmation-visibility"]')
        this.registerPasswordCheckboxLabel = document.querySelector('label[for="register-password-visibility"]')
        this.newPasswordCheckboxLabel = document.querySelector('label[for="new-password-visibility"]')

        if (this.passwordVisibilityCheckbox) {
            this.passwordVisibilityCheckbox.addEventListener('change', (e) => {
                if (this.password.type === 'text') {
                    this.password.type = 'password'
                    this.passwordCheckboxLabel.textContent = 'Show'
                } else {
                    this.password.type = 'text'
                    this.passwordCheckboxLabel.textContent = 'Hide'
                }
            })
        }

        if (this.passwordConfirmationVisibilityCheckbox) {
            this.passwordConfirmationVisibilityCheckbox.addEventListener('change', (e) => {
                if (this.passwordConfirmation.type === 'text') {
                    this.passwordConfirmation.type = 'password'
                    this.passwordConfirmationCheckboxLabel.textContent = 'Show'
                } else {
                    this.passwordConfirmation.type = 'text'
                    this.passwordConfirmationCheckboxLabel.textContent = 'Hide'
                }
            })
        }

        if (this.registerPasswordVisibilityCheckbox) {
            this.registerPasswordVisibilityCheckbox.addEventListener('change', (e) => {
                if (this.registerPassword.type === 'text') {
                    this.registerPassword.type = 'password'
                    this.registerPasswordCheckboxLabel.textContent = 'Show'
                } else {
                    this.registerPassword.type = 'text'
                    this.registerPasswordCheckboxLabel.textContent = 'Hide'
                }
            })
        }

        if (this.newPasswordVisibilityCheckbox) {
            this.newPasswordVisibilityCheckbox.addEventListener('change', (e) => {
                if (this.newPassword.type === 'text') {
                    this.newPassword.type = 'password'
                    this.newPasswordCheckboxLabel.textContent = 'Show'
                } else {
                    this.newPassword.type = 'text'
                    this.newPasswordCheckboxLabel.textContent = 'Hide'
                }
            })
        }


    }


}
