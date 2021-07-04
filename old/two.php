<?php  

    //Pagar um Usuario
    
    // @1
    //*************************** PEGANDO O TOKEN ******************************
    // $CLIENTID = "AeF3940k3K9ZuHYO78D_2rf1xb2uw-D-AAS1g9F7v8oJnQ_57WaNe8aJW72a2u9yAQdE7PlR1XXQzIz2";
    // $CLIENTSECRET = "ECFJMVD0TQwbWutucyQ5oad_dRyFrT3eQc9lBXOjY4cPxlby0RPelk_lOBh9_TkWSijcWNdScb3teasC";
    $PAYPAL_API_URL = "https://api.sandbox.paypal.com/";
    $ch = curl_init();

    $client= 'AeF3940k3K9ZuHYO78D_2rf1xb2uw-D-AAS1g9F7v8oJnQ_57WaNe8aJW72a2u9yAQdE7PlR1XXQzIz2';
    $secret= 'ECFJMVD0TQwbWutucyQ5oad_dRyFrT3eQc9lBXOjY4cPxlby0RPelk_lOBh9_TkWSijcWNdScb3teasC'; 

    curl_setopt($ch, CURLOPT_URL, $PAYPAL_API_URL."v1/oauth2/token");
    /*curl_setopt($ch, CURLOPT_URL, “https://api.paypal.com/v1/oauth2/token”);*/
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERPWD, $client.":".$secret);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
    $result = curl_exec($ch);

    if(empty($result))die("Error: No response.");
    else
    {
    $json = json_decode($result); 
    /*print_r($json->access_token);*/
      $accessToken=$json->access_token;
    }
    //*********************************************************



    // @2
    //*********************************************************************
    $ch = curl_init();
    //No data ir procurar aquele response do payout malta email e tal
    $amount = $_POST['amount'];
    $currency = "USD";
    $email_client = $_POST['email_client'];
    //$email_client = "payouts2342@paypal.com";
    $levantamentoref = generateRandomString(8);
    $data = '{
                "sender_batch_header":
                {
                  "email_subject": "SDK payouts test txn"
                },
                "items": [
                {
                  "recipient_type": "EMAIL",
                  "receiver": "'.$email_client.'",
                  "note": "Your '.$currency.'$ payout",
                  "sender_item_id": "'.$levantamentoref.'",
                  "amount":
                  {
                    "currency": "'.$currency.'",
                    "value": "'.$amount.'"
                  }
                }]
              }';
    curl_setopt($ch, CURLOPT_URL, $PAYPAL_API_URL."v1/payments/payouts?sync_mode=false");//Melhorado
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json","Authorization: Bearer ".$json->access_token));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    // $json = json_decode($result); 
    // $state=$json->state;
    // echo "<pre>"
    // print_r($json);
    //curl_close($ch);

    if(empty($result))die("Error: No response.");
    else
    {
        $json = json_decode($result);
     
        // $state=$json->state;
        echo "<pre>";
        print_r($json);
    }

    /*

    See above is our final API call base on access token. You can check your payment is gone success or not base on $state variable ($state=$json->state;).

    Is return “Success” string once payment is completed other wise “Fail”. If you your payment is success you can insert data in database. Hope you learn some thing new from this post.

    */


?>