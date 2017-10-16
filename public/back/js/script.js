//Initialize Select2 Elements
$(document).ready(function() {
    $('.select2').select2();
} );

//TABLE-DATA SETTING AND LOAD TRANSLATE #users-table
$(document).ready(function() {
    $('#users-table').DataTable({
        'language': {
            "url": "/back/lang/data-table-fa.json"
        },
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : false,
        'autoWidth'   : false
    });
} );

//TABLE-DATA SETTING AND LOAD TRANSLATE #tickets-table
$(document).ready(function() {
    $('#tickets-table').DataTable({
        'language': {
            "url": "/back/lang/data-table-fa.json"
        },
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : false,
        'autoWidth'   : false
    });
} );

//TABLE-DATA SETTING AND LOAD TRANSLATE #projects-table
$(document).ready(function() {
    $('#projects-table').DataTable({
        'language': {
            "url": "/back/lang/data-table-fa.json"
        },
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : false,
        'autoWidth'   : false
    });
} );

//CORRECT PATH FOR SHOW TRUMBOWYG BUTTON ICONS
$.trumbowyg.svgPath = '/back/img/trumbowyg-icons.svg';

// TRUMBOWYG EDITOR - BUTTONS AND LANGUAGE SETTINGS
$('#load-editor').trumbowyg({
    lang: 'fa',
    btns: [
        ['viewHTML'],
        ['undo', 'redo'],
        ['strong', 'em', 'del'],
        ['superscript', 'subscript'],
        ['link'],
        ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
        ['unorderedList', 'orderedList'],
        ['horizontalRule'],
        ['removeformat'],
        ['fullscreen']
    ]
});