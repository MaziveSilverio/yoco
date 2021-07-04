<?php  

if (isset($_GET['id'])) 
{
	$token = $_GET['id'];

	//*********************** CODIGO DE TESTE ***********************
	//**Codigo levado do site para mostrar os detalhes da transacao**
	//***************************************************************

	// values extracted from request
	$data = [
	    'token' => $token, // Your token for this transaction here
	    'amountInCents' => 2799, // payment in cents amount here
	    'currency' => 'ZAR' // currency here
	];

	// Anonymous test key. Replace with your key.
	$secret_key = 'sk_test_32227198YB5LAALe6754d9ea8943';

	// Initialise the curl handle
	$ch = curl_init();

	// Setup curl
	curl_setopt($ch, CURLOPT_URL,"https://online.yoco.com/v1/charges/");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POST, true);

	// Specify the secret key using the CURLOPT_USERPWD option
	curl_setopt($ch, CURLOPT_USERPWD, $secret_key . ":");

	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

	// send to yoco
	$result = curl_exec($ch);
	//Log::debug(curl_getinfo($ch, CURLINFO_HTTP_CODE));

	// close the connection
	curl_close($ch);

	// convert response to a usable object
	$response = json_decode($result);

	echo "<pre>";
	print_r($response);
	//print_r($response->status);

	//***************************************************************

}
else
{
	header("location: index.html");
}


?>