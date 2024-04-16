<?php

namespace App\DTO;

class RewardDTO
{
    public $title;
    public $cost;
    public $availability;

    public function __construct($title, $cost, $availability)
    {
        $this->title = $title;
        $this->cost = $cost;
        $this->availability = $availability;
    }

    public static function fromRequest(array $data)
    {
        return new self(
            $data['title'],
            $data['cost'],
            $data['availability']
        );
    }

    public function toArray()
    {
        return [
            'title' => $this->title,
            'cost' => $this->cost,
            'availability' => $this->availability,
        ];
    }
}
