--TEST--
Test filter_input() with GET and POST data.
--DESCRIPTION--
This test covers both valid and invalid usages of
filter_input() with INPUT_GET and INPUT_POST data
and several differnt filter sanitizers.
--CREDITS--
Felipe Pena <felipe@php.net>
--INI--
precision=14
--SKIPIF--
<?php if (!extension_loaded("filter")) die("Skipped: filter extension required."); ?>
--GET--
a=<b>test</b>&b=https://example.com
--POST--
c=<p>string</p>&d=12345.7
--FILE--
<?php
ini_set('html_errors', false);
var_dump(filter_input(INPUT_GET, "a", FILTER_SANITIZE_STRIPPED));
var_dump(filter_input(INPUT_GET, "b", FILTER_SANITIZE_URL));
var_dump(filter_input(INPUT_GET, "a", FILTER_SANITIZE_SPECIAL_CHARS, array(1,2,3,4,5)));
var_dump(filter_input(INPUT_GET, "b", FILTER_VALIDATE_FLOAT, new stdClass));
var_dump(filter_input(INPUT_POST, "c", FILTER_SANITIZE_STRIPPED, array(5,6,7,8)));
var_dump(filter_input(INPUT_POST, "d", FILTER_VALIDATE_FLOAT));
var_dump(filter_input(INPUT_POST, "c", FILTER_SANITIZE_SPECIAL_CHARS));
var_dump(filter_input(INPUT_POST, "d", FILTER_VALIDATE_INT));
var_dump(filter_var(new stdClass, "d"));
var_dump(filter_input(INPUT_POST, "c", "", ""));
var_dump(filter_var("", "", "", "", ""));
var_dump(filter_var(0, 0, 0, 0, 0));
echo "Done\n";
?>
--EXPECTF--
string(4) "test"
string(19) "https://example.com"
string(27) "&#60;b&#62;test&#60;/b&#62;"

Notice: Object of class stdClass could not be converted to int in %ssample001.php on line %d
bool(false)
string(6) "string"
float(12345.7)
string(29) "&#60;p&#62;string&#60;/p&#62;"
bool(false)

Warning: filter_var() expects parameter 2 to be long, string given in %ssample001.php on line %d
NULL

Warning: filter_input() expects parameter 3 to be long, string given in %ssample001.php on line %d
NULL

Warning: filter_var() expects at most 3 parameters, 5 given in %ssample001.php on line %d
NULL

Warning: filter_var() expects at most 3 parameters, 5 given in %ssample001.php on line %d
NULL
Done
