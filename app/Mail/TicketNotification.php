<?php 

namespace App\Mail;

use App\Models\Evenement;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TicketNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $evenement;
    public $messageContent;

    /**
     * Create a new message instance.
     *
     * @param Evenement $evenement
     * @param string $messageContent
     */
    public function __construct(Evenement $evenement, $messageContent)
    {
        $this->evenement = $evenement;
        $this->messageContent = $messageContent;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Notification de Participation')
                    ->view('emails.ticket_notification');
    }
}
