$(document).ready(function() {
    // 📌 Filtrado en tiempo real
    $("#categoriaFiltro").change(function() {
        let categoriaID = $(this).val();
        
        $(".producto").each(function() {
            if (categoriaID === "" || $(this).data("categoria") == categoriaID) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });
});

// 🛍️ Carrito de Compras
let carrito = JSON.parse(sessionStorage.getItem('carrito')) || [];

function actualizarCarrito() {
    let cartItems = $('#cart-items');
    let total = 0;
    cartItems.empty();

    carrito.forEach((producto, index) => {
        total += parseFloat(producto.precio);

        cartItems.append(`
            <li>
                ${producto.nombre} - $${producto.precio}
                <button class="btn btn-sm" onclick="eliminarDelCarrito(${index})">❌</button>
            </li>
        `);
    });

    $('#total').text(total.toFixed(2));
    sessionStorage.setItem('carrito', JSON.stringify(carrito));
}

function agregarAlCarrito(id, nombre, precio) {
    carrito.push({ id, nombre, precio });
    actualizarCarrito();
}

function eliminarDelCarrito(index) {
    carrito.splice(index, 1); // Elimina el producto según su índice
    actualizarCarrito();
}

// Inicializar carrito al cargar la página
$(document).ready(() => {
    actualizarCarrito();
});
