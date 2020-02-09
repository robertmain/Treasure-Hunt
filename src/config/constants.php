<?php

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') or define('SHOW_DEBUG_BACKTRACE', ENVIRONMENT == 'development');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE') or define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') or define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE') or define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE') or define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')
    or define('FOPEN_READ', 'rb');

defined('FOPEN_READ_WRITE')
    or define('FOPEN_READ_WRITE', 'r+b');

// truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')
    or define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb');

// truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')
    or define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b');

defined('FOPEN_WRITE_CREATE')
    or define('FOPEN_WRITE_CREATE', 'ab');

defined('FOPEN_READ_WRITE_CREATE')
    or define('FOPEN_READ_WRITE_CREATE', 'a+b');

defined('FOPEN_WRITE_CREATE_STRICT')
    or define('FOPEN_WRITE_CREATE_STRICT', 'xb');

defined('FOPEN_READ_WRITE_CREATE_STRICT')
    or define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');


/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')
    or define('EXIT_SUCCESS', 0);

defined('EXIT_ERROR')
    or define('EXIT_ERROR', 1);

defined('EXIT_CONFIG')
    or define('EXIT_CONFIG', 3);

defined('EXIT_UNKNOWN_FILE')
    or define('EXIT_UNKNOWN_FILE', 4);

defined('EXIT_UNKNOWN_CLASS')
    or define('EXIT_UNKNOWN_CLASS', 5);

defined('EXIT_UNKNOWN_METHOD')
    or define('EXIT_UNKNOWN_METHOD', 6);

defined('EXIT_USER_INPUT')
    or define('EXIT_USER_INPUT', 7);

defined('EXIT_DATABASE')
    or define('EXIT_DATABASE', 8);

defined('EXIT__AUTO_MIN')
    or define('EXIT__AUTO_MIN', 9);

defined('EXIT__AUTO_MAX')
    or define('EXIT__AUTO_MAX', 125);


/*
|--------------------------------------------------------------------------
| Date/Time Formats
|--------------------------------------------------------------------------
|
| These are constants that can be passed to PHP's DateTime class to denote
| date/time formatting
|
*/
define('MYSQL_DATETIME', 'Y-m-d H:i:s');   // 2018-02-05 00:36:15
define('LONG_DATETIME', 'l, jS M Y H:i');  // Monday, 5th Feb 2018 00:36

define('APP_TITLE', getenv('APP_TITLE'));
define('APP_OWNER', getenv('APP_OWNER'));
define('TREASURESALT', sha1('TREASURE'));
define('PIRATESALT', sha1('USER'));

define('ASSET_PATH', 'src/assets/');
