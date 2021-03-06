--TEST--
serialize() objects of incomplete class
--FILE--
<?php
namespace MessagePacki;

if (!extension_loaded('msgpacki')) {
    dl('msgpacki.' . PHP_SHLIB_SUFFIX);
}


$str = pack('H*', '81c0a954657374436c617373');
$obj = unserialize($str);
var_dump($obj);
echo bin2hex(serialize($obj))."\n";
var_dump($obj);
echo bin2hex(serialize($obj))."\n";
var_dump($obj);
?>
--EXPECT--
object(__PHP_Incomplete_Class)#1 (1) {
  ["__PHP_Incomplete_Class_Name"]=>
  string(9) "TestClass"
}
81c0a954657374436c617373
object(__PHP_Incomplete_Class)#1 (1) {
  ["__PHP_Incomplete_Class_Name"]=>
  string(9) "TestClass"
}
81c0a954657374436c617373
object(__PHP_Incomplete_Class)#1 (1) {
  ["__PHP_Incomplete_Class_Name"]=>
  string(9) "TestClass"
}
