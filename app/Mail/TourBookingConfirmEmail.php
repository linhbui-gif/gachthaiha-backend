<?php

namespace App\Mail;

use App\Models\Service\TourOrder;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TourBookingConfirmEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $tourOrder;

    public function __construct(TourOrder $tourOrder)
    {
        $this->tourOrder = $tourOrder;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('duclichcvietnam@gmail.com', 'Du lịch CVietNam')
            ->view('email.tour_booking_confirm', ['tourOrder' => $this->tourOrder]);
    }
}
