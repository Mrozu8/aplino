$('.ui.dropdown')
    .dropdown()
;

$('.ui.slider.checkbox')
    .checkbox()
;


$('.ui.checkbox.cv')
    .checkbox()
;

$('.ui.radio.checkbox.cv')
    .checkbox()
;

$('.ui.toggle.checkbox')
    .checkbox()
;

$('.ui.accordion')
    .accordion()
;

$('.business-card-modal').click(function(){
    $('.ui.basic.modal').modal('show');
});



$(document).ready(function () {
    var $rows = $("#alert.alert-error.custom, #alert.alert-success.custom");

    setTimeout(function() {
        $rows.addClass("invisible");
    }, 6000);
});



// left sidebar company

$( "#left-hamburger" ).click(function() {
    $( ".company-left-sidebar" ).toggle( "slow", function() {
        // Animation complete.
    });
});

$( "#left-hamburger-close" ).click(function() {
    $( ".company-left-sidebar" ).toggle( "slow", function() {
        // Animation complete.
    });
});
