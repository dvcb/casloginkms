ABOUT

This code provides CAS integration for Kaltura MediaSpace ("KMS") via the MediaSpace "SSO Gateway".

KMS SSO Gateway information can be found here:  http://knowledge.kaltura.com/kaltura-mediaspace-sso-integration-guide  



INSTALLATION


1) Move the caslogin folder to a location on your webserver.  Make note of the full URL to the login.php and logout.php pages as they are needed in step 3.  

Example: https://[SERVER.EDU]/caslogin/login.php
         https://[SERVER.EDU]/caslogin/logout.php


2) In caslogin/cas-config.php, edit values according to your environment.  The MEDIA_SPACE_URL, MEDIA_SPACE_SSO_SECRET, and CAS_SERVER_URL must be changed.  The remaining values can be left as-is for initial testing, then changed later as needed.  


3) Edit Kaltura MediaSpace settings:

In the MediaSpace Admin page, on the Auth tab:

  set authNAdapter to: "Kms_Auth_AuthN_Sso"  (or on KMS v4 "SSO Gateway AuthN")
  set authZAdapter to: "Kms_Auth_AuthZ_Sso"  (or on KMS v4 "SSO Gateway AuthN")

In the sso section:

  set secret to:  [MEDIA_SPACE_SSO_SECRET value in caslogin/cas-config.php]
  set loginUrl to: [full URL to caslogin/login.php]
  set logoutUrl to: [full URL to caslogin/logout.php]

Save settings


Now when someone attempts to login to MediaSpace, they should be redirected to your CAS server for authentication.  


TROUBLESHOOTING

Note that the CAS protocol requires precise timing among the three systems (CAS, web server, and Kaltura).  Please make sure that your CAS server and the web server which hosts this code are configured with accurate date/time settings.



NOTES

Kaltura has recently released a SAML2.0 integration.  We will likely migrate to this in the near future.  Let us know if you are interested in migrating as well.  We'll be happy to share our experience with anyone interested.

Please let me know if you run into any issues.  I would love to hear feedback on how this can be improved.

dave.adams@utah.edu



CHANGELOG


2014-01-14
 - Updated CASlib to version 1.3.2 https://wiki.jasig.org/display/CASC/phpCAS


2013-11-14
 - Added support for redirecting user to a specific MediaSpace URL by reference
 - Added support for mapping CAS attributes to MediaSpace extraUserInfo


2012-09-12
 - Original release, tested on MediaSpace 2.x-4.x


