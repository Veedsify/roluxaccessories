// Checkout Manager
class SimpleCheckoutManager {
  constructor() {
    this.cart = [];
    this.shippingCost = 0;
    this.subtotal = 0;
    this.total = 0;
    this.states = [];
    this.isLoggedIn = this.getDataAttribute("isLoggedIn") === "true";
    this.uploadedFile = null;
    this.init();
  }

  async init() {
    this.rootElement = document.querySelector("[data-is-logged-in]");
    await this.loadStates();
    this.loadCart();
    this.loadUserData();
    this.updateOrderSummary();

    // After everything is loaded, check for pre-selected state and calculate shipping
    this.checkInitialState();
  }

  checkInitialState() {
    // Wait a bit more to ensure all DOM elements are ready
    setTimeout(() => {
      const stateSelect = document.getElementById("state");
      if (stateSelect && stateSelect.value) {
        console.log('Checking initial state and calculating shipping:', stateSelect.value);
        this.updateShipping();
      }
    }, 500);
  }

  getDataAttribute(name) {
    return this.rootElement
      ? this.rootElement.dataset[this.camelCase(name)]
      : "";
  }

  camelCase(str) {
    return str.replace(/-([a-z])/g, (g) => g[1].toUpperCase());
  }

  async loadStates() {
    try {
      const response = await fetch("/api/shipping/states", {
        headers: {
          "X-CSRF-TOKEN": this.getDataAttribute("csrfToken"),
        },
      });
      const data = await response.json();
      if (data.success) {
        this.states = data.data;
        this.populateStates();
      }
    } catch (error) {
      console.error("Error loading states:", error);
    }
  }

  populateStates() {
    const stateSelect = document.getElementById("state");
    if (stateSelect) {
      console.log(this.states);
      this.states.forEach((state) => {
        const option = document.createElement("option");
        option.value = state.state;
        option.textContent = state.state;
        stateSelect.appendChild(option);
      });
    }
  }

  loadCart() {
    if (window.cartManager) {
      this.cart = window.cartManager.cart || [];
    } else {
      try {
        this.cart = JSON.parse(localStorage.getItem("cart") || "[]");
      } catch (e) {
        this.cart = [];
      }
    }
    this.calculateSubtotal();
  }

  loadUserData() {
    if (this.isLoggedIn) {
      const userData = {
        firstName: this.getDataAttribute("firstName"),
        lastName: this.getDataAttribute("lastName"),
        email: this.getDataAttribute("email"),
        phoneNumber: this.getDataAttribute("phoneNumber"),
        city: this.getDataAttribute("city"),
        street: this.getDataAttribute("street"),
        state: this.getDataAttribute("state"),
        postalCode: this.getDataAttribute("postalCode"),
      };

      Object.keys(userData).forEach((key) => {
        const element = document.getElementById(key);
        if (element && userData[key]) {
          element.value = userData[key];
        }
      });

      if (userData.state) {
        setTimeout(() => this.updateShipping(), 500);
      }
    }

    // Check if state is selected (even for non-logged-in users) and calculate shipping
    setTimeout(() => {
      const stateSelect = document.getElementById("state");
      if (stateSelect && stateSelect.value && !this.isLoggedIn) {
        console.log('Found pre-selected state on page load:', stateSelect.value);
        this.updateShipping();
      }
    }, 1000); // Give time for other scripts to load
  }

  calculateSubtotal() {
    this.subtotal = this.cart.reduce(
      (total, item) => total + item.price * item.quantity,
      0,
    );
    this.calculateTotal();

    // Recalculate shipping when subtotal changes (to check for free shipping eligibility)
    const stateSelect = document.getElementById("state");
    if (stateSelect && stateSelect.value) {
      this.updateShipping();
    }
  }

  calculateTotal() {
    this.total = this.subtotal + this.shippingCost;
  }

  async updateShipping() {
    const stateSelect = document.getElementById("state");
    const state = stateSelect ? stateSelect.value : "";

    if (!state) {
      this.shippingCost = 0;
      const shippingCostElement = document.getElementById("shippingCost");
      const selectedStateElement = document.getElementById("selectedState");

      if (shippingCostElement) {
        shippingCostElement.innerHTML =
          '<span class="text-gray-500">Select state</span>';
      }
      if (selectedStateElement) {
        selectedStateElement.textContent = "";
      }
      this.calculateTotal();
      this.updateTotals();
      return;
    }

    // Check if cart total qualifies for free shipping (₦50,000 or more)
    const freeShippingThreshold = 50000;
    const qualifiesForFreeShipping = this.subtotal >= freeShippingThreshold;

    if (qualifiesForFreeShipping) {
      // Free shipping for orders ₦50,000 and above
      this.shippingCost = 0;
      const shippingCostElement = document.getElementById("shippingCost");
      const selectedStateElement = document.getElementById("selectedState");

      if (shippingCostElement) {
        shippingCostElement.innerHTML =
          '<span class="text-green-600 font-medium">FREE</span>';
      }
      if (selectedStateElement) {
        selectedStateElement.textContent = `(${state})`;
      }

      this.calculateTotal();
      this.updateTotals();
      return;
    }

    try {
      const response = await fetch("/api/shipping/calculate", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "X-CSRF-TOKEN": this.getDataAttribute("csrfToken"),
        },
        body: JSON.stringify({
          state: state,
          cart_total: this.subtotal
        }),
      });

      const data = await response.json();
      if (data.success) {
        this.shippingCost = data.data.shipping_cost;
        const shippingCostElement = document.getElementById("shippingCost");
        const selectedStateElement = document.getElementById("selectedState");

        if (shippingCostElement) {
          if (data.data.is_free_shipping) {
            shippingCostElement.innerHTML =
              '<span class="text-green-600 font-medium">FREE</span>';
          } else {
            shippingCostElement.textContent =
              "₦" + this.shippingCost.toLocaleString();
          }
        }
        if (selectedStateElement) {
          selectedStateElement.textContent = `(${state})`;
        }
      } else {
        this.shippingCost = 0;
        const shippingCostElement = document.getElementById("shippingCost");
        if (shippingCostElement) {
          shippingCostElement.innerHTML =
            '<span class="text-gray-500">Not available</span>';
        }
      }
    } catch (error) {
      console.error("Error calculating shipping:", error);
      this.shippingCost = 0;
      const shippingCostElement = document.getElementById("shippingCost");
      if (shippingCostElement) {
        shippingCostElement.innerHTML =
          '<span class="text-gray-500">Error</span>';
      }
    }

    this.calculateTotal();
    this.updateTotals();
  }

  updateOrderSummary() {
    const cartItemsContainer = document.getElementById("cartItems");
    if (!cartItemsContainer) return;

    if (this.cart.length === 0) {
      cartItemsContainer.innerHTML = `
        <div class="empty-cart text-center py-8">
          <div class="text-gray-500">
            <i class="ph ph-shopping-cart text-4xl mb-2 block"></i>
            Your cart is empty
          </div>
        </div>`;
      this.updateTotals();
      return;
    }

    let itemsHTML = "";
    this.cart.forEach((item) => {
      itemsHTML += `
        <div class="item flex items-center gap-4 py-4 border-gray-100 last:border-b-0 hover:bg-gray-50 rounded-lg transition-colors">
          <div class="product-image w-16 h-16 flex-shrink-0">
            ${item.image
          ? `<img src="${item.image}" alt="${item.name}" class="w-full h-full object-cover rounded-lg border border-gray-200">`
          : `<div class="w-full h-full bg-gray-200 rounded-lg flex items-center justify-center">
                     <i class="ph ph-image text-gray-400 text-xl"></i>
                   </div>`
        }
          </div>
          <div class="product-info flex-1 min-w-0">
            <div class="name font-medium text-gray-900 truncate">${item.name || "Product"}</div>
            ${item.color?.name || item.size?.name
          ? `<div class="variant text-sm text-gray-600 mt-1 flex items-center gap-2">
                     ${item.color?.name ? `<span class="bg-gray-100 pr-2 py-1 rounded text-xs">${item.color.name}</span>` : ""}
                     ${item.size?.name ? `<span class="bg-gray-100 pr-2 py-1 rounded text-xs">${item.size.name}</span>` : ""}
                   </div>`
          : ""
        }
            <div class="quantity text-sm text-gray-500 mt-1">Qty: ${item.quantity || 1}</div>
          </div>
          <div class="price ml-auto font-semibold text-gray-900">₦${((item.price || 0) * (item.quantity || 1)).toLocaleString()}</div>
        </div>`;
    });

    cartItemsContainer.innerHTML = itemsHTML;
    this.updateTotals();
  } updateTotals() {
    const subtotalElement = document.getElementById("subtotal");
    const totalElement = document.getElementById("total");

    if (subtotalElement) {
      subtotalElement.textContent = this.subtotal.toLocaleString();
    }
    if (totalElement) {
      totalElement.textContent = this.total.toLocaleString();
    }

    // Update free shipping indicator
    this.updateFreeShippingIndicator();
  }

  updateFreeShippingIndicator() {
    const freeShippingThreshold = 50000;
    const indicator = document.getElementById("freeShippingIndicator");
    const text = document.getElementById("freeShippingText");
    const progress = document.getElementById("freeShippingProgress");
    const progressBar = document.getElementById("freeShippingProgressBar");

    if (!indicator || !text) return;

    const remaining = freeShippingThreshold - this.subtotal;

    if (this.subtotal >= freeShippingThreshold) {
      // Qualified for free shipping
      indicator.className = "free-shipping-indicator mt-4 p-3 rounded-lg border border-green-200 bg-green-50";
      text.className = "text-sm font-medium text-green-700";
      text.innerHTML = '<i class="ph ph-check-circle mr-1"></i>Congratulations! You qualify for FREE shipping!';

      if (progress) {
        progress.classList.add("hidden");
      }
    } else {
      // Show how much more is needed
      const progressPercentage = Math.min((this.subtotal / freeShippingThreshold) * 100, 100);

      indicator.className = "free-shipping-indicator mt-4 p-3 rounded-lg border border-blue-200 bg-blue-50";
      text.className = "text-sm font-medium text-blue-700";
      text.innerHTML = `Add ₦${remaining.toLocaleString()} more to qualify for FREE shipping!`;

      if (progress && progressBar) {
        progress.classList.remove("hidden");
        progressBar.style.width = `${progressPercentage}%`;
      }
    }

    indicator.classList.remove("hidden");
  }

  validateForm() {
    const requiredFields = [
      "firstName",
      "lastName",
      "email",
      "phoneNumber",
      "city",
      "street",
      "state",
      "postalCode",
    ];
    let isValid = true;
    let firstInvalidField = null;

    // Clear previous errors
    requiredFields.forEach((field) => {
      const errorElement = document.getElementById(field + "Error");
      const fieldElement = document.getElementById(field);
      if (errorElement) {
        errorElement.textContent = "";
      }
      if (fieldElement) {
        fieldElement.classList.remove("border-red-500");
      }
    });

    requiredFields.forEach((field) => {
      const element = document.getElementById(field);
      if (element && !element.value.trim()) {
        isValid = false;
        element.classList.add("border-red-500");
        const errorElement = document.getElementById(field + "Error");
        if (errorElement) {
          errorElement.textContent = "This field is required";
        }
        if (!firstInvalidField) {
          firstInvalidField = element;
        }
      }
    });

    // Validate email format
    const emailElement = document.getElementById("email");
    if (emailElement) {
      const email = emailElement.value;
      if (email && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        isValid = false;
        emailElement.classList.add("border-red-500");
        const errorElement = document.getElementById("emailError");
        if (errorElement) {
          errorElement.textContent = "Please enter a valid email address";
        }
        if (!firstInvalidField) {
          firstInvalidField = emailElement;
        }
      }
    }

    // Validate cart
    if (this.cart.length === 0) {
      alert(
        "Your cart is empty. Please add items before proceeding to checkout.",
      );
      return false;
    }

    if (!isValid && firstInvalidField) {
      firstInvalidField.focus();
      firstInvalidField.scrollIntoView({ behavior: "smooth", block: "center" });
    }

    return isValid;
  }

  async placeOrder(formData) {
    // Show loading overlay
    this.showLoadingOverlay(true);

    try {
      const response = await fetch("/api/checkout/place-order", {
        method: "POST",
        headers: {
          "X-CSRF-TOKEN": this.getDataAttribute("csrfToken"),
        },
        body: formData,
      });

      const data = await response.json();

      if (response.ok && data.success) {
        // Clear cart
        if (window.cartManager) {
          window.cartManager.clearCartOnCheckout();
        } else {
          localStorage.removeItem("cart");
        }


        // Update progress to confirmation
        updateProgressStep("confirmation");

        window.removeEventListener("beforeunload", () => {});

        // Redirect after a brief delay
        setTimeout(() => {
          window.location.href = `/order/confirmation/${data.data.order_number}`;
        }, 2000);

        // Show success message
        this.showNotification(
          `Order placed successfully! Order Number: ${data.data.order_number}`,
          "success",
        );
      } else {
        // Handle validation errors
        if (data.errors) {
          this.displayValidationErrors(data.errors);
        }
        throw new Error(data.message || "Order placement failed");
      }
    } catch (error) {
      console.error("Error placing order:", error);
      swal({
        title: "Error",
        icon: "error",
        text: error.message || "Something went wrong. Please try again.",
      })
    } finally {
      // Hide loading overlay
      this.showLoadingOverlay(false);
    }
  }

  showLoadingOverlay(show) {
    let overlay = document.getElementById("checkout-loading-overlay");

    if (show) {
      if (!overlay) {
        overlay = document.createElement("div");
        overlay.id = "checkout-loading-overlay";
        overlay.className = "loading-overlay";
        overlay.innerHTML = `
          <div class="bg-white rounded-lg p-6 shadow-xl">
            <div class="loading-spinner mx-auto mb-4"></div>
            <div class="text-center text-gray-700 font-medium">Processing your order...</div>
            <div class="text-center text-gray-500 text-sm mt-2">Please do not close this page</div>
          </div>
        `;
        document.body.appendChild(overlay);
      }
      overlay.style.display = "flex";
    } else {
      if (overlay) {
        overlay.style.display = "none";
      }
    }
  }

  showNotification(message, type = "info") {
    // Remove existing notifications
    const existingNotifications = document.querySelectorAll(
      ".checkout-notification",
    );
    existingNotifications.forEach((n) => n.remove());

    // Create notification
    const notification = document.createElement("div");
    notification.className = `checkout-notification fixed top-4 right-4 z-50 max-w-md p-4 rounded-lg shadow-lg transition-all duration-300 ${type === "success"
      ? "bg-green-500 text-white"
      : type === "error"
        ? "bg-red-500 text-white"
        : "bg-blue-500 text-white"
      }`;

    notification.innerHTML = `
      <div class="flex items-center gap-3">
        <i class="ph ${type === "success" ? "ph-check-circle" : type === "error" ? "ph-warning-circle" : "ph-info"} text-xl"></i>
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

  displayValidationErrors(errors) {
    // Clear previous errors
    document
      .querySelectorAll('[id$="Error"]')
      .forEach((el) => (el.textContent = ""));

    // Display new errors
    Object.keys(errors).forEach((field) => {
      const errorElement = document.getElementById(`${field}Error`);
      if (errorElement && errors[field].length > 0) {
        errorElement.textContent = errors[field][0];
      }
    });
  }
}

// Global functions
function toggleLoginForm() {
  const loginForm = document.getElementById("loginForm");
  if (loginForm) {
    loginForm.style.display =
      loginForm.style.display === "none" ? "block" : "none";
  }
}

async function handleLogin(event) {
  event.preventDefault();
  const loginBtn = document.getElementById("loginBtn");
  if (!loginBtn) return;

  loginBtn.disabled = true;
  loginBtn.textContent = "Logging in...";

  try {
    const csrfToken =
      document.querySelector("[data-csrf-token]")?.dataset.csrfToken || "";
    const loginEmail = document.getElementById("loginEmail");
    const loginPassword = document.getElementById("loginPassword");

    if (!loginEmail || !loginPassword) {
      throw new Error("Login form elements not found");
    }

    const response = await fetch("/api/auth/login", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        "X-CSRF-TOKEN": csrfToken,
      },
      body: JSON.stringify({
        email: loginEmail.value,
        password: loginPassword.value,
      }),
    });

    const data = await response.json();

    if (data.success) {
      location.reload();
    } else {
      const errorElement = document.getElementById("loginPasswordError");
      if (errorElement) {
        errorElement.textContent = data.message || "Invalid credentials";
      }
    }
  } catch (error) {
    const errorElement = document.getElementById("loginPasswordError");
    if (errorElement) {
      errorElement.textContent = "Login failed. Please try again.";
    }
  }

  loginBtn.disabled = false;
  loginBtn.textContent = "Login";
}

function handleFileUpload(input) {
  const file = input.files[0];
  const fileStatus = document.getElementById("fileStatus");
  const errorElement = document.getElementById("paymentReceiptError");
  const uploadProgress = document.getElementById("uploadProgress");

  // Clear previous error messages
  if (errorElement) {
    errorElement.textContent = "";
  }

  if (file) {
    const allowedTypes = [
      "application/pdf",
      "image/jpeg",
      "image/jpg",
      "image/png",
    ];
    const maxSize = 5 * 1024 * 1024; // 5MB

    // Validate file type
    if (!allowedTypes.includes(file.type)) {
      if (errorElement) {
        errorElement.textContent =
          "Please select a PDF or image file (JPG, JPEG, PNG).";
      }
      input.value = "";
      resetFileStatus(fileStatus);
      return;
    }

    // Validate file size
    if (file.size > maxSize) {
      if (errorElement) {
        errorElement.textContent = "File size too large. Maximum size is 5MB.";
      }
      input.value = "";
      resetFileStatus(fileStatus);
      return;
    }

    // Show upload progress
    if (uploadProgress) {
      uploadProgress.classList.remove("hidden");
    }

    // Simulate upload delay and show file info
    setTimeout(() => {
      if (uploadProgress) {
        uploadProgress.classList.add("hidden");
      }

      // Store the file for later use
      if (window.checkoutManager) {
        window.checkoutManager.uploadedFile = file;
      }

      // Update file status with success message
      if (fileStatus) {
        const fileSize = (file.size / 1024 / 1024).toFixed(2);
        const fileIcon =
          file.type === "application/pdf" ? "ph-file-pdf" : "ph-image";
        fileStatus.innerHTML = `
          <div class="flex items-center gap-2 text-green-600">
            <i class="${fileIcon} text-lg"></i>
            <span class="font-medium">${file.name}</span>
            <span class="text-sm text-gray-500">(${fileSize}MB)</span>
            <i class="ph ph-check-circle text-green-500"></i>
          </div>
        `;
      }

      // Create file preview if it's an image
      createFilePreview(file);

      // Show success notification
      if (
        window.checkoutManager &&
        typeof window.checkoutManager.showNotification === "function"
      ) {
        window.checkoutManager.showNotification(
          "Payment receipt uploaded successfully!",
          "success",
        );
      }
    }, 1000);
  } else {
    resetFileStatus(fileStatus);
    if (window.checkoutManager) {
      window.checkoutManager.uploadedFile = null;
    }
    removeFilePreview();
  }
}

function resetFileStatus(fileStatus) {
  if (fileStatus) {
    fileStatus.innerHTML =
      '<span class="text-gray-500">No file selected</span>';
  }
}

function createFilePreview(file) {
  // Remove existing preview
  removeFilePreview();

  // Only create preview for images
  if (file.type.startsWith("image/")) {
    const reader = new FileReader();
    reader.onload = function (e) {
      const preview = document.createElement("div");
      preview.id = "file-preview";
      preview.className = "receipt-preview mt-3";
      preview.innerHTML = `
        <img src="${e.target.result}" alt="Receipt preview" class="w-full h-full object-cover">
        <div class="absolute top-2 right-2">
          <button type="button" onclick="removeFilePreview()" class="bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs hover:bg-red-600 transition-colors">
            <i class="ph ph-x"></i>
          </button>
        </div>
      `;
      preview.style.position = "relative";

      const uploadArea = document.querySelector(".upload_file");
      if (uploadArea) {
        uploadArea.appendChild(preview);
      }
    };
    reader.readAsDataURL(file);
  }
}

function removeFilePreview() {
  const existingPreview = document.getElementById("file-preview");
  if (existingPreview) {
    existingPreview.remove();
  }
}

function proceedToPayment() {
  // Validate checkout manager exists
  if (!ensureCheckoutManager()) {
    alert("Checkout system not initialized. Please refresh the page.");
    return;
  }

  // Validate form fields - check if validateForm method exists
  let formIsValid = false;
  if (window.checkoutManager && typeof window.checkoutManager.validateForm === 'function') {
    formIsValid = window.checkoutManager.validateForm();
  } else {
    console.warn('validateForm method not available, using fallback validation');
    formIsValid = fallbackValidateForm();
  }

  if (!formIsValid) {
    if (window.checkoutManager && typeof window.checkoutManager.showNotification === 'function') {
      window.checkoutManager.showNotification(
        "Please fill in all required fields correctly.",
        "error",
      );
    } else {
      alert("Please fill in all required fields correctly.");
    }
    return;
  }

  // Validate cart is not empty
  if (
    !window.checkoutManager.cart ||
    window.checkoutManager.cart.length === 0
  ) {
    window.checkoutManager.showNotification(
      "Your cart is empty. Please add items before checking out.",
      "error",
    );
    return;
  }

  // Validate shipping state is selected
  const stateSelect = document.getElementById("state");
  if (!stateSelect || !stateSelect.value) {
    window.checkoutManager.showNotification(
      "Please select your state to calculate shipping.",
      "error",
    );
    return;
  }

  // Validate payment receipt is uploaded
  if (!window.checkoutManager.uploadedFile) {
    window.checkoutManager.showNotification(
      "Please upload your payment receipt before proceeding.",
      "error",
    );
    return;
  }

  const proceedBtn = document.querySelector(".checkout-proceed-btn");
  const placeOrderSection = document.getElementById("place-order-section");

  // Update progress to payment step
  updateProgressStep("payment");

  // Show success message
  window.checkoutManager.showNotification(
    "Form validated successfully! Please review your order and confirm.",
    "success",
  );

  // Hide proceed button and show place order section
  if (proceedBtn) {
    proceedBtn.style.display = "none";
  }
  if (placeOrderSection) {
    placeOrderSection.style.display = "block";
  }
}

function updateProgressStep(step) {
  const steps = document.querySelectorAll(".progress-step");
  const stepCircles = document.querySelectorAll(".step-circle");

  if (!steps || steps.length === 0) {
    console.warn('Progress steps not found in DOM');
    return;
  }

  // Reset all steps
  steps.forEach((stepEl, index) => {
    stepEl.classList.remove("active");
    stepEl.classList.add("opacity-60");
    if (stepCircles[index]) {
      stepCircles[index].classList.remove("bg-primary", "text-white", "bg-green-500");
      stepCircles[index].classList.add("bg-gray-300", "text-gray-600");
    }
  });

  if (step === "payment") {
    // Step 1 completed, Step 2 active
    if (steps[0]) {
      steps[0].classList.add("opacity-100");
      if (stepCircles[0]) {
        stepCircles[0].classList.remove("bg-gray-300", "text-gray-600");
        stepCircles[0].classList.add("bg-green-500", "text-white");
      }
    }

    if (steps[1]) {
      steps[1].classList.remove("opacity-60");
      steps[1].classList.add("active", "opacity-100");
      if (stepCircles[1]) {
        stepCircles[1].classList.remove("bg-gray-300", "text-gray-600");
        stepCircles[1].classList.add("bg-primary", "text-white");
      }
    }
  } else if (step === "confirmation") {
    // Steps 1 & 2 completed, Step 3 active
    [0, 1].forEach(i => {
      if (steps[i]) {
        steps[i].classList.add("opacity-100");
        if (stepCircles[i]) {
          stepCircles[i].classList.remove("bg-gray-300", "text-gray-600");
          stepCircles[i].classList.add("bg-green-500", "text-white");
        }
      }
    });

    if (steps[2]) {
      steps[2].classList.remove("opacity-60");
      steps[2].classList.add("active", "opacity-100");
      if (stepCircles[2]) {
        stepCircles[2].classList.remove("bg-gray-300", "text-gray-600");
        stepCircles[2].classList.add("bg-primary", "text-white");
      }
    }
  }
}

function initializeDragAndDrop() {
  const uploadArea = document.querySelector(".upload_file");
  const fileInput = document.getElementById("paymentReceipt");

  if (!uploadArea || !fileInput) return;

  ["dragenter", "dragover", "dragleave", "drop"].forEach((eventName) => {
    uploadArea.addEventListener(eventName, preventDefaults, false);
    document.body.addEventListener(eventName, preventDefaults, false);
  });

  ["dragenter", "dragover"].forEach((eventName) => {
    uploadArea.addEventListener(eventName, highlight, false);
  });

  ["dragleave", "drop"].forEach((eventName) => {
    uploadArea.addEventListener(eventName, unhighlight, false);
  });

  uploadArea.addEventListener("drop", handleDrop, false);

  function preventDefaults(e) {
    e.preventDefault();
    e.stopPropagation();
  }

  function highlight() {
    uploadArea.classList.add("dragover");
  }

  function unhighlight() {
    uploadArea.classList.remove("dragover");
  }

  function handleDrop(e) {
    const dt = e.dataTransfer;
    const files = dt.files;

    if (files.length > 0) {
      fileInput.files = files;
      handleFileUpload(fileInput);
    }
  }
}

async function handleCheckout(event) {
  event.preventDefault();

  if (!ensureCheckoutManager()) {
    alert("Checkout system not initialized. Please refresh the page.");
    return;
  }

  // Validate form before proceeding - use safer validation
  let formIsValid = false;
  if (window.checkoutManager && typeof window.checkoutManager.validateForm === 'function') {
    formIsValid = window.checkoutManager.validateForm();
  } else {
    console.warn('validateForm method not available, using fallback validation');
    formIsValid = fallbackValidateForm();
  }

  if (!formIsValid) {
    if (window.checkoutManager && typeof window.checkoutManager.showNotification === 'function') {
      window.checkoutManager.showNotification(
        "Please fill in all required fields correctly.",
        "error",
      );
    } else {
      alert("Please fill in all required fields correctly.");
    }
    return;
  }

  if (!window.checkoutManager.uploadedFile) {
    const errorElement = document.getElementById("paymentReceiptError");
    if (errorElement) {
      errorElement.textContent = "Please upload a payment receipt.";
    }
    window.checkoutManager.showNotification(
      "Please upload a payment receipt.",
      "error",
    );
    return;
  }

  // Validate cart is not empty
  if (
    !window.checkoutManager.cart ||
    window.checkoutManager.cart.length === 0
  ) {
    window.checkoutManager.showNotification(
      "Your cart is empty. Please add items before checking out.",
      "error",
    );
    return;
  }

  const orderBtnText = document.getElementById("orderBtnText");
  const orderBtnLoading = document.getElementById("orderBtnLoading");
  const placeOrderBtn = document.getElementById("placeOrderBtn");

  // Disable button and show loading state
  if (placeOrderBtn) {
    placeOrderBtn.disabled = true;
  }
  if (orderBtnText) {
    orderBtnText.classList.add("hidden");
  }
  if (orderBtnLoading) {
    orderBtnLoading.classList.remove("hidden");
  }

  try {
    const formData = new FormData();

    // Add form fields
    const fields = [
      "firstName",
      "lastName",
      "email",
      "phoneNumber",
      "country",
      "city",
      "street",
      "state",
      "postalCode",
      "note",
    ];

    fields.forEach((field) => {
      const element = document.getElementById(field);
      if (element) {
        formData.append(field, element.value.trim());
      }
    });

    // Add cart data
    formData.append("cartItems", JSON.stringify(window.checkoutManager.cart));
    formData.append("subtotal", window.checkoutManager.subtotal);
    formData.append("shippingCost", window.checkoutManager.shippingCost);
    formData.append("total", window.checkoutManager.total);

    // Add payment receipt
    formData.append("paymentReceipt", window.checkoutManager.uploadedFile);

    await window.checkoutManager.placeOrder(formData);
  } catch (error) {
    console.error("Checkout error:", error);
    window.checkoutManager.showNotification(
      error.message || "Something went wrong. Please try again.",
      "error",
    );
  } finally {
    // Re-enable button and hide loading state
    if (placeOrderBtn) {
      placeOrderBtn.disabled = false;
    }
    if (orderBtnText) {
      orderBtnText.classList.remove("hidden");
    }
    if (orderBtnLoading) {
      orderBtnLoading.classList.add("hidden");
    }
  }
}

async function updateShipping() {
  try {
    // Ensure checkout manager is available
    if (!ensureCheckoutManager()) {
      console.error("Failed to initialize checkout manager");
      return;
    }

    if (
      window.checkoutManager &&
      typeof window.checkoutManager.updateShipping === "function"
    ) {
      await window.checkoutManager.updateShipping();
    } else {
      // Try to re-initialize
      window.checkoutManager = new SimpleCheckoutManager();
      if (typeof window.checkoutManager.updateShipping === "function") {
        await window.checkoutManager.updateShipping();
      } else {
        console.error(
          "updateShipping method still not available on checkout manager",
        );
      }
    }
  } catch (error) {
    console.error("Error in updateShipping:", error);
    // Show user-friendly error
    if (window.checkoutManager && window.checkoutManager.showNotification) {
      window.checkoutManager.showNotification(
        "Unable to calculate shipping. Please try selecting your state again.",
        "error",
      );
    }
  }
}

// Initialize checkout system when DOM is loaded
document.addEventListener("DOMContentLoaded", function () {
  console.log("DOM loaded, initializing checkout system...");

  try {
    // Initialize checkout manager
    if (!window.checkoutManager) {
      console.log("Creating new SimpleCheckoutManager instance...");
      window.checkoutManager = new SimpleCheckoutManager();
      console.log("Checkout manager initialized successfully");
    }

    // Initialize drag and drop for file upload
    initializeDragAndDrop();

    // Set up form auto-save (optional)
    setupFormAutoSave();

    // Add keyboard shortcuts
    setupKeyboardShortcuts();

    console.log("Checkout system initialization complete");
  } catch (error) {
    console.error("Error initializing checkout system:", error);
  }
});

// Form auto-save functionality
function setupFormAutoSave() {
  const formFields = [
    "firstName",
    "lastName",
    "email",
    "phoneNumber",
    "city",
    "street",
    "state",
    "postalCode",
    "note",
  ];

  formFields.forEach((fieldId) => {
    const field = document.getElementById(fieldId);
    if (field) {
      // Load saved value
      const savedValue = localStorage.getItem(`checkout_${fieldId}`);
      if (savedValue && !field.value) {
        field.value = savedValue;
      }

      // Save on input
      field.addEventListener("input", function () {
        localStorage.setItem(`checkout_${fieldId}`, this.value);
      });
    }
  });
}

// Keyboard shortcuts for better UX
function setupKeyboardShortcuts() {
  document.addEventListener("keydown", function (e) {
    // Ctrl/Cmd + Enter to proceed to payment
    if ((e.ctrlKey || e.metaKey) && e.key === "Enter") {
      const proceedBtn = document.querySelector(".checkout-proceed-btn");
      if (proceedBtn && proceedBtn.style.display !== "none") {
        e.preventDefault();
        proceedToPayment();
      }
    }

    // Escape to close notifications
    if (e.key === "Escape") {
      const notifications = document.querySelectorAll(".checkout-notification");
      notifications.forEach((notification) => notification.remove());
    }
  });
}

// Enhanced error handling for network issues
window.addEventListener("online", function () {
  if (window.checkoutManager) {
    window.checkoutManager.showNotification(
      "Connection restored. You can continue with your order.",
      "success",
    );
  }
});

window.addEventListener("offline", function () {
  if (window.checkoutManager) {
    window.checkoutManager.showNotification(
      "No internet connection. Please check your network and try again.",
      "error",
    );
  }
});

// Listen for Livewire events if available
document.addEventListener("livewire:init", function () {
  console.log("Livewire initialized, checking checkout manager...");
  setTimeout(() => {
    try {
      if (!window.checkoutManager) {
        console.log("Creating checkout manager after Livewire init...");
        window.checkoutManager = new SimpleCheckoutManager();
      }
    } catch (error) {
      console.error(
        "Error initializing checkout manager after Livewire:",
        error,
      );
    }
  }, 200);
});

// Manual initialization function for troubleshooting
function initializeCheckoutManager() {
  console.log("Manual checkout manager initialization...");
  try {
    window.checkoutManager = new SimpleCheckoutManager();
    console.log("Checkout manager manually initialized successfully");
    return true;
  } catch (error) {
    console.error("Failed to manually initialize checkout manager:", error);
    return false;
  }
}

// Safe function to ensure checkout manager is available
function ensureCheckoutManager() {
  if (!window.checkoutManager) {
    console.log("Checkout manager not found, attempting initialization...");
    return initializeCheckoutManager();
  }
  return true;
}

// Fallback validation function
function fallbackValidateForm() {
  const requiredFields = [
    "firstName",
    "lastName",
    "email",
    "phoneNumber",
    "city",
    "street",
    "state",
    "postalCode",
  ];
  let isValid = true;
  let firstInvalidField = null;

  // Clear previous errors
  requiredFields.forEach((field) => {
    const errorElement = document.getElementById(field + "Error");
    const fieldElement = document.getElementById(field);
    if (errorElement) {
      errorElement.textContent = "";
    }
    if (fieldElement) {
      fieldElement.classList.remove("border-red-500");
    }
  });

  requiredFields.forEach((field) => {
    const element = document.getElementById(field);
    if (element && !element.value.trim()) {
      isValid = false;
      element.classList.add("border-red-500");
      const errorElement = document.getElementById(field + "Error");
      if (errorElement) {
        errorElement.textContent = "This field is required";
      }
      if (!firstInvalidField) {
        firstInvalidField = element;
      }
    }
  });

  // Validate email format
  const emailElement = document.getElementById("email");
  if (emailElement) {
    const email = emailElement.value;
    if (email && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
      isValid = false;
      emailElement.classList.add("border-red-500");
      const errorElement = document.getElementById("emailError");
      if (errorElement) {
        errorElement.textContent = "Please enter a valid email address";
      }
      if (!firstInvalidField) {
        firstInvalidField = emailElement;
      }
    }
  }

  // Validate cart
  let cart = [];
  if (window.checkoutManager && window.checkoutManager.cart) {
    cart = window.checkoutManager.cart;
  } else {
    try {
      cart = JSON.parse(localStorage.getItem("cart") || "[]");
    } catch (e) {
      cart = [];
    }
  }

  if (cart.length === 0) {
    alert("Your cart is empty. Please add items before proceeding to checkout.");
    return false;
  }

  if (!isValid && firstInvalidField) {
    firstInvalidField.focus();
    firstInvalidField.scrollIntoView({ behavior: "smooth", block: "center" });
  }

  return isValid;
}

// Expose debugging functions globally
window.initializeCheckoutManager = initializeCheckoutManager;
window.ensureCheckoutManager = ensureCheckoutManager;

// Debug info function
window.checkoutDebugInfo = function () {
  console.log("=== Checkout Debug Info ===");
  console.log("Checkout Manager:", window.checkoutManager);
  console.log(
    "Manager Methods:",
    window.checkoutManager
      ? Object.getOwnPropertyNames(
        Object.getPrototypeOf(window.checkoutManager),
      )
      : "N/A",
  );
  console.log(
    "Cart:",
    window.checkoutManager ? window.checkoutManager.cart : "N/A",
  );
  console.log(
    "Subtotal:",
    window.checkoutManager ? window.checkoutManager.subtotal : "N/A",
  );
  console.log(
    "Shipping Cost:",
    window.checkoutManager ? window.checkoutManager.shippingCost : "N/A",
  );
  console.log(
    "Total:",
    window.checkoutManager ? window.checkoutManager.total : "N/A",
  );
  console.log(
    "States:",
    window.checkoutManager ? window.checkoutManager.states : "N/A",
  );

  // Also check DOM elements
  const subtotalEl = document.getElementById("subtotal");
  const shippingEl = document.getElementById("shippingCost");
  const totalEl = document.getElementById("total");
  //
  // console.log("DOM Elements:");
  // console.log("Subtotal element value:", subtotalEl ? subtotalEl.textContent : "Not found");
  // console.log("Shipping element value:", shippingEl ? shippingEl.textContent : "Not found");
  // console.log("Total element value:", totalEl ? totalEl.textContent : "Not found");
  // console.log("===========================");
};
