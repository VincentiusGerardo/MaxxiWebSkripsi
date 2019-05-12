$(function(){
    $(".selectpicker").selectpicker();
    //Date picker
    $('.datepicker').datepicker({
        autoclose: true
    })
    
    // Input number only
    $(".numberOnly").keypress(function(e){
        // .which -> key ke brapa .keyCode itu angkanya
        var charCode = (e.which) ? e.which : e.keyCode;
        if(charCode > 31 && (charCode < 48 || charCode > 57)) {
          return false;
        }
    });
    
    // Alert Slide Up
    $(".alert").fadeTo(2000, 500).slideUp(500, function(){
        $(".alert").slideUp(500);
    });
    
    //Summernote
    $(".summernote").summernote({
        height: 300,                 // set editor height
        disableResizeEditor: true
    });

    // Tanggal Lahir
    $('.tanggalan').datepicker({
        autoclose: true,
        startView: 2
    })
    
});