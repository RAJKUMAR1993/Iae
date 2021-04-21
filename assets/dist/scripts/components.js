$(document).ready(function(){
   $("#searchCustomer").on('submit', function(e){
     e.preventDefault();
     $(this).prop('disabled', true);
      var data = $("#searchCustomer").serialize();
      $.ajax({
         url:"searchCustomer",
         data:data,
         type:"post",
         beforeSend: function(){
            $("#ploader").show();
         },
         success: function(data){
           $("#ploader").hide();
           $("#emsg").hide();
           console.log(data);
           if(data.response_status_id == 0){
             $("#cinfo").show();
             $("#name").html(data['data'].name);
             $("#cid").html(data['data'].customer_id);
             $("#mobile").html(data['data'].mobile);
             $("#customer_id").val(data['data'].customer_id);
           }else{
             $("#emsg").show();
             $("#emsg").html();
           }
         }
      });
   });

   $("#updateDistributor").on('submit', function(e){
     e.preventDefault();
     $(this).prop('disabled', true);
      var data = $("#updateDistributor").serialize();
      $.ajax({
         url:"updateDistributor",
         data:data,
         type:"post",
         beforeSend: function(){
            $("#ploader").show();
         },
         success: function(data){
           $("#ploader").hide();
           $("#emsg").hide();
           console.log(data);
           if(data.Status == 'Active'){
           $("#smsg").show();
           $("#smsg").html(data.Message);
           }else{
             $("#emsg").show();
             $("#emsg").html(data.Message);
           }
         }
      });
   });


    $("#updateRetailer").on('submit', function(e){
     e.preventDefault();
     $(this).prop('disabled', true);
      var data = $("#updateRetailer").serialize();
      $.ajax({
         url:"updateRetailer",
         data:data,
         type:"post",
         beforeSend: function(){
            $("#ploader").show();
         },
         success: function(data){
           $("#ploader").hide();
           $("#emsg").hide();
           console.log(data);
           if(data.Status == 'Active'){
           $("#smsg").show();
           $("#smsg").html(data.Message);
           }else{
             $("#emsg").show();
             $("#emsg").html(data.Message);
           }
         }
      });
   });



   $("#updateWallet").on('submit', function(e){
     e.preventDefault();
     $("#hbtn").prop('disabled', true);
     var data = $("#updateWallet").serialize();
      $.ajax({
         url:"updateWallet",
         data:data,
         type:"post",
         beforeSend: function(){
            $("#pmloader").show();
         },
         success: function(data){
           $("#pmloader").hide();
           console.log(data);
           if(data.Status == 'Active'){
            location.reload();
           }else{
             $("#wemsg").show();
             $("#wemsg").html(data.Message);
             $("#hbtn").prop('disabled', false);
           }
         }
      });
   });

   $("#updateWall").on('submit', function(e){
     e.preventDefault();
     //$("#hbtn").prop('disabled', true);
     var data = $("#updateWall").serialize();
      $.ajax({
         url:"processWallet",
         data:data,
         type:"post",
         beforeSend: function(){

         },
         success: function(data){
           console.log(data);
           if(data.Status == 'Active'){
            location.reload();
           }
         }
      });
   });

   $("#updateTr").on('submit', function(e){
     e.preventDefault();
     $("#tbtn").prop('disabled', true);
     var data = $("#updateTr").serialize();
      $.ajax({
         url:"updateTr",
         data:data,
         type:"post",
         beforeSend: function(){
            $("#trloader").show();
         },
         success: function(data){
           $("#trloader").hide();
           if(data.Status == 'Active'){
            location.reload();
           }else{
             $("#emsg").show();
             $("#emsg").html(data.Message);
           }
         }
      });
   });


   $("#verifyRetailer").on('submit', function(e){
     e.preventDefault();
     $("#tbtn").prop('disabled', true);
     var data = $("#verifyRetailer").serialize();
      $.ajax({
         url:"verifyRetailer",
         data:data,
         type:"post",
         beforeSend: function(){
            $("#veloader").show();
         },
         success: function(data){
           $("#veloader").hide();
           if(data.Status == 'Active'){
            location.reload();
           }else{
            alert("Sorry, Wrong OTP");
           }
         }
      });
   });

   $("#cdeposit").on('submit', function(e){
     e.preventDefault();
     $("#tbtn").prop('disabled', true);
     var data = $("#cdeposit").serialize();
      $.ajax({
         url:"cdeposit",
         data:data,
         type:"post",
         beforeSend: function(){

         },
         success: function(data){
           if(data.Status == 'Active'){
            location.reload();
           }
         }
      });
   });

   $("#csearch").on('submit', function(e){
     e.preventDefault();
     $("#tbtn").prop('disabled', true);
     var data = $("#csearch").serialize();
      $.ajax({
         url:"csearch",
         data:data,
         type:"post",
         beforeSend: function(){

         },
         success: function(data){
           if(data.Status == 'Active'){
            location.reload();
           }
         }
      });
   });

   $("#api").on('submit', function(e){
     e.preventDefault();
     $("#tbtn").prop('disabled', true);
     var data = $("#api").serialize();
      $.ajax({
         url:"apiupdate",
         data:data,
         type:"post",
         beforeSend: function(){

         },
         success: function(data){
           alert(data);
           console.log(data);
           if(data.Status == 'Active'){
            location.reload();
           }
         }
      });
   });

   $("#sendRequest").on('submit', function(e){
     e.preventDefault();
     $("#tbtn").prop('disabled', true);
     var data = new FormData($("#sendRequest")[0])
      $.ajax({
         url:"sendRequest",
         data:data,
         type:"post",
         cache:false,
         processData:false,
         contentType:false,
         beforeSend: function(){
            $("#loader").show();
         },
         success: function(data){
           $("#loader").hide();
           console.log(data);
           if(data.Status == 'Active'){
           $("#smsg").show();
           $("#smsg").html(data.Message);
           setTimeout(function(){ location.reload(); }, 3000);
           }else{
           $("#emsg").show();
           $("#emsg").html(data.Message);
           setTimeout(function(){ location.reload(); }, 3000);
           }
         }
      });
   });


   $("#changepPassword").on('submit', function(e){
     e.preventDefault();
     $("#pbtn").prop('disabled', true);
     var data = $("#changepPassword").serialize();
      $.ajax({
         url:"changepPassword",
         data:data,
         type:"post",
         beforeSend: function(){
         },
         success: function(data){
           $("#pbtn").prop('disabled', false);
           $("#psmsg").hide();
           $("#pemsg").hide();
           if(data.Status == 'Active'){
             $("#psmsg").show();
             $("#psmsg").html(data.Message);
            $("#changepPassword")[0].reset();
           }else{
             $("#pemsg").show();
             $("#pemsg").html(data.Message);
           }
         }
      });
   });

 $("#validate").on('submit', function(e){
     e.preventDefault();
     $("#tbtn").prop('disabled', true);
     var data = $("#validate").serialize();
      $.ajax({
         url:"validate",
         data:data,
         type:"post",
         beforeSend: function(){

         },
         success: function(data){
 console.log(data);
           /*if(data.Status == 'Active'){
            location.reload();
           }*/
         }
      });
   });

});