<?php
require_once('cas-config.php');
require_once('CASlib/CAS.php');
phpCAS::setDebug();
phpCAS::client(SAML_VERSION_1_1,CAS_SERVER_URL,CAS_SERVER_PORT,'cas');
phpCAS::setNoCasServerValidation();
phpCAS::forceAuthentication();
phpCAS::logout();
echo "logged out";	
?>
