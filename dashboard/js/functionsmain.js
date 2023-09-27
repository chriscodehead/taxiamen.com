// JavaScript Document
function refreshThisPage(){
	window.location.reload();
	}

function resendMail(){
var hr = new XMLHttpRequest();
var url = "code_prosessor.php";
var  email = document.getElementById('resend').value;
var  pass = document.getElementById('passw').value;
var vars = "emailresend="+email+"&passresend="+pass;
if(email=="" || pass=="" ){
	sweetUnpre("Please fill all necessary fields!");
	}else{
var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		if( !emailReg.test(email) ) {
					sweetUnpre('Please use a valid email address!');
		}else{
			
		   hr.open("POST", url, true);
	hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	// Access the onreadystatechange event for the XMLHttpRequest object
	hr.onreadystatechange = function() {
	  //  console.log(hr);
		if(hr.readyState == 4 && hr.status == 200) {
			var return_data = hr.responseText;
			sweetUnpre(return_data);
			//setTimeout(refreshPage,2000);
		}
	}
	hr.send(vars); // Actually execute the request
			
		   sweetUnpre('processing...');
           }//email
      }//else empty
sweetUnpre('processing...');
}

function refreshThisPage(){
	window.location.reload();
	}

function updateProfile(){
var hr = new XMLHttpRequest();
var url = "./dashboard/code_prosessor.php";
var email = document.getElementById('email').value;
var sex = document.getElementById('sex').value;
var city = '';//document.getElementById('city').value;
var country = document.getElementById('country').value;
var address = document.getElementById('address').value;
var fname = document.getElementById('fname').value;
var lname = document.getElementById('lname').value;
var btc = '';//document.getElementById('btc').value;
var eth = '';//document.getElementById('eth').value;
var usdt = '';//document.getElementById('usdt').value;
var bnb = '';//document.getElementById('bnb').value;
var ltc = '';//document.getElementById('ltc').value;
var pm = '';//document.getElementById('pmm').value;
var phone = document.getElementById('phone').value;
var vars = "fname="+fname+"&lname="+lname+"&phone="+phone+"&country="+country+"&address="+address+"&email="+email+"&city="+city+"&pm="+pm+"&btc="+btc+"&sex="+sex+"&eth="+eth+"&bnb="+bnb+"&ltc="+ltc;
if( fname=="" ||  lname==""){
	sweetUnpre("Some fields are empty!");
	}else{
$('i#sp1').attr("class","fa fa-spinner fa-spin");
hr.open("POST", url, true);
hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
hr.onreadystatechange = function() {
    if(hr.readyState == 4 && hr.status == 200) {
        var return_data = hr.responseText;
		sweetUnpre(return_data);
		setTimeout(refreshThisPage,3500);
		$('i#sp1').attr("class","fa fa-send-o");
    }
}
hr.send(vars); // Actually execute the request
sweetUnpre('processing...');
}//else empty
}


function updatePassword(){
var hr = new XMLHttpRequest();
var url = "code_prosessor.php";
var pass = document.getElementById('pass').value;
var cpass = document.getElementById('cpass').value;
var vars = "pass="+pass;
if(pass=="" ){
	sweetUnpre("Some fields are empty!");
	}else{
	if(pass != cpass){
				sweetUnpre('Password dose not match!');
				}else{
					if($('#pass').val().length < 8 || $('#pass').val().length >36){
						sweetUnpre('Password must be between the range of 8 - 36!');
						} else{	
           $('i#sp22').attr("class","fa fa-spinner fa-spin");
		   hr.open("POST", url, true);
	hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	// Access the onreadystatechange event for the XMLHttpRequest object
	hr.onreadystatechange = function() {
	  //  console.log(hr);
		if(hr.readyState == 4 && hr.status == 200) {
			var return_data = hr.responseText;
			sweetUnpre(return_data);
			setTimeout(refreshThisPage,2000);
			$('i#sp22').attr("class","fa fa-send-o");
		}
	}
	hr.send(vars); // Actually execute the request
							sweetUnpre('processing...');
						}//pass
			
           }//pass
      }//else empty

}



function updateWallet(){
var hr = new XMLHttpRequest();
var url = "code_prosessor.php";
var btc = document.getElementById('btc').value;
var vars = "btc_wallet="+btc;
if(btc=="" ){
	sweetUnpre("Please fill all necessary fields!");
	}else{
	
           $('i#sp2').attr("class","fa fa-spinner fa-spin");
		   hr.open("POST", url, true);
	hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	// Access the onreadystatechange event for the XMLHttpRequest object
	hr.onreadystatechange = function() {
	  //  console.log(hr);
		if(hr.readyState == 4 && hr.status == 200) {
			var return_data = hr.responseText;
			sweetUnpre(return_data);
			//setTimeout(refreshPage,2000);
			$('i#sp2').attr("class","fa fa-check");
		}
	}
	hr.send(vars); // Actually execute the request
		sweetUnpre('processing...');				
      }//else empty

}

function updatePerfectmoney(){
var hr = new XMLHttpRequest();
var url = "code_prosessor.php";
var perfectmoney = document.getElementById('perfectmoney').value;
var vars = "perfectmoney="+perfectmoney;
if(perfectmoney=="" ){
	sweetUnpre("Please fill all necessary fields!");
	}else{
	
           $('i#sp22').attr("class","fa fa-spinner fa-spin");
		   hr.open("POST", url, true);
	hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	// Access the onreadystatechange event for the XMLHttpRequest object
	hr.onreadystatechange = function() {
	  //  console.log(hr);
		if(hr.readyState == 4 && hr.status == 200) {
			var return_data = hr.responseText;
			sweetUnpre(return_data);
			//setTimeout(refreshPage,2000);
			$('i#sp22').attr("class","fa fa-check");
		}
	}
	hr.send(vars); // Actually execute the request
		sweetUnpre('processing...');				
      }//else empty

}


function updateTwoFactor(){
var hr = new XMLHttpRequest();
var url = "code_prosessor.php";
var fac = document.getElementById('fac').value;
var vars = "fac="+fac;
if(fac=="" ){
	sweetUnpre("Please fill all necessary fields!");
	}else{
	
           $('i#sp3').attr("class","fa fa-spinner fa-spin");
		   hr.open("POST", url, true);
	hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	// Access the onreadystatechange event for the XMLHttpRequest object
	hr.onreadystatechange = function() {
	  //  console.log(hr);
		if(hr.readyState == 4 && hr.status == 200) {
			var return_data = hr.responseText;
			sweetUnpre(return_data);
			//setTimeout(refreshThisPage,2000);
			$('i#sp3').attr("class","fa fa-send-o");
		}
	}
	hr.send(vars); // Actually execute the request
sweetUnpre('processing...');
      }//else empty

}


function performClick(elemId) {
		   var elem = document.getElementById(elemId);
			if(elem && document.createEvent) {
					  var evt = document.createEvent("MouseEvents");
					  evt.initEvent("click", true, false);
					  elem.dispatchEvent(evt);
		   }
}

function withdrawInvest(){
var hr = new XMLHttpRequest();
var url = "code_prosessor.php";
var amount = document.getElementById('amount').value;
var vars = "amount="+amount;
if(amount=="" ){
	sweetUnpre("Please fill all necessary fields!");
	}else{
	   $('#form1').submit();   
sweetUnpre('processing...');
      }//else empty
sweetUnpre('processing...');
}



$(document).ready(function(e){
   $('button#bigpush').click(function(){
		var selected = new Array();
		$('input[name="intrest"]:checked').each(function() {
		selected.push(this.value);
		});
		if(selected!="" & selected!=0){
			$('i#sp3').attr("class","fa fa-spinner fa-spin");
                $.ajax({
                    url: "withdrawal_processor.php", // link of your "whatever" php
                    type: "POST",
                    async: true,
                    cache: false,
                    data: {list:selected}, // all data will be passed here
                    success: function(data){ 
                        sweetUnpre(data) // The data that is echoed from the ajax.php
						$('i#sp3').attr("class","fa fa-send-o");
						setTimeout(refreshThisPage,6000);
                    }
                });
				sweetUnpre("Processing...");
		}else{sweetUnpre('Error! Please select an account to withdraw from. Thanks.');}
		});
});

$(document).ready(function(e){
   $('button#bigpushSingle').click(function(){
	   var id = $('input[name="intrest"]:checked').val();
	   var amt = document.getElementById('amt').value;
		if(id!="" || amt!=0 || amt!=""){
			$('i#sp3').attr("class","fa fa-spinner fa-spin");
                $.ajax({
                    url: "withdrawal_processor.php", // link of your "whatever" php
                    type: "POST",
                    async: true,
                    cache: false,
                    data: {listsingle:id, amt:amt}, // all data will be passed here
                    success: function(data){ 
                        sweetUnpre(data) // The data that is echoed from the ajax.php
						$('i#sp3').attr("class","fa fa-send-o");
						setTimeout(refreshThisPage,6000);
                    }
                });
				sweetUnpre("Processing...");
		}else{sweetUnpre('Error! Please select an account to withdraw from. Thanks.');}
		});
});

$(document).ready(function(e) {
   $('button#bigpushREF').click(function(){
		var selected = new Array();
		$('input[name="intrestREF"]:checked').each(function() {
		selected.push(this.value);
		});	
		if(selected!="" & selected!=0){
			$('i#sp3').attr("class","fa fa-spinner fa-spin");
                $.ajax({
                    url: "withdrawal_processor.php", // link of your "whatever" php
                    type: "POST",
                    async: true,
                    cache: false,
                    data: {listREF:selected}, // all data will be passed here
                    success: function(data){ 
                        sweetUnpre(data); // The data that is echoed from the ajax.php
						$('i#sp3').attr("class","fa fa-send-o");
						setTimeout(refreshThisPage,6000);
                    }
                });
				sweetUnpre("Processing...");
		}else{sweetUnpre('Error! Please select an account to withdraw from. Thanks.');}
		});
});


$(document).ready(function(e) {
   $('button#bigCAP').click(function(){
		var selected = $('input[name="trnid"]').val();
		if(selected!="" & selected!=0){
			$('i#sp3').attr("class","fa fa-spinner fa-spin");
                $.ajax({
                    url: "withdrawal_processor.php", // link of your "whatever" php
                    type: "POST",
                    async: true,
                    cache: false,
                    data: {listCAP:selected}, // all data will be passed here
                    success: function(data){ 
                        sweetUnpre(data) // The data that is echoed from the ajax.php
						$('i#sp3').attr("class","fa fa-send-o");
						setTimeout(refreshThisPage,6000);
                    }
                });
				sweetUnpre("Processing...");
		}else{sweetUnpre('Error! Unexpected error. Try again. Thanks.');}
		});
});


$(document).ready(function(e) {
   $('button#bigpush2').click(function(){
		var selected = new Array();
		$('input[name="intrest2"]:checked').each(function() {
		selected.push(this.value);
		});
		if(selected!="" & selected!=0){
			$('i#sp3').attr("class","fa fa-spinner fa-spin");
                $.ajax({
                    url: "withdrawal_processor.php", // link of your "whatever" php
                    type: "POST",
                    async: true,
                    cache: false,
                    data: {list:selected}, // all data will be passed here
                    success: function(data){ 
                        sweetUnpre(data) // The data that is echoed from the ajax.php
						$('i#sp3').attr("class","fa fa-send-o");
						setTimeout(refreshThisPage,6000);
                    }
                });
				sweetUnpre("Processing...");
		}else{sweetUnpre('Error! Please select an account to withdraw from. Thanks.');}
		});
});






$(document).ready(function(e) {
   $('button#bigpushREF2').click(function(){
		var selected = new Array();
		$('input[name="intrestREF2"]:checked').each(function() {
		selected.push(this.value);
		});
		if(selected!="" & selected!=0){
			$('i#sp3').attr("class","fa fa-spinner fa-spin");
                $.ajax({
                    url: "code_prosessor.php", // link of your "whatever" php
                    type: "POST",
                    async: true,
                    cache: false,
                    data: {listREF:selected}, // all data will be passed here
                    success: function(data){ 
                        sweetUnpre(data); // The data that is echoed from the ajax.php
						$('i#sp3').attr("class","fa fa-send-o");
						setTimeout(refreshThisPage,6000);
                    }
                });
				sweetUnpre("Processing...");
		}else{sweetUnpre('Oops!, is like you don`t have funds in this wallet OR Ensure you have selected at least one withdrawable request');}
		});
});


function checkConnection(){
		if(navigator.onLine)
		  {
			alert('You are Online');
		  }
		  else
		  {
			alert('You are Offline')
		  }
 }


function deleteTransaction(id){
var hr = new XMLHttpRequest();
var url = "code_prosessor.php";
var tran_id = id;
var vars = "tran_id="+tran_id;
if(tran_id=="" ){
	sweetUnpre("Error! Not data found");
	}else{
	
           $('i#sp3').attr("class","fa fa-spinner fa-spin");
		   hr.open("POST", url, true);
	hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	// Access the onreadystatechange event for the XMLHttpRequest object
	hr.onreadystatechange = function() {
	  //  console.log(hr);
		if(hr.readyState == 4 && hr.status == 200) {
			var return_data = hr.responseText;
			sweetUnpre(return_data);
			setTimeout(refreshThisPage,2000);
			$('i#sp3').attr("class","fa fa-send-o");
		}
	}
	hr.send(vars); // Actually execute the request
sweetUnpre('processing...');
      }//else empty

}