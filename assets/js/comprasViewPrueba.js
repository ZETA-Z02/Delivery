$(function () {
  let edit = false;
//NO FUNCIONA EN NINGUNA PAGINA HACER TEST Y HUEVADAS CON ESTE ARCHIVO GAAAA!!!!!
  console.log("hello world, funciona jquery!!!");
  //$('#task-result').hide();
  mostrarCompras();

  function mostrarCompras() {
    $.ajax({
      url: "http://localhost/delivery/controller/ZetaControllerMaster.php?actionCompras=mostrarCompras",
      type: "GET",
      success: function (response) {
        //console.log(response);
        let productos = JSON.parse(response);
        let template = "";
        //deberia mostrar todo USAR UN FOR PARA MOSTRAR LOS ELEMENTOS
        productos.forEach((producto) => {
          template += `<article idproducto="${producto.id_producto}">
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
                                <button class='button' title='Learn'>
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

  //script para obtener los datos del producto y seleccionarlo para enviarlos a la base de datos como pedido
  //DEVE MOSTRAR EL PRECIO, SUBTOTAL Y LA CANTIDAD QUE QUIERE EL CLIENTE
  var carrito = [];
  
  $(document).on("click", ".button", function () {
    let idproducto = $(this).closest("article").attr("idproducto");
    //find busca dentro article(etiqueta html) el contenido y su id y despues con attr seleccionamos el valor de esa id(atributo)
    let nombre = $(this).closest("article").find("h2[Nombre]").attr("Nombre");
    let contenido = $(this).closest("article").find("p[idContenido]").attr("idContenido");
    let precio = $(this).closest("article").find("p[idPrecio]").attr("idPrecio");
    //comprobamos si estoy obteniendo los datos
    // console.log('clicked-seleccionando producto');
    // console.log($(this));
    console.log(nombre + " " + contenido + " " + precio);
    // Aquí puedes agregar el producto a tu array de pedido o realizar otras acciones, por ejemplo, mostrarlo en el contenedor de productos seleccionados.
    let productoSeleccionado = {
      id: idproducto,
      nombre: nombre,
      contenido: contenido,
      precio: precio,
    };
    carrito.push(productoSeleccionado);
    //pedido.push({ id: idproducto });
    //console.log(pedido);
    console.log(carrito);
    mostrarProductoSeleccionado(productoSeleccionado);
  });

  function mostrarProductoSeleccionado(carrito) {
    console.log(carrito.nombre);
    console.log(carrito.contenido);
    console.log(carrito.precio);
    // carrito.forEach(function(producto){
      let template = `
      <tr idPedido="${carrito.id}">
        <th>${carrito.nombre}</th>
        <th>${carrito.contenido}</th>
        <th id="precioUni">${carrito.precio}</th>
        <th><input id="cantidad" type="number" min="1" value="1"></th>
        <th id="total">12.00</th>
        <th><button>eliminar</button></th>
      </tr>
      `;
      // let cantidad = $("#cantidad").val();
      // let precio = $("#precioUni").val();
      // total = total + precio * cantidad
      // console.log(total);
      if(carrito.nombre == ''){
        console.log('se repite');
      }
      $("#shoppingCar").append(template);
    // });
  }
});
