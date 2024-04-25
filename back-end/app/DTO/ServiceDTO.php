<?php

namespace App\DTO;

use App\Models\Service;

class ServiceDTO
{
    public $name;
    public $description;
    public $price;
    public $category_id;
    public $user_id;
    public $image;


    public function __construct($name, $description, $price, $category_id, $user_id, $image)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->category_id = $category_id;
        $this->user_id = $user_id;
        $this->image = $image;
    }

    public static function fromRequest(array $data)
    {
        return new self(
            $data['name'],
            $data['description'] ?? null,
            $data['price'],
            $data['category_id'],
            $data['user_id'],
            $data['image']
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
            'image' => $this->image
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
            'image' => $this->image
        ]);
    }

    public static function fromModel(Service $service)
    {
        return new self(
            $service->name,
            $service->description,
            $service->price,
            $service->category_id,
            $service->user_id,
            $service->image
        );
    }


}
