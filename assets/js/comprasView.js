$(function () {
  console.log("Jquery Ready, Page Compras xd");
  let carrito = [];
  //Renderiza y muestra los productos de la base de datos, solo los disponibles
  function mostrarProductos() {
    $.ajax({
      url: "http://localhost/delivery/controller/ZetaControllerMaster.php?actionCompras=mostrarCompras",
      type: "GET",
      success: function (response) {
        //console.log(response);
        let productos = JSON.parse(response);
        let template = "";
        //deberia mostrar todo USAR UN FOR PARA MOSTRAR LOS ELEMENTOS
        productos.forEach((producto) => {
          template += `<article>
                            <figure>
                                <img src="${producto.imagen}" alt='Preview'>
                            </figure>
                            <div class='article-preview'>
                                <h2 Nombre="${producto.nombre}">
                                  ${producto.nombre}
                                </h2>
                                <p>
                                  ${producto.descripcion}
                                </p><br>
                                <p idContenido="${producto.contenido}">
                                ${producto.contenido}
                                </p><br>
                                <p idPrecio="${producto.precio}">
                                precio: s/.${producto.precio}
                                </p><br>
                                <button class='button' title='Learn' idproducto="${producto.id_producto}">
                                    COMPRAR
                                </button>
                            </div>
                        </article>
                        `;
        });
        $("#mostrarCompras").html(template);
      },
    });
  }

  function addProductosCarrito(evento) {
    const idProducto = evento.target.getAttribute("idproducto");
    //console.log(carrito);
    // Verificamos si el producto ya está en el carrito
    const articleProduct = document.querySelector(".carritoProducts");

    articleProduct.innerHTML = "";

    if (!carrito.includes(idProducto)) {
      carrito.push(idProducto);
      mostrarCarrito();
    } else {
      mostrarCarrito();
    }
  }
  function mostrarCarrito() {
    const carritoSinDuplicados = [...new Set(carrito)];
    //obtenemos los productos de la base de datos
    $.ajax({
      url: "http://localhost/delivery/controller/ZetaControllerMaster.php?actionCompras=mostrarCompras",
      type: "GET",
      success: function (response) {
        //console.log(response);
        const productosBaseDatos = JSON.parse(response);
        //desde aqui se quita duplicados se aumenta productos al carrito y se renderiza el carrito
        carritoSinDuplicados.forEach((item) => {
          const miItem = productosBaseDatos.find((itemBaseDatos) => {
            return itemBaseDatos.id_producto == parseInt(item);
          });
          //console.log(miItem.id_producto);
          let template = `
              <tr idProducto="${miItem.id_producto}">
                <th>${miItem.nombre}</th>
                <th>${miItem.contenido}</th>
                <th id="precioUni">${miItem.precio}</th>
                <th><input class="cantidad" id="cantidad" type="number" min="1" value="1"></th>
                <th class="subtotal">${miItem.precio}</th>
                <th><button class="eliminar" idBtnProducto="${miItem.id_producto}">eliminar</button></th>
              </tr>
              `;
          $("#shoppingCar").append(template);
        });
        calcularTotal();
      },
    });
  }
  function calcularTotal() {
    const totalProduct = document.querySelector("#total-enviar");
    totalProduct.innerHTML = "";
    const subtotals = $(".subtotal");
    const quantities = $(".cantidad");

    let total = 0;
    let totalQuantity = 0;

    subtotals.each(function (index) {
      const subtotal = parseFloat($(this).text());
      const quantity = parseInt(quantities.eq(index).val());

      if (!isNaN(subtotal) && !isNaN(quantity)) {
        total += subtotal * quantity;
        totalQuantity += quantity;
      }
    });

    var cantidadProductos = $("#shoppingCar").find("tr").length;

    template = `<h1>Total Carrito</h1>
            <table>
                <thead>
                    <tr>
                        <th>total Productos</th>
                        <th>cantidad total de javas</th>
                        <th>Comentario</th>
                        <th>Metodo Pago</th>
                        <th>Total</th>
                        <th>Cancelar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>${cantidadProductos} productos</th>
                        <th id="totalJavas">${totalQuantity}</th>
                        <th><input type="text" id="descripcion" placeholder="ejem. casa azul"></th>
                        <th><select name="opcion_pago" id="opcion_pago">
                              <option value="boleta">boleta</option>
                              <option value="factura">factura</option>
                            </select>
                        </th>
                        <th id="totalPagar">S/${total.toFixed(2)}</th>
                        <th><button class="cancelar" href="">Cancelar</button></th>
                    </tr>
                </tbody>
              </table>
              `;
    $("#total-enviar").append(template);
  }

  //Para borrar un solo producto-items del carrito
  function borrarItemCarrito(evento) {
    const idProducto = evento.target.getAttribute("idBtnProducto");
    // Filtrar el carrito para mantener solo los productos que no tienen el ID proporcionado
    carrito = carrito.filter((productoId) => productoId !== idProducto);
    // Volver a renderizar el carrito
    const articleProduct = document.querySelector(".carritoProducts");
    articleProduct.innerHTML = "";
    mostrarCarrito();
  }

  //Para cancelar pedido, calcelar el carrito
  function vaciarCarrito() {
    // Limpiamos los productos guardados
    carrito = [];
    //console.log(carrito);
    const articleProduct = document.querySelector(".carritoProducts");
    articleProduct.innerHTML = "";
    // Renderizamos los cambios
    mostrarCarrito();
  }
  $(document).on("click", ".eliminar", borrarItemCarrito);
  $(document).on("click", ".cantidad", calcularTotal);
  $(document).on("click", ".cancelar", vaciarCarrito);
  //Evento click para anadir mas productos al carrito - COMPRAR
  $(document).on("click", ".button", addProductosCarrito);
  //Evento para hallar subtotal
  $(document).on("input", "#shoppingCar input[id='cantidad']", function () {
    // Obtener el tr (fila) que contiene el input
    const fila = $(this).closest("tr");
    // Obtener el precio unitario y la cantidad
    const precioUnitario = parseFloat(fila.find("#precioUni").text());
    const cantidad = parseInt($(this).val());
    // Calcular el subtotal
    const subtotal = precioUnitario * cantidad;
    // Actualizar el subtotal en la fila
    fila.find("#subtotal").text(subtotal.toFixed(2));
    // Recalcular y mostrar el total general
  });
  $(document).on("change", ".cantidad", function() {
    // Obtener el valor del input y convertirlo a un número
    const cantidad = parseInt($(this).val());

    // Obtener el precio unitario de la fila actual
    const precioUnitario = parseFloat($(this).closest("tr").find("#precioUni").text());

    // Calcular el subtotal multiplicando la cantidad por el precio unitario
    const subtotal = cantidad * precioUnitario;

    // Actualizar el contenido de la celda de subtotal
    $(this).closest("tr").find(".subtotal").text(subtotal.toFixed(2)); // Puedes ajustar el número de decimales según tus necesidades
});

  mostrarProductos();

  $(document).on("click", ".btn-pagar", function () {
    const descripcion = $("#descripcion").val();
    const opcion_pago = $("#opcion_pago").val();
    const totalJavas = $("#totalJavas").text();
    const productos = $("tr[idProducto]");
    const datos = {
      descripcion: descripcion,
      opcion_pago: opcion_pago,
      totalJavas: totalJavas,
      productos: {},
    };
    //console.log(datos);
    // Iterar sobre los elementos y agregar al objeto
    productos.each(function () {
      const idProducto = $(this).attr("idProducto");
      const cantidad = $(this).find(".cantidad").val();

      // Agregar al objeto productos
      datos.productos[idProducto] = cantidad;
    });
    //se obtiene los datos necesarios para enviar al servidor
    // console.log(descripcion);
    // console.log(opcion_pago);
    // console.log(totalJavas);
    // console.log(datos);
    if (totalJavas == 0) {
      alert('no hay ningun producto seleccionado');
    } else {
      $.ajax({
        url: "http://localhost/delivery/controller/ZetaControllerMaster.php?actionCompras=pedidoEnviado",
        method: "POST",
        data: { data: datos },
        success: function (response) {
          //hacer mensaje modal para confirmacion del pedido 
          if(response==true){
            //console.log('pedido exitoso');
            alert('pedido exitoso');
            vaciarCarrito();
          }else if(response==false){
            alert('pedido fallido');
            console.log('pedido fallido');
            vaciarCarrito();
          }else{
            alert('falta personal-intente de nuevo mas tarde');
            vaciarCarrito();
          }
          //limpia el carrito al enviar correctamente el pedido 
        },
        error: function () {
          //un alert o otro mensaje para decir que se cancelo todo
          alert('el pedido fallo-intentar de nuevo');
          //console.log("error en el servidor no se envia datos");
        },
      });
    }
  });
});
