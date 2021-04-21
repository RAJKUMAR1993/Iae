$(document).ready(function(){
    $("#login").on('submit', function(e){
     
       e.preventDefault();
       var fdata = $("#login").serialize();
       var url = $("#base_url").val()+'admin/login/do_login';
       $.ajax({
          url:url,
          data:fdata,
          dataType:"json",
          type:"post",
          beforeSend: function(){
            $("#ploader").show();

          },
          success: function(data){
            // alert();
            console.log(data);
            $("#ploader").hide();
            $("#emsg").hide();
            if(data.Status == 'Active'){
                if(data.Role == 1 || data.Role == 3 || data.Role == 4 || data.Role == 5){
                  window.location.href= $("#base_url").val()+"admin/dashboard";
                }
                if(data.Role == 2){
                  window.location.href= $("#base_url").val()+"agent/dashboard";
                }
            }else{
              $("#emsg").show();
              $("#emsg").html(data.Message);
            }
          }
       });
    });

      $("#student_login").on('submit', function(e){
     
       e.preventDefault();
       var fdata = $("#student_login").serialize();
       var url = $("#base_url").val()+'student_login/do_login';
       $.ajax({
          url:url,
          data:fdata,
          dataType:"json",
          type:"post",
          beforeSend: function(){
            $("#ploader").show();

          },
          success: function(data){
            // alert();
            console.log(data);
            $("#ploader").hide();
            $("#emsg").hide();
            if(data.Status == 'Active'){
                
                if(data.Role == 'user'){
                  window.location.href= $("#base_url").val()+"student/dashboard";
                }
            }else{
              $("#emsg").show();
              $("#emsg").html(data.Message);
            }
          }
       });
    });

});