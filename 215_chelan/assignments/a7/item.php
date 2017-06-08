<!--
Maryanne Derige
Date Created or Modified: 3-5-2017
http://chelan.highline.edu/~maryannederige/215/assignments/a7/item.php


File contains class for Item with methods to return an item id, name,
description, price and image. There is also a constructor funtion.

-->
<?php

/* error reporting */	
ini_set('display_errors', 1);
error_reporting(E_ALL);

class Item {
    private $id, $name, $description, $price, $image;
    
    public function __construct($id, $name, $description, $price, $image) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->image = $image;
    }
    
    public function getId() {
        return $this->id;
    }
    public function getName() {
        return $this->name;
    }
    
    public function getDescription() {
        return $this->description;
    }
    
    public function getPrice() {
        return $this->price;
    }
    
    public function getImage() {
        return $this->image;
    }
    
}



?>