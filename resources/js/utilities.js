$(document).ready(function () {

$

$('#refresh').click(function (){
      var temp = {};
      if($('#living').prop('checked')){
        temp["living"] = true;
      }
      if($('#technical').prop('checked')){
        temp["technical"] = true;
      }
      if($('#academic').prop('checked')){
        temp["academic"] = true;
      }

      $.ajax({
         url : 'refresh.php',
         data: temp,
         type: 'GET',
         success: function(data){
            $('#resourceList').html(data);
         }
      });
   });



});


