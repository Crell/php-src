--TEST--
Basic composition
--FILE--
<?php

// Basic case.
$fn = strtolower(...) + str_rot13(...);
var_dump($fn("Hello World"));

// Inline closures work.
$fn = strtolower(...) + str_rot13(...) + (fn($x) => "A fine $x");
var_dump($fn("Hello World"));

// Inline invocation works, even if you'd rarely want to.
var_dump((strtolower(...) + str_rot13(...) + (fn($x) => "A fine $x"))("Hello World"));

// Order is left-to-right.
$fn = strtolower(...) + (fn($x) => "A fine $x") + str_rot13(...);
var_dump($fn("Hello World"));

class Capitalize {
    public function __invoke(string $x): string {
        return strtoupper($x);
    }
}
$capitalizer = new Capitalize();

// Invokables work as a second element.
$fn = strtolower(...) + $capitalizer;
var_dump($fn("Hello World"));

// Invokables work as a first element.
$fn = $capitalizer + strtolower(...);
var_dump($fn("Hello World"));

--EXPECT--
string(13) "uryyb jbeyq"
string(18) "A fine uryyb jbeyq"
string(18) "A fine uryyb jbeyq"
string(18) "N svar uryyb jbeyq"
string(13) "HELLO WORLD"
string(13) "hello world"
