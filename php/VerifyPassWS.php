<?php
	require_once('../lib/nusoap.php');
	require_once('../lib/class.wsdlcache.php');
	$soapclient = new nusoap_client('https://agarcia717.000webhostapp.com/htdocs/ProyectoSW/php/ClientVerifyPass.php?wsdl',true);
	$resultado = $soapclient->call('contrasena', array('x'=>$_GET['pass'],'y'=>$_GET['ticket']));
	echo $resultado;
?>