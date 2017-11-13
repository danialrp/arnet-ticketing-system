$(document).foundation();

renameInputFileLabel();

/*GENERAL DOCUMENT READY*/
$(document).ready(function() {

});

//CORRECT PATH FOR SHOW TRUMBOWYG BUTTON ICONS
$.trumbowyg.svgPath = '/image/trumbowyg-icons.svg';

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

// JAVASCRIPT FUNCTION FOR RENAME LABEL OF FILE UPLOAD INPUT
// USE WITH FILE INPUT FOUNDATION FRAMEWORK
function renameInputFileLabel(){
    var els = document.querySelectorAll("input[type=file]"),
        i;
    for (i = 0; i < els.length; i++) {
        els[i].addEventListener("change", function() {
            var label = this.previousElementSibling;
            label.innerHTML = this.files[0].name;
        });
    }
}

/*SHOW TRUMBOWYG EDITOR FROM DISPLAY:NONE .CLICK EVENT*/
/*$(document).ready(function(){
    $("#show-reply-editor").click(function (e) {
        e.preventDefault();
        $("#send-reply").show();
    });
});*/

