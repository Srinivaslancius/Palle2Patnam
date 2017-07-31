$(document).ready(function(){
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15, // Creates a dropdown of 15 years to control year
         format: 'mm/dd/yyyy',
         autoclose: true
    });

    $('input.autocomplete').autocomplete({
        data: {
            "Apple": null,
            "Microsoft": null,
            "Google": 'assets/images/google.png'
        }
    });
});