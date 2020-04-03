<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Observers\NoveUserObserver;

use App\Models\Novel;
use App\Models\NovelUser;
use App\Models\NovelUserHistory;

class NovelUserCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    protected $novelUser;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $usernovel;
    public function __construct(NovelUser $usernovel)
    {

        //
        $novel =Novel::find($usernovel->novel_id);
        $novel->rent_count =$novel->rent_count + 1;
        $novel->save();

        \Log::info("create".$usernovel->novel_id);

        NovelUserHistory::create([
          'user_id'=>$usernovel->user_id,
          'novel_id'=>$usernovel->novel_id,
          'type'=>"借书"

        ]);

        //$usernovel->note = 'liyuping';
        //$usernovel->save();
        $this->usernovel = $usernovel;

    }

    public function getNovelUser()
    {
        return $this->novelUser;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
