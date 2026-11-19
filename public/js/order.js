
document.addEventListener("DOMContentLoaded", function () {

    const cards = document.querySelectorAll(".order-card");

    const selectedOrders = document.getElementById("selectedOrders");
    const totalAmount = document.getElementById("totalAmount");

    const doneOrder = document.getElementById("doneOrder");
    const clearOrder = document.getElementById("clearOrder");

    const successOverlay = document.getElementById("successOverlay");
    const successOrderDetails = document.getElementById("successOrderDetails");
    const successTotal = document.getElementById("successTotal");

    let orders = {};

    function money(amount) {
        return "₱" + amount.toFixed(2);
    }

    function calculateTotal() {

        let total = 0;

        Object.values(orders).forEach(function (item) {
            total += item.price * item.quantity;
        });

        return total;
    }

    function updateOrder() {

        selectedOrders.innerHTML = "";

        const items = Object.values(orders);

        if (items.length === 0) {

            selectedOrders.innerHTML =
                '<p class="empty-order">No drinks selected yet.</p>';

        }

        items.forEach(function (item) {

            const itemTotal = item.price * item.quantity;

            const div = document.createElement("div");
            div.className = "summary-item";

            const name = document.createElement("span");
            name.textContent = item.name + " × " + item.quantity;

            const price = document.createElement("strong");
            price.textContent = money(itemTotal);

            div.appendChild(name);
            div.appendChild(price);

            selectedOrders.appendChild(div);

        });

        totalAmount.textContent = money(calculateTotal());

        doneOrder.disabled = items.length === 0;
    }

    cards.forEach(function (card) {

        const name = card.dataset.name;
        const price = Number(card.dataset.price);

        const selectButton = card.querySelector(".select-product-btn");
        const quantityControls = card.querySelector(".quantity-controls");

        const quantityValue = card.querySelector(".quantity-value");

        const minusButton = card.querySelector(".quantity-minus");
        const plusButton = card.querySelector(".quantity-plus");

        selectButton.addEventListener("click", function () {

            if (!orders[name]) {

                orders[name] = {
                    name: name,
                    price: price,
                    quantity: 1
                };

            }

            card.classList.add("selected");

            selectButton.hidden = true;
            quantityControls.hidden = false;

            quantityValue.textContent = orders[name].quantity;

            updateOrder();

        });

        plusButton.addEventListener("click", function () {

            if (!orders[name]) return;

            orders[name].quantity++;

            quantityValue.textContent = orders[name].quantity;

            updateOrder();

        });

        minusButton.addEventListener("click", function () {

            if (!orders[name]) return;

            orders[name].quantity--;

            if (orders[name].quantity <= 0) {

                delete orders[name];

                card.classList.remove("selected");

                quantityControls.hidden = true;
                selectButton.hidden = false;

                quantityValue.textContent = 1;

            } else {

                quantityValue.textContent = orders[name].quantity;

            }

            updateOrder();

        });

    });

    clearOrder.addEventListener("click", function () {

        orders = {};

        cards.forEach(function (card) {

            card.classList.remove("selected");

            card.querySelector(".select-product-btn").hidden = false;
            card.querySelector(".quantity-controls").hidden = true;
            card.querySelector(".quantity-value").textContent = 1;

        });

        updateOrder();

    });

    doneOrder.addEventListener("click", function () {

        if (Object.keys(orders).length === 0) return;

        successOrderDetails.innerHTML = "";

        Object.values(orders).forEach(function (item) {

            const row = document.createElement("p");

            row.textContent =
                item.name + " × " + item.quantity +
                " — " + money(item.price * item.quantity);

            successOrderDetails.appendChild(row);

        });

        successTotal.textContent = "Total: " + money(calculateTotal());

        successOverlay.hidden = false;

    });

    document.getElementById("closeSuccess").addEventListener("click", function () {

        successOverlay.hidden = true;

        clearOrder.click();

    });

    updateOrder();

});
