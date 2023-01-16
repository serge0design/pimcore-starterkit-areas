CKEDITOR.editorConfig = function (config) {
    config.stylesSet = 'default:/build/ckeditor/styles.js';
    config.templates_files = ['/build/ckeditor/templates.js'];
    config.templates_replaceContent = true;
    config.allowedContent = true;
    config.forcePasteAsPlainText = true;
    config.skin = "flat",
        config.uiColor = '#dcdcdc',
        config.toolbar = 'BasicWysiwyg',
        config.toolbar_BasicWysiwyg = [{
            name: 'basicstyles',
            items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat']
        }, {
            name: 'paragraph',
            items: ['NumberedList', '-', 'BulletedList', '-', 'Outdent', '-', 'Indent', '-', 'Blockquote', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']
        }], config.stylesSet = [{
        name: 'P Class (right)',
        element: 'p',
        attributes: {
            "class": 'right'
        }
    }, {
        name: 'Compact Table',
        element: 'table',
        attributes: {
            "class": 'table'
        }
    }];
};