--TEST--
Enum constants can alias cases
--SKIPIF--
<?php
die("skip, not yet implemented");
?>
--FILE--
<?php

enum Foo {
    case Bar;
    const Other = self::Bar;
}

function test(Foo $var) {
    print "works";
}

test(Foo:Other);

?>
--EXPECTF--
works
works
