<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderStatusUpdated extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $order;
    public $status;
    public $previousStatus;

    /**
     * Create a new message instance.
     */
    public function __construct(
        Order $order,
        string $status,
        string $previousStatus,
    ) {
        $this->order = $order;
        $this->status = $status;
        $this->previousStatus = $previousStatus;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $statusMessages = [
            "pending" => "Order Received",
            "confirmed" => "Order Confirmed",
            "processing" => "Order Processing",
            "shipped" => "Order Shipped",
            "delivered" => "Order Delivered",
            "completed" => "Order Completed",
            "cancelled" => "Order Cancelled",
        ];

        $subject = $statusMessages[$this->status] ?? "Order Status Updated";

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
            view: "emails.order-status-updated",
            with: [
                "order" => $this->order,
                "user" => $this->order->user,
                "status" => $this->status,
                "previousStatus" => $this->previousStatus,
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
