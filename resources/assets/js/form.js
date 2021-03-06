// toggle form inputs

let rotation = 0;
$( "#primary-tools-toggle" ).click(function() {
    $( "#primary-tools" ).toggle( "slow", function() {
        // Animation complete.
    });

    rotation = rotation + 180;
    console.log(rotation);
    $( this ).css( {'-webkit-transform' : 'rotate('+ rotation +'deg)',
        '-moz-transform' : 'rotate('+ rotation +'deg)',
        '-ms-transform' : 'rotate('+ rotation +'deg)',
        'transform' : 'rotate('+ rotation +'deg)'});
});

$( "#text-tools-toggle" ).click(function() {
    $( "#text-tools" ).toggle( "slow", function() {
        // Animation complete.
    });

    rotation = rotation + 180;
    console.log(rotation);
    $( this ).css( {'-webkit-transform' : 'rotate('+ rotation +'deg)',
        '-moz-transform' : 'rotate('+ rotation +'deg)',
        '-ms-transform' : 'rotate('+ rotation +'deg)',
        'transform' : 'rotate('+ rotation +'deg)'});
});

$( "#textarea-tools-toggle" ).click(function() {
    $( "#textarea-tools" ).toggle( "slow", function() {
        // Animation complete.
    });

    rotation = rotation + 180;
    console.log(rotation);
    $( this ).css( {'-webkit-transform' : 'rotate('+ rotation +'deg)',
        '-moz-transform' : 'rotate('+ rotation +'deg)',
        '-ms-transform' : 'rotate('+ rotation +'deg)',
        'transform' : 'rotate('+ rotation +'deg)'});
});

$( "#radio-tools-toggle" ).click(function() {
    $( ".radio-form-tools" ).toggle( "slow", function() {
        // Animation complete.
    });

    rotation = rotation + 180;
    console.log(rotation);
    $( this ).css( {'-webkit-transform' : 'rotate('+ rotation +'deg)',
        '-moz-transform' : 'rotate('+ rotation +'deg)',
        '-ms-transform' : 'rotate('+ rotation +'deg)',
        'transform' : 'rotate('+ rotation +'deg)'});
});

$( "#checkbox-tools-toggle" ).click(function() {
    $( ".checkbox-form-tools" ).toggle( "slow", function() {
        // Animation complete.
    });

    rotation = rotation + 180;
    console.log(rotation);
    $( this ).css( {'-webkit-transform' : 'rotate('+ rotation +'deg)',
        '-moz-transform' : 'rotate('+ rotation +'deg)',
        '-ms-transform' : 'rotate('+ rotation +'deg)',
        'transform' : 'rotate('+ rotation +'deg)'});
});



// Zapisywanie oraz podgląd formularza


$('#save-form').on('click', function () {
    $('#mine-form').submit();
});


// usuwanie z formularza głównych pól

$('[data-delete-button]').find('[data-id]').on('click', function (e) {

    // console.log(e.currentTarget.attributes['data-id'].value);

    let $input = e.currentTarget.attributes['data-id'].value;

    $('#delete-custom').append("<input type='hidden' name='mine_input' value='"+$input+"'>").submit();
});


// usuwanie z formularza radio

$('[data-delete-radio-button]').find('[data-id]').on('click', function (e) {

    let $input = e.currentTarget.attributes['data-id'].value;

    $('#delete-custom').append("<input type='hidden' name='radio' value='"+$input+"'>").submit();
});


// usuwanie z formularza głównych checkbox

$('[data-delete-checkbox-button]').find('[data-id]').on('click', function (e) {

    let $input = e.currentTarget.attributes['data-id'].value;

    $('#delete-custom').append("<input type='hidden' name='checkbox' value='"+$input+"'>").submit();
});


// dodawanie i usuwanie pól radio ===========================================================



document.querySelector('button.btn-radio-add').addEventListener('click', function() {


    let radio = document.createElement("input");
    radio.setAttribute('id', 'rad');
    radio.setAttribute('type', 'radio');
    // radio.setAttribute('name', 'fruit');
    radio.setAttribute('class', 'hidden');
    radio.setAttribute('tabindex', '0');

    let field = document.createElement("div");
    field.setAttribute('class', 'field radio');


    let fieldUi = document.createElement("div");
    fieldUi.setAttribute('class', 'ui radio checkbox');

    let lab = document.createElement('label');

    let text = document.createElement('input');
    text.setAttribute('type', 'text');
    text.setAttribute('name', 'radio[]');
    text.setAttribute('class', 'custom-input');


    let hook = document.querySelector('#radio-hook');
    let x = hook.appendChild(field).appendChild(fieldUi);

    x.appendChild(radio);
    x.appendChild(lab).appendChild(text);


});


document.querySelector('button.btn-radio-delete').addEventListener('click', function() {
    let radio = document.querySelector(".field.radio");
    radio.remove();
});


// dodawanie i usuwanie pól checkbox ================================================


document.querySelector('button.btn-checkbox-add').addEventListener('click', function(){

    let checkbox = document.createElement('input');

    // checkbox.setAttribute('name', 'fruit'); //nazwa do zmiany
    checkbox.setAttribute('class', 'hidden');
    checkbox.setAttribute('type', 'checkbox');
    checkbox.setAttribute('tabindex', '0');

    const field = document.createElement('div');
    field.setAttribute('class', 'field checkbox');

    const fieldUi = document.createElement('div');
    fieldUi.setAttribute('class', 'ui checkbox');

    const lab = document.createElement('label');

    const input = document.createElement('input');

    input.setAttribute('name', 'checkbox[]');
    input.setAttribute('class', 'custom-input');
    input.setAttribute('type', 'text');


    let hook = document.querySelector('#checkbox-hook');
    let x = hook.appendChild(field).appendChild(fieldUi);

    x.appendChild(checkbox);
    x.appendChild(lab).appendChild(input);

});


document.querySelector('button.btn-checkbox-delete').addEventListener('click', function(){
    let checkbox = document.querySelector('.field.checkbox');
    checkbox.remove();
});