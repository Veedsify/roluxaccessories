// Quick View Component


async function InitCustom() {
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

