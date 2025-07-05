<?php

use App\Livewire\Page\AboutPage;
use App\Livewire\Page\BlogPage;
use App\Livewire\Page\BlogPageDetail;
use App\Livewire\Page\CartPage;
use App\Livewire\Page\CheckOutPage;
use App\Livewire\Page\CollectionPage;
use App\Livewire\Page\FaqsPage;
use App\Livewire\Page\HomePage;
use App\Livewire\Page\OrderConfirmationPage;
use App\Livewire\Page\OrderTrackingPage;
use App\Livewire\Page\PrivacyPolicyPage;
use App\Livewire\Page\ProductDetailPage;
use App\Livewire\Page\SearchPage;
use App\Livewire\Page\ShopPage;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get("/", HomePage::class)->name("home");
Route::get("/about", AboutPage::class)->name("about");
Route::get("/shop", ShopPage::class)->name("shop");
Route::get("/search", SearchPage::class)->name("search");
Route::get("/blog", BlogPage::class)->name("blog");
Route::get("/blog/{slug}", BlogPageDetail::class)->name("blog.detail");
Route::get("/collection", CollectionPage::class)->name("collection");
Volt::route("/contact", "page.contact-page")->name("contact");
Route::get("/product/{slug}", ProductDetailPage::class)->name("product.detail");
Route::get("/cart", CartPage::class)->name("cart");
Route::get("/checkout", CheckOutPage::class)->name("checkout");
Route::get("/order/confirmation/{order}", OrderConfirmationPage::class)->name(
    "order.confirmation"
);
// Footer navigation pages
Route::get("/faqs", FaqsPage::class)->name("faqs");
Route::get("/privacy-policy", PrivacyPolicyPage::class)->name("privacy.policy");
Route::get("/order-tracking", OrderTrackingPage::class)->name("order.tracking");

// Test route for configuration system
Route::get("/config-test", function () {
    return view('welcome');
})->name('config-test');

require __DIR__ . "/auth.php";
