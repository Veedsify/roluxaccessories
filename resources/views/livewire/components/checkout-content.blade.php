<div data-is-logged-in="{{ $isLoggedIn ? 'true' : 'false' }}" data-first-name="{{ $firstName }}" data-last-name="{{ $lastName }}" data-email="{{ $email }}" data-phone-number="{{ $phoneNumber }}" data-city="{{ $city }}" data-street="{{ $street }}" data-state="{{ $state }}" data-postal-code="{{ $postalCode }}" data-csrf-token="{{ csrf_token() }}" wire:init="$dispatch('checkout-init')">
    <div class="container mx-auto py-10">
        <h2 class="text-2xl font-semibold text-center mb-8">Checkout</h2>

        <!-- Progress Steps -->
        <div class="progress-bar mb-8">
            <div class="flex items-center justify-center space-x-8">
                <div class="progress-step active flex items-center space-x-2">
                    <div class="step-circle w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center text-sm font-medium">1</div>
                    <span class="text-sm font-medium">Information</span>
                </div>
                <div class="progress-step flex items-center space-x-2 opacity-60">
                    <div class="step-circle w-8 h-8 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center text-sm font-medium">2</div>
                    <span class="text-sm font-medium">Payment</span>
                </div>
                <div class="progress-step flex items-center space-x-2 opacity-60">
                    <div class="step-circle w-8 h-8 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center text-sm font-medium">3</div>
                    <span class="text-sm font-medium">Confirmation</span>
                </div>
            </div>
        </div>

        <div class="content-main flex max-lg:flex-col-reverse gap-y-10 gap-x-8 justify-between">
            <div class="left lg:w-1/2 w-full">
                @if(!$isLoggedIn)
                <div class="login bg-surface py-3 px-4 flex justify-between rounded-lg mb-4">
                    <div class="left flex items-center">
                        <span class="text-on-surface-variant1 pr-4">Already have an account?</span>
                        <span class="text-button text-on-surface hover-underline cursor-pointer hover:underline" onclick="toggleLoginForm()">Login</span>
                    </div>
                    <div class="right">
                        <i class="ph ph-caret-down fs-20 cursor-pointer" onclick="toggleLoginForm()"></i>
                    </div>
                </div>
                <div class="form-login-block mt-3" id="loginForm" style="display: none;">
                    <form class="p-5 border border-line rounded-lg" onsubmit="handleLogin(event)">
                        <div class="grid sm:grid-cols-2 gap-5">
                            <div class="email">
                                <input class="border-line px-4 pt-3 pb-3 w-full rounded-lg" type="email" placeholder="Username or email" id="loginEmail" required />
                                <span class="text-red-500 text-sm" id="loginEmailError"></span>
                            </div>
                            <div class="pass">
                                <input class="border-line px-4 pt-3 pb-3 w-full rounded-lg" type="password" placeholder="Password" id="loginPassword" required />
                                <span class="text-red-500 text-sm" id="loginPasswordError"></span>
                            </div>
                        </div>
                        <div class="block-button mt-3">
                            <button type="submit" class="button-main button-blue-hover w-full" id="loginBtn">Login</button>
                        </div>
                    </form>
                </div>
                @endif

                <div class="information mt-5">
                    <div class="heading5 flex items-center gap-2 mb-2">
                        <i class="ph ph-user-circle text-primary"></i>
                        Information
                    </div>
                    <div class="form-checkout mt-5">
                        <form id="checkoutForm" onsubmit="handleCheckout(event)">
                            <div class="grid sm:grid-cols-2 gap-4 gap-y-5 flex-wrap">
                                <div>
                                    <input class="border-line px-4 py-3 w-full rounded-lg" id="firstName" type="text" placeholder="First Name *" required>
                                    <span class="text-red-500 text-sm mt-1 block" id="firstNameError"></span>
                                </div>
                                <div>
                                    <input class="border-line px-4 py-3 w-full rounded-lg" id="lastName" type="text" placeholder="Last Name *" required>
                                    <span class="text-red-500 text-sm mt-1 block" id="lastNameError"></span>
                                </div>
                                <div>
                                    <input class="border-line px-4 py-3 w-full rounded-lg" id="email" type="email" placeholder="Email Address *" required>
                                    <span class="text-red-500 text-sm mt-1 block" id="emailError"></span>
                                </div>
                                <div>
                                    <input class="border-line px-4 py-3 w-full rounded-lg" id="phoneNumber" type="tel" placeholder="Phone Number *" required>
                                    <span class="text-red-500 text-sm mt-1 block" id="phoneNumberError"></span>
                                </div>
                                <div class="col-span-full select-block">
                                    <select class="border border-line px-4 py-3 w-full rounded-lg" id="country">
                                        <option value="Nigeria">Nigeria</option>
                                    </select>
                                    <i class="ph ph-caret-down arrow-down"></i>
                                </div>
                                <div>
                                    <input class="border-line px-4 py-3 w-full rounded-lg" id="city" type="text" placeholder="Town/City *" required>
                                    <span class="text-red-500 text-sm mt-1 block" id="cityError"></span>
                                </div>
                                <div>
                                    <input class="border-line px-4 py-3 w-full rounded-lg" id="street" type="text" placeholder="Street Address *" required>
                                    <span class="text-red-500 text-sm mt-1 block" id="streetError"></span>
                                </div>
                                <div class="select-block">
                                    <select class="border border-line px-4 py-3 w-full rounded-lg" id="state" onchange="updateShipping()" required>
                                        <option value="">Choose State *</option>
                                    </select>
                                    <i class="ph ph-caret-down arrow-down"></i>
                                    <span class="text-red-500 text-sm mt-1 block" id="stateError"></span>
                                </div>
                                <div>
                                    <input class="border-line px-4 py-3 w-full rounded-lg" id="postalCode" type="text" placeholder="Postal Code *" required>
                                    <span class="text-red-500 text-sm mt-1 block" id="postalCodeError"></span>
                                </div>
                                <div class="col-span-full">
                                    <textarea class="border border-line px-4 py-3 w-full rounded-lg" id="note" name="note" placeholder="Order notes (optional)"></textarea>
                                </div>
                            </div>

                            <div class="payment-block md:mt-10 mt-6">
                                <div class="heading5 flex items-center gap-2 mb-2">
                                    <i class="ph ph-credit-card text-primary"></i>
                                    Bank Transfer Payment
                                </div>
                                <div class="list-payment mt-5">
                                    <div class="bg-surface p-5 border border-line rounded-lg">
                                        <div class="text-on-surface-variant1 mt-3">
                                            Make your payment directly into our bank account. Your order will not be shipped until the funds have cleared in our account.
                                        </div>
                                        <div class="space-y-2 text-sm mt-3">
                                            <div class="flex justify-between">
                                                <span class="text-gray-600">Bank Name:</span>
                                                <span class="font-medium">Wema Bank</span>
                                            </div>
                                            <div class="flex justify-between">
                                                <span class="text-gray-600">Account Name:</span>
                                                <span class="font-medium">Aseye Ronke Oluwagbemisola</span>
                                            </div>
                                            <div class="flex justify-between">
                                                <span class="text-gray-600">Account Number:</span>
                                                <span class="font-medium">0268105037</span>
                                            </div>
                                            <div class="flex justify-between">
                                                <span class="text-gray-600">Sort Code:</span>
                                                <span class="font-medium">035</span>
                                            </div>
                                        </div>
                                        <div class="mt-2 text-xs text-black">
                                            <strong>Note:</strong> Please use your order number as payment reference.
                                        </div>
                                    </div>
                                    <div class="upload-receipt mt-6">
                                        <label for="paymentReceipt" class="block text-sm font-semibold text-gray-800 mb-2">
                                            <i class="ph ph-upload-simple mr-1 text-primary"></i>
                                            Upload Payment Receipt <span class="text-red-500">*</span>
                                        </label>
                                        <div class="upload_file border-2 border-dashed border-gray-300 p-6 rounded-lg text-center hover:border-primary transition-colors cursor-pointer">
                                            <div class="flex flex-col items-center gap-4">
                                                <div class="upload-icon">
                                                    <i class="ph ph-upload-simple text-3xl text-gray-400"></i>
                                                </div>
                                                <div>
                                                    <label for="paymentReceipt" class="inline-flex items-center px-4 py-2 bg-primary text-white rounded-lg cursor-pointer hover:bg-blue-700 transition-colors">
                                                        <i class="ph ph-paperclip mr-2"></i>
                                                        <span>Select File</span>
                                                        <input type="file" id="paymentReceipt" accept="image/*,application/pdf" required onchange="handleFileUpload(this)" class="hidden" />
                                                    </label>
                                                    <div class="text-sm text-gray-600 mt-2">or drag and drop your file here</div>
                                                </div>
                                                <div id="fileStatus" class="text-sm text-gray-600">
                                                    <span class="text-gray-500">No file selected</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-xs text-gray-500 mt-1">
                                            Accepted: PDF, JPG, JPEG, PNG (Max 5MB)
                                        </div>
                                        <div class="text-red-500 text-sm mt-1" id="paymentReceiptError"></div>
                                        <div class="text-blue-500 text-sm mt-1 hidden" id="uploadProgress">
                                            <i class="ph ph-spinner animate-spin mr-1"></i>
                                            Uploading file...
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="checkout-actions md:mt-10 mt-6 space-y-4">
                                <button type="button" class="button-main w-full checkout-proceed-btn hover:bg-blue-700 py-3 px-6 rounded-lg font-medium " onclick="proceedToPaymentEnhanced()">
                                    <i class="ph ph-arrow-right mr-2"></i>
                                    Continue
                                </button>

                                <div id="place-order-section" style="display: none;">
                                    <div class="bg-amber-50 border border-amber-200 rounded-lg p-4 mb-4">
                                        <div class="flex items-start gap-3">
                                            <i class="ph ph-warning-circle text-amber-600 text-lg mt-0.5"></i>
                                            <div>
                                                <div class="text-amber-800 text-sm font-medium mb-1">Payment Confirmation Required</div>
                                                <p class="text-amber-700 text-sm">
                                                    Please ensure you have uploaded your payment receipt before placing the order. Your order will be processed once payment is confirmed.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="button-main w-full hover:bg-green-700 py-3 px-6 rounded-lg font-medium transition-colors disabled:opacity-50 disabled:cursor-not-allowed mt-3" id="placeOrderBtn">
                                        <span id="orderBtnText">
                                            <i class="ph ph-check-circle mr-2"></i>
                                            Confirm & Place Order
                                        </span>
                                        <span id="orderBtnLoading" class="hidden">
                                            <div class="w-4 h-4 border-2 border-white border-t-transparent rounded-full animate-spin inline-block mr-2"></div>
                                            Processing Order...
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="right lg:w-5/12 w-full">
                <div class="checkout-block bg-white rounded-lg shadow-lg p-6 sticky top-4" id="orderSummary">
                    <div class="heading5 pb-4 border-b border-gray-200 mb-4 flex items-center gap-2">
                        <i class="ph ph-shopping-cart text-primary"></i>
                        Your Order
                    </div>
                    <div class="list-product-checkout max-h-96 overflow-y-auto" id="cartItems">
                        <div class="empty-cart text-center py-8">
                            <div class="text-gray-500">
                                <i class="ph ph-shopping-cart text-4xl mb-2 block"></i>
                                Loading cart...
                            </div>
                        </div>
                    </div>
                    <div class="order-summary-totals mt-4 pt-4 border-gray-200 space-y-3">
                        <div class="ship-block flex justify-between items-center py-2">
                            <div class="text-gray-600">
                                Shipping <span id="selectedState" class="text-sm text-gray-500"></span>
                            </div>
                            <div class="font-medium">
                                <span id="shippingCost" class="text-gray-500">Select state</span>
                            </div>
                        </div>
                        <div class="subtotal-block flex justify-between items-center py-2">
                            <div class="text-gray-600">Subtotal</div>
                            <div class="font-medium">₦<span id="subtotal">0.00</span></div>
                        </div>
                        <div class="total-block flex justify-between items-center py-3 border-t border-gray-200 mt-3">
                            <div class="text-lg font-semibold">Total</div>
                            <div class="text-lg font-bold text-primary">₦<span id="total">0.00</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
