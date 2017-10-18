//Initialize Select2 Elements
$(document).ready(function() {
    $('.select2').select2();
} );

//TABLE-DATA SETTING AND LOAD TRANSLATE #users-table
$(document).ready(function() {
    $('#users-table').DataTable({
        'language': {"url": "/back/lang/data-table-fa.json"},
        'order': [[ 5, "desc" ]],
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
        'language': {"url": "/back/lang/data-table-fa.json"},
        'order': [[ 4, "desc" ]],
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
        'language': {"url": "/back/lang/data-table-fa.json"},
        'order': [[ 3, "desc" ]],
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : false,
        'autoWidth'   : false
    });
} );

//TABLE-DATA SETTING AND LOAD TRANSLATE #invoices-table
$(document).ready(function() {
    $('#invoices-table').DataTable({
        'language': {"url": "/back/lang/data-table-fa.json"},
        'order': [[ 2, "desc" ]],
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

/*LOAD ALL FUNCTIONS ON PAGE LOAD*/
$(document).ready(function() {
    getUserTickets();
});

/*GET DROPDOWN USER TICKETS --AJAX*/
function getUserTickets() {
    $('select[name="user_select"]').on('change', function() {
        var userId = $(this).val();
        if(userId) {
            $.ajax({
                url: '/admin/get/tickets/' + userId,
                type: "GET",
                dataType: "json",
                success:function(userTickets) {

                    $('select[name="ticket_select"]').empty();

                    $('select[name="ticket_select"]')
                        .append('<option selected disabled value= ' + '>' + 'انتخاب درخواست' + '</option>');

                    $.each(userTickets, function(id, referenceNumber) {
                        $('select[name="ticket_select"]')
                            .append('<option value='+ id +'>'+ '#' + referenceNumber +'</option>');
                    });
                }
            });
        }else{
            $('select[name="ticket_select"]').empty();
        }
    });
}
