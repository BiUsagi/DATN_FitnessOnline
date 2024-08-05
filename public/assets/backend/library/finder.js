var HT = {};

    HT.setupCkeditor = function() {
        var editors = document.querySelectorAll('.ck-editor');
        if (editors.length) {
            editors.forEach(function(editor) {
                var elementId = editor.id;
                var elementHeight = editor.getAttribute('data-height');
                HT.ckeditor4(elementId, elementHeight);
            });
        }
    };

    HT.ckeditor4 = function(elementId, elementHeight) {
        if (typeof(elementHeight) === 'undefined') {
            elementHeight = 500;
        }
        CKEDITOR.replace(elementId, {
            height: elementHeight,
            removeButtons: '',
            entities: true,
            allowedContent: true,
            toolbarGroups: [
                { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'undo' ] },
                { name: 'links' },
                { name: 'insert' },
                { name: 'forms' },
                { name: 'tools' },
                { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                { name: 'others' },
                { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup', 'colors', 'styles', 'indent' ] },
                { name: 'paragraph', groups: [ 'list', '', 'blocks', 'align', 'bidi' ] }
            ],
            removeButtons: 'Save,NewPage,Pdf,Preview,Print,Find,Replace,CreateDiv,SelectAll,Symbol,Block,Button,Language',
            removePlugins: "exportpdf",
        });
    };

    document.addEventListener('DOMContentLoaded', function() {
        HT.setupCkeditor();
    });