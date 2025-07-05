<x-layouts.main :title="$this->title ?? config('app.name')">
    <main>
        @livewire("components.top-nav")
        @livewire("components.nav-bar")

        <!-- Page Content -->
        <div class="bg-gray-50 min-h-screen">
            <div class="container mx-auto px-4 py-12">
                <div class="max-w-4xl mx-auto">
                    <!-- Header Section -->
                    <div class="bg-white rounded-lg shadow-sm p-8 mb-8">
                        <h1 class="text-4xl font-bold mb-6 text-center text-gray-900">Privacy Policy</h1>
                        
                        <div class="flex flex-col sm:flex-row justify-center gap-6 text-sm">
                            <div class="bg-blue-50 px-4 py-2 rounded-lg text-center">
                                <span class="font-semibold text-blue-800">Effective Date:</span>
                                <span class="text-blue-600 ml-1">{{ date('F j, Y') }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Content Sections -->
                    <div class="space-y-8">
                        <section class="bg-white rounded-lg shadow-sm p-6 hover:shadow-md transition-shadow duration-200">
                            <h2 class="text-2xl font-bold mb-4 text-gray-900 border-b border-gray-200 pb-2">1. Introduction</h2>
                            <p class="text-gray-700 leading-relaxed">
                                Welcome to Roluxe Accessories ("we," "our," or "us"). This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website and use our services. Please read this privacy policy carefully. If you do not agree with the terms of this privacy policy, please do not access the site.
                            </p>
                        </section>

                        <section class="bg-white rounded-lg shadow-sm p-6 hover:shadow-md transition-shadow duration-200">
                            <h2 class="text-2xl font-bold mb-4 text-gray-900 border-b border-gray-200 pb-2">2. Information We Collect</h2>
                            
                            <div class="mb-6">
                                <h3 class="text-xl font-semibold mb-3 text-gray-800">Personal Information</h3>
                                <p class="mb-4 text-gray-700">We may collect personal information that you voluntarily provide to us when:</p>
                                <ul class="space-y-2 ml-4">
                                    <li class="flex items-center text-gray-700">
                                        <div class="w-2 h-2 bg-blue-500 rounded-full mr-3"></div>
                                        Creating an account
                                    </li>
                                    <li class="flex items-center text-gray-700">
                                        <div class="w-2 h-2 bg-blue-500 rounded-full mr-3"></div>
                                        Making a purchase
                                    </li>
                                    <li class="flex items-center text-gray-700">
                                        <div class="w-2 h-2 bg-blue-500 rounded-full mr-3"></div>
                                        Subscribing to our newsletter
                                    </li>
                                    <li class="flex items-center text-gray-700">
                                        <div class="w-2 h-2 bg-blue-500 rounded-full mr-3"></div>
                                        Contacting customer support
                                    </li>
                                    <li class="flex items-center text-gray-700">
                                        <div class="w-2 h-2 bg-blue-500 rounded-full mr-3"></div>
                                        Participating in promotions or surveys
                                    </li>
                                </ul>
                                <p class="mt-4 mb-3 text-gray-700">This information may include:</p>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                                    <div class="flex items-center text-gray-700">
                                        <div class="w-2 h-2 bg-green-500 rounded-full mr-3"></div>
                                        Name and contact information
                                    </div>
                                    <div class="flex items-center text-gray-700">
                                        <div class="w-2 h-2 bg-green-500 rounded-full mr-3"></div>
                                        Email address and phone number
                                    </div>
                                    <div class="flex items-center text-gray-700">
                                        <div class="w-2 h-2 bg-green-500 rounded-full mr-3"></div>
                                        Billing and shipping addresses
                                    </div>
                                    <div class="flex items-center text-gray-700">
                                        <div class="w-2 h-2 bg-green-500 rounded-full mr-3"></div>
                                        Payment information
                                    </div>
                                    <div class="flex items-center text-gray-700">
                                        <div class="w-2 h-2 bg-green-500 rounded-full mr-3"></div>
                                        Account preferences
                                    </div>
                                </div>
                            </div>

                            <div>
                                <h3 class="text-xl font-semibold mb-3 text-gray-800">Automatically Collected Information</h3>
                                <p class="mb-4 text-gray-700">We automatically collect certain information when you visit our website:</p>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                                    <div class="flex items-center text-gray-700">
                                        <div class="w-2 h-2 bg-orange-500 rounded-full mr-3"></div>
                                        IP address and location data
                                    </div>
                                    <div class="flex items-center text-gray-700">
                                        <div class="w-2 h-2 bg-orange-500 rounded-full mr-3"></div>
                                        Browser type and version
                                    </div>
                                    <div class="flex items-center text-gray-700">
                                        <div class="w-2 h-2 bg-orange-500 rounded-full mr-3"></div>
                                        Device information
                                    </div>
                                    <div class="flex items-center text-gray-700">
                                        <div class="w-2 h-2 bg-orange-500 rounded-full mr-3"></div>
                                        Usage patterns and preferences
                                    </div>
                                    <div class="flex items-center text-gray-700">
                                        <div class="w-2 h-2 bg-orange-500 rounded-full mr-3"></div>
                                        Cookies and tracking technologies
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section class="bg-white rounded-lg shadow-sm p-6 hover:shadow-md transition-shadow duration-200">
                            <h2 class="text-2xl font-bold mb-4 text-gray-900 border-b border-gray-200 pb-2">3. How We Use Your Information</h2>
                            <p class="mb-4 text-gray-700">We use the information we collect to:</p>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                <div class="flex items-center text-gray-700">
                                    <div class="w-2 h-2 bg-purple-500 rounded-full mr-3"></div>
                                    Process and fulfill your orders
                                </div>
                                <div class="flex items-center text-gray-700">
                                    <div class="w-2 h-2 bg-purple-500 rounded-full mr-3"></div>
                                    Provide customer support
                                </div>
                                <div class="flex items-center text-gray-700">
                                    <div class="w-2 h-2 bg-purple-500 rounded-full mr-3"></div>
                                    Send order and account updates
                                </div>
                                <div class="flex items-center text-gray-700">
                                    <div class="w-2 h-2 bg-purple-500 rounded-full mr-3"></div>
                                    Improve our website and services
                                </div>
                                <div class="flex items-center text-gray-700">
                                    <div class="w-2 h-2 bg-purple-500 rounded-full mr-3"></div>
                                    Personalize your experience
                                </div>
                                <div class="flex items-center text-gray-700">
                                    <div class="w-2 h-2 bg-purple-500 rounded-full mr-3"></div>
                                    Send marketing communications
                                </div>
                                <div class="flex items-center text-gray-700">
                                    <div class="w-2 h-2 bg-purple-500 rounded-full mr-3"></div>
                                    Detect and prevent fraud
                                </div>
                                <div class="flex items-center text-gray-700">
                                    <div class="w-2 h-2 bg-purple-500 rounded-full mr-3"></div>
                                    Comply with legal obligations
                                </div>
                            </div>
                        </section>

                        <section class="bg-white rounded-lg shadow-sm p-6 hover:shadow-md transition-shadow duration-200">
                            <h2 class="text-2xl font-bold mb-4 text-gray-900 border-b border-gray-200 pb-2">4. Information Sharing and Disclosure</h2>
                            <p class="mb-4 text-gray-700">We may share your information in the following circumstances:</p>
                            <div class="space-y-3">
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <span class="font-semibold text-gray-800">Service Providers:</span>
                                    <span class="text-gray-700 ml-2">With third-party vendors who perform services on our behalf</span>
                                </div>
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <span class="font-semibold text-gray-800">Payment Processors:</span>
                                    <span class="text-gray-700 ml-2">To process payments and prevent fraud</span>
                                </div>
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <span class="font-semibold text-gray-800">Shipping Partners:</span>
                                    <span class="text-gray-700 ml-2">To deliver your orders</span>
                                </div>
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <span class="font-semibold text-gray-800">Legal Requirements:</span>
                                    <span class="text-gray-700 ml-2">When required by law or to protect our rights</span>
                                </div>
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <span class="font-semibold text-gray-800">Business Transfers:</span>
                                    <span class="text-gray-700 ml-2">In connection with a merger, acquisition, or sale of assets</span>
                                </div>
                            </div>
                            <div class="mt-4 p-4 bg-blue-50 border-l-4 border-blue-400 rounded-r-lg">
                                <p class="text-blue-800 font-medium">We do not sell, trade, or rent your personal information to third parties for marketing purposes.</p>
                            </div>
                        </section>

                        <section class="bg-white rounded-lg shadow-sm p-6 hover:shadow-md transition-shadow duration-200">
                            <h2 class="text-2xl font-bold mb-4 text-gray-900 border-b border-gray-200 pb-2">5. Data Security</h2>
                            <p class="mb-4 text-gray-700">
                                We implement appropriate technical and organizational security measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction. However, no method of transmission over the internet or electronic storage is 100% secure.
                            </p>
                            <p class="mb-4 text-gray-700 font-medium">Security measures include:</p>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                <div class="flex items-center text-gray-700">
                                    <div class="w-2 h-2 bg-red-500 rounded-full mr-3"></div>
                                    SSL encryption for data transmission
                                </div>
                                <div class="flex items-center text-gray-700">
                                    <div class="w-2 h-2 bg-red-500 rounded-full mr-3"></div>
                                    Secure payment processing
                                </div>
                                <div class="flex items-center text-gray-700">
                                    <div class="w-2 h-2 bg-red-500 rounded-full mr-3"></div>
                                    Regular security audits
                                </div>
                                <div class="flex items-center text-gray-700">
                                    <div class="w-2 h-2 bg-red-500 rounded-full mr-3"></div>
                                    Access controls and authentication
                                </div>
                                <div class="flex items-center text-gray-700 md:col-span-2">
                                    <div class="w-2 h-2 bg-red-500 rounded-full mr-3"></div>
                                    Employee training on data protection
                                </div>
                            </div>
                        </section>

                        <section class="bg-white rounded-lg shadow-sm p-6 hover:shadow-md transition-shadow duration-200">
                            <h2 class="text-2xl font-bold mb-4 text-gray-900 border-b border-gray-200 pb-2">6. Cookies and Tracking Technologies</h2>
                            <p class="mb-4 text-gray-700">
                                We use cookies and similar tracking technologies to enhance your browsing experience, analyze site usage, and assist in our marketing efforts. You can control cookie preferences through your browser settings.
                            </p>
                            <p class="mb-4 text-gray-700 font-medium">Types of cookies we use:</p>
                            <div class="space-y-3">
                                <div class="bg-yellow-50 p-4 rounded-lg border-l-4 border-yellow-400">
                                    <span class="font-semibold text-yellow-800">Essential Cookies:</span>
                                    <span class="text-yellow-700 ml-2">Required for website functionality</span>
                                </div>
                                <div class="bg-indigo-50 p-4 rounded-lg border-l-4 border-indigo-400">
                                    <span class="font-semibold text-indigo-800">Analytics Cookies:</span>
                                    <span class="text-indigo-700 ml-2">Help us understand how visitors use our site</span>
                                </div>
                                <div class="bg-pink-50 p-4 rounded-lg border-l-4 border-pink-400">
                                    <span class="font-semibold text-pink-800">Marketing Cookies:</span>
                                    <span class="text-pink-700 ml-2">Used to deliver relevant advertisements</span>
                                </div>
                                <div class="bg-teal-50 p-4 rounded-lg border-l-4 border-teal-400">
                                    <span class="font-semibold text-teal-800">Preference Cookies:</span>
                                    <span class="text-teal-700 ml-2">Remember your settings and preferences</span>
                                </div>
                            </div>
                        </section>

                        <section class="bg-white rounded-lg shadow-sm p-6 hover:shadow-md transition-shadow duration-200">
                            <h2 class="text-2xl font-bold mb-4 text-gray-900 border-b border-gray-200 pb-2">7. Your Rights and Choices</h2>
                            <p class="mb-4 text-gray-700">You have the right to:</p>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                <div class="flex items-center text-gray-700">
                                    <div class="w-2 h-2 bg-emerald-500 rounded-full mr-3"></div>
                                    Access your personal information
                                </div>
                                <div class="flex items-center text-gray-700">
                                    <div class="w-2 h-2 bg-emerald-500 rounded-full mr-3"></div>
                                    Update or correct your information
                                </div>
                                <div class="flex items-center text-gray-700">
                                    <div class="w-2 h-2 bg-emerald-500 rounded-full mr-3"></div>
                                    Delete your account and personal data
                                </div>
                                <div class="flex items-center text-gray-700">
                                    <div class="w-2 h-2 bg-emerald-500 rounded-full mr-3"></div>
                                    Opt-out of marketing communications
                                </div>
                                <div class="flex items-center text-gray-700">
                                    <div class="w-2 h-2 bg-emerald-500 rounded-full mr-3"></div>
                                    Restrict processing of your data
                                </div>
                                <div class="flex items-center text-gray-700">
                                    <div class="w-2 h-2 bg-emerald-500 rounded-full mr-3"></div>
                                    Data portability
                                </div>
                            </div>
                            <p class="mt-4 text-gray-700">
                                To exercise these rights, please contact us using the information provided below.
                            </p>
                        </section>

                        <!-- Remaining sections with similar styling -->
                        <section class="bg-white rounded-lg shadow-sm p-6 hover:shadow-md transition-shadow duration-200">
                            <h2 class="text-2xl font-bold mb-4 text-gray-900 border-b border-gray-200 pb-2">8. Third-Party Links</h2>
                            <p class="text-gray-700 leading-relaxed">
                                Our website may contain links to third-party websites. We are not responsible for the privacy practices or content of these external sites. We encourage you to review the privacy policies of any third-party sites you visit.
                            </p>
                        </section>

                        <section class="bg-white rounded-lg shadow-sm p-6 hover:shadow-md transition-shadow duration-200">
                            <h2 class="text-2xl font-bold mb-4 text-gray-900 border-b border-gray-200 pb-2">9. Children's Privacy</h2>
                            <p class="text-gray-700 leading-relaxed">
                                Our services are not intended for children under the age of 13. We do not knowingly collect personal information from children under 13. If you are a parent or guardian and believe your child has provided us with personal information, please contact us.
                            </p>
                        </section>

                        <section class="bg-white rounded-lg shadow-sm p-6 hover:shadow-md transition-shadow duration-200">
                            <h2 class="text-2xl font-bold mb-4 text-gray-900 border-b border-gray-200 pb-2">10. International Users</h2>
                            <p class="text-gray-700 leading-relaxed">
                                If you are accessing our website from outside the United States, please note that your information may be transferred to, stored, and processed in the United States where our servers are located.
                            </p>
                        </section>

                        <section class="bg-white rounded-lg shadow-sm p-6 hover:shadow-md transition-shadow duration-200">
                            <h2 class="text-2xl font-bold mb-4 text-gray-900 border-b border-gray-200 pb-2">11. Changes to This Privacy Policy</h2>
                            <p class="text-gray-700 leading-relaxed">
                                We may update this Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page and updating the "Last Updated" date. We encourage you to review this Privacy Policy periodically.
                            </p>
                        </section>

                        <!-- Contact Section -->
                        <section class="bg-white rounded-lg shadow-sm p-6 hover:shadow-md transition-shadow duration-200">
                            <h2 class="text-2xl font-bold mb-4 text-gray-900 border-b border-gray-200 mt-2">12. Contact Information</h2>
                            <p class="mb-6 text-gray-700">
                                If you have any questions about this Privacy Policy or our privacy practices, please contact us at:
                            </p>
                            <div class="bg-gradient-to-r my-2 from-blue-50 to-indigo-50 p-6 rounded-xl border border-blue-200">
                                <h3 class="text-xl font-bold text-gray-900 mb-4">Roluxe Accessories</h3>
                                <div class="space-y-3">
                                    <div class="flex items-center">
                                        <div class="w-4 h-4 bg-blue-500 rounded-full mr-3"></div>
                                        <span class="font-medium text-gray-700">Email:</span>
                                        <span class="text-blue-600 ml-2">privacy@roluxeaccessories.com</span>
                                    </div>
                                    <div class="flex items-center">
                                        <div class="w-4 h-4 bg-green-500 rounded-full mr-3"></div>
                                        <span class="font-medium text-gray-700">Phone:</span>
                                        <span class="text-gray-600 ml-2">{{config_get('contact_phone')}}</span>
                                    </div>
                                    <div class="flex items-center">
                                        <div class="w-4 h-4 bg-orange-500 rounded-full mr-3"></div>
                                        <span class="font-medium text-gray-700">Address:</span>
                                        <span class="text-gray-600 ml-2">{{config_get('contact_address')}}</span>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <!-- Footer Section -->
                        <div class="bg-white rounded-lg shadow-sm p-6 border-t-4 border-blue-500">
                            <p class="text-sm text-gray-600 text-center">
                                This Privacy Policy was last updated on {{ date('F j, Y') }}. Please check back regularly for updates.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('partials.footer')
    </main>
</x-layouts.main>