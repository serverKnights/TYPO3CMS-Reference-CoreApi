.. include:: /Includes.rst.txt

.. index::
   TYPO3_CONF_VARS; BE
.. _typo3ConfVars_be:

==========================
BE - backend configuration
==========================

The following configuration variables can be used to configure settings for
the TYPO3 backend:

..  contents::
    :local:

..  note::
    The configuration values listed here are keys in the global PHP array
    :php:`$GLOBALS['TYPO3_CONF_VARS']['BE']`.

    This variable can be set in one of the following files:

    *   :ref:`config/system/settings.php <typo3ConfVars-settings>`
    *   :ref:`config/system/additional.php <typo3ConfVars-additional>`


.. index::
   TYPO3_CONF_VARS BE; fileadminDir
.. _typo3ConfVars_be_fileadminDir:

fileadminDir
============

.. confval:: $GLOBALS['TYPO3_CONF_VARS']['BE']['fileadminDir']

   :type: text
   :Default: 'fileadmin/'

   Path to the primary directory of files for editors. This is relative to
   the public web dir. DefaultStorage will be created with that configuration.
   Do not access manually but via
   :php:`\TYPO3\CMS\Core\Resource\ResourceFactory::getDefaultStorage().`


.. index::
   TYPO3_CONF_VARS BE; lockRootPath
.. _typo3ConfVars_be_lockRootPath:

lockRootPath
============

.. confval:: $GLOBALS['TYPO3_CONF_VARS']['BE']['lockRootPath']

   :type: text
   :Default: ''

   This path is used to evaluate if paths outside of the public web path should be
   allowed. Ending slash required!


.. index::
   TYPO3_CONF_VARS BE; userHomePath
.. _typo3ConfVars_be_userHomePath:

userHomePath
============

.. confval:: $GLOBALS['TYPO3_CONF_VARS']['BE']['userHomePath']

   :type: text
   :Default: ''

   Combined folder identifier of the directory where TYPO3 backend users have
   their home-dirs. A combined folder identifier looks like this:
   :php:`[storageUid]:[folderIdentifier]`. For Example :php:`2:users/`.
   A home for backend user 2 would be: :php:`2:users/2/`. Ending slash required!


.. index::
   TYPO3_CONF_VARS BE; groupHomePath
.. _typo3ConfVars_be_groupHomePath:

groupHomePath
=============

.. confval:: $GLOBALS['TYPO3_CONF_VARS']['BE']['groupHomePath']

   :type: text
   :Default: ''

   Combined folder identifier of the directory where TYPO3 backend groups have
   their home-dirs. A combined folder identifier looks like this:
   :php:`[storageUid]:[folderIdentifier]`. For example :php:`2:groups/`.
   A home for backend group 1 would be: :php:`2:groups/1/`. Ending slash required!


.. index::
   TYPO3_CONF_VARS BE; userUploadDir
.. _typo3ConfVars_be_userUploadDir:

userUploadDir
=============

.. confval:: $GLOBALS['TYPO3_CONF_VARS']['BE']['userUploadDir']

   :type: text
   :Default: ''

   Suffix to the user home dir which is what gets mounted in TYPO3. For example
   if the user dir is :file:`../123_user/`  and this value
   is :file:`/upload`  then :file:`../123_user/upload` gets mounted.

.. index::
   TYPO3_CONF_VARS BE; warning_email_addr
.. _typo3ConfVars_be_warning_email_addr:

warning_email_addr
==================

.. confval:: $GLOBALS['TYPO3_CONF_VARS']['BE']['warning_email_addr']

   :type: text
   :Default: ''

   Email address that will receive notifications whenever an attempt to
   login to the Install Tool is made. This address will also receive warnings
   whenever more than 3 failed backend login attempts (regardless of user)
   are detected within an hour.

   Have also a look into the :ref:`security guidelines
   <security-global-typo3-options-warning-email-addr>`.


.. index::
   TYPO3_CONF_VARS BE; warning_mode
.. _typo3ConfVars_be_warning_mode:

warning_mode
============

.. confval:: $GLOBALS['TYPO3_CONF_VARS']['BE']['warning_mode']

   :type: int
   :Default: 0
   :allowedValues:
      0:
         Default: Do not send notification-emails upon backend-login
      1:
         Send a notification-email every time a backend user logs in
      2:
         Send a notification-email every time an **admin** backend user logs in

   Send emails to :php:`warning_email_addr`  upon backend-login

   Have also a look into the :ref:`security guidelines
   <security-global-typo3-options-warning-mode>`.


.. index::
   TYPO3_CONF_VARS BE; passwordReset
.. _typo3ConfVars_be_passwordReset:

passwordReset
=============

.. confval:: $GLOBALS['TYPO3_CONF_VARS']['BE']['passwordReset']

   :type: bool
   :Default: true

   Enable password reset functionality on the backend login for TYPO3 Backend
   users. Can be disabled for systems where only LDAP or OAuth login is allowed.

   Password reset will then still work on CLI and for admins in the backend.

.. index::
   TYPO3_CONF_VARS BE; passwordResetForAdmins
.. _typo3ConfVars_be_passwordResetForAdmins:

passwordResetForAdmins
======================

.. confval:: $GLOBALS['TYPO3_CONF_VARS']['BE']['passwordResetForAdmins']

   :type: bool
   :Default: true

   Enable password reset functionality for TYPO3 Administrators. This will
   affect all places such as backend login or CLI. Disable this option for
   increased security.

.. index::
   TYPO3_CONF_VARS BE; requireMfa
.. _typo3ConfVars_be_requireMfa:

requireMfa
==========

.. confval:: $GLOBALS['TYPO3_CONF_VARS']['BE']['requireMfa']

   :type: int
   :Default: 0
   :allowedValues:
      0:
         Default: Do not require multi-factor authentication
      1:
         Require multi-factor authentication for all users
      2:
         Require multi-factor authentication only for non-admin users
      3:
         Require multi-factor authentication only for admin users
      4:
         Require multi-factor authentication only for system maintainers

   Define users which should be required to set up multi-factor authentication.

.. index::
   TYPO3_CONF_VARS BE; recommendedMfaProvider
.. _typo3ConfVars_be_recommendedMfaProvider:

recommendedMfaProvider
======================

.. confval:: $GLOBALS['TYPO3_CONF_VARS']['BE']['recommendedMfaProvider']

   :type: text
   :Default: 'totp'

   Set the identifier of the multi-factor authentication provider, recommended
   for all users.


.. index::
   TYPO3_CONF_VARS BE; loginRateLimit
.. _typo3ConfVars_be_loginRateLimit:

loginRateLimit
==============

.. confval:: $GLOBALS['TYPO3_CONF_VARS']['BE']['loginRateLimit']

   :type: int
   :Default: 5

   Maximum amount of login attempts for the time interval in
   :ref:`[BE][loginRateLimitInterval]<typo3ConfVars_be_loginRateLimitInterval>`,
   before further login requests will be denied. Setting this value to
   :php:`"0"` will disable login rate limiting.


.. index::
   TYPO3_CONF_VARS BE; loginRateLimitInterval
.. _typo3ConfVars_be_loginRateLimitInterval:

loginRateLimitInterval
======================

.. confval:: $GLOBALS['TYPO3_CONF_VARS']['BE']['loginRateLimitInterval']

   :type: string, PHP relative format
   :Default: '15 minutes'
   :allowedValues: '1 minute', '5 minutes', '15 minutes', '30 minutes'

   Allowed time interval for the configured rate limit. Individual values
   using
   `PHP relative formats <https://www.php.net/manual/de/datetime.formats.relative.php>`__
   can be set in :file:`config/system/additional.php`.


.. index::
   TYPO3_CONF_VARS BE; loginRateLimitIpExcludeList
.. _typo3ConfVars_be_loginRateLimitIpExcludeList:

loginRateLimitIpExcludeList
===========================

.. confval:: $GLOBALS['TYPO3_CONF_VARS']['BE']['loginRateLimitIpExcludeList']

   :type: string
   :Default: ''

   IP-numbers (with :php:`*`-wildcards) that are excluded from rate limiting.
   Syntax similar to :ref:`[BE][IPmaskList]<typo3ConfVars_be_IPmaskList>`.
   An empty value disables the exclude list check.


.. index::
   TYPO3_CONF_VARS BE; lockIP
.. _typo3ConfVars_be_lockIP:

lockIP
======

.. confval:: $GLOBALS['TYPO3_CONF_VARS']['BE']['lockIP']

   :type: int
   :Default: 0
   :allowedValues:
      0:
         Default: Do not lock Backend User sessions to their IP address at all
      1:
         Use the first part of the editors IPv4 address (for example "192.") as part of the session locking of Backend Users
      2:
         Use the first two parts of the editors IPv4 address (for example "192.168") as part of the session locking of Backend Users
      3:
         Use the first three parts of the editors IPv4 address (for example "192.168.13") as part of the session locking of Backend Users
      4:
         Use the editors full IPv4 address (for example "192.168.13.84") as part of the session locking of Backend Users (highest security)

   Session IP locking for backend users. See :ref:`[FE][lockIP]<typo3ConfVars_fe_lockIP>` for details.

   Have also a look into the :ref:`security guidelines
   <security-global-typo3-options-lockIP>`.


.. index::
   TYPO3_CONF_VARS BE; lockIPv6
.. _typo3ConfVars_be_lockIPv6:

lockIPv6
========

.. confval:: $GLOBALS['TYPO3_CONF_VARS']['BE']['lockIPv6']

   :type: int
   :Default: 0
   :allowedValues:
      0:
         Default: Do not lock Backend User sessions to their IP address at all
      1:
         Use the first block (16 bits) of the editors IPv6 address (for example "2001:") as part of the session locking of Backend Users
      2:
         Use the first two blocks (32 bits) of the editors IPv6 address (for example "2001:0db8") as part of the session locking of Backend Users
      3:
         Use the first three blocks (48 bits) of the editors IPv6 address (for example "2001:0db8:85a3") as part of the session locking of Backend Users
      4:
         Use the first four blocks (64 bits) of the editors IPv6 address (for example "2001:0db8:85a3:08d3") as part of the session locking of Backend Users
      5:
         Use the first five blocks (80 bits) of the editors IPv6 address (for example "2001:0db8:85a3:08d3:1319") as part of the session locking of Backend Users
      6:
         Use the first six blocks (96 bits) of the editors IPv6 address (for example "2001:0db8:85a3:08d3:1319:8a2e") as part of the session locking of Backend Users
      7:
         Use the first seven blocks (112 bits) of the editors IPv6 address (for example "2001:0db8:85a3:08d3:1319:8a2e:0370") as part of the session locking of Backend Users
      8:
         Use the editors full IPv6 address (for example "2001:0db8:85a3:08d3:1319:8a2e:0370:7344") as part of the session locking of Backend Users (highest security)

   Session IPv6 locking for backend users. See :ref:`[FE][lockIPv6]<typo3ConfVars_fe_lockIPv6>` for details.

.. index::
   TYPO3_CONF_VARS BE; sessionTimeout
.. _typo3ConfVars_be_sessionTimeout:

sessionTimeout
==============

.. confval:: $GLOBALS['TYPO3_CONF_VARS']['BE']['sessionTimeout']

   :type: int
   :Default: 28800

   Session time out for backend users in seconds. The value must be at least 180 to avoid side effects. Default is 28.800 seconds = 8 hours.

.. index::
   TYPO3_CONF_VARS BE; IPmaskList
.. _typo3ConfVars_be_IPmaskList:

IPmaskList
==========

.. confval:: $GLOBALS['TYPO3_CONF_VARS']['BE']['IPmaskList']

   :type: list
   :Default: ''

   Lets you define a list of IP-numbers (with \*-wildcards) that are the
   ONLY ones allowed access to ANY backend activity. On error an error header
   is sent and the script exits. Works like IP masking for users
   configurable through TSconfig.

   See syntax for that (or look up syntax for the function
   :php:`\TYPO3\CMS\Core\Utility\GeneralUtility::cmpIP())`

   Have also a look into the :ref:`security guidelines
   <security-global-typo3-options-IPmaskList>`.


.. index::
   TYPO3_CONF_VARS BE; lockSSL
.. _typo3ConfVars_be_lockSSL:

lockSSL
=======

.. confval:: $GLOBALS['TYPO3_CONF_VARS']['BE']['lockSSL']

   :type: bool
   :Default: false

   If set, the backend can only be operated from an SSL-encrypted
   connection (https). A redirect to the SSL version of a URL will happen
   when a user tries to access non-https admin-urls

   Have also a look into the :ref:`security guidelines
   <security-global-typo3-options-lockSSL>`.


.. index::
   TYPO3_CONF_VARS BE; lockSSLPort
.. _typo3ConfVars_be_lockSSLPort:

lockSSLPort
===========

.. confval:: $GLOBALS['TYPO3_CONF_VARS']['BE']['lockSSLPort']

   :type: int
   :Default: 0

   Use a non-standard HTTPS port for lockSSL. Set this value if you use
   lockSSL and the HTTPS port of your webserver is not 443.

.. index::
   TYPO3_CONF_VARS BE;
.. _typo3ConfVars_be_cookieDomain:

cookieDomain
============

.. confval:: $GLOBALS['TYPO3_CONF_VARS']['BE']['cookieDomain']

   :type: text
   :Default: ''

   Same as `$TYPO3_CONF_VARS[SYS][cookieDomain]<typo3ConfVars_sys_cookieDomain>`
   but only for BE cookies. If empty, :php:`$TYPO3_CONF_VARS[SYS][cookieDomain]`
   value will be used.

.. index::
   TYPO3_CONF_VARS BE; cookieName
.. _typo3ConfVars_be_cookieName:

cookieName
==========

.. confval:: $GLOBALS['TYPO3_CONF_VARS']['BE']['cookieName']

   :type: text
   :Default: 'be_typo_user'

   Set the name for the cookie used for the back-end user session

.. index::
   TYPO3_CONF_VARS BE; cookieSameSite
.. _typo3ConfVars_be_cookieSameSite:

cookieSameSite
==============

.. confval:: $GLOBALS['TYPO3_CONF_VARS']['BE']['cookieSameSite']

   :type: text
   :Default: 'strict'
   :allowedValues:
      lax:
         Cookies set by TYPO3 are only available for the current site,
         third-party integrations are not allowed to read cookies, except for
         links and simple HTML forms

      strict:
         Cookies sent by TYPO3 are only available for the current site, never
         shared to other third-party packages
      none:
         Allow cookies set by TYPO3 to be sent to other sites as well,
         please note - this only works with HTTPS connections

   Indicates that the cookie should send proper information where the cookie
   can be shared (first-party cookies vs. third-party cookies) in TYPO3 Backend.

.. index::
   TYPO3_CONF_VARS BE; showRefreshLoginPopup
.. _typo3ConfVars_be_showRefreshLoginPopup:

showRefreshLoginPopup
=====================

.. confval:: $GLOBALS['TYPO3_CONF_VARS']['BE']['showRefreshLoginPopup']

   :type: bool
   :Default: false

   If set, the Ajax relogin will show a real popup window for relogin after
   the count down. Some auth services need this as they add custom validation
   to the login form. If its not set, the Ajax relogin will show an inline
   relogin window.

.. index::
   TYPO3_CONF_VARS BE; adminOnly
.. _typo3ConfVars_be_adminOnly:

adminOnly
=========

.. confval:: $GLOBALS['TYPO3_CONF_VARS']['BE']['adminOnly']

   :type: int
   :Default: 0

   :allowedValues:
     -1: Total shutdown for maintenance purposes
     0: Default: All users can access the TYPO3 Backend
     1: Only administrators / system maintainers can log in, CLI interface is disabled as well
     2: Only administrators / system maintainers have access to the TYPO3 Backend, CLI executions are allowed as well

   Restricts access to the TYPO3 Backend - especially useful when doing maintenance or updates

.. index::
   TYPO3_CONF_VARS BE; disable_exec_function
.. _typo3ConfVars_be_disable_exec_function:

disable_exec_function
=====================

.. confval:: $GLOBALS['TYPO3_CONF_VARS']['BE']['disable_exec_function']

   :type: bool
   :Default: false

   Dont use exec() function (except for ImageMagick which is disabled by
   `[GFX][im]<typo3ConfVars_gfx_im>` =0). If set, all file operations are done
   by the default PHP-functions. This is necessary under Windows! On Unix the
   system commands by exec() can be used, unless this is disabled.

.. index::
   TYPO3_CONF_VARS BE; compressionLevel
.. _typo3ConfVars_be_compressionLevel:

compressionLevel
================

.. confval:: $GLOBALS['TYPO3_CONF_VARS']['BE']['compressionLevel']

   :type: text
   :Default: 0
   :Range: 0-9

   Determines output compression of BE output. Makes output smaller but slows
   down the page generation depending on the compression level. Requires

   *  zlib in your PHP installation and
   *  special rewrite rules for :file:`.css.gz` and :file:`.js.gz`
      (before version 12.0 the extension was :file:`.css.gzip` and :file:`.js.gzip`)

   Please see :file:`EXT:install/Resources/Private/FolderStructureTemplateFiles/root-htaccess`
   for an example. Range `1`-`9`, where `1` is least
   compression and `9` is greatest compression. :php:`true` as value will set the
   compression based on the PHP default settings (usually `5` ). Suggested and
   most optimal value is `5`.

.. index::
   TYPO3_CONF_VARS BE; installToolPassword
.. _typo3ConfVars_be_installToolPassword:

installToolPassword
===================

.. confval:: $GLOBALS['TYPO3_CONF_VARS']['BE']['installToolPassword']

   :type: string
   :Default: ''

   The hash of the install tool password.


.. index::
   TYPO3_CONF_VARS BE; checkStoredRecords
.. _typo3ConfVars_be_checkStoredRecords:

checkStoredRecords
==================

..  versionchanged:: 13.0
    This setting is obsolete. Instances setting this option in
    :file:`settings.php` are updated silently by the install tool during the
    upgrade process to TYPO3 v13.

.. index::
   TYPO3_CONF_VARS BE; checkStoredRecordsLoose
.. _typo3ConfVars_be_checkStoredRecordsLoose:

checkStoredRecordsLoose
=======================

..  versionchanged:: 13.0
    This setting is obsolete. Instances setting this option in
    :file:`settings.php` are updated silently by the install tool during the
    upgrade process to TYPO3 v13.


.. index::
   TYPO3_CONF_VARS BE; defaultUserTSconfig
.. _typo3ConfVars_be_defaultUserTSconfig:

defaultUserTSconfig
===================

..  deprecated:: 13.0
    This setting will be ignored with TYPO3 v14.0. Use
    :ref:`Configuration/user.tsconfig <extension-configuration-user_tsconfig>`
    instead.

.. confval:: $GLOBALS['TYPO3_CONF_VARS']['BE']['defaultUserTSconfig']

   :type: text

   Contains the default user TSconfig.


   This variable should not be changed directly but by the following API function.
   This makes your code less likely to break in the future.

   .. code-block:: php
      :caption: my_sitepackage/ext_localconf.php

      /**
       * Adding the default User TSconfig
       */
      \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig('
         @import 'EXT:my_sitepackage/Configuration/TsConfig/User/default.tsconfig'
      ');

   Read more about
   :ref:`Setting default User TSconfig <t3tsconfig:usersettingdefaultusertsconfig>`.

.. index::
   TYPO3_CONF_VARS BE; defaultPageTSconfig
.. _typo3ConfVars_be_defaultPageTSconfig:

defaultPageTSconfig
===================

..  deprecated:: 13.0
    This setting will be ignored with TYPO3 v14.0.
    Use :ref:`Configuration/page.tsconfig <extension-configuration-page_tsconfig>` instead.

.. confval:: $GLOBALS['TYPO3_CONF_VARS']['BE']['defaultPageTSconfig']

   :type: text

   Contains the default page TSconfig.

   Never set this configuration variable directly. Use the following methods instead:

   .. versionadded:: 12.0
      TSconfig stored in a file :file:`EXT:my_sitepackage/Configuration/page.tsconfig`
      will be automatically loaded before the content of
      :php:`$TYPO3_CONF_VARS[SYS][defaultPageTSconfig]`.

   Page TSconfig stored in files like
   :file:`EXT:my_sitepackage/Configuration/page.tsconfig` are loaded before
   :php:`$TYPO3_CONF_VARS[SYS][defaultPageTSconfig]`.
   This is done during build-time and therefore more performant than the legacy way of
   loading default Page Tsconfig during runtime by setting
   :php:`$TYPO3_CONF_VARS[SYS][defaultPageTSconfig]` or the API function
   :php:`ExtensionManagementUtility::addPageTSConfig`. It is therefore highly recommended
   to migrate to using files like :file:`EXT:my_sitepackage/Configuration/page.tsconfig`
   instead of setting this global variable.

   Read more about
   :ref:`Setting the Page TSconfig globally <t3tsconfig:pagesettingdefaultpagetsconfig>`.

.. index::
   TYPO3_CONF_VARS BE; defaultPermissions
.. _typo3ConfVars_be_defaultPermissions:

defaultPermissions
==================

.. confval:: $GLOBALS['TYPO3_CONF_VARS']['BE']['defaultPermissions']

   :type: array
   :Default: []

   This option defines the default page permissions (`show`, `edit`, `delete`,
   `new`, `editcontent`). The following order applies:

   -  :php:`defaultPermissions` from :php:`TYPO3\CMS\Core\DataHandling\PagePermissionAssembler`
   -  :php:`$GLOBALS['TYPO3_CONF_VARS']['BE']['defaultPermissions']` (the option described here)
   -  Page TSconfig via :ref:`TCEMAIN.permissions <t3tsconfig:pagetcemain-permissions-user-group>`

   Example (which reflects the default permissions):

   .. code-block:: php
      :caption: config/system/additional.php | typo3conf/system/additional.php

      $GLOBALS['TYPO3_CONF_VARS']['BE']['defaultPermissions'] = [
         'user' => 'show,edit,delete,new,editcontent',
         'group' => 'show,edit,new,editcontent',
         'everybody' => '',
      ];

   If you want to deviate from the default permissions, for example by changing the everybody key,
   you only need to modify the key you wish to change:

   .. code-block:: php
      :caption: config/system/additional.php | typo3conf/system/additional.php

      $GLOBALS['TYPO3_CONF_VARS']['BE']['defaultPermissions'] = [
         'everybody' => 'show',
      ];


.. index::
   TYPO3_CONF_VARS BE; defaultUC
.. _typo3ConfVars_be_defaultUC:

defaultUC
=========

.. confval:: $GLOBALS['TYPO3_CONF_VARS']['BE']['defaultUC']

   :type: array
   :Default: []

   Defines the default user settings. The following order applies:

   -  :php:`uc_default` in :php:`TYPO3\CMS\Core\Authentication\BackendUserAuthentication`
   -  :php:`$GLOBALS['TYPO3_CONF_VARS']['BE']['defaultUC']` (the option described here)
   -  User TSconfig via :ref:`setup <t3tsconfig:usersetup>`

   Example (which reflects the default user settings):

   .. code-block:: php
      :caption: config/system/additional.php | typo3conf/system/additional.php

      $GLOBALS['TYPO3_CONF_VARS']['BE']['defaultUC'] = [
         'emailMeAtLogin' => 0,
         'titleLen' => 50,
         'edit_RTE' => '1',
         'edit_docModuleUpload' => '1',
      ];

   Visit the :ref:`setup <t3tsconfig:usersetup>` chapter of the User TSconfig guide for
   a list of all available options.


.. index::
   TYPO3_CONF_VARS BE; customPermOptions
.. _typo3ConfVars_be_customPermOptions:

customPermOptions
=================

.. confval:: $GLOBALS['TYPO3_CONF_VARS']['BE']['customPermOptions']

   :type: array
   :Default: []

   Array with sets of custom permission options. Syntax is:


   .. code-block:: php
      :caption: config/system/additional.php | typo3conf/system/additional.php

      'key' => array(
         'header' => 'header string, language split',
         'items' => array(
            'key' => array('label, language split','icon reference', 'Description text, language split')
         )
      )

   Keys cannot contain characters any of the following characters: :php:`:|,`.


.. index::
   TYPO3_CONF_VARS BE; fileDenyPattern
.. _typo3ConfVars_be_fileDenyPattern:

fileDenyPattern
===============

.. confval:: $GLOBALS['TYPO3_CONF_VARS']['BE']['fileDenyPattern']

   :type: text
   :Default: ''

   A perl-compatible and JavaScript-compatible regular expression (without
   delimiters `/`) that - if it matches a filename - will deny the
   file upload/rename or whatever.

   For security reasons, files with multiple extensions have to be denied on
   an Apache environment with mod_alias, if the filename contains a valid php
   handler in an arbitrary position. Also, ".htaccess" files have to be denied.
   Matching is done case-insensitive.

   Default value is stored in class constant
   :php:`\TYPO3\CMS\Core\Resource\Security\FileNameValidator::FILE_DENY_PATTERN_DEFAULT`.

   Have also a look into the :ref:`security guidelines
   <security-global-typo3-options-fileDenyPattern>`.


.. index::
   TYPO3_CONF_VARS BE; interfaces
.. _typo3ConfVars_be_interfaces:

interfaces
==========

.. versionchanged:: 12.0
   This option was removed with TYPO3 v12.0.

If a TYPO3 project really relies on this feature, create an
:ref:`XCLASS <xclasses>` of :php:`\TYPO3\CMS\Backend\Controller\LoginController`,
where also a custom Fluid template may be used.

.. _typo3ConfVars_be_explicitADmode:

explicitADmode
==============

.. versionchanged:: 12.0
   The handling of :php:`$GLOBALS['TYPO3_CONF_VARS']['BE']['explicitADmode']` has been changed and
   is now set using :php:`explicitAllow`. Extensions should not assume this global array
   key is set anymore as of TYPO3 Core v12. Extensions that need to stay compatible with v11
   and v12 should instead use: :php:`$GLOBALS['TYPO3_CONF_VARS']['BE']['explicitADmode'] ?? 'explicitAllow'`.

.. index::
   TYPO3_CONF_VARS BE; flexformForceCDATA
.. _typo3ConfVars_be_flexformForceCDATA:

flexformForceCDATA
==================

.. versionchanged:: 13.0
   This option was removed with TYPO3 v13.0.

.. index::
   TYPO3_CONF_VARS BE; versionNumberInFilename
.. _typo3ConfVars_be_versionNumberInFilename:

versionNumberInFilename
=======================

.. confval:: $GLOBALS['TYPO3_CONF_VARS']['BE']['versionNumberInFilename']

   :type: bool
   :Default: false

      If enabled, included CSS and JS files loaded in the TYPO3 Backend will
      have the timestamp embedded in the filename, ie. :php:`filename.1269312081.js` .
      This will make browsers and proxies reload the files if they change
      (thus avoiding caching issues).

      **IMPORTANT:** This feature requires extra :file:`.htaccess` rules to
      work (please refer to the
      :file:`typo3/sysext/install/Resources/Private/FolderStructureTemplateFiles/root-htaccess`
      file shipped with TYPO3).

      If disabled the last modification date of the file will be appended as a query-string.

.. index::
   TYPO3_CONF_VARS BE; debug
.. _typo3ConfVars_be_debug:

debug
=====

.. confval:: $GLOBALS['TYPO3_CONF_VARS']['BE']['debug']

   :type: bool
   :Default: false

   If enabled, the login refresh is disabled and pageRenderer is set to debug
   mode. Furthermore the fieldname is appended to the label of fields. Use
   this to debug the backend only!


.. index::
   TYPO3_CONF_VARS BE; toolbarItems (removed)
.. _typo3ConfVars_be_toolbarItems:

toolbarItems
============

.. warning::
   This configuration variable has been removed in TYPO3 version 12.0. Setting
   it has no effect.

Starting with version 12.0 toolbar items implementing
:php:`\TYPO3\CMS\Backend\Toolbar\ToolbarItemInterface` are automatically
registered by adding the tag :yaml:`backend.toolbar.item`, if :yaml:`autoconfigure`
is enabled in :file:`Services.yaml`.

Migration
---------

Remove :php:`$GLOBALS['TYPO3_CONF_VARS']['BE']['toolbarItems']` from your
:file:`ext_localconf.php` file. If :yaml:`autoconfigure` is not enabled in
your :file:`Configuration/Services.(yaml|php)`, add the tag
:yaml:`backend.toolbar.item` to your toolbar item class.


.. index::
   TYPO3_CONF_VARS BE; HTTP
.. _typo3ConfVars_be_HTTP:

HTTP
====

.. confval:: $GLOBALS['TYPO3_CONF_VARS']['BE']['HTTP']

    :type: array

    Set HTTP headers to be sent with each backend request. Other keys than
    :php:`['Response']['Headers']` are ignored.

    The default configuration:

    ..  code-block:: php

        [
            'Response' => [
                'Headers' => [
                    'clickJackingProtection' => 'X-Frame-Options: SAMEORIGIN',
                    'strictTransportSecurity' => 'Strict-Transport-Security: max-age=31536000',
                    'avoidMimeTypeSniffing' => 'X-Content-Type-Options: nosniff',
                    'referrerPolicy' => 'Referrer-Policy: strict-origin-when-cross-origin',
                ],
            ],
        ]

    ..  versionchanged:: 12.3
        The options :php:`strictTransportSecurity`, :php:`avoidMimeTypeSniffing`
        and :php:`referrerPolicy` were added.

    ..  note::
        The `Strict-Transport-Security` is only active, if the option
        :ref:`$GLOBALS[TYPO3_CONF_VARS][BE][lockSSL] <typo3ConfVars_be_lockSSL>`
        is enabled.


.. index::
   TYPO3_CONF_VARS BE; passwordHashing className
.. _typo3ConfVars_be_passwordHashing_className:

passwordHashing
===============

className
---------

.. confval:: $GLOBALS['TYPO3_CONF_VARS']['BE']['passwordHashing']['className']

   :type: string
   :Default: :php:`\TYPO3\CMS\Core\Crypto\PasswordHashing\Argon2iPasswordHash::class`

   :allowedValues:
      :php:`\TYPO3\CMS\Core\Crypto\PasswordHashing\Argon2iPasswordHash::class`
         Good password hash mechanism. Used by default if available.
      :php:`\TYPO3\CMS\Core\Crypto\PasswordHashing\Argon2idPasswordHash::class`
         Good password hash mechanism.
      :php:`\TYPO3\CMS\Core\Crypto\PasswordHashing\BcryptPasswordHash::class`
         Good password hash mechanism.
      :php:`\TYPO3\CMS\Core\Crypto\PasswordHashing\Pbkdf2PasswordHash::class`
         Fallback hash mechanism if argon and bcrypt are not available.
      :php:`\TYPO3\CMS\Core\Crypto\PasswordHashing\PhpassPasswordHash::class`
         Fallback hash mechanism if none of the above are available.


.. index::
   TYPO3_CONF_VARS BE; passwordHashing options
.. _typo3ConfVars_be_passwordHashing_options:

options
-------

.. confval:: $GLOBALS['TYPO3_CONF_VARS']['BE']['passwordHashing']['options']

   :type: array
   :Default: []

   Special settings for specific hashes.


..  index::
    TYPO3_CONF_VARS BE; passwordPolicy
..  _typo3ConfVars_be_passwordPolicy:

passwordPolicy
==============

..  versionadded:: 12.0

..  confval:: $GLOBALS['TYPO3_CONF_VARS']['BE']['passwordPolicy']

    :type: string
    :Default: default

    Defines the :ref:`password policy <password-policies>` in backend context.


..  index::
    TYPO3_CONF_VARS BE; stylesheets
..  _typo3ConfVars_be_stylesheets:

stylesheets
===========

..  versionadded:: 12.3

..  confval:: $GLOBALS['TYPO3_CONF_VARS']['BE']['stylesheets']

    :type: string
    :Default: default

    Load additional CSS files for the TYPO3 backend interface. This setting
    can be set per site or within an extension's :file:`ext_localconf.php`.

    **Examples:**

    Add a specific stylesheet:

    ..  code-block:: php

        $GLOBALS['TYPO3_CONF_VARS']['BE']['stylesheets']['my_extension']
            = 'EXT:my_extension/Resources/Public/Css/myfile.css';

    Add all stylesheets from a folder:

    ..  code-block:: php

        $GLOBALS['TYPO3_CONF_VARS']['BE']['stylesheets']['my_extension']
            = 'EXT:my_extension/Resources/Public/Css/';


..  index::
    TYPO3_CONF_VARS BE; contentSecurityPolicyReportingUrl
..  _typo3ConfVars_be_contentSecurityPolicyReportingUrl:

contentSecurityPolicyReportingUrl
=================================

..  versionadded:: 12.3

..  confval:: $GLOBALS['TYPO3_CONF_VARS']['BE']['contentSecurityPolicyReportingUrl']

    :type: string
    :Default: ''

    Configure the reporting HTTP endpoint of
    :ref:`Content Security Policy <content-security-policy>` violations in the
    backend; if it is empty, the TYPO3 endpoint will be used.

    Example:

    ..  code-block:: php

        $GLOBALS['TYPO3_CONF_VARS']['BE']['contentSecurityPolicyReportingUrl']
            = 'https://csp-violation.example.org/';
