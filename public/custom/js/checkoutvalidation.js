'use strict'; 
$(document).ready(function (){
 

  $("#checkout-form").on('submit',function(){
       $('#checkout_btn_submit').prop("disabled",true);
    }) ;
  $("#checkout-form").validate({
        rules: {
            address_name: {
                required : true
            },
            address_email:{
                required : true,
            },
            address_phone: {
                required: true
            },
            address_country :{
                required : true
            },
            address_state : {
                required : true
            },
            address_city : {
                required : true
            },
            address_address : {
                required : true
            },
            address_zip_code : {
                required : true
            },
            shipping_option : {
                required : true
            }
        },
        messages: {
            address_name: { required : "The name field is required"},
            address_email: {
                required: "The email field is required",
            },address_phone: {
                required: "The mobile field is required",
            },address_country: {
                required: "The country field is required.",
            },address_state: {
                required: "The state field is required.",
            },address_city: {
                required: "The city field is required.",
            },address_address: {
                required: "The address field is required.",
            },address_zip_code: {
                required: "The zip code field is required.",
            },
        },
    }); 
}); 