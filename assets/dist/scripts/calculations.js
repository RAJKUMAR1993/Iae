var table;
$(function(){

$.ajax({
  url:"banks.json",
  success: function(data){
    var append='';
    $.each(data, function(ind,value){
      var bank = value.bank_code+"/"+value.bank_id;
      append += '<option value="'+bank+'">'+value.BankName+'</option>';
    });
    $("#banks").append(append);
  }
});

$("#makeTransaction").on('submit', function(e){
var con=$("#mt").val();
if($("#recipient_id").val() == ''){
  $("#money_error").show(); $("#money_error").html("Please select Benificiary");
  return false;
}
if($("#trcharges").val() != '' && $("#totalamount").val() != ''){
e.preventDefault();
if(con == 'false'){
  $("#cwindow").modal("show");
  $("#aamt").html($("#amount").val());
  $("#bfs").html($("#nameben").val());
  $("#bnk").html($("#benban").val());
  $("#acnm").html($("#accben").val());
  return false;
}else{
$("#cwindow").modal("hide");
  return true;
}
$("#mkbtn").attr("disabled", true);

}else{
$("#money_error").append('Sorry, don\'t have to make transaction');
return false;
}
});





$("#validateTransaction").on('submit', function(e){

e.preventDefault();
var fdata=$("#validateTransaction").serialize();
$.ajax({
url:"verifyTrans",
data:fdata,
type:"post",
timeout: 60000,
beforeSend:function(){
$("#vloader").show();
},
success: function(data){
$("#vloader").hide();
$("#vemsg").hide();
$("#vsmsg").hide();
console.log(data);
$("#details").show();
$("#tnid").val(data.data.tid);
$("#trnid").html(data.data.tid);
$("#amt").html(data.data.amount);
$("#brn").html(data.data.bank_ref_num);
$("#ctmr").html(data.data.customer_id);
$("#desc").html(data.data.tx_desc);
$("#status").html(data.data.txstatus_desc);
if(data.data.tx_desc == "3"){
$("#details").show();
}
},
error: function(jqxhr,textStatus){
$("#vsmsg").hide();
$("#vloader").hide();
$("#vemsg").show();
$("#vemsg").html("Network Error : "+textStatus+" /"+jqxhr.status+" /"+jqxhr.statusText);
}
});

});

$("#refundOtp").on('submit', function(e){

e.preventDefault();
var fdata=$("#refundOtp").serialize();
$.ajax({
url:"refundOtp",
data:fdata,
type:"post",
timeout: 60000,
beforeSend:function(){
$("#Rloader").show();
},
success: function(data){
console.log(data);
$("#Rloader").hide();
$("#remsg").hide();
$("#rsmsg").show();
$("#rsmsg").html(data.Status);
setTimeout(function(){
  location.reload();
},5000 );
},
error: function(jqxhr,textStatus){
$("#rsmsg").hide();
$("#vloader").hide();
$("#remsg").show();
$("#remsg").html("Network Error : "+textStatus+" /"+jqxhr.status+" /"+jqxhr.statusText);
}
});

});


});

function searchCustomer(mobile_number){
  $("#my-example tbody").empty();
  $("#makeTransaction")[0].reset();
  $(".showhide").hide();
  $("#money_error").hide();$("#money_success").hide();
  if(mobile_number.length == 10){
  $("#mobile_number").blur();
  var fdata = {"mobile_number":mobile_number};
  $.ajax({
    url:"mobile_search",
    data:fdata,
    type:"post",
    timeout:6000,
    beforeSend: function(){
      $("#customerloader").show();
    },
    success: function(data){
    console.log(data);
    $("#customerloader").hide();
    $("#customermsg").hide();

    if(data.response_status_id == 0){
      $("#register").hide();
      $("#customername").html(data.data.name);
      $("#customerlimit").html(data.data.available_limit.toFixed(2));
      $("#customerexist").show();
      $("#customer_limit").val(data.data.available_limit.toFixed(2));
      $("#customer_m_number").val(data.data.customer_id);
      getBenificiary(data.data.customer_id);
    }
    if(data.response_status_id == -1){
$("#customermsg").show();
$("#customermsg").html(data.message);
$("#otpverify").show();

    }

    if(data.response_status_id == 1){
$("#customername").html('');
$("#customerlimit").html('');
$("#customerexist").hide();
$("#customermsg").show();
$("#customermsg").html(data.message);
$("#register").show();
    }


    },
    error: function(jqxhr,textStatus){
    $("#customerloader").hide();
    $("#customermsg").show();
    $("#customermsg").html("Network Error : "+textStatus+" /"+jqxhr.status+" /"+jqxhr.statusText);
    }
  });
  }else{
$("#customername").html('');
$("#customerlimit").html('');
$("#customerexist").hide();
  }

}



function registerCustomer(){
  $("#customermsg").hide();
  var mobile_number = $("#mobile_number").val();
  var cname = $("#cname").val();
  if(mobile_number.length == 10 && cname != ''){
  $("#mobile_number").blur();
  var fdata = {"mobile_number":mobile_number,"customername":cname};
  $.ajax({
    url:"createCustomer",
    data:fdata,
    type:"post",
    timeout:6000,
    beforeSend: function(){
      $("#customerloader").show();
    },
    success: function(data){
    console.log(data);
    $("#customerloader").hide();
    $("#customermsg").hide();

    if(data.response_status_id == 0){
$("#register").hide();
$("#otpverify").show();
    }

    if(data.response_status_id == -1){
$("#register").hide();
$("#otpverify").show();

    }


    },
    error: function(jqxhr,textStatus){
    $("#customerloader").hide();
    $("#customermsg").show();
    $("#customermsg").html("Network Error : "+textStatus+" /"+jqxhr.status+" /"+jqxhr.statusText);
    }
  });
  }else{

$("#customerloader").hide();
$("#customermsg").show();
$("#customermsg").html('Please enter Customer Mobile Number and Name');
  }

}

function resendOtp(){
$("#customermsg").hide();
var mobile_number = $("#mobile_number").val();
if(mobile_number.length == 10){

var fdata = {"mobile_number":mobile_number};
$.ajax({
url:"resendOtp",
data:fdata,
type:"post",
beforeSend: function(){
$("#customermsg").hide();
$("#customerloader").show();
},
success: function(data){
  console.log(data);
$("#customerloader").hide();
$("#customermsg").hide();
if(data.response_status_id == 0){
  $("#customermsg").show();
  $("#customermsg").html(data.message);
}else{
$("#customermsg").show();
$("#customermsg").html(data.message);
}


},
error: function(jqxhr,textStatus){
$("#customerloader").hide();
$("#customermsg").show();
$("#customermsg").html("Network Error : "+textStatus+" /"+jqxhr.status+" /"+jqxhr.statusText);
}

});

}else{
$("#customerloader").hide();
$("#customermsg").show();
$("#customermsg").html('Customer Mobile Number');
}
}


function verifyOtp(){

$("#customermsg").hide();
var mobile_number = $("#mobile_number").val();
var otp = $("#otp").val();
if(mobile_number.length == 10){

var fdata = {"mobile_number":mobile_number,"otp":otp};
$.ajax({
url:"otp_verify",
data:fdata,
type:"post",
beforeSend: function(){
$("#customermsg").hide();
$("#customerloader").show();
},
success: function(data){
//console.log(data);
$("#customerloader").hide();
$("#customermsg").hide();
if(data.response_status_id == 0){
$("#otpverify").hide();
searchCustomer(data.data.customer_id);
}else{
$("#customermsg").show();
$("#customermsg").html(data.message);
}


},
error: function(jqxhr,textStatus){
$("#customerloader").hide();
$("#customermsg").show();
$("#customermsg").html("Network Error : "+textStatus+" /"+jqxhr.status+" /"+jqxhr.statusText);
}

});

}else{
$("#customerloader").hide();
$("#customermsg").show();
$("#customermsg").html('Customer Mobile Number');
}

}

function getBenificiary(mobile_number){
  table = $('#my-example').DataTable({
         destroy: true,
         "bProcessing": true,
         "sAjaxSource": "getBenificiaryList?mobile_number="+mobile_number,
         "aoColumns": [
               { mData: 'data' }
             ],
          "bLengthChange": false,
          "bInfo" : false,
          "ordering": false,
          "bSort":false,
      });

$('#my-example tbody').on('click', 'tr', function () {
        var data = table.row( this ).data();
        //console.log(data);
        showBankServer(data.bank);
        $("#benban").val(data.bank);
        $("#nameben").val(data.namebe);
        $("#accben").val(data.benacc);
        if(data.ben_mobile != null){
        $("#recipient_mobile").val(data.ben_mobile);
        }else{
        $("#recipient_mobile").val(9603322060);
        }
        $("#recipient_id").val(data.BenId);
        $(".showhide").show();
        $(".showhide").html(data.data);
$("#my-example tbody tr").removeClass('row_selected');
$(this).addClass('row_selected');

    } );

}

function verifyBenificiary(){
$("#benerror").hide();
$("#bensuccess").hide();

  var bankcode = $("#banks").val();
  var accno = $("#accno").val();
  var benmobile = $("#benmobile").val();
  var benname = $("#benname").val();
  var mobile_number = $("#mobile_number").val();
  var ifsc_status = $("#ifsc_status").val();

  if(benname == ''){ benname = "Unknown"; }
if($("#mobile_number").val() == ''){
  $("#benerror").show();
  $("#benerror").html('Enter Customer Number');
  return false;
}
  if(bankcode != '' && accno != '' && benmobile != '' && benname != ''){

  if(ifsc_status == "4"){
  if($("#ifsc_code").val() != ''){
   var fdata={"bankcode":bankcode,"accno":accno,"benname":benname,"benmobile":benmobile,"customer":mobile_number,"ifsc_status":ifsc_status,"ifsc_code":$("#ifsc_code").val()};
  }else{
   $("#benerror").show();
  $("#benerror").html('Please enter IFSC Code');
  return false;
  }
  }else{
var fdata={"bankcode":bankcode,"accno":accno,"benname":benname,"benmobile":benmobile,"customer":mobile_number,"ifsc_status":ifsc_status };
  }
  $.ajax({
     url:"verifyBenificiary",
     data:fdata,
     type:"post",
     beforeSend: function(){
       $("#benloader").show();
       $("#benerror").hide();
     },
     success: function(data){
       $("#benloader").hide();
       //console.log(data);
       if(data.response_type_id == 345){
       $("#bensuccess").show();
       $("#bensuccess").html("Benificiary Already Registered");
       }
       if(data.response_type_id == 61){
       $("#bensuccess").show();
       $("#bensuccess").html(data.message);
       $("#benname").val(data.data.recipient_name);
       $("#abenbtn").show();
       }

       if(data.response_type_id == -1){
       $("#bensuccess").hide();
       $("#benerror").show();
       $("#benerror").html(data.message);
       }

     },
     error: function(jqxhr,textStatus){
$("#benloader").hide();
$("#benerror").show();
$("#benerror").html("Network Error : "+textStatus+" /"+jqxhr.status+" /"+jqxhr.statusText);
}
  });
}else{
  $("#benerror").show();
  $("#benerror").html('Please fill all the fields');
}


}

function banks(data){
$("#ifsc_code").hide();
$("#ifsc_code").val('');$("#accno").val('');$("#benmobile").val('');$("#benname").val('');
var bcode = data.split("/")[0];
var fdata = {"bank_code":bcode};
$.ajax({
   url:"getBankDetails",
   data:fdata,
   type:"post",
   beforeSend: function(){
   $("#benloader").show();
   $("#bensuccess").hide();
   },
   success: function(data){
     $("#benloader").hide();
     $("#bensuccess").hide();
     //console.log(data);
     $("#abenbtn").show();
     $("#ifsc_status").val(data.data.ifsc_status);
var str='';
$("#aval_channel").val(data.data.isverificationavailable);
if(data.data.isverificationavailable == 0){
  str+="Bank is not available for account verification<br>";
  $("#bverifybtn").hide();
}else{
  $("#bverifybtn").show();
  str+="Bank is available for account verification<br>";
}
if(data.data.available_channels  == 0){
str += "IMPS and NEFT are available for the bank<br>";
$("#type").val("2");
}else if(data.data.available_channels  == 1){
str += "Only NEFT Available<br>";
$("#type").val("1");
}else if(data.data.available_channels  == 2){
str += "Only IMPS Available<br>";
$("#type").val("2");
}

if(data.data.ifsc_status == 4){
  str+="IFSC is requried";
  $("#ifsc_code").show();
}

$("#bensuccess").show();
$("#bensuccess").html(str);
   },
   error: function(jqxhr,textStatus){
$("#benloader").hide();
$("#benerror").show();
$("#benerror").html("Network Error : "+textStatus+" /"+jqxhr.status+" /"+jqxhr.statusText);
}
});
}


function banksnew(data){
var fdata = {"bank_code":data};
$.ajax({
   url:"getBankDetails",
   data:fdata,
   type:"post",
   beforeSend: function(){
   $("#makeloader").show();
   $("#money_success").hide();
   },
   success: function(data){
     $("#makeloader").hide();
     $("#money_success").hide();
     //console.log(data);
     $("#ifsc_status").val(data.data.ifsc_status);
var str='';
$("#aval_channel").val(data.data.isverificationavailable);
if(data.data.available_channels  == 0){
str += "IMPS and NEFT are available for the bank<br>";
$("#money_success").show();
$("#money_success").html(str);
$("#type").val("2");
}else if(data.data.available_channels  == 1){
str += "Only NEFT Available<br>";
$("#money_error").show();
$("#money_error").html(str);
$("#type").val("1");
}else if(data.data.available_channels  == 2){
str += "Only IMPS Available<br>";
$("#type").val("2");
}

$("#money_success").show();
$("#money_success").html(str);
   },
   error: function(jqxhr,textStatus){
$("#makeloader").hide();
$("#money_error").show();
$("#money_error").html("Network Error : "+textStatus+" /"+jqxhr.status+" /"+jqxhr.statusText);
}
});
}


function addBenificiary(){
  var bankcode = $("#banks").val();
  var accno = $("#accno").val();
  var benmobile = $("#benmobile").val();
  var benname = $("#benname").val();
  var mobile_number = $("#mobile_number").val();
  if(benname == ''){ benname = "Unknown"; }

if($("#mobile_number").val() == ''){
  $("#benerror").show();
  $("#benerror").html('Enter Customer Number');
  return false;
}
  if(bankcode != '' && accno != '' && benmobile != '' && benname != ''){

  if($("#ifsc_status").val() == "4"){
  if($("#ifsc_code").val() == ''){
    $("#benerror").show();
    $("#benerror").html('Please enter IFSC Code');
    return false;
  }
  var fdata={"bankcode":bankcode,"accno":accno,"benname":benname,"benmobile":benmobile,"customer":mobile_number,"ifsc_status":$("#ifsc_status").val(),"ifsc_code":$("#ifsc_code").val()};
  }else{
  var fdata={"bankcode":bankcode,"accno":accno,"benname":benname,"benmobile":benmobile,"customer":mobile_number,"ifsc_status":$("#ifsc_status").val()};
  }

  $.ajax({
     url:"addBenificiary",
     data:fdata,
     type:"post",
     beforeSend: function(){
       $("#benloader").show();
       $("#benerror").hide();
     },
     success: function(data){
       $("#benloader").hide();
       //console.log(data);
       if(data.response_type_id == 342){
       $("#bensuccess").show();
       $("#bensuccess").html("Benificiary Already Registered");
       }
       if(data.response_type_id == 43){
       $("#bensuccess").show();
       $("#bensuccess").html(data.message);
       $("#banks").val('');
       $("#accno").val('');
       $("#ifsc_code").val('');
       $("#benmobile").val('');
       $("#benname").val('');
       getBenificiary(mobile_number);
       }

       if(data.response_type_id == -1){
       $("#bensuccess").hide();
       $("#benerror").show();
       $("#benerror").html(data.message);
       }

     },
     error: function(jqxhr,textStatus){
$("#benloader").hide();
$("#benerror").show();
$("#benerror").html("Network Error : "+textStatus+" /"+jqxhr.status+" /"+jqxhr.statusText);
}
  });
}else{
  $("#benerror").show();
  $("#benerror").html('Please fill all the fields');
}

}


function makeCals(amount){
  var charges,totalamount;
  var wbal = $("#wbal").val();
  var climit = parseFloat($("#customer_limit").val());
if(amount == ''){
  $("#money_error").hide();
  return false;
}
if(amount < climit){
if(amount < 100 && amount != ''){
  $("#money_success").hide();
  $("#money_error").show();
  $("#money_error").html("Minimum Amount 100");
  $("#trcharges").val('');
  $("#totalamount").val('');
  return false;
}else if(amount >=100 && amount <= 50000){
  $("#money_error").hide();
  if(amount >=100 && amount <=5000){
getdata = commission(amount);
if(getdata[1] <= wbal){
$("#trcharges").val(getdata[0]);
$("#totalamount").val(getdata[1]);
}else{
$("#trcharges").val('');
$("#totalamount").val('');
$("#money_success").hide();
$("#money_error").show();
$("#money_error").html("Don't have sufficient funds to make transaction.");
return false;
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
$("#money_success").hide();
$("#money_error").show();
$("#money_error").html("Don't have sufficient funds to make transaction.");
return false;
}
}

}else{
  $("#money_success").hide();
  $("#money_error").show();
  $("#money_error").html("Maximum Transfer Amount 50000 Only");
  $("#trcharges").val('');
  $("#totalamount").val('');
  }
}
else{
$("#money_success").hide();
$("#money_error").show();
$("#money_error").html("Customer don't have balance to make transaction. Balance is : "+$("#customer_limit").val());
$("#trcharges").val('');
$("#totalamount").val('');
return false;
}


}

function commission(amount){
  var charges,totalamount;
  if(amount >= 100 && amount <= 1000){
    charges = 10;
    totalamount = parseFloat(amount)+charges;
  }else if(amount >=1001){
    percent = (parseFloat(amount)*1/100);
    charges = percent;
    totalamount = parseFloat(amount) + parseFloat(charges);
  }

  //console.log(charges + " - "+ totalamount);
  return [charges,totalamount];
}


function clubcommission(amount,txt){
  var charges,totalamount;
  if(txt == 'below'){
  charges = parseFloat(amount)*1.2/100;
  }else{
  charges = parseFloat(amount)*1/100;
  }

  totalamount = parseFloat(amount)+parseFloat(charges);
  //console.log(charges + " - "+ totalamount);
  return [charges,totalamount];
}


 function getUserWallet(){
   $.ajax({
      url:"getUserWallet",
      type:"post",
      success: function(data){
        $("#mwallet").html(data.Wallet);
        $("#wbal").val(data.Wallet);
      }
   });
 }

function makeClub(fdata){
$.ajax({
url:"moneyTransfer",
data:fdata,
type:"post",
timeout: 60000,
beforeSend:function(){
$("#makeloader").show();
},
success: function(data){
$("#mt").val('false');
$("#makeloader").hide();
$("#money_error").hide();
$("#money_success").hide();
//console.log(data);
if(data.type=='Single'){

if(data.tx_status != "1"){
  $("#money_success").show();
  $("#money_success").html(data.txstatus_desc);
var amt = data.Amount;
var cl = $("#customer_limit").val();
console.log(amt);
console.log(cl);
console.log(cl-amt);
console.log(parseFloat(cl-amt));
$("#customer_limit").val(parseFloat(cl-amt));
$("#customerlimit").html(parseFloat(cl-amt));
  var append = '';
append+='<tr><td>'+data.Customer+'</td><td>'+data.Date+'</td><td>'+data.Time+'</td><td>'+data.Account+'</td><td>'+data.Amount+'</td><td>'+data.Charges+'</td><td>'+data.trtype+'</td><td>'+data.Tid+'</td><td>'+data.sender+'</td><td>'+data.txstatus_desc+'</td><td>'+data.print+'</td>';
$("#trans").append(append);
$("#trans").show();
  getUserWallet();
  //sendMessage(data.msg);
  refresh();
}else{
$("#money_success").hide();
$("#money_error").show();
$("#money_error").html(data.txstatus_desc);
getUserWallet();
}

}else if(data.type == 'Club'){
$("#money_success").show();
$("#money_success").html(data.msg);

var append = '';
$.each(data.loop, function(index, val){

append+='<tr><td>'+data.Customer+'</td><td>'+data.Date+'</td><td>'+data.Time+'</td><td>'+data.Account+'</td><td>'+data.Amount+'</td><td>'+data.Charges+'</td><td>'+data.type+'</td><td>'+data.Tid+'</td><td>'+data.sender+'</td><td>'+data.txstatus_desc+'</td><td>'+data.print+'</td>';

});

$("#trans").append(append);
$("#trans").show();
getUserWallet();
}else{

$("#money_success").hide();
$("#money_error").show();
$("#money_error").html(data.txstatus_desc);

}


},
error: function(jqxhr,textStatus){
$("#money_success").hide();
$("#mkbtn").attr("disabled", false);
$("#makeloader").hide();
$("#money_error").show();
$("#money_error").html("Network Error : "+textStatus+" /"+jqxhr.status+" /"+jqxhr.statusText);
}
});

}

function sendMessage(msg){
  var fdata = {"message":msg };
  $.ajax({
   url:"sendSMS",
   data:fdata,
   type:"post",
   timeout: 60000,
   success: function(data){
     console.log(data);
   },
   error: function(kqxhr,txtStatus){
     console.log(txtStatus);
   }
});
}

function showBankServer(bank){
  var fdata={"bank":bank};
  $.ajax({
   url:"verifyServer",
   data:fdata,
   type:"post",
   timeout: 60000,
   success: function(data){
     //console.log(data);
    banksnew(data);
   },
   error: function(kqxhr,txtStatus){
     console.log(txtStatus);
   }
});

}

function confirm(){
 $("#mt").val('true');
 $("#cwindow").modal("hide");
 $("#hbtn").attr('disabled',true);
 $("#trid").val(new Date().getTime());
 submit();
}

function submit(){
var fdata=$("#makeTransaction").serialize();
if($("#amount").val() > 5000){
var amounts = $("#amount").val();
var amt = [];
while(amounts > 5000){
  amt.push(5000);
  amounts=amounts-5000;
}
amt.push(amounts);
var data = $("#makeTransaction").serializeArray();
//console.log(data);
for(var i=0;i<amt.length;i++){
var tdata = commission(amt[i]);
var trcharges = tdata[0];
var totalamount = tdata[1];
data[5].value = amt[i];
data[6].value=trcharges;
data[7].value=totalamount;
data[9].value="club";
//console.log(data);
makeClub(data);
}


//return false;
$("#mkbtn").attr("disabled", false);
$("#hbtn").attr('disabled',false);
return false;

}else{
$("#hbtn").attr('disabled',false);
$.ajax({
url:"moneyTransfer",
data:fdata,
type:"post",
timeout: 60000,
beforeSend:function(){
$("#makeloader").show();
},
success: function(data){
$("#mt").val('false');
$("#mkbtn").attr("disabled", false);
$("#makeloader").hide();
$("#money_error").hide();
$("#money_success").hide();
console.log(data);
if(data.type=='Single'){

if(data.tx_status != "1"){
  $("#money_success").show();
  $("#money_success").html(data.txstatus_desc);
var amt = data.Amount;
var cl = $("#customer_limit").val();
$("#customer_limit").val(parseFloat(cl-amt));
$("#customerlimit").html(parseFloat(cl-amt));
  var append = '';
append+='<tr><td>'+data.Customer+'</td><td>'+data.Date+'</td><td>'+data.Time+'</td><td>'+data.Account+'</td><td>'+data.Amount+'</td><td>'+data.Charges+'</td><td>'+data.trtype+'</td><td>'+data.Tid+'</td><td>'+data.sender+'</td><td>'+data.txstatus_desc+'</td><td>'+data.print+'</td>';
$("#trans").append(append);
$("#trans").show();
  getUserWallet();
  //sendMessage(data.msg);
  refresh();
}else{
$("#money_success").hide();
$("#money_error").show();
$("#money_error").html(data.txstatus_desc);
getUserWallet();
}

}else if(data.type == 'Club'){
$("#money_success").show();
$("#money_success").html(data.msg);

var append = '';
$.each(data.loop, function(index, val){

append+='<tr><td>'+data.Customer+'</td><td>'+data.Date+'</td><td>'+data.Time+'</td><td>'+data.Account+'</td><td>'+data.Amount+'</td><td>'+data.Charges+'</td><td>'+data.type+'</td><td>'+data.Tid+'</td><td>'+data.sender+'</td><td>'+data.txstatus_desc+'</td><td>'+data.print+'</td>';

});

$("#trans").append(append);
$("#trans").show();
getUserWallet();
}else{

$("#money_success").hide();
$("#money_error").show();
$("#money_error").html(data.txstatus_desc);

}


},
error: function(jqxhr,textStatus){
$("#money_success").hide();
$("#mkbtn").attr("disabled", false);
$("#makeloader").hide();
$("#money_error").show();
$("#money_error").html("Network Error : "+textStatus+" /"+jqxhr.status+" /"+jqxhr.statusText);
}
});

}

}

function refresh(){
$("#customername").html('');
$("#customerlimit").html('');
$("#customer_limit").val('');
$("#customer_m_number").val('');
$("#customerexist").hide();
$("#mt").val('false');
$("#recipient_id").val('');
$("#amount").val('');
$("#trcharges").val('');
$("#totalamount").val('');
$(".showhide").hide();
$("#mobile_number").val('');
getBenificiary('');
}