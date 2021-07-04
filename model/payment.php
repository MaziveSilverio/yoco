<?php

include_once "bd.php";
include_once "controller/variaveis.php";

try 
{
	
	$q3 = "INSERT INTO tbyocopayment(status, token, idpayment, data, chargeId, amountInCents, resultado)
              values(:status, :token, :idpayment, :datanow, :chargeId, :amountInCents, :resultado)";
	$stmt3 = $conn->prepare($q3);
	$stmt3->execute(array(
		':datanow' => $datanow,
		':token' => $token,
		':idpayment' => $idpayment,
		':chargeId' => $chargeId,
		':amountInCents' => $amountInCents,
		':resultado' => $resultado,
		':status' => $status
	));
	if ($stmt3->rowCount() > 0)
	{
		$info = "<script>alert('Pagamento efectuado com sucesso!')</script>";
		echo $info;
	}
 
} 
catch(PDOException $e) 
{
	echo 'Error: ' . $e->getMessage();
}

?>