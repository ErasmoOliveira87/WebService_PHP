<?php
require_once("lib/nusoap.php");
$server = new soap_server();
$server->configureWSDL("My first Web Services WSDL ","urn:My first Web Services WSDL");
 
$server->register("hello",
	array("name" => "xsd:string"),
	array("return" => "xsd:string"),
	"urn:helloworld",
	"urn:helloworld#hello"
);

$server->register("sum",
	array("name" => "xsd:string"),
	array("return" => "xsd:string"),
	"urn:sum",
	"urn:sum#sum"
);
 
function hello($name) {
	$myname    =    "<br/> Well done, <b>" . $name . "</b>, your web services work!";
	return $myname;
}

function sum($num) {
	$r = 10 + $num;
	return "<br/> 10 + " . $num . " = " . $r;
}
 
	$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
	$server->service($HTTP_RAW_POST_DATA);
?>