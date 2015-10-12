<?php 
	require_once("lib/nusoap.php");

	$server = new soap_server;

	$server->configureWSDL('server.login','urn:server.login');
	$server->wsdl->schemaTargetNamespace = 'urn:server.login';

	$server->register( 'login', 
						array('user' => 'xsd:string',
							  'pass' => 'xsd:string'),
						array('return' => 'xsd:string'),
						'urn:server.login',
						'urn:server.login#login',
						'rpc',
						'encoded',
						'Verifica autenticação de usuário e senha'
	 );

	function login($user, $pass){

		$con = mysql_connect('localhost', 'root', '') or die (mysql_error());
		mysql_select_db('trabalhologin', $con) or die (mysql_error());
		$query = "SELECT user, pass FROM usuarios WHERE user = '$user' AND pass = '$pass'";
		$res = mysql_query($query, $con);
		if(mysql_num_rows($res))
			$retorno = "Usuário autenticado";
		else
			$retorno = "Usuário invalido";

		return $retorno;
	}

	$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';

	$server->service($HTTP_RAW_POST_DATA);
?>