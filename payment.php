<?php  

session_start();

$amountInCentsPay = $_SESSION['amountInCents'];

if (isset($_GET['id'])) 
{
	$token = $_GET['id'];

	//*********************** CODIGO DE TESTE ***********************
	//**Codigo levado do site para mostrar os detalhes da transacao**
	//***************************************************************

	// values extracted from request
	$data = [
	    'token' => $token, // Your token for this transaction here
	    'amountInCents' => $amountInCentsPay, // payment in cents amount here
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
	curl_setopt($ch, CURLOPT_USERPWD, $secret_key . ":");
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
	$result = curl_exec($ch);
	curl_close($ch);

	// convert response to a usable object
	$response = json_decode($result);


	//Pegando as variaveis do pagamento
	$status = $response->status;
	$idpayment = $response->id;
	$chargeId = $response->chargeId;
	$amountInCents = $response->amountInCents;
	$resultado = $response->object;//Ver se recarregou ou nao

	
	//Caso a transacao tenha sido efectuada com sucesso
	if ($status == "successful") 
	{
		include_once "model/payment.php";	
	}
	else
	{
		header("location: index.php");
		// $info = "<script>alert('Erro durante o pagamento!')</script>";
		// echo $info;
	}

	//Imprimindo os resultados
	echo "<pre>";
	print_r($response);

	//***************************************************************

}
else
{
	header("location: index.php");
}

?>