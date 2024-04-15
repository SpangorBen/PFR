<?php

namespace App\DTO;

class RewardDTO
{
    public $user_id;
    public $reservation_count;
    public $discount_amount;

    public function __construct($user_id, $reservation_count, $discount_amount)
    {
        $this->user_id = $user_id;
        $this->reservation_count = $reservation_count;
        $this->discount_amount = $discount_amount;
    }

    public static function fromArray(array $data)
    {
        return new self(
            $data['user_id'],
            $data['reservation_count'],
            $data['discount_amount']
        );
    }

    public function toArray()
    {
        return [
            'user_id' => $this->user_id,
            'reservation_count' => $this->reservation_count,
            'discount_amount' => $this->discount_amount,
        ];
    }
}
