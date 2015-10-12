<?php 
	require_once('lib/nusoap.php');

	$wsdl = 'http://localhost/soapphp/server.php?wsdl';
	$client = new nusoap_client($wsdl, true);

	$result = $client->call('login', array($_POST['user'],$_POST['pass']));

	if($result->fault)
		echo 'Falha: <pre>'.$result->fault.'</pre>';
	else{
		$erro = $client->getError();
		if($erro){
			$retorno = 'Erro: <pre>'.$erro.'</pre>';
		}else{
			$retorno = $result;
		}
	}

	header("Location: index.php?msg=".$retorno)

?>