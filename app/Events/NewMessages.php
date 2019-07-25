<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewMessages implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $message;
    public $user;
    public $from;
    public $date;


    public function __construct($from,$user,$message,$date)
    {
       $this->message = $message;
       $this->user = $user;
       $this->from = $from;
       $this->date = $date;


      }

     public function broadcastOn()
     {
         return ['my-channel'];
     }

     public function broadcastAs()
     {
         return 'my-event';
     }
}
