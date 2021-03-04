jQuery(document).ready(function($) {

    // Slider
    $("#slider").bxSlider({
        mode: 'fade',
        captions: true,
        auto: true,
        controls: false,
      });
    
    //   Contact form
    $(document).on('shown.bs.modal', '#exampleModal', function (e) {
        var email = $('#userEmail').text();
        
        $('span.adresat input').val(email);

        var adNamee = $('#adName').text();
        
        $('span.your-subject input').val(adNamee);

        
    });

    //   Conditions terms form
    $(document).on('shown.bs.modal', '#checkModal', function (e) {        

        

        
    });

    // Choose category
    const all_category = $('#all_category');
    const kombi_container = $('#kombi_category');
    const sedan_container = $('#sedan_category');
    const suv_container = $('#suv_category');

    $('#category_all-button').click(function(e) {
        all_category.show();
        kombi_container.hide();
        sedan_container.hide();
        suv_container.hide();
    });

    $('#kombi-button').click(function(e) {
        all_category.hide();

        kombi_container.show();
        sedan_container.hide();
        suv_container.hide();
    });

    $('#sedan-button').click(function(e) {
        all_category.hide();
        kombi_container.hide();
        sedan_container.show();
        suv_container.hide();
    });

    $('#suv-button').click(function(e) {
        all_category.hide();
        kombi_container.hide();
        sedan_container.hide();
        suv_container.show();
    });

    $( "#additionForm" ).submit(function( event ) {
        event.preventDefault();
        var self = this;
        window.setTimeout(function() {
            self.submit();
        }, 5000);
        
        $("#form-container").hide()   
        $("#form-terms").hide();
        $("#submit-form").hide();
        $("#thanks-container").css('visibility', 'visible');
      });


      var tytul = $('#tytul').val();
      var address = $('#opis').val();
    //   var mobileno = $('#mobileno').val();
    //   var email = $('#email').val();
    //   var indexat = email.indexOf("@"); //Index of "@" in the email field
    //   var indexdot = email.indexOf("."); //Index of "." in the email field
    //   var password = $('#password').val();
    //   var repassword = $('#repassword').val();

    $("#submit-modal").click(function(event){
        var form_data=$("#tytul").serializeArray();
        var error_free=true;
        for (var input in form_data){
            var element=$("#tytul"+form_data[input]['name']);
            var valid=element.hasClass("valid");
            var error_element=$("span", element.parent());
            if (!valid){error_element.removeClass("error").addClass("error_show"); error_free=false;}
            else{error_element.removeClass("error_show").addClass("error");}
        }
        if (!error_free){
            event.preventDefault(); 
        }
        else{
            alert('No errors: Form will be submitted');
        }
    });



});


