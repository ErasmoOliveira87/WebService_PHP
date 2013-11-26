<?php
	require_once("lib/nusoap.php");
	require_once('client.class.php');

	echo '<h1>Web Services</h1>';

	//Create web service client
	$cliente = new Client();

	//Set function name
	$functionName = 'hello';
	//Set param to send
	$param = 'MY NAME';
	//Call web service function
	$cliente->call_soap($functionName, $param);

	//Other example
	$functionName = 'sum';
	$param = 5;
	$cliente->call_soap($functionName, $param);

	unset($cliente);

?>