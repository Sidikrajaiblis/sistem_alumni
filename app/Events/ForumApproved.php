<?php

namespace App\Events;

use App\Models\Forum;
use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

class ForumApproved implements ShouldBroadcast
{
    use SerializesModels;

    public $forum;

    public function __construct(Forum $forum)
    {
        $this->forum = $forum->load('kategoriForum', 'user');
    }

    public function broadcastOn()
    {
        return new Channel('forums');
    }

    public function broadcastWith()
    {
        return [
            'id' => $this->forum->id,
            'judul' => $this->forum->judul,
            'isi' => $this->forum->isi,
            'kategori' => $this->forum->kategoriForum->nama,
            'user' => $this->forum->user->name,
        ];
    }
}
