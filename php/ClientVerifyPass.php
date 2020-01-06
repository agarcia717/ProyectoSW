<?php
require_once('../lib/nusoap.php');
require_once('../lib/class.wsdlcache.php');
$ns="http://localhost";
$server = new soap_server;
$server->configureWSDL('contrasena',$ns);
$server->wsdl->schemaTargetNamespace=$ns;
$server->register('contrasena',array('x'=>'xsd:string','y'=>'xsd:int'),array('z'=>'xsd:string'),$ns);
function contrasena ($x,$y){
	$passwords = fopen("../txt/toppasswords.txt", "r");
	$valido = true;
	if($y == 1010){
		while(!feof($passwords)){
			if(strcmp($x, str_replace(array("\r", "\n"), '', fgets($passwords))) == 0) {
				$valido = false;
				break;
            }
            
		}
		fclose($passwords);
		if($valido){
			return "VALIDA";
		}else{
			return "INVALIDA";
		}
	}else{
		return "SIN SERVICIO";
	}
}
if ( !isset( $HTTP_RAW_POST_DATA ) ) $HTTP_RAW_POST_DATA =file_get_contents( 'php://input' );
$server->service($HTTP_RAW_POST_DATA);
?>