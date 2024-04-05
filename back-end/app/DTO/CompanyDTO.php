<?php

namespace App\DTO;

class CompanyDTO
{
    public $name;
    public $description;
    public $website;
    public $address;
    public $city;
    public $owner_id;

    public function __construct($name, $description, $website, $address, $city, $owner_id)
    {
        $this->name = $name;
        $this->description = $description;
        $this->website = $website;
        $this->address = $address;
        $this->city = $city;
        $this->owner_id = $owner_id;
    }

    public static function fromRequest(array $data)
    {
        return new self(
            $data['name'],
            $data['description'],
            $data['website'],
            $data['address'],
            $data['city'],
            $data['owner_id']
        );
    }

    public function toArray()
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'website' => $this->website,
            'address' => $this->address,
            'city' => $this->city,
            'owner_id' => $this->owner_id,
        ];
    }
}
