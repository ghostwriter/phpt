--TEST--
example tests
--SKIPIF--
<?php if (!extension_loaded("pcov")) print "skip - no pcov\n"; ?>
--FILE--
<?php
echo "Done\n";
?>
--CLEAN--
<?php
?>
--EXPECTF--
Done
