<?php

namespace App\Livewire\Components;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CheckoutContent extends Component
{
    public $isLoggedIn = false;
    public $firstName = "";
    public $lastName = "";
    public $email = "";
    public $phoneNumber = "";
    public $city = "";
    public $street = "";
    public $state = "";
    public $postalCode = "";

    /**
     * Mount the component and initialize user data
     *
     * @return void
     */
    public function mount(): void
    {
        $this->isLoggedIn = Auth::check();

        if ($this->isLoggedIn) {
            $user = Auth::user();
            $this->firstName = $user->name ? explode(" ", $user->name)[0] : "";
            $this->lastName =
                $user->name && count(explode(" ", $user->name)) > 1
                    ? explode(" ", $user->name)[1]
                    : "";
            $this->email = $user->email;

            // Get default address if exists
            $defaultAddress = \App\Models\Address::query()
                ->where("user_id", $user->id)
                ->where("is_default", true)
                ->first();

            if ($defaultAddress) {
                $this->state = $defaultAddress->state;
                $this->city = $defaultAddress->city;
                $this->street = $defaultAddress->address_line1;
                $this->postalCode = $defaultAddress->postal_code;
                $this->phoneNumber = $defaultAddress->phone_number ?? "";
            }
        }
    }

    /**
     * Render the component view
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render(): \Illuminate\Contracts\View\View
    {
        return view("livewire.components.checkout-content");
    }
}
