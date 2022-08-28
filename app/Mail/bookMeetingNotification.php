<?php

namespace App\Mail;

use App\Models\Booking;
use App\Models\Room;
use App\Models\Unit;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class bookMeetingNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The order instance.
     *
     * @var \App\Models\Booking
     * @var string $name
     * @var \App\Models\Unit
     * @var \App\Models\Room
     */
    public $booking;
    public $name;
    public $unit;
    public $room;

    /**
     * Create a new message instance.
     *
     * @param  \App\Models\Booking $booking
     * @param  string $name
     * @param  \App\Models\Unit $unit
     * @param  \App\Models\Room $room
     * @return void
     */
    public function __construct(Booking $booking, $name, Unit $unit, Room $room)
    {
        $this->booking = $booking;
        $this->name = $name;
        $this->unit = $unit;
        $this->room = $room;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('m.fadli.gunardi@gmail.com')
                    ->markdown('email');
    }
}
