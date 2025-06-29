<x-layouts.main :title="$this->title ?? config('app.name')">
    @push('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/checkout-enhancements.css') }}">
    <link rel="stylesheet" href="{{ asset('css/checkout-custom.css') }}">
    <style>
        .upload_file.dragover {
            border-color: #black;
            background-color: #eff6ff;
        }

        .progress-step.active .step-circle {
            background-color: #black !important;
            color: white !important;
        }

        .progress-step.completed .step-circle {
            background-color: #10b981 !important;
            color: white !important;
        }

        .receipt-preview {
            width: 100px;
            height: 100px;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            overflow: hidden;
        }

        .checkout-notification {
            animation: slideIn 0.3s ease-out;
        }

        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

    </style>
    @endpush

    <main>
        @livewire("components.top-nav")
        @livewire("components.nav-bar")

        @livewire('components.checkout-content')

        @include('partials.footer')
    </main>

    <script src="{{ asset('frontend/js/checkout.js') }}"></script>
    <script>
        // Initialize checkout manager when page loads
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Checkout page loaded, ensuring manager is initialized...');
            initializeCheckoutManagerSafely();
        });

        // Fallback for Livewire
        document.addEventListener('livewire:navigated', function() {
            console.log('Livewire navigated, reinitializing checkout manager...');
            initializeCheckoutManagerSafely();
        });

        // Safe initialization function
        function initializeCheckoutManagerSafely() {
            try {
                if (!window.checkoutManager && typeof SimpleCheckoutManager !== 'undefined') {
                    console.log('Creating new SimpleCheckoutManager instance...');
                    window.checkoutManager = new SimpleCheckoutManager();
                    console.log('Checkout manager initialized successfully');
                } else if (!window.checkoutManager) {
                    console.error('SimpleCheckoutManager class not found');
                    // Fallback: try to reload the script
                    setTimeout(() => {
                        if (typeof SimpleCheckoutManager !== 'undefined') {
                            window.checkoutManager = new SimpleCheckoutManager();
                            console.log('Checkout manager initialized on retry');
                        }
                    }, 500);
                }
            } catch (error) {
                console.error('Error initializing checkout manager:', error);
            }
        }

        // Enhanced validation function with fallback
        function validateCheckoutForm() {
            if (!window.checkoutManager) {
                console.warn('Checkout manager not initialized, attempting to initialize...');
                initializeCheckoutManagerSafely();

                // Wait a bit and try again
                setTimeout(() => {
                    if (window.checkoutManager && typeof window.checkoutManager.validateForm === 'function') {
                        return window.checkoutManager.validateForm();
                    } else {
                        // Fallback validation
                        return fallbackValidateForm();
                    }
                }, 100);
                return false;
            }

            if (typeof window.checkoutManager.validateForm === 'function') {
                return window.checkoutManager.validateForm();
            } else {
                console.warn('validateForm method not found, using fallback validation');
                return fallbackValidateForm();
            }
        }

        // Fallback validation function
        function fallbackValidateForm() {
            const requiredFields = [
                'firstName', 'lastName', 'email', 'phoneNumber'
                , 'city', 'street', 'state', 'postalCode'
            ];
            let isValid = true;
            let firstInvalidField = null;

            // Clear previous errors
            requiredFields.forEach(field => {
                const errorElement = document.getElementById(field + 'Error');
                const fieldElement = document.getElementById(field);
                if (errorElement) {
                    errorElement.textContent = '';
                }
                if (fieldElement) {
                    fieldElement.classList.remove('border-red-500');
                }
            });

            // Validate required fields
            requiredFields.forEach(field => {
                const element = document.getElementById(field);
                if (element && !element.value.trim()) {
                    isValid = false;
                    element.classList.add('border-red-500');
                    const errorElement = document.getElementById(field + 'Error');
                    if (errorElement) {
                        errorElement.textContent = 'This field is required';
                    }
                    if (!firstInvalidField) {
                        firstInvalidField = element;
                    }
                }
            });

            // Validate email format
            const emailElement = document.getElementById('email');
            if (emailElement) {
                const email = emailElement.value;
                if (email && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                    isValid = false;
                    emailElement.classList.add('border-red-500');
                    const errorElement = document.getElementById('emailError');
                    if (errorElement) {
                        errorElement.textContent = 'Please enter a valid email address';
                    }
                    if (!firstInvalidField) {
                        firstInvalidField = emailElement;
                    }
                }
            }

            // Focus first invalid field
            if (!isValid && firstInvalidField) {
                firstInvalidField.focus();
                firstInvalidField.scrollIntoView({
                    behavior: 'smooth'
                    , block: 'center'
                });
            }

            return isValid;
        }

        // Debug helper
        window.debugCheckout = function() {
            console.log('=== Checkout Debug ===');
            console.log('CheckoutManager exists:', !!window.checkoutManager);
            console.log('SimpleCheckoutManager class:', typeof SimpleCheckoutManager);
            console.log('validateForm method:', window.checkoutManager ? typeof window.checkoutManager.validateForm : 'N/A');
            if (window.checkoutManager) {
                const cartLength = window.checkoutManager.cart ? window.checkoutManager.cart.length : 0;
                const statesLength = window.checkoutManager.states ? window.checkoutManager.states.length : 0;
                console.log('Cart items:', cartLength);
                console.log('States loaded:', statesLength);
            }
        };

        // Override the global proceedToPayment function to use our enhanced validation
        window.proceedToPaymentEnhanced = function() {
            console.log('Enhanced proceedToPayment called');

            // Validate form fields using our enhanced validation
            if (!validateCheckoutForm()) {
                showNotification('Please fill in all required fields correctly.', 'error');
                return;
            }

            // Validate cart is not empty
            let cart = [];
            if (window.checkoutManager && window.checkoutManager.cart) {
                cart = window.checkoutManager.cart;
            } else {
                try {
                    cart = JSON.parse(localStorage.getItem('cart') || '[]');
                } catch (e) {
                    cart = [];
                }
            }

            if (cart.length === 0) {
                showNotification('Your cart is empty. Please add items before checking out.', 'error');
                return;
            }

            // Validate shipping state is selected
            const stateSelect = document.getElementById('state');
            if (!stateSelect || !stateSelect.value) {
                showNotification('Please select your state to calculate shipping.', 'error');
                return;
            }

            // Validate payment receipt is uploaded
            const paymentReceiptInput = document.getElementById('paymentReceipt');
            if (!paymentReceiptInput || !paymentReceiptInput.files || paymentReceiptInput.files.length === 0) {
                showNotification('Please upload your payment receipt before proceeding.', 'error');
                return;
            }

            // If all validation passes, proceed with the checkout
            const proceedBtn = document.querySelector('.checkout-proceed-btn');
            const placeOrderSection = document.getElementById('place-order-section');

            // Update progress to payment step
            updateProgressStep('payment');

            // Show success message
            showNotification('Form validated successfully! Please review your order and confirm.', 'success');

            // Hide proceed button and show place order section
            if (proceedBtn) {
                proceedBtn.style.display = 'none';
            }
            if (placeOrderSection) {
                placeOrderSection.style.display = 'block';
            }
        };

        // Simple notification function
        function showNotification(message, type = 'info') {
            // Remove existing notifications
            const existingNotifications = document.querySelectorAll('.checkout-notification');
            existingNotifications.forEach(n => n.remove());

            // Create notification
            const notification = document.createElement('div');
            notification.className = `checkout-notification fixed top-4 right-4 z-50 max-w-md p-4 rounded-lg shadow-lg transition-all duration-300 ${
                type === 'success' ? 'bg-green-500 text-white' :
                type === 'error' ? 'bg-red-500 text-white' : 'bg-blue-500 text-white'
            }`;

            notification.innerHTML = `
                <div class="flex items-center gap-3">
                    <i class="ph ${type === 'success' ? 'ph-check-circle' : type === 'error' ? 'ph-warning-circle' : 'ph-info'} text-xl"></i>
                    <span>${message}</span>
                    <button onclick="this.parentElement.parentElement.remove()" class="ml-auto hover:opacity-70">
                        <i class="ph ph-x text-lg"></i>
                    </button>
                </div>
            `;

            document.body.appendChild(notification);

            // Auto remove after 5 seconds
            setTimeout(() => {
                if (notification.parentElement) {
                    notification.remove();
                }
            }, 5000);
        }

        // Update progress step function
        function updateProgressStep(step) {
            const steps = document.querySelectorAll('.progress-step');
            const stepCircles = document.querySelectorAll('.step-circle');

            // Reset all steps
            steps.forEach((stepEl, index) => {
                stepEl.classList.remove('active');
                stepEl.classList.add('opacity-60');
                stepCircles[index].classList.remove('bg-primary', 'text-white', 'bg-green-500');
                stepCircles[index].classList.add('bg-gray-300', 'text-gray-600');
            });

            if (step === 'payment') {
                // Step 1 completed, Step 2 active
                steps[0].classList.add('opacity-100');
                stepCircles[0].classList.remove('bg-gray-300', 'text-gray-600');
                stepCircles[0].classList.add('bg-green-500', 'text-white');

                steps[1].classList.remove('opacity-60');
                steps[1].classList.add('active', 'opacity-100');
                stepCircles[1].classList.remove('bg-gray-300', 'text-gray-600');
                stepCircles[1].classList.add('bg-primary', 'text-white');
            } else if (step === 'confirmation') {
                // Steps 1 & 2 completed, Step 3 active
                [0, 1].forEach(i => {
                    steps[i].classList.add('opacity-100');
                    stepCircles[i].classList.remove('bg-gray-300', 'text-gray-600');
                    stepCircles[i].classList.add('bg-green-500', 'text-white');
                });

                steps[2].classList.remove('opacity-60');
                steps[2].classList.add('active', 'opacity-100');
                stepCircles[2].classList.remove('bg-gray-300', 'text-gray-600');
                stepCircles[2].classList.add('bg-primary', 'text-white');
            }
        }

    </script>
</x-layouts.main>
