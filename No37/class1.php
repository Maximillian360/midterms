<?php

    class User extends Calc{
        public string $username;
        public float $spendingLimit;
        public array $products;

        public function __construct(string $username, float $spendinglimit, array $products) {
            $this->username = $username;
            $this->spendingLimit = $spendinglimit;
            $this->products = $products;
        }

        public function getUsername(): string {
            return $this->username;
        }

        public function getSpendinglimit(): float {
            return $this->spendingLimit;
        }


        public function getUProducts(): array {
            return $this->products;
        }

        public function setSpendinglimit(float $spendinglimit): void {
            $this->spendingLimit = $spendinglimit;
        }

        public function setProducts(array $products): void {
            $this->products = $products;
        }


        public function getTotalSpending() {
            $totalPrice = 0;
            foreach ($this->products as $product) {
                $totalPrice += $product->getPrice();
            }
            return $totalPrice;
        }

        public function getRemainingBalance() {
            return $this->spendingLimit - $this->getTotalSpending();
        }




    }

    abstract class Calc {

        abstract function getTotalSpending();
        abstract function getRemainingBalance();

    }

    class Product{
        public string $name;
        public float $price;
        public float $weight;

        public function __construct(string $name, float $price, float $weight) {
            $this->name = $name;
            $this->price = $price;
            $this->weight = $weight;
        }

        public function getName(): string {
            return $this->name;
        }

        public function getPrice(): float {
            return $this->price;
        }

        public function getWeight(): float {
            return $this->weight;
        }

        public function __toString(): string {
            return "$this->name ($this->weight lb): $" . round($this->price, 2);
        }




    }


