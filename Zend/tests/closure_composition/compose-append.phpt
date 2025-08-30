--TEST--
Appending composition
--FILE--
<?php

// Basic case.
$fn = strtolower(...);
$fn += str_rot13(...);
var_dump($fn("Hello World"));

// Multiple appends work
$fn = strtolower(...);
$fn += str_rot13(...);
$fn += (fn($x) => "A fine $x");
var_dump($fn("Hello World"));

class Capitalize {
    public function __invoke(string $x): string {
        return strtoupper($x);
    }
}
$capitalizer = new Capitalize();

// Can append an invokable.
$fn = strtolower(...);
$fn += $capitalizer;
var_dump($fn("Hello World"));

// Can append an FCC.
$fn = $capitalizer;
$fn += strtolower(...);
var_dump($fn("Hello World"));

--EXPECT--
string(13) "uryyb jbeyq"
string(18) "A fine uryyb jbeyq"
string(18) "N svar uryyb jbeyq"
string(13) "HELLO WORLD"
string(13) "hello world"
