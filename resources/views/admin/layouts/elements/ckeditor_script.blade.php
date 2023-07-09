@include('ckfinder::setup')
<script type="text/javascript" language="JavaScript" src="{{ asset('assets/admin/plugin/ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript" language="JavaScript" src="{{ asset('assets/admin/dist/js/ckfinder.js') }}"></script>
<script type="text/javascript" language="JavaScript">
    CKEDITOR.editorConfig = function( config ) {
        config.toolbar = [
            { name: 'document', items: [ 'Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates' ] },
            { name: 'clipboard', items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
            { name: 'editing', items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
            { name: 'forms', items: [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
            '/',
            { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat' ] },
            { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
            { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
            { name: 'insert', items: [ 'Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe' ] },
            '/',
            { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
            { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
            { name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
            { name: 'about', items: [ 'About' ] }
        ];
    };

    var setupCKFinder = {
        height: 400,
        filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',
        filebrowserImageBrowseUrl: '{{ route('ckfinder_browser').'?type=Images' }}',
        filebrowserFlashBrowseUrl: '{{ route('ckfinder_browser').'?type=Flash' }}',
        filebrowserUploadUrl: '{{ route('ckfinder_connector').'?command=QuickUpload&type=Files' }}',
        filebrowserImageUploadUrl: '{{ route('ckfinder_connector').'?command=QuickUpload&type=Images' }}',
        filebrowserFlashUploadUrl: '{{ route('ckfinder_connector').'?command=QuickUpload&type=Flash' }}',
    };
    if($('#editor1').length){
        CKEDITOR.replace( 'editor1', setupCKFinder);
    }
</script>