<?php

namespace App\DTO;

class CategoryDTO
{
    public $name;
    public $description;

    public function __construct($name, $description)
    {
        $this->name = $name;
        $this->description = $description;
    }

    public static function fromRequest(array $data)
    {
        return new self(
            $data['name'],
            $data['description']
        );
    }

    public function toArray()
    {
        return [
            'name' => $this->name,
            'description' => $this->description
        ];
    }
}
