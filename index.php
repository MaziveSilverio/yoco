<?php  

  session_start();
  $amount = 6;
  $amountInCents = $amount * 100;

  //Iniciando as sessoes para no popup e na pagina do processamento do token
  $_SESSION['amountInCents'] = $amountInCents;

?>

<!-- Include the Yoco SDK in your web page -->
<script src="https://js.yoco.com/sdk/v1/yoco-sdk-web.js"></script>

<!-- Create a pay button that will open the popup-->
<br><br>
<center>
  <button id="checkout-button">Pagar pelo cartao</button>
</center>


<script>
  var yoco = new window.YocoSDK({
    publicKey: 'pk_test_ead42561N5bZOOZe9da4',
  });
  var checkoutButton = document.querySelector('#checkout-button');
  checkoutButton.addEventListener('click', function () {
    yoco.showPopup({
      amountInCents: <?php echo $amountInCents; ?>,
      currency: 'ZAR',
      name: 'Transferer to 85 5400000',
      description: 'Awesome description',
      callback: function (result) {
        // This function returns a token that your server can use to capture a payment
        if (result.error) 
        {
          const errorMessage = result.error.message;
          alert("error occured: " + errorMessage);
        } else 
        {
          window.location = "payment.php?&id="+result.id;
          // alert("card successfully tokenised: " + result.id);
        }
        // In a real integration - you would now pass this chargeToken back to your
        // server along with the order/basket that the customer has purchased.
      }
    })
  });
</script>