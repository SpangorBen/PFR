<?php

namespace App\DTO;

class ServiceDTO
{
    public $name;
    public $description;
    public $price;
    public $category_id;
    public $user_id;


    public function __construct($name, $description, $price, $category_id)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->category_id = $category_id;
        $this->user_id = 1;
    }

    public static function fromRequest(array $data)
    {
        return new self(
            $data['name'],
            $data['description'] ?? null,
            $data['price'],
            $data['category_id'],
            $data['user_id'] ?? 1
        );
    }

     public function toArray()
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->category_id,
            'user_id' => 1
        ];
    }
}
