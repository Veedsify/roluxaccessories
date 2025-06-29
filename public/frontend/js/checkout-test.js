// Checkout System Test Script
// This script validates the checkout functionality and provides debugging information

class CheckoutTester {
    constructor() {
        this.tests = [];
        this.results = {
            passed: 0,
            failed: 0,
            total: 0
        };
    }

    // Add a test case
    addTest(name, testFunction) {
        this.tests.push({ name, testFunction });
    }

    // Run all tests
    async runTests() {
        console.log('🧪 Starting Checkout System Tests...');
        console.log('=====================================');

        for (const test of this.tests) {
            try {
                await test.testFunction();
                this.logPass(test.name);
                this.results.passed++;
            } catch (error) {
                this.logFail(test.name, error.message);
                this.results.failed++;
            }
            this.results.total++;
        }

        this.showResults();
    }

    // Log test pass
    logPass(testName) {
        console.log(`✅ ${testName}`);
    }

    // Log test failure
    logFail(testName, error) {
        console.log(`❌ ${testName}: ${error}`);
    }

    // Show final results
    showResults() {
        console.log('=====================================');
        console.log(`📊 Test Results:`);
        console.log(`   Passed: ${this.results.passed}`);
        console.log(`   Failed: ${this.results.failed}`);
        console.log(`   Total:  ${this.results.total}`);
        console.log(`   Success Rate: ${((this.results.passed / this.results.total) * 100).toFixed(1)}%`);

        if (this.results.failed === 0) {
            console.log('🎉 All tests passed! Checkout system is ready.');
        } else {
            console.log('⚠️  Some tests failed. Please check the issues above.');
        }
    }

    // Assert helper
    assert(condition, message) {
        if (!condition) {
            throw new Error(message);
        }
    }

    // Wait helper
    wait(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }
}

// Initialize tester
const tester = new CheckoutTester();

// Test: Checkout Manager Initialization
tester.addTest('Checkout Manager Initialization', () => {
    tester.assert(
        typeof SimpleCheckoutManager !== 'undefined',
        'SimpleCheckoutManager class is not defined'
    );

    tester.assert(
        window.checkoutManager instanceof SimpleCheckoutManager,
        'Checkout manager instance not found or invalid'
    );
});

// Test: DOM Elements Presence
tester.addTest('Required DOM Elements', () => {
    const requiredElements = [
        'firstName',
        'lastName',
        'email',
        'phoneNumber',
        'city',
        'street',
        'state',
        'postalCode',
        'paymentReceipt',
        'cartItems',
        'orderSummary'
    ];

    requiredElements.forEach(elementId => {
        const element = document.getElementById(elementId);
        tester.assert(
            element !== null,
            `Required element '${elementId}' not found`
        );
    });
});

// Test: Form Validation Functions
tester.addTest('Form Validation', () => {
    tester.assert(
        typeof window.checkoutManager.validateForm === 'function',
        'validateForm method not available'
    );

    // Test empty form validation
    const isValid = window.checkoutManager.validateForm();
    tester.assert(
        !isValid,
        'Empty form should not validate as true'
    );
});

// Test: File Upload Functions
tester.addTest('File Upload Functions', () => {
    tester.assert(
        typeof handleFileUpload === 'function',
        'handleFileUpload function not defined'
    );

    tester.assert(
        typeof createFilePreview === 'function',
        'createFilePreview function not defined'
    );

    tester.assert(
        typeof removeFilePreview === 'function',
        'removeFilePreview function not defined'
    );
});

// Test: Progress Indicator
tester.addTest('Progress Indicator', () => {
    const progressSteps = document.querySelectorAll('.progress-step');
    tester.assert(
        progressSteps.length >= 3,
        'Progress indicator should have at least 3 steps'
    );

    tester.assert(
        typeof updateProgressStep === 'function',
        'updateProgressStep function not defined'
    );
});

// Test: Notification System
tester.addTest('Notification System', () => {
    tester.assert(
        typeof window.checkoutManager.showNotification === 'function',
        'showNotification method not available'
    );

    // Test notification creation
    window.checkoutManager.showNotification('Test notification', 'info');

    setTimeout(() => {
        const notification = document.querySelector('.checkout-notification');
        tester.assert(
            notification !== null,
            'Notification element not created'
        );

        // Clean up
        if (notification) {
            notification.remove();
        }
    }, 100);
});

// Test: Cart Loading
tester.addTest('Cart Loading', async () => {
    tester.assert(
        typeof window.checkoutManager.loadCart === 'function',
        'loadCart method not available'
    );

    tester.assert(
        typeof window.checkoutManager.updateOrderSummary === 'function',
        'updateOrderSummary method not available'
    );

    // Test cart array initialization
    tester.assert(
        Array.isArray(window.checkoutManager.cart),
        'Cart should be initialized as an array'
    );
});

// Test: Shipping Calculation
tester.addTest('Shipping Calculation', () => {
    tester.assert(
        typeof window.checkoutManager.updateShipping === 'function',
        'updateShipping method not available'
    );

    tester.assert(
        typeof window.checkoutManager.calculateTotal === 'function',
        'calculateTotal method not available'
    );

    // Test initial shipping cost
    tester.assert(
        typeof window.checkoutManager.shippingCost === 'number',
        'shippingCost should be a number'
    );
});

// Test: Order Placement Functions
tester.addTest('Order Placement', () => {
    tester.assert(
        typeof window.checkoutManager.placeOrder === 'function',
        'placeOrder method not available'
    );

    tester.assert(
        typeof handleCheckout === 'function',
        'handleCheckout function not defined'
    );

    tester.assert(
        typeof proceedToPayment === 'function',
        'proceedToPayment function not defined'
    );
});

// Test: CSS and Styling
tester.addTest('CSS and Styling', () => {
    const checkoutBlock = document.querySelector('.checkout-block');
    tester.assert(
        checkoutBlock !== null,
        'Main checkout block not found'
    );

    const orderSummary = document.getElementById('orderSummary');
    if (orderSummary) {
        const styles = window.getComputedStyle(orderSummary);
        tester.assert(
            styles.position === 'sticky' || styles.position === 'static',
            'Order summary should have proper positioning'
        );
    }
});

// Test: Local Storage Functions
tester.addTest('Local Storage Integration', () => {
    // Test localStorage availability
    tester.assert(
        typeof localStorage !== 'undefined',
        'localStorage not available'
    );

    // Test form auto-save setup
    tester.assert(
        typeof setupFormAutoSave === 'function',
        'setupFormAutoSave function not defined'
    );
});

// Test: Error Handling
tester.addTest('Error Handling', () => {
    tester.assert(
        typeof window.checkoutManager.displayValidationErrors === 'function',
        'displayValidationErrors method not available'
    );

    tester.assert(
        typeof window.checkoutManager.showLoadingOverlay === 'function',
        'showLoadingOverlay method not available'
    );
});

// Test: Mobile Responsiveness Check
tester.addTest('Mobile Responsiveness', () => {
    const viewport = document.querySelector('meta[name="viewport"]');
    tester.assert(
        viewport !== null,
        'Viewport meta tag should be present for mobile responsiveness'
    );

    const checkoutContent = document.querySelector('.content-main');
    if (checkoutContent) {
        const styles = window.getComputedStyle(checkoutContent);
        // Basic check for responsive design
        tester.assert(
            styles.display === 'flex' || styles.display === 'block',
            'Main content should have proper display property'
        );
    }
});

// Function to run manual tests
function runCheckoutTests() {
    console.clear();
    console.log('🔧 Running Checkout System Tests...');

    // Wait for DOM to be ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', () => {
            setTimeout(() => tester.runTests(), 500);
        });
    } else {
        setTimeout(() => tester.runTests(), 500);
    }
}

// Auto-run tests if in development mode
if (window.location.hostname === 'localhost' || window.location.hostname.includes('dev')) {
    console.log('🔧 Development mode detected. Auto-running checkout tests...');
    runCheckoutTests();
}

// Function to simulate form filling for testing
function fillTestData() {
    const testData = {
        firstName: 'John',
        lastName: 'Doe',
        email: 'john.doe@example.com',
        phoneNumber: '+234 812 345 6789',
        city: 'Lagos',
        street: '123 Test Street',
        state: 'Lagos',
        postalCode: '100001',
        note: 'Test order for checkout validation'
    };

    Object.keys(testData).forEach(field => {
        const element = document.getElementById(field);
        if (element) {
            element.value = testData[field];
            // Trigger input event for auto-save
            element.dispatchEvent(new Event('input', { bubbles: true }));
        }
    });

    console.log('📝 Test data filled in form');
}

// Function to simulate file upload for testing
function simulateFileUpload() {
    // Create a test file blob
    const testFile = new File(['test content'], 'test-receipt.pdf', {
        type: 'application/pdf',
        lastModified: Date.now()
    });

    if (window.checkoutManager) {
        window.checkoutManager.uploadedFile = testFile;
        console.log('📎 Test file uploaded');
    }
}

// Expose testing functions globally
window.runCheckoutTests = runCheckoutTests;
window.fillTestData = fillTestData;
window.simulateFileUpload = simulateFileUpload;

// Console helper messages
console.log('🧪 Checkout Test Script Loaded');
console.log('Available commands:');
console.log('- runCheckoutTests() - Run all validation tests');
console.log('- fillTestData() - Fill form with test data');
console.log('- simulateFileUpload() - Simulate file upload');
