<?php

use App\Livewire\Page\AboutPage;
use App\Livewire\Page\BlogPage;
use App\Livewire\Page\BlogPageDetail;
use App\Livewire\Page\CollectionPage;
use App\Livewire\Page\HomePage;
use App\Livewire\Page\ProductDetailPage;
use App\Livewire\Page\ShopPage;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', HomePage::class)->name('home');
Route::get("/about", AboutPage::class)->name("about");
Route::get("/shop", ShopPage::class)->name("shop");
Route::get('/blog', BlogPage::class)->name('blog');
Route::get('/blog/{slug}', BlogPageDetail::class)->name('blog.detail');
Route::get('/collection', CollectionPage::class)->name('collection');
Volt::route('/contact', 'page.contact-page')->name('contact');
Route::get("/product/{slug}", ProductDetailPage::class)->name("product.detail");


require __DIR__ . '/auth.php';
