<?php

class MenuOrder
{

    public $thumbnail;
    public $type;
    public $name;
    public $quantity;
    public $itemPrice;

    public function __construct(string $thumbnail, string $type, string $name, int $quantity, int $itemPrice)
    {
        $this->thumbnail = trim($thumbnail);
        $this->type = trim($type);
        $this->name = trim($name);
        $this->quantity = $quantity;
        $this->itemPrice = $itemPrice;
    }
}
