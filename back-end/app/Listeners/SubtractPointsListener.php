<?php

namespace App\Listeners;

use App\Events\RewardRedeemed;
use App\Repositories\PointsRepositoryInterface;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SubtractPointsListener
{
    protected $pointsRepository;

    /**
     * Create the event listener.
     *
     * @param PointsRepository $pointsRepository
     */
    public function __construct(PointsRepositoryInterface $pointsRepository)
    {
        $this->pointsRepository = $pointsRepository;
    }

    /**
     * Handle the event.
     *
     * @param  RewardRedeemed  $event
     * @return void
     */
    public function handle(RewardRedeemed $event)
    {
        $userId = $event->userId;
        $rewardCost = $event->rewardCost;

        $this->pointsRepository->subtractPoints($userId, $rewardCost);
    }
}
