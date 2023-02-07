<?php

class MyException extends Exception { }

class Test {
    public function testing() {
        try {
            try {
                throw new MyException('foo!');
            } catch (MyException $e) {
                // rethrow it
                throw $e;
            }
        } catch (Exception $e) {
            echo json_encode($e->getMessage());
        }
    }
}

$foo = new Test;
$foo->testing();

?>

