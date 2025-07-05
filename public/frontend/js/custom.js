/**
 * Optimized jQuery E-commerce Cart System
 * Features: Cart management, checkout rendering, side cart, and modal handling
 */

class CartManager {
  constructor() {
    this.FREE_SHIPPING_THRESHOLD = 50000;
    this.CURRENCY_SYMBOL = "₦";
    this.cart = this.getCartData();
  }

  // Utility Methods
  getCartData() {
    try {
      const cartData = localStorage.getItem("cart");
      return cartData ? JSON.parse(cartData) : [];
    } catch (error) {
      console.error("Error parsing cart data:", error);
      return [];
    }
  }

  setCartData(data) {
    try {
      localStorage.setItem("cart", JSON.stringify(data));
      this.cart = data;
    } catch (error) {
      console.error("Error saving cart data:", error);
    }
  }

  formatPrice(price) {
    return price.toLocaleString();
  }

  formatCurrency(price) {
    return `${this.CURRENCY_SYMBOL} ${this.formatPrice(price)}`;
  }

  calculateTotal() {
    return this.cart.reduce(
      (total, item) => total + item.price * item.quantity,
      0,
    );
  }

  showAlert(title, text, icon = "success") {
    if (typeof swal !== "undefined") {
      swal({ title, text, icon, button: "OK" });
    }
  }

  // Cart Operations
  addToCart(item) {
    const existingItem = this.cart.find(
      (cartItem) =>
        cartItem.id === item.id &&
        (cartItem.size?.name ?? cartItem.size) ===
        (item.size?.name ?? item.size) &&
        (cartItem.color?.name ?? cartItem.color) ===
        (item.color?.name ?? item.color),
    );

    if (existingItem) {
      Object.assign(existingItem, item);
      this.showAlert(
        "Product Updated",
        "The item quantity has been updated in your cart.",
      );
    } else {
      this.cart.push(item);
      this.showAlert("Product Added", "The item has been added to your cart.");
    }

    this.setCartData(this.cart);
    this.updateAllCartDisplays();
  }

  removeFromCart(cartId) {
    this.cart = this.cart.filter((item) => item.cartId !== cartId);
    this.setCartData(this.cart);
    this.updateAllCartDisplays();
    this.showAlert(
      "Product Removed",
      "The item has been removed from your cart.",
    );
  }

  // Rendering Methods
  renderCheckoutPage() {
    const $listProducts = $(".checkout-block .list-product-checkout");
    const $freeShipping = $(".ship-block .free-shipping-applied");

    if (!$listProducts.length) return;

    // Update free shipping status
    if ($freeShipping.length) {
      const total = this.calculateTotal();
      const isEligible = total >= this.FREE_SHIPPING_THRESHOLD;
      $freeShipping.html(
        isEligible
          ? '<span class="shipping-badge shipping-badge--success">Free Shipping ✨</span>'
          : '<span class="shipping-badge shipping-badge--warning">Not Applied</span>',
      );
    }

    // Render checkout items
    $listProducts.empty();

    if (this.cart.length === 0) {
      $listProducts.html('<div class="empty-cart">Your cart is empty.</div>');
      return;
    }

    const $fragment = $(document.createDocumentFragment());

    this.cart.forEach((product) => {
      const $item = $(`
                <div class="item flex items-center justify-between w-full pb-5 border-b border-line gap-6 mt-5">
                    <div class="bg-img w-[100px] aspect-square flex-shrink-0 rounded-lg overflow-hidden">
                        <img src="${product.image}" alt="${product.name}" class="w-full h-full object-cover">
                    </div>
                    <div class="flex items-center justify-between w-full">
                        <div>
                            <div class="name text-title">${product.name}</div>
                            <div class="caption1 text-secondary mt-2">
                                ${product.size?.name ? `<span class="size capitalize">${product.size.name}</span>` : ""}
                                ${product.size?.name && product.color?.name ? '<span class="mx-2">|</span>' : ""}
                                ${product.color?.name ? `<span class="color capitalize">${product.color.name}</span>` : ""}
                            </div>
                        </div>
                        <div class="text-title">
                            <span class="quantity">${product.quantity}</span>
                            <span class="px-1">x</span>
                            <span>${this.formatCurrency(product.price)}</span>
                        </div>
                    </div>
                </div>
            `);
      $fragment.append($item);
    });

    $listProducts.append($fragment);
  }

  renderCartPage() {
    const $listProducts = $(".cart-block .list-product-main");
    if (!$listProducts.length) return;

    $listProducts.empty();

    if (this.cart.length === 0) {
      $listProducts.html('<div class="empty-cart">Your cart is empty.</div>');
      return;
    }

    const $fragment = $(document.createDocumentFragment());

    this.cart.forEach((item) => {
      const $item = $(`
                <div class="item flex md:mt-7 md:pb-7 mt-5 pb-5 border-b border-line w-full" data-cart-id="${item.cartId}">
                    <div class="w-1/2">
                        <div class="flex items-center gap-6">
                            <div class="bg-img md:w-[100px] w-20 aspect-[3/4]">
                                <img src="${item.image}" alt="${item.name}" class="w-full h-full object-cover rounded-lg">
                            </div>
                            <div>
                                <div class="text-title">${item.name}</div>
                                <div class="list-select mt-3"></div>
                            </div>
                        </div>
                    </div>
                    <div class="w-1/12 price flex items-center justify-center">
                        <div class="text-title text-center">
                            <span class="price">${this.formatPrice(item.price)}</span>
                        </div>
                    </div>
                    <div class="w-1/6 flex items-center justify-center">
                        ${item.quantity}
                    </div>
                    <div class="w-1/6 flex total-price items-center justify-center">
                        <div class="text-title text-center">
                            <span class="total-price">${this.formatPrice(item.price * item.quantity)}</span>
                        </div>
                    </div>
                    <div class="w-1/12 flex items-center justify-center">
                        <i class="remove-btn ph ph-x-circle text-xl max-md:text-base text-red cursor-pointer hover:text-black duration-300"
                           data-cart-id="${item.cartId}"></i>
                    </div>
                </div>
            `);
      $fragment.append($item);
    });

    $listProducts.append($fragment);
  }

  renderSideCart() {
    const $cartBlock = $(".modal-cart-block .cart-block .list-product");
    if (!$cartBlock.length) return;

    $cartBlock.empty();

    if (this.cart.length === 0) {
      $cartBlock.html('<div class="empty-cart">Your cart is empty.</div>');
      return;
    }

    const $fragment = $(document.createDocumentFragment());

    this.cart.forEach((item) => {
      const $item = $(`
                <div class="item py-5 flex items-center justify-between gap-3 border-b">
                    <div class="infor flex items-center gap-3 w-full">
                        <div class="bg-img w-[100px] aspect-square flex-shrink-0 rounded-lg overflow-hidden">
                            <img src="${item.image}" alt="${item.name}" class="w-full h-full object-cover">
                        </div>
                        <div class="w-full">
                            <div class="flex items-center justify-between w-full">
                                <div class="name text-button">${item.name}</div>
                                <div class="remove-cart-btn caption1 font-semibold text-red underline cursor-pointer"
                                     data-cart-id="${item.cartId}">Remove</div>
                            </div>
                            <div class="flex items-center justify-between gap-2 mt-3 w-full">
                                <div class="flex items-center text-secondary2 capitalize">
                                    ${item.size?.name ? `<span class="size">${item.size.name}</span>` : ""}
                                    ${item.size?.name && item.color?.name ? '<span class="mx-2">|</span>' : ""}
                                    ${item.color?.name ? `<span class="color">${item.color.name}</span>` : ""}
                                </div>
                                <div class="product-price text-title">
                                    <span class="price">${this.formatCurrency(item.price * item.quantity)}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `);
      $fragment.append($item);
    });

    $cartBlock.append($fragment);
  }

  updateCartCount() {
    $(".cart-quantity").text(this.cart.length);
  }

  updateCartTotal() {
    const total = this.calculateTotal();
    const formattedTotal = this.formatPrice(total);

    // Update all total displays
    $(
      ".modal-cart-block .total-cart, .total-cart-block .total-cart, .total-block .total-product",
    ).text(total === 0 ? "₦0.00" : '₦' + formattedTotal);

    // Update free shipping status
    const $freeShipping = $(".ship-block .free-shipping-applied");
    if ($freeShipping.length) {
      $freeShipping.html(
        total >= this.FREE_SHIPPING_THRESHOLD
          ? '<span class="shipping-badge shipping-badge--success">Free Shipping ✨</span>'
          : '<span class="shipping-badge shipping-badge--warning">Not Applied</span>',
      );
    }

    // Update progress bar
    const $progressBar = $(".tow-bar-block .progress-line");
    if ($progressBar.length) {
      const progress = Math.min(
        (total / this.FREE_SHIPPING_THRESHOLD) * 100,
        100,
      );
      $progressBar.css("width", `${progress}%`);
    }
  }

  clearCartOnCheckout() {
    if (this.cart.length > 0) {
      this.cart = [];
      this.setCartData(this.cart);
      this.updateAllCartDisplays();
      this.showAlert(
        "Checkout Successful",
        "Thank you for your order!",
        "success",
      );
    } else {
      this.showAlert(
        "Empty Cart",
        "Your cart is empty. Please add items to your cart before proceeding to checkout.",
        "warning",
      );
    }
  }

  updateAllCartDisplays() {
    this.updateCartCount();
    this.updateCartTotal();
    this.renderCheckoutPage();
    this.renderCartPage();
    this.renderSideCart();
  }

  // Event Handlers
  bindEvents() {
    const self = this;

    // Remove item from cart (main cart page)
    $(document).on("click", ".remove-btn", function (e) {
      e.stopPropagation();
      const cartId = $(this).data("cart-id");
      if (cartId) {
        self.removeFromCart(cartId);
      }
    });

    // Remove item from side cart
    $(document).on("click", ".remove-cart-btn", function (e) {
      e.stopPropagation();
      const cartId = $(this).data("cart-id");
      if (cartId) {
        self.removeFromCart(cartId);
      }
    });

    // Quick view modal
    $(document).on("click", ".quick-view-btn", function (e) {
      e.stopPropagation();
      const $parent = $(this).closest(".product-item");
      const productId = $parent.data("item");

      if (typeof Livewire !== "undefined") {
        Livewire.dispatch("openQuickViewModal", {
          productId,
          open: true,
        });
      }
    });

    // Modal cart toggle
    $(document).on("click", ".cart-icon", function (e) {
      e.stopPropagation();
      $(".modal-cart-block .modal-cart-main").addClass("open");
    });

    // Close modals when clicking outside
    $(document).on(
      "click",
      ".modal-cart-block, .modal-quickview-block",
      function (e) {
        if (e.target === this) {
          $(this)
            .find(".modal-cart-main, .modal-quickview-main")
            .removeClass("open");
        }
      },
    );

    // Proceed to checkout
    $(document).on("click", ".proceed-to-checkout", function (e) {
      e.stopPropagation();
      if (self.cart.length === 0) {
        self.showAlert(
          "Empty Cart",
          "Your cart is empty. Please add items to your cart before proceeding to checkout.",
          "warning",
        );
        return;
      }
      window.location.href = "/checkout";
    });

    // Custom cart event listener
    window.addEventListener("newCartItem", function (e) {
      const cartItem = e.detail?.[0];
      if (cartItem) {
        self.addToCart(cartItem);
      }
    });

    // Livewire event listeners for checkout
    window.addEventListener("requestCartData", function () {
      if (typeof Livewire !== "undefined") {
        Livewire.dispatch("receiveCartData", [self.cart]);
      }
    });

    window.addEventListener("orderPlaced", function (e) {
      const orderData = e.detail?.[0];
      if (orderData) {
        // Clear the cart
        self.cart = [];
        self.setCartData(self.cart);
        self.updateAllCartDisplays();

        // Show success message
        self.showAlert(
          "Order Placed Successfully!",
          `Your order ${orderData.orderNumber} has been placed. Total: ₦${orderData.total.toLocaleString()}`,
          "success",
        );
      }
    });

    // Redirect from checkout if cart is empty
    $(window).on("load", function () {
      if (self.cart.length === 0 && window.location.pathname === "/checkout") {
        window.location.href = "/shop";
      }
    });
  }

  // Shipping calculation methods
  async calculateShippingCost(state) {
    try {
      const cartTotal = this.calculateTotal();

      const response = await fetch("/api/shipping/calculate", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "X-CSRF-TOKEN":
            document
              .querySelector('meta[name="csrf-token"]')
              ?.getAttribute("content") || "",
        },
        body: JSON.stringify({
          state: state,
          cart_total: cartTotal
        }),
      });

      const data = await response.json();

      if (data.success) {
        return data.data.shipping_cost;
      } else {
        console.warn("Shipping not available for", state);
        return 0;
      }
    } catch (error) {
      console.error("Error calculating shipping:", error);
      return 0;
    }
  }

  async getAvailableStates() {
    try {
      const response = await fetch("/api/shipping/states");
      const data = await response.json();

      if (data.success) {
        return data.data;
      }
    } catch (error) {
      console.error("Error fetching states:", error);
    }
    return [];
  }

  // Enhanced cart total calculation with shipping
  calculateTotalWithShipping(shippingCost = 0) {
    const subtotal = this.calculateTotal();
    return subtotal + shippingCost;
  }

  // Update cart displays with shipping information
  updateCartDisplaysWithShipping(shippingCost = 0) {
    this.updateCartCount();
    this.updateCartTotalWithShipping(shippingCost);
    this.renderCheckoutPage();
    this.renderCartPage();
    this.renderSideCart();
  }

  updateCartTotalWithShipping(shippingCost = 0) {
    const subtotal = this.calculateTotal();
    const total = subtotal + shippingCost;
    const formattedSubtotal = this.formatPrice(subtotal);
    const formattedTotal = this.formatPrice(total);

    // Update subtotal displays
    $(".checkout-block .total-cart, .subtotal-display").text(
      subtotal === 0 ? "0.00" : formattedSubtotal,
    );

    // Update total displays with shipping
    $(".total-with-shipping, .final-total").text(
      total === 0 ? "0.00" : formattedTotal,
    );

    // Update shipping cost display
    $(".shipping-cost-display").text(
      shippingCost === 0 ? "0.00" : this.formatPrice(shippingCost),
    );

    // Update free shipping status
    const $freeShipping = $(".ship-block .free-shipping-applied");
    if ($freeShipping.length) {
      $freeShipping.html(
        subtotal >= this.FREE_SHIPPING_THRESHOLD
          ? '<span class="shipping-badge shipping-badge--success">Free Shipping ✨</span>'
          : '<span class="shipping-badge shipping-badge--warning">Not Applied</span>',
      );
    }

    // Update progress bar
    const $progressBar = $(".tow-bar-block .progress-line");
    if ($progressBar.length) {
      const progress = Math.min(
        (subtotal / this.FREE_SHIPPING_THRESHOLD) * 100,
        100,
      );
      $progressBar.css("width", `${progress}%`);
    }
  }

  // Initialization
  init() {
    this.bindEvents();
    this.updateAllCartDisplays();

    // Send cart data to Livewire on page load
    if (
      typeof Livewire !== "undefined" &&
      window.location.pathname === "/checkout"
    ) {
      setTimeout(() => {
        Livewire.dispatch("receiveCartData", [this.cart]);
      }, 100);
    }
  }
}

// CSS for shipping badges (add this to your stylesheet)
const badgeStyles = `
<style>
.shipping-badge {
    font-size: 12px;
    padding: 2px 8px;
    border-radius: 12px;
    display: inline-block;
    font-weight: 500;
}
.shipping-badge--success {
    background: #e6f9ec;
    color: #1a7f37;
}
.shipping-badge--warning {
    background: #fffbe6;
    color: #b38600;
}
.empty-cart {
    text-align: center;
    padding: 2rem;
    color: #666;
}
</style>
`;

// Checkout page specific functionality
class CheckoutManager {
  constructor(cartManager) {
    this.cartManager = cartManager;
    this.currentShippingCost = 0;
    this.init();
  }

  init() {
    this.bindCheckoutEvents();
    this.updateCheckoutDisplay();

    // Check if state is already selected on page load and calculate shipping
    this.calculateInitialShipping();
  }

  async calculateInitialShipping() {
    const stateSelect = document.querySelector('select[wire\\:model\\.live="state"]') ||
      document.getElementById('state');

    if (stateSelect && stateSelect.value) {
      const state = stateSelect.value;
      console.log('Calculating initial shipping for state:', state);

      this.currentShippingCost = await this.cartManager.calculateShippingCost(state);
      this.updateCheckoutDisplay();

      // Notify Livewire component about shipping cost
      if (typeof Livewire !== "undefined") {
        Livewire.dispatch("shippingCalculated", [this.currentShippingCost]);
      }
    }
  }

  bindCheckoutEvents() {
    // Listen for state changes to update shipping
    $(document).on(
      "change",
      'select[wire\\:model\\.live="state"]',
      async (e) => {
        const state = e.target.value;
        if (state) {
          this.currentShippingCost =
            await this.cartManager.calculateShippingCost(state);
          this.updateCheckoutDisplay();

          // Notify Livewire component about shipping cost
          if (typeof Livewire !== "undefined") {
            Livewire.dispatch("shippingCalculated", [this.currentShippingCost]);
          }
        }
      },
    );

    // Update checkout display when cart changes
    window.addEventListener("cartUpdated", () => {
      this.updateCheckoutDisplay();
    });
  }

  updateCheckoutDisplay() {
    this.cartManager.updateCartDisplaysWithShipping(this.currentShippingCost);

    // Update checkout totals
    const subtotal = this.cartManager.calculateTotal();
    const total = this.cartManager.calculateTotalWithShipping(
      this.currentShippingCost,
    );

    $(".checkout-subtotal").text(this.cartManager.formatPrice(subtotal));
    $(".checkout-shipping").text(
      this.cartManager.formatPrice(this.currentShippingCost),
    );
    $(".checkout-total").text(this.cartManager.formatPrice(total));
  }
}

// Initialize the cart system
$(document).ready(function () {
  // Add styles to head
  if ($("#cart-styles").length === 0) {
    $("head").append(badgeStyles);
  }

  // Initialize cart manager
  window.cartManager = new CartManager();
  window.cartManager.init();

  // Initialize checkout manager only if on checkout page AND checkout.js hasn't loaded yet
  if (window.location.pathname === "/checkout") {
    // Give checkout.js a chance to load first
    setTimeout(() => {
      if (!window.checkoutManager) {
        console.log("Creating fallback checkout manager from custom.js");
        window.checkoutManager = new CheckoutManager(window.cartManager);
      }
    }, 100);
  }
});

// Re-initialize on Livewire navigation
$(document).on("livewire:navigated", function () {
  if (window.cartManager) {
    window.cartManager.init();
  } else {
    window.cartManager = new CartManager();
    window.cartManager.init();
  }

  // Re-initialize checkout manager if on checkout page
  if (window.location.pathname === "/checkout") {
    if (window.checkoutManager) {
      window.checkoutManager.init();
    } else {
      window.checkoutManager = new CheckoutManager(window.cartManager);
    }
  }
});



// Sidebar
const filterSidebarBtn = document.querySelector('.filter-sidebar-btn')
const sidebar = document.querySelector('.sidebar')
const sidebarMain = document.querySelector('.sidebar .sidebar-main')
const closeSidebarBtn = document.querySelector('.sidebar .sidebar-main .close-sidebar-btn')

if (filterSidebarBtn && sidebar) {
  filterSidebarBtn.addEventListener('click', () => {
    sidebar.classList.toggle('open')
  })

  if (sidebarMain) {
    sidebar.addEventListener('click', () => {
      sidebar.classList.remove('open')
    })

    sidebarMain.addEventListener('click', (e) => {
      e.stopPropagation()
    })

    closeSidebarBtn.addEventListener('click', () => {
      sidebar.classList.remove('open')
    })
  }
}

// Export for external use
window.CartManager = CartManager;

