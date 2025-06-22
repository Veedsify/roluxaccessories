// Quick View Component

async function ReloadCartCount() {
    const cartCount = document.querySelector(".cart-quantity");
    const cart = localStorage.getItem("cart");
    const cartData = cart ? JSON.parse(cart) : [];
    cartCount.textContent = cartData.length
}

async function InitCustom() {
    // Initialize Cart Count
    await ReloadCartCount();
    // Cart Event
    window.addEventListener("newCartItem", async function (e) {
        const cart = localStorage.getItem("cart");
        const cartItem = e.detail[0]
        const cartData = cart ? JSON.parse(cart) : [];
        const findItem = cartData.find(item => item.id === cartItem.id && item.size === cartItem.size && item.color === cartItem.color);
        if (findItem) {
            findItem.quantity = cartItem.quantity;
            findItem.name = cartItem.name;
            findItem.price = cartItem.price;
            findItem.image = cartItem.image;
            await swal({
                title: "Product Updated",
                text: "The item quantity has been updated in your cart.",
                icon: "success",
                button: "OK",
            })
        } else {
            cartData.push(cartItem);
            await swal({
                title: "Product Added",
                text: "The item has been added to your cart.",
                icon: "success",
                button: "OK",
            })
        }
        localStorage.setItem("cart", JSON.stringify(cartData));
        await ReloadCartCount();
    })

    // Quick View Component Initialization
    const quickView = document.querySelector('.modal-quickview-block');
    const quickViewButton = document.querySelectorAll('.quick-view-btn');
    if (quickView) {
        quickViewButton.forEach(btn => btn.addEventListener("click", function (e) {
            e.stopPropagation();
            const parent = e.target.closest('.product-item');
            const productId = parent.getAttribute("data-item");
            Livewire.dispatch('openQuickViewModal', { productId, open: true });
            // quickView.querySelector(".modal-quickview-main").classList.add("open")
        }))
    }
    if (quickView) {
        quickView.addEventListener("click", function (e) {
            if (e.target === quickView) {
                quickView.querySelector(".modal-quickview-main").classList.remove("open");
            }
        });
    }
}

document.addEventListener("DOMContentLoaded", InitCustom);
document.addEventListener("livewire:navigated", InitCustom);

