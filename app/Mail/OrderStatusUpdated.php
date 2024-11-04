<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class OrderStatusUpdated extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function build()
    {
        // log
        Log::info('Sending order status updated email to ' . $this->order->billing->email);
        return $this->view('emails.order_status_updated')
            ->from($address = 'noreply@costa.co.id', $name = 'Costa')
            ->subject('Thank you for your order at Costa')
            ->with([
                'orderNumber' => $this->order->invoice_number,
                'status' => $this->order->status,
            ]);
    }
}
