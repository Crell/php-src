--TEST--
Composing with pipes.
--FILE--
<?php

// Can pipe into a composed closure.
$fn = strtolower(...) + str_rot13(...);
var_dump("Hello World" |> $fn);

function add3(int $x): int {
    return $x = 3;
}

function div4(int $x): float {
    return $x / 4;
}

// Can embed a composed closure within a pipe.
// The precedence here should compose first, then pipe.
// If it doesn't, it will be an error as adding 2 to a closure is undefined.
var_dump(8 |> div4(...) + add3(...));

--EXPECT--
string(13) "uryyb jbeyq"
int(5)
