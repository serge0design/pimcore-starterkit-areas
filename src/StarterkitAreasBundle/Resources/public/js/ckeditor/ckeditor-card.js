CKEDITOR.editorConfig = function (config) {
    config.stylesSet = 'default:/build/ckeditor/styles.js';
    config.templates_files = ['/build/ckeditor/templates.js'];
    config.templates_replaceContent = true;
    config.allowedContent = true;
    config.forcePasteAsPlainText = true;
    config.skin = "flat",
        config.uiColor = '#dcdcdc',
        config.toolbar = 'CardWysiwyg',
        config.toolbar_CardWysiwyg = [{
            name: 'basicstyles',
            items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat']
        }, {
            name: 'paragraph',
            items: ['NumberedList', '-', 'BulletedList', '-', 'Outdent', '-', 'Indent', '-', 'Blockquote', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']
        }, '/', {
            name: 'styles',
            items: ['Styles', '-', 'Format']
        }, {
            name: 'document',
            items: ['Templates', '-', 'Sourcedialog']
        }];
};
