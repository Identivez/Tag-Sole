// Archivo para la gestión de favoritos
document.addEventListener('DOMContentLoaded', function() {
    // Botones de favoritos
    const favoriteButtons = document.querySelectorAll('.favorite-button');

    favoriteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();

            const productId = this.dataset.productId;
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            // Realizar petición AJAX
            fetch('/favorites/toggle', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    ProductId: productId
                })
            })
            .then(response => response.json())
            .then(data => {
                // Actualizar el icono
                if (data.status === 'added') {
                    this.classList.add('text-red-500');
                    this.classList.remove('text-gray-300');
                } else {
                    this.classList.remove('text-red-500');
                    this.classList.add('text-gray-300');
                }

                // Mostrar notificación
                showNotification(data.message);
            })
            .catch(error => {
                console.error('Error:', error);
                showNotification('Ha ocurrido un error. Inténtalo de nuevo más tarde.');
            });
        });
    });

    // Función para mostrar notificaciones
    function showNotification(message) {
        const notification = document.createElement('div');
        notification.className = 'fixed bottom-4 right-4 bg-gray-800 text-white px-4 py-2 rounded shadow-lg z-50 transition-opacity duration-500';
        notification.textContent = message;

        document.body.appendChild(notification);

        // Desaparecer después de 3 segundos
        setTimeout(() => {
            notification.style.opacity = '0';
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 500);
        }, 3000);
    }

    // Verificar el estado de los favoritos al cargar la página
    function checkFavoritesStatus() {
        const productCards = document.querySelectorAll('[data-product-id]');
        const productIds = Array.from(productCards).map(card => card.dataset.productId);

        if (productIds.length === 0) return;

        productIds.forEach(productId => {
            fetch(`/favorites/check/${productId}`, {
                headers: {
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.isFavorite) {
                    const button = document.querySelector(`.favorite-button[data-product-id="${productId}"]`);
                    if (button) {
                        button.classList.add('text-red-500');
                        button.classList.remove('text-gray-300');
                    }
                }
            })
            .catch(error => console.error('Error:', error));
        });
    }

    // Ejecutar la verificación si hay productos en la página
    checkFavoritesStatus();
});
