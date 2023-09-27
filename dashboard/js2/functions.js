// JavaScript Document
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
//sweetUnpre('processing...');
}

function refreshThisPage(){
	window.location.reload();
	}
function updateProfile(){
var hr = new XMLHttpRequest();
var url = "code_prosessor.php";
var walletaddress = document.getElementById('btc').value;
var email = document.getElementById('email').value;
var fname = document.getElementById('fname').value;
var lname = document.getElementById('lname').value;
var sex = document.getElementById('sex').value;
var trader = document.getElementById('trader').value;
var state = document.getElementById('state').value;
var address = document.getElementById('address').value;
var ethereum = document.getElementById('ethereum').value;
	
var vars = "walletaddress="+walletaddress+"&fname="+fname+"&lname="+lname+"&sex="+sex+"&trader="+trader+"&email="+email+"&state="+state+"&address="+address+"&ethereum="+ethereum;
if( fname=="" ||  lname=="" || sex==""){
	sweetUnpre("Please fill all necessary fields!");
	}else{

hr.open("POST", url, true);
hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
hr.onreadystatechange = function() {
    if(hr.readyState == 4 && hr.status == 200) {
        var return_data = hr.responseText;
		sweetUnpre(return_data);
		setTimeout(refreshThisPage,3500);
    }
}
hr.send(vars); // Actually execute the request
sweetUnpre('processing...');
}//else empty
//sweetUnpre('processing...');
}


function updatePassword(){
var hr = new XMLHttpRequest();
var url = "code_prosessor.php";
var pass = document.getElementById('pass').value;
var cpass = document.getElementById('cpass').value;
var vars = "pass="+pass;
if(pass=="" ){
	sweetUnpre("Please fill all necessary fields!");
	}else{
	if(pass != cpass){
				sweetUnpre('Password dose not match!');
				}else{
					if($('#pass').val().length < 8 || $('#pass').val().length >36){
						sweetUnpre('Password must be between the range of 8 - 36!');
						} else{	
           
		   hr.open("POST", url, true);
	hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	// Access the onreadystatechange event for the XMLHttpRequest object
	hr.onreadystatechange = function() {
	  //  console.log(hr);
		if(hr.readyState == 4 && hr.status == 200) {
			var return_data = hr.responseText;
			sweetUnpre(return_data);
			setTimeout(refreshPage,2000);
		}
	}
	hr.send(vars); // Actually execute the request
						}//pass
           }//pass
      }//else empty
//sweetUnpre('processing...');
}

function performClick(elemId) {
		   var elem = document.getElementById(elemId);
			if(elem && document.createEvent) {
					  var evt = document.createEvent("MouseEvents");
					  evt.initEvent("click", true, false);
					  elem.dispatchEvent(evt);
		   }
}

/*function invest(){
var hr = new XMLHttpRequest();
var url = "code_prosessor.php";
var  amount = document.getElementById('amount').value;
var  plan = document.getElementById('plan').value;
var  coin = document.getElementById('coin').value;
var vars = "amount="+amount;
if(amount=="" || plan=="" || coin==""){
	sweetUnpre("Please fill all necessary fields!");
	}else{
      if(parseInt(amount) < 1000){
		 sweetUnpre("Please easyTradeX.com allow for minimum investment of $1000!");
		  }else{
		    if(plan=='starter' && parseInt(amount) < 1000 ){
				sweetUnpre("To invest in `Starter Plan` you have to make deposit within $1000 - $2000!"); 
			   }else{
				if(plan=='starter' && parseInt(amount) > 2000 ){
				 sweetUnpre("To invest in `Starter Plan` you have to make deposit within $1000 - $2000!"); 
			     }else{ 
				if(plan=='bronze' && parseInt(amount) < 2001){
					sweetUnpre("To invest in `Bronze Plan` you have to make deposit within $2001 - $5000!"); 
				   }else{
					 if(plan=='bronze' && parseInt(amount) > 5000){
					sweetUnpre("To invest in `Bronze Plan` you have to make deposit within $2001 - $5000!"); 
				   }else{
					   
					if(plan=='silver' && parseInt(amount) < 5001){
						sweetUnpre("To invest in`Silver Plan` you have to make deposit within $5001 - $20,000!"); 
					   }else{  
					if(plan=='silver' && parseInt(amount) > 20000){
						sweetUnpre("To invest in`Silver Plan` you have to make deposit within $5001 - $20,000!"); 
					   }else{
						   
						 if(plan=='gold' && parseInt(amount) < 20001 ){
							sweetUnpre("To invest in`Gold Plan` you have to make deposit within $20001 - $50,000!"); 
							   }else{
						   if(plan=='gold' && parseInt(amount) > 50000){
							sweetUnpre("To invest in`Gold Plan` you have to make deposit within $20001 - $50,000!"); 
							   }else{
								   
						     if(plan=='premium' && parseInt(amount) < 50001){
								sweetUnpre("To invest in`Premium Plan` you have to make deposit within $50001 - $100,000!"); 
								 }else{
							  if(plan=='premium' && parseInt(amount) > 100000){
								sweetUnpre("To invest in`Premium Plan` you have to make deposit within $50001 - $100,000!"); 
								 }else{
								  $('#form1').submit();  
					}//end gold
		           }//end gold				   
				 }//end gold
		        }//end gold			   
			   }//end silver
		      }//end silver		   
		     }//end bronze
		   }//end bronze
		  }//end starter
		}//end starter		   
	}
//sweetUnpre('proceed to the payment gateway to make your payment!');
  }//else empty

}*/


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
//sweetUnpre('processing...');
}


function refreshThisPage(){
	window.location.reload();
	}
$(document).ready(function(e) {
   $('button#bigpush').click(function(){
		var selected = new Array();
		$('input[name="intrest"]:checked').each(function() {
		selected.push(this.value);
		});
		
		if(selected!="" & selected!=0){
                $.ajax({
                    url: "code_prosessor.php", // link of your "whatever" php
                    type: "POST",
                    async: true,
                    cache: false,
                    data: {list:selected}, // all data will be passed here
                    success: function(data){ 
                        sweetUnpre(data) // The data that is echoed from the ajax.php
						setTimeout(refreshThisPage,6000);
                    }
                });
				sweetUnpre("Processing...");
		}else{sweetUnpre('Unexpected error! Ensure you have selected atleast one withdrawable request');}
		});
});


$(document).ready(function(e) {
   $('button#bigpush2').click(function(){
		var selected = new Array();
		$('input[name="intrest2"]:checked').each(function() {
		selected.push(this.value);
		});
		
		if(selected!="" & selected!=0){
                $.ajax({
                    url: "code_prosessor.php", // link of your "whatever" php
                    type: "POST",
                    async: true,
                    cache: false,
                    data: {list:selected}, // all data will be passed here
                    success: function(data){ 
                        sweetUnpre(data) // The data that is echoed from the ajax.php
						setTimeout(refreshThisPage,6000);
                    }
                });
				sweetUnpre("Processing...");
		}else{sweetUnpre('Unexpected error! Ensure you have selected atleast one withdrawable request');}
		});
});



$(document).ready(function(e) {
   $('button#bigpushREF').click(function(){
		var selected = new Array();
		$('input[name="intrestREF"]:checked').each(function() {
		selected.push(this.value);
		});
		
		if(selected!="" & selected!=0){
                $.ajax({
                    url: "code_prosessor.php", // link of your "whatever" php
                    type: "POST",
                    async: true,
                    cache: false,
                    data: {listREF:selected}, // all data will be passed here
                    success: function(data){ 
                        sweetUnpre(data); // The data that is echoed from the ajax.php
						setTimeout(refreshThisPage,6000);
                    }
                });
				sweetUnpre("Processing...");
		}else{sweetUnpre('Unexpected error! Ensure you have selected atleast one withdrawable referral bonus!');}
		});
});


$(document).ready(function(e) {
   $('button#bigpushREF2').click(function(){
		var selected = new Array();
		$('input[name="intrestREF2"]:checked').each(function() {
		selected.push(this.value);
		});
		
		if(selected!="" & selected!=0){
                $.ajax({
                    url: "code_prosessor.php", // link of your "whatever" php
                    type: "POST",
                    async: true,
                    cache: false,
                    data: {listREF:selected}, // all data will be passed here
                    success: function(data){ 
                        sweetUnpre(data); // The data that is echoed from the ajax.php
						setTimeout(refreshThisPage,6000);
                    }
                });
				sweetUnpre("Processing...");
		}else{sweetUnpre('Unexpected error! Ensure you have selected atleast one withdrawable referral bonus!');}
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
		  /*<div class="row">
        <!-- Large modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Windows 8 modal - Click to View</button>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    
      <div class="modal-body">
     
      <H2>Battery Low!</H2>
      <h4>Your Laptop battery is less then 10%.Recharge the battery.</h4>
     
      </div>
    </div>
  </div>
</div>
    </div>

.modal  {
    padding-right: 0px;
    background-color: rgba(4, 4, 4, 0.8); 
    }
   
    .modal-dialog {
            top: 20%;
                width: 100%;
    position: absolute;
        }
        .modal-content {
                border-radius: 0px;
                border: none;
    top: 40%;
            }
            .modal-body {
                    background-color: #0f8845;
    color: white;
                }
				
				
				
//////////////////////////PAYSTACK
<form >
  <script src="https://js.paystack.co/v1/inline.js"></script>
  <button type="button" onclick="payWithPaystack()"> Pay </button> 
</form>
 
<script>
  function payWithPaystack(){
    var handler = PaystackPop.setup({
      key: 'pk_test_bcc15ac7150fe58bcb2553a2bc10e0a25f5a1528',
      email: 'customer@email.com',
      amount: 10000,
      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      metadata: {
         custom_fields: [
            {
                display_name: "Mobile Number",
                variable_name: "mobile_number",
                value: "+2348012345678"
            }
         ]
      },
      callback: function(response){
          alert('success. transaction ref is ' + response.reference);
      },
      onClose: function(){
          alert('window closed');
      }
    });
    handler.openIframe();
  }
</script>				
				
*/
 }
