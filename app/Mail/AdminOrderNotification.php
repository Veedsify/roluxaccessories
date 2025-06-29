<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminOrderNotification extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $order;
    public $type;

    /**
     * Create a new message instance.
     */
    public function __construct(Order $order, string $type = "new_order")
    {
        $this->order = $order;
        $this->type = $type;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $subjects = [
            "new_order" => "New Order Received",
            "payment_uploaded" => "Payment Receipt Uploaded",
            "order_updated" => "Order Status Updated",
        ];

        $subject = $subjects[$this->type] ?? "Order Notification";

        return new Envelope(
            subject: $subject . " - " . $this->order->order_number
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: "emails.admin-order-notification",
            with: [
                "order" => $this->order,
                "user" => $this->order->user,
                "type" => $this->type,
                "orderDetails" => $this->order->orderDetails,
                "shippingAddress" => $this->order->shippingAddress,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
