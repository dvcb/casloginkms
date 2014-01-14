<?php

// Change this to the url of your MediaSpace instance
define('MEDIA_SPACE_URL', 'http://[MEDIASPACE.SERVER.EDU]');


// This needs to match the "SSOAuth_secret" setting in MediaSpace's configuration
// (if "SSOAuth_secret" is set to "default", this needs to be your "admin secret"
// which you can find here: http://www.kaltura.com/index.php/kmc/kmc3#Settings|Integration%20Settings)
define('MEDIA_SPACE_SSO_SECRET', 'supersecret');


// URL of CAS server
define('CAS_SERVER_URL', '[CAS.SERVER.EDU]');


// Use 443 if your CAS server uses HTTPS/SSL, otherwise use 80
define('CAS_SERVER_PORT', 443);


// All authenticated CAS users receive the following MediaSpace role by default
// MediaSpace has the following roles "out of the box": 'viewerRole','privateOnlyRole','adminRole','unmoderatedAdminRole'
// Roles for different users can be overridden in several ways, such as LDAP lookup, CAS attributes, hardcoded in a PHP array, etc.
define('CAS_DEFAULT_ROLE', 'privateOnlyRole');


// If your CAS server releases user attributes, enter those field names next to the KMS attributes below.
// The values in those CAS attribute fields will then be populated in the MediaSpace user account.
// http://knowledge.kaltura.com/kaltura-mediaspace-5-release-notes-and-changelog#Sep29
// http://knowledge.kaltura.com/kaltura-mediaspace-sso-integration-guide
// NOTE: In KMS Admin > Configuration Management > Auth, set the following to true
// if you want KMS user attributes and roles to be updated the next time a user logs in:
//    refreshDetailsOnLogin
//    refreshRoleOnLogin
$cas_attribute_first_name = ''; // e.g. firstName
$cas_attribute_last_name = '';  // e.g. lastName
$cas_attribute_email = '';  // e.g. emailAddress


// Easy way to override MediaSpace roles for a few specific CAS users
$default_role_override = array(
	// 'cas_user_id1' => 'role',
	// 'cas_user_id2' => 'unmoderatedAdminRole',
);


?>
