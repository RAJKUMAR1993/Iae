$(document).ready(function(){
$("#mobile_number").focus();
//$("#tmodal").modal("show");
$.ajax({
  url:"banks.json",
  success: function(data){
    var append='';
    $.each(data, function(ind,value){
      append += '<option value="'+value.bank_code+'">'+value.BankName+'</option>';
    });
    $("#banks").append(append);
  }
});


  $("#makeTransfer").on('submit', function(e){
    e.preventDefault();
    var fdata = $("#makeTransfer").serialize();
    $.ajax({
      url:"moneyTransfer",
      data:fdata,
      type:"post",
      beforeSend: function(){

      },
      success: function(data){
        console.log(data);
      },
      error: function(jqxhr,textStatus){
console.log("Network Error : "+textStatus+" /"+jqxhr.status+" /"+jqxhr.statusText);
    }
    });
  });


  $("#otp_verify").on('submit', function(e){
    e.preventDefault();
    var fdata = $("#otp_verify").serialize();
    $.ajax({
      url:"otp_verify",
      data:fdata,
      type:"post",
      beforeSend: function(){
$("#otploader").show();
      },
      success: function(data){
        console.log(data);
$("#otploader").hide();
$("#otperror").hide();
if(data.response_status_id == 0){

}else{
  $("#otperror").show();
  $("#otperror").html("Otp is wrong");
}
      },
      error: function(jqxhr,textStatus){
  console.log(jqxhr);
    $("#otploader").hide();
    $("#otperror").show();
    $("#otperror").html("Network Error : "+textStatus);
      }
    });
  });

  
   $("#searchCustomer").on('submit',function(e){
    e.preventDefault();
var mobile_number = $("#mobile_number").val();
if(mobile_number != '' && mobile_number.length == 10){

var fdata = {"mobile_number":mobile_number};
$.ajax({
url:"mobile_search",
data:fdata,
type:"post",
beforeSend: function(){
  $("#cloader").show();
  $("#memsg").hide();
},
success: function(data){
    $("#cloader").hide();
    $("#memsg").hide();
    console.log(data);
    if(data.response_status_id == 0){
      $("#customer").hide();
      $("#customer1").show();
      $("#customername").html(data.data.name);
      $("#customermobile").html(data.data.customer_id);
      $("#customerlimit").html(data.data.available_limit);
      $("#climit").val(data.data.available_limit);
      $("#listbenificiary").show();
      getBenificiary(data.data.customer_id);
    }else if(data.response_status_id == 1){
    $("#memsg").show();
    $("#memsg").html("Message : "+data.message);
    if(data.message != 'Customer mobile should be numeric and doesnt start with 0'){
    $("#customer_mobile_number").val(mobile_number);
    $("#cc_customer").show();
    }

    }else if(data.response_status_id == -1){
  $("#cc_customer").hide();
  $("#otp_customer").show();
  $("#otp_mobile_number").val(data.data.customer_id);
}
},
error: function(jqxhr,textStatus){
  console.log(jqxhr);
    $("#cloader").hide();
    $("#memsg").show();
    $("#memsg").html("Network Error : "+textStatus);
}
});
}
   });

$("#createCustomer").on('submit', function(e){
e.preventDefault();
var fdata = $("#createCustomer").serialize();
$.ajax({
url:"createCustomer",
data:fdata,
type:"post",
beforeSend: function(){
$("#customerloader").show();
},
success: function(data){
  console.log(data.response_status_id);  
$("#customerloader").hide();
$("#customeremsg").hide();
$("#customersmsg").hide();
if(data.response_status_id == 0){
  $("#memsg").hide();
  $("#cc_customer").hide();
  $("#otp_customer").show();
  $("#otp_mobile_number").val(data.data.customer_id);
}


},
error: function(jqxhr,textStatus){
$("#customerloader").hide();
$("#customeremsg").show();
console.log(jqxhr);
$("#customeremsg").html("Network Error : "+textStatus+" /"+jqxhr.status+" /"+jqxhr.statusText);
}

});

});

});//Document Load CLose

function getBenificiary(mobile_number){
var fdata = {"mobile_number":mobile_number};
$.ajax({
url:"getBenificiary",
data:fdata,
type:"post",
beforeSend: function(){

},
success: function(data){
console.log(data);
if(data.response_status_id == 0){
var append='';
if((data.data.recipient_list).length > 0){
  $.each(data.data.recipient_list, function(i,val){
    append += '<tr><td>'+val.recipient_name+'</td><td>'+val.recipient_mobile+'</td><td>'+val.account+'</td><td>'+val.bank+'</td><td><button onclick="makeTransaction(\''+val.account+'\',\''+val.bank+'\',\''+val.ifsc+'\',\''+val.recipient_name+'\',\''+val.recipient_mobile+'\',\''+val.recipient_id+'\');" class="btn btn-primary btn-sm"><i class="fa fa-arrow-right"></i></button></td></tr>';
  });
$("#tbtb").append(append);
}
/*$.each(data, function(o,val){
   console.log((data.recipient_list).length);
});*/
}else{
$("#blist").html("Benificiary List is Empty");
}
},
error: function(jqxhr,textStatus){

}
});
}
function makeTransaction(account,bank,ifsc,name,mobile,recipient_id){
    $("#tmodal").modal("show");
    $("#benname").html(name);
    $("#benmobile").html(mobile);
    $("#benbank").html(bank);
    //$("#benifsc").html(ifsc);
    $("#benaccount").html(account);
    $("#customer_m_number").val($("#mobile_number").val());
    $("#customer_limit").val($("#climit").val());
    $("#recipient_id").val(recipient_id);
    $("#recipient_mobile").val(recipient_mobile);
}

function resendOtp(mobile){

var fdata = {"mobile_number":mobile};
$.ajax({
url:"resendOtp",
data:fdata,
type:"post",
beforeSend: function(){
$("#memsg").hide();
$("#customerloader").show();
},
success: function(data){
  console.log(data);
$("#customerloader").hide();
$("#customersmsg").hide();
$("#customeremsg").hide();
if(data.response_status_id == 0){
  $("#cc_customer").hide();
  $("#otp_customer").show();
  $("#otp_mobile_number").val(data.data.customer_id);
}


},
error: function(jqxhr,textStatus){
$("#customerloader").hide();
$("#customeremsg").show();
console.log(jqxhr);
$("#customeremsg").html("Network Error : "+textStatus+" /"+jqxhr.status+" /"+jqxhr.statusText);
}

});

}

function showBens(){
  $("#addbenificiary").toggle();
}
function makeCals(amount){
  var charges,totalamount;
  var wbal = $("#wbal").val();
  var climit = parseFloat($("#customer_limit").val());
if(amount == ''){
  $("#money_error").hide();
  return false;
}
if(amount <= climit){
if(amount < 200 && amount != ''){
  $("#money_error").show();
  $("#money_error").html("Minimum Amount 200");
  $("#trcharges").val('');
  $("#totalamount").val('');
}else if(amount >=200 && amount <= 50000){
  $("#money_error").hide();
  if(amount >=200 && amount <=5000){
getdata = commission(amount);
if(getdata[1] <= wbal){
$("#trcharges").val(getdata[0]);
$("#totalamount").val(getdata[1]);
}else{
$("#trcharges").val('');
$("#totalamount").val('');
$("#money_error").show();
$("#money_error").html("Don't have sufficient funds to make transaction.");  
}

}else{

var amt = amount;
var amtarray = [];
while(amount > 5000){
amount = amount-5000;
amtarray.push(commission(5000)[1]);
}
amtarray.push(commission(amount)[1]);
var tot=0;
$.each(amtarray, function(i,val){
tot += val;
});

if(tot <= wbal){
$("#trcharges").val(tot-amt);
$("#totalamount").val(tot);
}else{
$("#trcharges").val('');
$("#totalamount").val('');
$("#money_error").show();
$("#money_error").html("Don't have sufficient funds to make transaction."); 
}
}
  
}else{
  $("#money_error").show();
  $("#money_error").html("Maximum Transfer Amount 50000 Only"); 
  $("#trcharges").val('');
  $("#totalamount").val('');
  }
}
else{
$("#money_error").show();
$("#money_error").html("Customer don't have balance to make transaction. Balance is : "+$("#customer_limit").val()); 
$("#trcharges").val('');
$("#totalamount").val('');  
}


}

function commission(amount){
  var tr1 = $("#tr1").val();
  var tr2 = $("#tr2").val();
  var tr3 = $("#tr3").val();
  var tr4 = $("#tr4").val();
  var tr5 = $("#tr5").val();

  if(amount >= 200 && amount <= 1000){
    charges = tr1; totalamount = parseFloat(amount) + parseFloat(tr1);
  }else if(amount >=1001 && amount <=2000){
    charges = tr2; totalamount = parseFloat(amount) + parseFloat(tr2);
  }
  else if(amount >=2001 && amount <=3000){
    charges = tr3; totalamount = parseFloat(amount) + parseFloat(tr3);
  }else if(amount >=3001 && amount <=4000){
    charges = tr4; totalamount = parseFloat(amount) + parseFloat(tr4);
  }else if(amount >=4001 && amount <=5000){
    charges = tr5; totalamount = parseFloat(amount) + parseFloat(tr5);
  }
  return [charges,totalamount];
}