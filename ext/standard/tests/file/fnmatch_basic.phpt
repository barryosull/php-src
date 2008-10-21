--TEST--
Test fnmatch() function: Basic functionality
--SKIPIF--
<?php
if(substr(PHP_OS, 0, 3) == 'WIN')
  die("skip do not run on Windows");
?>
--FILE--
<?php
/* Prototype: bool fnmatch ( string $pattern, string $string [, int $flags] )
   Description: fnmatch() checks if the passed string would match
     the given shell wildcard pattern.
*/

echo "*** Testing fnmatch() with file ***\n";
$file = basename(__FILE__);

var_dump( fnmatch("*.php", $file) );
var_dump( fnmatch("*.p*p", $file) );
var_dump( fnmatch("*.p*", $file) );
var_dump( fnmatch("*", $file) );
var_dump( fnmatch("**", $file) );
var_dump( fnmatch("*.phpt", $file) );

echo "*** Testing fnmatch() with other than file ***\n";
var_dump( fnmatch(100, 100) );
var_dump( fnmatch("string", "string") );
var_dump( fnmatch(TRUE, TRUE) );
var_dump( fnmatch(FALSE, FALSE) );
var_dump( fnmatch(NULL, NULL) );

echo "\n*** Done ***\n";
?>
--EXPECTF--
*** Testing fnmatch() with file ***
bool(true)
bool(true)
bool(true)
bool(true)
bool(true)
bool(false)
*** Testing fnmatch() with other than file ***
bool(true)
bool(true)
bool(true)
bool(true)
bool(true)

*** Done ***
