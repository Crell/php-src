--TEST--
Composition inline with function calls
--FILE--
<?php

$a = [
    'Hello',
    'PHP',
    'World',
];

var_dump(array_map(strtolower(...) + strrev(...), $a));

--EXPECT--
array(3) {
  [0]=>
  string(5) "olleh"
  [1]=>
  string(3) "php"
  [2]=>
  string(5) "dlrow"
}
