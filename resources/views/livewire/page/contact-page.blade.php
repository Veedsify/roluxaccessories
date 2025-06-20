<?php

use Livewire\Attributes\{Layout, Title};
use Livewire\Volt\Component;


?>
<x-layouts.main>
    <main>
        @livewire("components.top-nav")

        @livewire("components.nav-bar")

        <div id="header" class="relative w-full">
            <div class="breadcrumb-block style-shared">
                <div class="breadcrumb-main bg-linear overflow-hidden">
                    <div class="container lg:pt-[134px] pt-24 pb-10 relative">
                        <div class="main-content w-full h-full flex flex-col items-center justify-center relative z-[1]">
                            <div class="text-content">
                                <div class="heading2 text-center">Contact Us</div>
                                <div class="link flex items-center justify-center gap-1 caption1 mt-3">
                                    <a href="/">Homepage</a>
                                    <i class="ph ph-caret-right text-sm text-secondary2"></i>
                                    <div class="text-secondary2 capitalize">Contact Us</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="contact-us md:py-20 py-10">
            <div class="container">
                <div class="flex justify-between max-lg:flex-col gap-y-10">
                    <div class="left lg:w-2/3 lg:pr-4">
                        <div class="heading3">Drop Us A Line</div>
                        <div class="body1 text-secondary2 mt-3">Use the form below to get in touch with the sales team</div>
                        <form class="md:mt-6 mt-4">
                            <div class="grid sm:grid-cols-2 grid-cols-1 gap-4 gap-y-5">
                                <div class="name">
                                    <input class="border-line px-4 py-3 w-full rounded-lg" id="username" type="text" placeholder="Your Name *" required />
                                </div>
                                <div class="email">
                                    <input class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="email" type="email" placeholder="Your Email *" required />
                                </div>
                                <div class="message sm:col-span-2">
                                    <textarea class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="message" rows="3" placeholder="Your Message *" required></textarea>
                                </div>
                            </div>
                            <div class="block-button md:mt-6 mt-4">
                                <button class="button-main">Send message</button>
                            </div>
                        </form>
                    </div>
                    <div class="right lg:w-1/4 lg:pl-4">
                        <div class="item">
                            <div class="heading4">Our Store</div>
                            <p class="mt-3">2163 Phillips Gap Rd, West Jefferson, North Carolina, United States</p>
                            <p class="mt-3">Phone: <span class="whitespace-nowrap">+1 666 8888</span></p>
                            <p class="mt-1">Email: <span class="whitespace-nowrap">hi.avitex@gmail.com</span></p>
                        </div>
                        <div class="item mt-10">
                            <div class="heading4">Open Hours</div>
                            <p class="mt-3">Mon - Fri: <span class="whitespace-nowrap">7:30am - 8:00pm PST</span></p>
                            <p class="mt-3">Saturday: <span class="whitespace-nowrap">8:00am - 6:00pm PST</span></p>
                            <p class="mt-3">Sunday: <span class="whitespace-nowrap">9:00am - 5:00pm PST</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="map xl:h-[600px] sm:h-[500px] h-[450px] overflow-hidden">
            <iframe class="w-full h-full" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1087.1466107534056!2d-81.49247136581288!3d36.40281150719292!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8851ac9789084bdd%3A0x854168300ff0fb4b!2sDr%20Pepper.Grapette%20Bottling%20Co.!5e1!3m2!1svi!2s!4v1721783628866!5m2!1svi!2s" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        @include('partials.footer')

    </main>
</x-layouts.main>
