<?php

use App\Livewire\Page\AboutPage;
use App\Livewire\Page\HomePage;
use App\Livewire\Page\ShopPage;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', HomePage::class)->name('home');
Route::get("/about", AboutPage::class)->name("about");
Route::get("/shop", ShopPage::class)->name("shop");


require __DIR__ . '/auth.php';
