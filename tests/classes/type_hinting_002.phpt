--TEST--
ZE2 class type hinting non existing class
--SKIPIF--
<?php if (version_compare(zend_version(), '2.0.0-dev', '<')) die('skip ZendEngine 2 needed'); ?>
--FILE--
<?php

class Foo {
	function a(NonExisting $foo) {}
}

$o = new Foo;
$o->a($o);
?>
--EXPECTF--
Fatal error: Argument 1 passed to Foo::a() must be an instance of NonExisting, instance of Foo given, called in %s on line %d and defined in %s on line %d
