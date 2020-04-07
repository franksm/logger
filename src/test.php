<?php
class Test {
    function MethodA(){
        echo __FUNCTION__;
    }
}

$test = new Test();
$test->MethodA();
