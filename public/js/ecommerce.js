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

// 🛍️ Cargar el carrito desde sessionStorage
let carrito = JSON.parse(sessionStorage.getItem('carrito')) || [];

// 🔄 Función para actualizar el carrito en la interfaz y sessionStorage
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
    actualizarCarritoHidden(); // Actualizar el input oculto del formulario
}

// ➕ Agregar productos al carrito
function agregarAlCarrito(id, nombre, precio, stock) {
    let stockElemento = document.getElementById(`stock-${id}`);
    let stockActual = parseInt(stockElemento.innerText.replace("Stock: ", ""));

    if (stockActual > 0) {
        carrito.push({ id, nombre, precio });
        actualizarCarrito();

        // Restar el stock visualmente
        stockElemento.innerText = `Stock: ${stockActual - 1}`;
    } else {
        alert("No hay suficiente stock disponible.");
    }
}

// ❌ Eliminar productos del carrito
function eliminarDelCarrito(index) {
    let productoEliminado = carrito[index];

    if (productoEliminado) {
        let stockElemento = document.getElementById(`stock-${productoEliminado.id}`);
        let stockActual = parseInt(stockElemento.innerText.replace("Stock: ", ""));

        // Aumentar el stock visualmente
        stockElemento.innerText = `Stock: ${stockActual + 1}`;

        carrito.splice(index, 1);
        actualizarCarrito();
    }
}

// 🔄 Actualizar el campo oculto en el formulario de compra
function actualizarCarritoHidden() {
    $('#carritoInput').val(JSON.stringify(carrito.map(p => p.id)));
}

// ⏳ Inicializar carrito al cargar la página
$(document).ready(() => {
    actualizarCarrito();
});
