<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
  <script src="<?php echo base_path(); ?>sites/all/themes/waterways/assets/js/validation.js"></script>
        <script src="<?php echo base_path(); ?>sites/all/themes/waterways/assets/js/script.js"></script>

<script>
    $(function() {
     
            $("#deliverydate").datepicker();
        $(".next-form").on("click",function(){
          
            var form=$(this).parent().find("form");
            var formId=form.attr("id");
            if(form.valid()){
                  $("#purchaseForm fieldset").hide();
                var nextForm=$(this).parent().next();
                $("#review-details").html();
                var index=nextForm.index();
          
                if(index==3){
//            $("#"+formId+" input").attr("readOnly")="readOnly";
                 
                    $("#review-details").html("");
                    $("#purchaseForm fieldset").eq(0).find("form").clone().appendTo("#review-details");
                    $("#purchaseForm fieldset").eq(2).find("form").clone().appendTo("#review-details");
                    
                }
                nextForm.show();
            
                $(".purchase-steps li").removeClass("active");
                $(".purchase-steps li").eq(index).addClass("active");
            }else{
                $("#"+formId+" input").each(function(i, inputitem) {
                    var attr = $(this).attr('required');

                    if (attr && $(this).val() == "") {
                        $(this).addClass("error");
                    }
                });
                $("input.error").each(function(i, inputitem) {
                    if (i == 0)
                    {
                        $('input[name="' + this.name + '"]').focus();
                    }
                });
            }
//            
//           
        });
  
        $(".prev-form").click(function(){
            $("#review-details").html();
            $("#purchaseForm fieldset").hide();
            var prevForm=$(this).parent().prev();
            var index=prevForm.index();
            if(index==3){
               $("#review-details").html("");
                $("#purchaseForm fieldset").eq(0).find("form").clone().appendTo("#review-details");
                $("#purchaseForm fieldset").eq(2).find("form").clone().appendTo("#review-details");
            }
            prevForm.show();
            
            $(".purchase-steps li").removeClass("active");
            $(".purchase-steps li").eq(index).addClass("active");
        });
        $(".purchase-steps li").click(function(){
            $(".purchase-steps li").removeClass("active");
            $(this).addClass("active");
            var newIndex = $(this).index();
            $("#review-details").html();
            $("#purchaseForm fieldset").hide();
            if(newIndex==3){
               $("#review-details").html("");
                $("#purchaseForm fieldset").eq(0).find("form").clone().appendTo("#review-details");
                $("#purchaseForm fieldset").eq(2).find("form").clone().appendTo("#review-details");
                  }
            $("#purchaseForm fieldset").eq(newIndex).show();
            
            
        });
        
        
        //laxmi
        
        $("#giftcard_balance_checker").click(function(){
            var url = Drupal.settings.basePath + 'balancechecker';
            
            
            var cardId=$("#giftcardid").val();
            var entryType="K";
    
    
          var params='giftcardid='+cardId+'&entryType='+entryType+'&callmethod=Inquiry';
          $.ajax({
                            type: "POST",
                            cache: false,
                            async: true,
                            url: url,
                            data: params,
                            dataType: "json",
                            beforeSend: function() {
                              $("#transparentLoader").show();
                            },
                            error: function(request, error) {
                                //error codes replaces here
                            },
                            success: function(response, status, req) {
                      console.log(response);
                      if(response.code==200)
                        {
                      console.log(response.results);
                      console.log(response.results.valueCode);
                      console.log(response.results.amount);
                      var cardbalancehtml='<h4> Card Balance : $'+response.results.amount+'</h4>';
                      $("#giftcardBalancehtml").html(cardbalancehtml);
                        }
                       else
                        {
                   var cardbalancehtml='<h4>'+response.message+'</h4>';
                      $("#giftcardBalancehtml").html(cardbalancehtml);
                        }
                        
                              
                            },
                            complete: function() {
                            $("#transparentLoader").hide();
                             
                            }
                        });
        });
        
        
        /**
        * code implementation for 
        * form data submission for gift ISSUANCE
        * Getting the form data 
        * 
        * 
        * 
        * 
         */
        $("#finishOrder").click(function(){
           
                
                
        console.log("pregiftamt"+$("#pregiftcardAmount").val());
        console.log("customgiftcardAmount"+$("#customgiftcardAmount").val());
        console.log("RecipientEmail"+$("#RecipientEmail").val());
        console.log("yourName"+$("#yourName").val());
        console.log("customerMessage"+$("#customerMessage").val());
        console.log("giftCardqty"+$("#giftCardqty").val());
        
        console.log("deliverydate"+$("#deliverydate").val());
        console.log("giftCardpromo"+$("#giftCardpromo").val());
        console.log("customerFirstName"+$("#customerFirstName").val());
        console.log("customerLastName"+$("#customerLastName").val());
        console.log("customerAddress"+$("#customerAddress").val());
        console.log("customersecondaryAddress"+$("#customersecondaryAddress").val());
        
        
        console.log("customerCity"+$("#customerCity").val());
        console.log("customerState"+$("#customerState").val());
        console.log("customerZipcode"+$("#customerZipcode").val());
        console.log("customerPhone"+$("#customerPhone").val());
        console.log("customerEmail"+$("#customerEmail").val());
        console.log("customerConfirmemail"+$("#customerConfirmemail").val());
        console.log("cardNumber"+$("#cardNumber").val());
        console.log("cardcvv"+$("#cardcvv").val());
        
        console.log("cardExpMonth"+$("#cardExpMonth").val());
        console.log("cardExpYear"+$("#cardExpYear").val());
        console.log("knownby"+$("#knownby").val());
        
        
        
      
        
        
         var pregiftamt=$("#pregiftcardAmount").val();
        var customgiftcardAmount=$("#customgiftcardAmount").val();
       var RecipientEmail=$("#RecipientEmail").val();
       var yourName=$("#yourName").val();
        var customerMessage=$("#customerMessage").val();
        var giftCardqty=$("#giftCardqty").val();
        
        var deliverydate=$("#deliverydate").val();
       var giftCardpromo=$("#giftCardpromo").val();
        var customerFirstName=$("#customerFirstName").val();
       var customerLastName=$("#customerLastName").val();
       var customerAddress=$("#customerAddress").val();
       var customersecondaryAddress=$("#customersecondaryAddress").val();
        
        
       var customerCity=$("#customerCity").val();
        var customerState=$("#customerState").val();
        var customerZipcode=$("#customerZipcode").val();
        var customerPhone=$("#customerPhone").val();
        var customerEmail=$("#customerEmail").val();
       var customerConfirmemail=$("#customerConfirmemail").val();
      var cardNumber=$("#cardNumber").val();
      var cardcvv=$("#cardcvv").val();
        
       var cardExpMonth=$("#cardExpMonth").val();
       var cardExpYear=$("#cardExpYear").val();
       var knownby=$("#knownby").val();
       
       
       
         var params='pregiftcardAmount='+pregiftamt+
'&customgiftcardAmount='+customgiftcardAmount+
'&RecipientEmail='+RecipientEmail+
'&yourName='+yourName+
'&customerMessage='+customerMessage+
'&giftCardqty='+giftCardqty+
'&deliverydate='+deliverydate+
'&giftCardpromo='+giftCardpromo+
'&customerFirstName='+customerFirstName+
'&customerLastName='+customerLastName+
'&customerAddress='+customerAddress+
'&customersecondaryAddress='+customersecondaryAddress+
'&customerCity='+customerCity+
'&customerState='+customerState+
'&customerZipcode='+customerZipcode+
'&customerPhone='+customerPhone+
'&customerEmail='+customerEmail+
'&customerConfirmemail='+customerConfirmemail+
'&cardNumber='+cardNumber+
'&cardcvv='+cardcvv+
'&cardExpMonth='+cardExpMonth+
'&cardExpYear='+cardExpYear+
'&knownby='+knownby;
        
        
        
        //ajax submission for giftissuance
         var url = Drupal.settings.basePath + 'giftissuance';
        $.ajax({
                            type: "POST",
                            cache: false,
                            async: true,
                            url: url,
                            data: params,
                            dataType: "json",
                            beforeSend: function() {
                              $("#transparentLoader").show();
                            },
                            error: function(request, error) {
                                //error codes replaces here
                            },
                            success: function(response, status, req) {
                      console.log(response);  
                      /**
                       * 
                       * @returns 
                       * {"code":200,
                       * "message":"sucess",
                       * "results":{
                       * "requestId":"24",
                       * "status":"A",
                       * "transactionId":"2782079",
                       * "approvalCode":"934340",
                       * "valueCode":"USD",
                       * "amount":"275.00",
                       * "difference":"5.00",
                       * "customerType":"1",
                       * "firstName":"Testgift",
                       * "middleName":"Testgift",
                       * "lastName":"Testgift",
                       * "address1":"Anchorpoint 14 street",
                       * "city":"Anchorpoint",
                       * "state":"Alaska",
                       * "postal":"99556",
                       * "country":"US",
                       * "mailPref":"I",
                       * "phone":"206-223-2060",
                       * "isMobile":"N",
                       * "phonePref":"I",
                       * "email":"abc@an.com",
                       * "emailPref":"I",
                       * "gender":"M"}}
                       * 
                       * 
                       * 
                       */
                      if(response.code==200)
                        {
                          
                          
                          var ordersucesshtm='<span>Gift Card:$'+response.results.amount+'<span>';
                          ordersucesshtm+='<br/>';
                            ordersucesshtm+='<span>To:'+response.results.email+'<span>';
                            ordersucesshtm+='<br/>';
                            ordersucesshtm+='<span>Delivery Date:04/12/13<span>';
                            ordersucesshtm+='<br/>';
                             ordersucesshtm+='<div>From:'+yourName+'<br/>Photo booth intelligentsia gastropub, iphone delectus sunt seitan deserunt!</div>';
                          $("#ordersucessmessage").html(ordersucesshtm);
                          
                          $(".purchase-steps li").removeClass("active");
           
             $("#purchaseForm fieldset").hide();
                          
             $("#purchaseForm fieldset").eq(4).show();
             $(".purchase-steps li").eq(4).addClass("active");
                        }
                        else
                          {
                            alert(response.message);
                          }
                      
                      
                            },
                            complete: function() {
                              $("#transparentLoader").hide();
                            }
                        });
                        });
        //end of ajax submission
        
        //laxmi
	
    });

</script>




<div class="container">
    <div class="connectMain">
        <!--connect title and sub menu start here--> 
        <div class="row-fluid">
            <div class="span12">
                <div class="connectTitle"> CONNECT </div>

                <div class="subMenu responsiveWeb">
                    <ul>
                        <?php print $menu; ?>
                    </ul>
                </div>

                <div class="subMenu responsiveMobile">

                    <select>
                        <?php print $mobilemenu; ?>
                    </select>


                </div>
            </div>
        </div>
        <!--connect title and sub menu end here--> 

        <div class="row-fluid check-balance">
            <div class="span12"> 
                <h3 class="field-title">Check Balance</h3>
                <div>If you already have a Gift Card you can check its current balance below.</div>
                <br>
                <div class="span7">
                    <input type="text" name="giftcardid" id="giftcardid" class="span12"/></div>
                <div id="giftcard_balance_checker" class="booknow span2"><div  class="booknow-inner">Apply</div></div>
                <div id="giftcardBalancehtml" class="balance-info"></div>

            </div>
        </div>
        <div class="row-fluid">
            <div class="span12"> 
                <h3 class="field-title">Purchase a Gift Card</h3>
                <ul class="purchase-steps">
                    <li class="active">1</li>
                    <li>2</li> 
                    <li>3</li> 
                    <li>4</li>
                    <li>5</li>
                </ul>
            </div>
        </div>
        <div class="row-fluid purchase-form">
            <div class="span12" > 
                <div id="purchaseForm">
                    <fieldset>
                        <h3>1. Enter gift card details</h3>
                        <hr>
                        <form id="giftcardForm">
                            <div class="row-fluid">
                                <div class="span3">
                                    <label>Amount</label>
                                    <select class="span12" id="pregiftcardAmount" name="pregiftcardAmount">
                                        <option value="">Set my own </option>
                                        <option value="5">$5</option> 
                                        <option value="30">$30</option>
                                        <option value="40">$40</option>
                                    </select>
                                </div> 
                                <div class="span3 amount-field">
                                    <input type="text" value="$" 
                                           name="customgiftcardAmount" id="customgiftcardAmount"
                                           class="span12" required/>
                                </div> 
                            </div> 
                            <div class="row-fluid">
                                <div class="span9">
                                    <input type="email" placeholder="Recipient Email" 
                                           class="span12" 
                                           name="RecipientEmail" id="RecipientEmail" required/>
                                </div> 
                            </div> 
                            <div class="row-fluid">
                                <div class="span9">
                                    <input type="text" class="span12" 
                                           placeholder="Your Name" 
                                           name="yourName" id="yourName" required/>
                                </div> 
                            </div> 
                            <div class="row-fluid">
                                <div class="span12">
                                    <textarea placeholder="Message" 
                                              class="span12" name="customerMessage" 
                                              id="customerMessage" required>
                                    </textarea>
                                </div> 
                            </div> 
                            <div class="row-fluid">
                                <div class="span3">
                                    <label>Quantity</label>
                                    <select class="span12" name="giftCardqty" id="giftCardqty" required>
                                        <option value="1">1</option>
                                        <option value="2">2</option> 
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                                <div class="span3">
                                    
                                       <div id="gcDate" class="input-append date">
                                                <label>Delivery Date</label>
                                                <input data-format="dd/MM/yyyy" 
                                                       type="text" id="deliverydate" 
                                                       required name="deliverydate"/>
                                                <span class="add-on">
                                                    <i class="icon-calendar"></i>
                                                </span>
                                            </div>
                                </div> 
                            </div> 
                            <div class="row-fluid">
                                <div class="span9">
                                    <input type="text" 
                                           placeholder="Promotion Code if applicable"
                                           class="span12" name="giftCardpromo" id="giftCardpromo"/>
                                </div> 
                            </div> 

                        </form>
                        <div class="booknow span2 submit-btn next-form">
                          <div class="booknow-inner">Submit</div></div>

                    </fieldset> 



                    <fieldset>
                        <h3> 2. Enter Mailing Address Details </h3>
                        <hr>
                        <form id="addressForm">
                            <div class="row-fluid">
                                <div class="span6">
                                    <input type="text" 
                                           placeholder="*First Name" 
                                           name="customerFirstName" id="customerFirstName" required/>

                                </div>
                                <div class="span6">
                                    <input type="text" placeholder="*Last Name" 
                                           name="customerLastName" id="customerLastName" required/>
                                </div>
                            </div><!-- row-fluid end -->
                            <div class="row-fluid">
                                <div class="span6">
                                    <input type="text" placeholder="*Address" 
                                           name="customerAddress" id="customerAddress" required/>

                                </div>

                            </div><!-- row-fluid end -->
                            <div class="row-fluid">
                                <div class="span6">
                                    <input type="text" name="customersecondaryAddress" 
                                           id="customersecondaryAddress" />
                                </div>

                            </div><!-- row-fluid end -->
                            <div class="row-fluid">
                                <div class="span6">
                                    <input type="text" placeholder="*City" 
                                           name="customerCity" id="customerCity" required/>

                                </div>
                                <div class="span3">
                                    <select name="customerState" id="customerState" class="span12" required>
                                        <option value="">*State</option>
                                        <option value="Alabama">Alabama</option>
                                        <option value="Alaska">Alaska</option>
                                        <option value="Arizona">Arizona</option>
                                    </select>
                                </div>
                                <div class="span3">
                                    <input type="text" placeholder="*Zipcode" 
                                           class="span12" name="customerZipcode" 
                                           id="customerZipcode" required/>

                                </div>
                            </div>

                            <div class="row-fluid">
                                <div class="span6">
                                    <input type="text" placeholder="*Phone Number" 
                                           id="customerPhone" name="customerPhone" required/>
                                    <label class="input-medium">
                                        <small>(555) 555-5555</small>
                                    </label>
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="span6">
                                    <input type="text" placeholder="*Email" 
                                           name="customerEmail" id="customerEmail" required/>

                                </div>
                                <div class="span6">
                                    <input type="text" placeholder="*Confirm Email" 
                                           name="customerConfirmemail" 
                                           id="customerConfirmemail" required/>
                                </div>
                            </div><!-- row-fluid end -->
                        </form>

                        <div class="booknow span2 form-btns prev-form"><div class="booknow-inner">Back</div></div>
                        <div class="booknow span3 form-btns next-form"><div class="booknow-inner">Save & Continue</div></div>

                    </fieldset> 

                    <fieldset>
                        <h3>3. Card Details</h3>
                        <hr>
                        <form id="creditCardForm">
                            <div class="row-fluid">
                                <div class="span6">
                                    <select class="span12" name="creditCardType"
                                            id="creditCardType">
                                        <option value="">Card type</option>
                                        <option value="visa">visa</option> 
                                    </select>
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="span6">
                                    <input type="text" 
                                           name="cardNumber" 
                                           id="cardNumber"
                                           placeholder="cardNumber"
                                           class="span12"/>
                                </div>


                                <div class="span6">
                                    <input type="text" placeholder="CID" 
                                           name="cardcvv" id="cardcvv" class="span12"/>
                                </div>  </div>
                            <div class="row-fluid">
                                <div class="span3">

                                    <select class="span12" name="cardExpMonth" id="cardExpMonth">
                                        <option value="">Month</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option> 
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div> 
                                <div class="span3">
                                    <select class="span12" name="cardExpYear" id="cardExpYear">
                                        <option value="">Year</option>
                                        <option value="2013">2013</option>
                                        <option value="2014">2014</option> 
                                        <option value="2015">2015</option>
                                        <option value="2016">2016</option>
                                    </select>
                                </div> 
<!--                                <div class="span6">
                                    <label> <input type="checkbox"/> Make this my default Credit Card
                                    </label>
                                </div> -->
                            </div> 
                            <div class="row-fluid">
                                <div class="span6">
                                    <select class="span12" name="knownby" id="knownby">
                                        <option value="">How Do you Hear us?</option>
                                        <option value="web">Web</option>
                                        <option value="NewsPaper">NewsPaper</option>
                                    </select>
                                </div>   </div>    
                            <div class="row-fluid">
                                <div class="span12">   
                                    <label> <input type="checkbox"/> I would like to recieve Waterways special promotions and discounts by email
                                    </label>
                                </div>   </div>  

                        </form>
                        <div class="booknow span2 form-btns prev-form"><div class="booknow-inner">Back</div></div>
                        <div class="booknow span3 form-btns next-form"><div class="booknow-inner">Save & Continue</div></div>

                    </fieldset> 

                    <fieldset class="creditcard-fieldset">
                        <h3>4. Review Details</h3>
                        <div id="review-details">

                        </div>
                        <div class="booknow span2 form-btns prev-form"><div class="booknow-inner">Back</div></div>
                        <div class="booknow span3"><div class="booknow-inner" id="finishOrder">Finish Order</div></div>
                    </fieldset> 


                    <fieldset>
                        <h3>5. Confirmation</h3>
                        <hr>
                        <form>
                            <div>Thankyou for cruising with Waterways!</div>
                            <div>Your order #T216682521</div>
                            <div>Order Summary</div>
                            <div id="ordersucessmessage">
                            
                            </div>
                        </form>
                    </fieldset> 
                </div>
            </div>
        </div> 

    </div>
    <!-- row-fluid end -->
