<?php

namespace App\DTO;

class ServiceDTO
{
    public $name;
    public $description;
    public $price;
    public $category_id;
    public $user_id;


    public function __construct($name, $description, $price, $category_id, $user_id)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->category_id = $category_id;
        $this->user_id = $user_id;
    }

    public static function fromRequest(array $data)
    {
        return new self(
            $data['name'],
            $data['description'] ?? null,
            $data['price'],
            $data['category_id'],
            $data['user_id']
        );
    }

    public function toArray()
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->category_id,
            'user_id' => $this->user_id,
        ];
    }

    public function toModel(): Service
    {
        return new Service([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->category_id,
            'user_id' => $this->user_id,
        ]);
    }

    public static function fromModel(Service $service)
    {
        return new self(
            $service->name,
            $service->description,
            $service->price,
            $service->category_id,
            $service->user_id
        );
    }

    
}
