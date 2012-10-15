--TEST--
Test session_encode() function : basic functionality
--SKIPIF--
<?php
if (!extension_loaded("session")) {
    echo "skip needs session enabled";
}
?>
--INI--
session.serialize_handler=msgpacki
--FILE--
<?php
if (!extension_loaded('msgpacki')) {
    dl('msgpacki.' . PHP_SHLIB_SUFFIX);
}

ob_start();

/*
 * Prototype : string session_encode(void)
 * Description : Encodes the current session data as a string
 * Source code : ext/session/session.c
 */

echo "*** Testing session_encode() : basic functionality ***\n";

// Get an unset variable
$unset_var = 10;
unset($unset_var);

class classA
{
    public function __toString() {
        return "Hello World!";
    }
}

$heredoc = <<<EOT
Hello World!
EOT;

$fp = fopen(__FILE__, "r");

// Unexpected values to be passed as arguments
$inputs = array(

       // Integer data
/*1*/  0,
       1,
       12345,
       -2345,

       // Float data
/*5*/  10.5,
       -10.5,
       12.3456789000e10,
       12.3456789000E-10,
       .5,

       // Null data
/*10*/ NULL,
       null,

       // Boolean data
/*12*/ true,
       false,
       TRUE,
       FALSE,

       // Empty strings
/*16*/ "",
       '',

       // Invalid string data
/*18*/ "Nothing",
       'Nothing',
       $heredoc,

       // Object data
/*21*/ new classA(),

       // Undefined data
/*22*/ @$undefined_var,

       // Unset data
/*23*/ @$unset_var,

       // Resource variable
/*24*/ $fp
);

session_start();

$iterator = 1;
foreach($inputs as $input) {
    echo "\n-- Iteration $iterator --\n";
    var_dump(session_encode($input));
    $iterator++;
};

session_destroy();
fclose($fp);
echo "Done";
ob_end_flush();
?>
--EXPECTF--
*** Testing session_encode() : basic functionality ***

-- Iteration 1 --

Warning:%ssession_encode()%sin %s on line %d
NULL

-- Iteration 2 --

Warning:%ssession_encode()%sin %s on line %d
NULL

-- Iteration 3 --

Warning:%ssession_encode()%sin %s on line %d
NULL

-- Iteration 4 --

Warning:%ssession_encode()%sin %s on line %d
NULL

-- Iteration 5 --

Warning:%ssession_encode()%sin %s on line %d
NULL

-- Iteration 6 --

Warning:%ssession_encode()%sin %s on line %d
NULL

-- Iteration 7 --

Warning:%ssession_encode()%sin %s on line %d
NULL

-- Iteration 8 --

Warning:%ssession_encode()%sin %s on line %d
NULL

-- Iteration 9 --

Warning:%ssession_encode()%sin %s on line %d
NULL

-- Iteration 10 --

Warning:%ssession_encode()%sin %s on line %d
NULL

-- Iteration 11 --

Warning:%ssession_encode()%sin %s on line %d
NULL

-- Iteration 12 --

Warning:%ssession_encode()%sin %s on line %d
NULL

-- Iteration 13 --

Warning:%ssession_encode()%sin %s on line %d
NULL

-- Iteration 14 --

Warning:%ssession_encode()%sin %s on line %d
NULL

-- Iteration 15 --

Warning:%ssession_encode()%sin %s on line %d
NULL

-- Iteration 16 --

Warning:%ssession_encode()%sin %s on line %d
NULL

-- Iteration 17 --

Warning:%ssession_encode()%sin %s on line %d
NULL

-- Iteration 18 --

Warning:%ssession_encode()%sin %s on line %d
NULL

-- Iteration 19 --

Warning:%ssession_encode()%sin %s on line %d
NULL

-- Iteration 20 --

Warning:%ssession_encode()%sin %s on line %d
NULL

-- Iteration 21 --

Warning:%ssession_encode()%sin %s on line %d
NULL

-- Iteration 22 --

Warning:%ssession_encode()%sin %s on line %d
NULL

-- Iteration 23 --

Warning:%ssession_encode()%sin %s on line %d
NULL

-- Iteration 24 --

Warning:%ssession_encode()%sin %s on line %d
NULL
Done
