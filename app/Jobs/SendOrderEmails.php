<?php

namespace App\Jobs;

use App\Mail\AdminOrderNotification;
use App\Mail\OrderPlaced;
use App\Mail\OrderStatusUpdated;
use App\Models\Order;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendOrderEmails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $order;
    public $type;
    public $previousStatus;

    /**
     * Create a new job instance.
     */
    public function __construct(
        Order $order,
        string $type,
        string $previousStatus,
    ) {
        $this->order = $order;
        $this->type = $type;
        $this->previousStatus = $previousStatus;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Send email to customer
        $this->sendCustomerEmail();

        // Send email to admin
        $this->sendAdminEmail();
    }

    private function sendCustomerEmail(): void
    {
        if (!$this->order->user || !$this->order->user->email) {
            return;
        }

        switch ($this->type) {
            case "placed":
                Mail::to($this->order->user->email)->send(
                    new OrderPlaced($this->order)
                );
                break;

            case "status_updated":
                Mail::to($this->order->user->email)->send(
                    new OrderStatusUpdated(
                        $this->order,
                        $this->order->status,
                        $this->previousStatus
                    )
                );
                break;
        }
    }

    private function sendAdminEmail(): void
    {
        // Get admin emails
        $adminEmails = User::where("is_admin", true)
            ->where("is_active", true)
            ->pluck("email")
            ->toArray();

        if (empty($adminEmails)) {
            // Fallback to a default admin email if no admin users found
            $adminEmails = [
                config(
                    "mail.admin_email",
                    "admin@" . config("app.domain", "example.com")
                ),
            ];
        }

        $mailType = match ($this->type) {
            "placed" => "new_order",
            "status_updated" => "order_updated",
            default => "new_order",
        };

        foreach ($adminEmails as $email) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                Mail::to($email)->send(
                    new AdminOrderNotification($this->order, $mailType)
                );
            }
        }
    }

    /**
     * Handle a job failure.
     */
    public function failed(\Throwable $exception): void
    {
        // Log the failure
        logger()->error("Failed to send order emails", [
            "order_id" => $this->order->id,
            "type" => $this->type,
            "error" => $exception->getMessage(),
        ]);
    }
}
