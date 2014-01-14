<?php
require_once('cas-config.php');
require_once('CASlib/CAS.php');

phpCAS::setDebug();
// initialize phpCAS
phpCAS::client(CAS_VERSION_2_0,CAS_SERVER_URL,CAS_SERVER_PORT,'cas');
// no SSL validation for the CAS server
phpCAS::setNoCasServerValidation();
// force CAS authentication
phpCAS::forceAuthentication();

// At this point, CAS has authenticated the user.  
// Start 
require_once('CASlib/KMSSessionKey.class.php');

// 
if(array_key_exists(phpCAS::getUser(), $default_role_override))
   $cas_user_role = $default_role_override[phpCAS::getUser()];
else
   $cas_user_role = CAS_DEFAULT_ROLE;


if (phpCAS::getUser() && isset($cas_user_role)) {

	// generate SSO login hash
	$hash = KMSSessionKey::createSessionKey(phpCAS::getUser(), $cas_user_role, 
                MEDIA_SPACE_SSO_SECRET, $expiry = 5, $extraUserInfo = array());

	// build mediaSpace SSO login URL
	$url = MEDIA_SPACE_URL . '/user/authenticate/sessionKey/' . $hash;

    // If a user was given a direct link to a MediaSpace
    // the 'ref' URL parameter will get them back to that entry after successful authentication
    // See "Retaining User Context"  http://knowledge.kaltura.com/kaltura-mediaspace-sso-integration-guide
    if(!empty($_GET['ref']))
        $url .= '?ref=' . $_GET['ref'];

	// redirect
	header("Location: $url");
	exit();
}
else {
	echo "CAS user or role not present. CAS authentication failed.";
}
?>
