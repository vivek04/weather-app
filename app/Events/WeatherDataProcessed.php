<?php

namespace App\Events;

use App\Models\WeatherData;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class WeatherDataProcessed
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $weather_data;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(WeatherData $data)
    {

        $this->weather_data = $data->location_name;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-weather');
    }
}
