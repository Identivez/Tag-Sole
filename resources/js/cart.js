// Archivo para la gestión del carrito
document.addEventListener('DOMContentLoaded', function() {
    // Botones de cantidad
    const quantityInputs = document.querySelectorAll('.quantity-input');

    quantityInputs.forEach(input => {
        const decrementBtn = input.previousElementSibling;
        const incrementBtn = input.nextElementSibling;

        decrementBtn.addEventListener('click', function() {
            if (input.value > 1) {
                input.value = parseInt(input.value) - 1;
                // Disparar el evento change para actualizar formularios
                input.dispatchEvent(new Event('change'));
            }
        });

        incrementBtn.addEventListener('click', function() {
            input.value = parseInt(input.value) + 1;
            // Disparar el evento change para actualizar formularios
            input.dispatchEvent(new Event('change'));
        });
    });

    // Formularios de actualización de cantidad
    const updateForms = document.querySelectorAll('.update-quantity-form');

    updateForms.forEach(form => {
        const input = form.querySelector('.quantity-input');
        const originalValue = input.value;

        input.addEventListener('change', function() {
            // Solo enviar si el valor ha cambiado
            if (this.value !== originalValue) {
                form.submit();
            }
        });
    });

    // Totales dinámicos en checkout
    function updateCartTotals() {
        const cartItems = document.querySelectorAll('.cart-item');
        let subtotal = 0;

        cartItems.forEach(item => {
            const price = parseFloat(item.dataset.price);
            const quantity = parseInt(item.querySelector('.quantity-input').value);
            const itemTotal = price * quantity;

            // Actualizar el total del elemento
            const totalElement = item.querySelector('.item-total');
            if (totalElement) {
                totalElement.textContent = '$' + itemTotal.toFixed(2);
            }

            subtotal += itemTotal;
        });

        // Actualizar subtotal
        const subtotalElement = document.getElementById('cart-subtotal');
        if (subtotalElement) {
            subtotalElement.textContent = '$' + subtotal.toFixed(2);
        }

        // Actualizar otros valores (envío, impuestos, total)
        const shippingElement = document.getElementById('cart-shipping');
        if (shippingElement) {
            const shipping = parseFloat(shippingElement.dataset.value || 0);
            shippingElement.textContent = '$' + shipping.toFixed(2);

            // Actualizar total
            const totalElement = document.getElementById('cart-total');
            if (totalElement) {
                totalElement.textContent = '$' + (subtotal + shipping).toFixed(2);
            }
        }
    }

    // Si hay elementos en el carrito, calcular totales iniciales
    if (document.querySelectorAll('.cart-item').length > 0) {
        updateCartTotals();

        // Recalcular cuando cambie la cantidad
        document.querySelectorAll('.quantity-input').forEach(input => {
            input.addEventListener('change', updateCartTotals);
        });
    }
});
