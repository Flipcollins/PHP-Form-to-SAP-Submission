
$(document).ready(function(){ 
    $(window).scroll(function(){ 
        if ($(this).scrollTop() > 100) { 
            $('#scroll').fadeIn(); 
        } else { 
            $('#scroll').fadeOut(); 
        } 
    }); 
    $('#scroll').click(function(){ 
        $("html, body").animate({ scrollTop: 0 }, 600); 
        return false; 
    }); 
    
    //id type hide on page load and show on selection change
      $('#typa, #typb ,#typc').hide();
$('select').change(function(){
      
     if ($(this).val() == 'a') {
            $("#typa").show(); 
          $("#typb").hide();
          $("#typc").hide();
         
        }
 
    else if ($(this).val() == 'b') {
            $("#typb").show(); 
          $("#typa").hide();
          $("#typc").hide();
         
        }
    
     else if ($(this).val() == 'c'){
            $("#typa").hide(); 
          $("#typb").hide();
          $("#typc").show();
         
        }
});
    
   $("#datepicker,#datepicker2, #datepicker3, #datepicker4").datepicker({
                dateFormat: 'dd/mm/yy',
                changeMonth: true,
                changeYear: true,
                yearRange: "1900:+nn"
            });
    
      $('.timepicker').timepicker({
    timeFormat: 'h:mm p',
    interval: 01,
    dynamic: false,
    dropdown: true,
    scrollbar: true
});
    
});
