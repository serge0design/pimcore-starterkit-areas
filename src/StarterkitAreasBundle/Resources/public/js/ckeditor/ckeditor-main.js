CKEDITOR.editorConfig = function (config) {
    config.stylesSet = 'default:/build/ckeditor/styles.js';
    config.templates_files = ['/build/ckeditor/templates.js'];
    config.templates_replaceContent = true;
    config.allowedContent = true;
    config.forcePasteAsPlainText = true;
    config.skin = "flat",
        config.uiColor = '#dcdcdc',
        config.toolbar = 'MainWysiwyg',
        config.toolbar_MainWysiwyg = [{
            name: 'basicstyles',
            items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat']
        }, {
            name: 'paragraph',
            items: ['NumberedList', '-', 'BulletedList', '-', 'Outdent', '-', 'Indent', '-', 'Blockquote', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']
        }, {
            name: 'colors',
            items: ['TextColor', 'BGColor']
        }, '/', {
            name: 'links',
            items: ['Link', 'Unlink', 'Anchor']
        }, {
            name: 'insert',
            items: ['Table', '-', 'HorizontalRule', '-', 'SpecialChar', '-', 'PageBreak']
        }, {
            name: 'clipboard',
            items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo']
        }, {
            name: 'editing',
            items: ['Find', 'Replace', '-', 'SelectAll']
        }, '/', {
            name: 'styles',
            items: ['Styles', '-', 'Format']
        }, {
            name: 'document',
            items: ['Templates', '-', 'Sourcedialog']
        }];
};