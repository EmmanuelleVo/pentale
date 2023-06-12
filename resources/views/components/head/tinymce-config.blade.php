<script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea.form__textarea', // Replace this CSS selector to match the placeholder element for TinyMCE
        plugins: 'table lists',
        toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table',
        menubar: false,
    });
</script>
