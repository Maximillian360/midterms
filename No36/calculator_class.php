<?php

    class calculator_class {

    }

    abstract class Arithmetic{
        abstract function Add($num1, $num2);

        abstract function Sub($num1, $num2);

        abstract function Mul($num1, $num2);

        abstract function Div($num1, $num2);

    }

    class Calculator extends Arithmetic{
        public $num1;
        public $num2;
        public function __construct($num1, $num2) {
            $this->num1 = $num1;
            $this->num2 = $num2;
        }
        public function Add(){
            return ($this->num1 + $this->num2);
        }
        public function Sub(){
            return ($this->num1 - $this->num2);
        }
        public function Mul(){
            return ($this->num1 * $this->num2);
        }
        public function Div(){
            return ($this->num1 / $this->num2);
        }


    }