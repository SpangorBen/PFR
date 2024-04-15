<?php

namespace App\DTO;

class ReviewDTO
{
    public $user_id;
    public $service_id;
    public $rating;
    public $comment;

    public function __construct($user_id, $service_id, $rating, $comment)
    {
        $this->user_id = $user_id;
        $this->service_id = $service_id;
        $this->rating = $rating;
        $this->comment = $comment;
    }

    public static function fromRequest(array $data)
    {
        return new self(
            $data['user_id'],
            $data['service_id'],
            $data['rating'],
            $data['comment'] ?? null
        );
    }

    public function toArray()
    {
        return [
            'user_id' => $this->user_id,
            'service_id' => $this->service_id,
            'rating' => $this->rating,
            'comment' => $this->comment,
        ];
    }
}

