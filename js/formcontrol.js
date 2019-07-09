$(document).ready(function(){
  $("#invoice-row").hide();
  $("#customer-info").hide();
  $("#customer-info").fadeIn('slow');
  $("#back").hide();
});

$(document).ready(function(){

    $("#next").click(function(){
      if($.trim($('#customer-phone').val()) == ''){
        $("#customer-phone").css("border","1px solid red");
       // window.alert("شماره همراه الزامی%%%%% است"); 
      }
        else if($.trim($('#customer-fname').val()) == ''){
          $("#customer-fname").css("border","1px solid red");
         // window.alert("لطفا نام خانوادگی را بنویسید");
        }
         else if($.trim($('#supplier').val()) == ''){ 
          $("#supplier").css("border","1px solid red");
            //window.alert("لطفا تامین کننده را بنویسید");
          } 
      else {
        $("#customer-info").hide();
        $("#invoice-row").fadeIn('slow');
        $("#back").fadeIn('slow');
      }
   });
});

$(document).ready(function(){
  $("#back").click(function(){
    $("#invoice-row").hide();
    $("#customer-info").fadeIn('slow');
  });
});
