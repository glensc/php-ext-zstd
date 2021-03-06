--TEST--
zstd_uncompress(): error conditions
--SKIPIF--
<?php
if (version_compare(PHP_VERSION, '8.0', '<')) die('skip PHP is too new');
--FILE--
<?php

echo "*** Testing zstd_uncompress() function with Zero arguments ***", PHP_EOL;
try {
  var_dump( zstd_uncompress() );
} catch (Error $e) {
  echo $e, PHP_EOL;
}

echo "*** Testing with incorrect arguments ***", PHP_EOL;
try {
  var_dump(zstd_uncompress(123));
} catch (Error $e) {
  echo $e, PHP_EOL;
}

class Tester
{}

$testclass = new Tester();
try {
  var_dump(zstd_uncompress($testclass));
} catch (Error $e) {
  echo $e, PHP_EOL;
}
?>
===DONE===
--EXPECTF--
*** Testing zstd_uncompress() function with Zero arguments ***
ArgumentCountError: zstd_uncompress() expects exactly 1 parameter, 0 given in %s:%d
Stack trace:
#0 %s(%d): zstd_uncompress()
#1 {main}
*** Testing with incorrect arguments ***

Warning: zstd_uncompress: expects parameter to be string. in %s on line %d
bool(false)

Warning: zstd_uncompress: expects parameter to be string. in %s on line %d
bool(false)
===DONE===
