$(function () {
  let edit = false;
  //utiliza ?actionPersonal='accion a realizar'
  console.log("hello world, funciona jquery!!!");
  // $('#task-result').hide();
  mostrarProductos();

  //AJAX para buscar informacion de los usuarios, PRACTICAMENTE ES UN BUSCADOR XD

  $("#buscar").keyup(function () {
    if ($("#buscar").val()) {
      let buscar = $("#buscar").val();
      console.log(buscar);
      $.ajax({
        url: "http://localhost/delivery/controller/ZetaControllerMaster.php?actionProductos=buscarProducto",
        type: "POST",
        data: { buscar },
        success: function (response) {
          console.log(response);
          let productoBuscado = JSON.parse(response.trim());
          let template = "";
          //console.log(personalBuscado);
          productoBuscado.forEach((productoBus) => {
            //console.log(productoBus);
            template += `
                  <tr idproducto="${productoBus.id}">
                      <td>${productoBus.id}</td>
                      <td>${productoBus.nombre}</td>
                      <td>${productoBus.descripcion}</td>
                      <td>${productoBus.marca}</td>
                      <td>${productoBus.contenido}</td>
                      <td>${productoBus.unidades}</td>
                      <td>${productoBus.precio}</td>
                      <td>${productoBus.imagen}</td>
                      <td><a href="#" class="editar-producto">editar</a></td>
                      <td><button class="eliminar-producto">eliminar</button></td>
                  </tr>
                    `;
          });
          $("#container").html(template);
          $("#task-result").show();
        },
      });
    }
  });

  //AJAX para guardar nuevo personal, se obtiene datos del formulario de cada input y se le envia al controllador master
  $("#productos-form").submit(function (e) {
    // console.log('enviando');
    const postData = {
      nombre: $("#nombre").val(),
      descripcion: $("#descripcion").val(),
      marca: $("#marca").val(),
      contenido: $("#contenido").val(),
      unidades: $("#unidades").val(),
      precio: $("#precio").val(),
      imagen: $("#imagen").val(),
      id: $("#idProducto").val(),
    };

    const url =
      edit === false
        ? "http://localhost/delivery/controller/ZetaControllerMaster.php?actionProductos=guardarProducto"
        : "http://localhost/delivery/controller/ZetaControllerMaster.php?actionProductos=editarProducto";
    //console.log(postData, url);
    // console.log(postData);

    $.post(url, postData, function (response) {
      console.log(response);
      mostrarProductos();

      $("#productos-form").trigger("reset");
    });
    e.preventDefault();
  });
  //AJAX para mostrar y listar los productos en la tabla, se hace una solicitud al controllador master
  function mostrarProductos() {
    $.ajax({
      url: "http://localhost/delivery/controller/ZetaControllerMaster.php?actionProductos=mostrarProductos",
      type: "GET",
      success: function(response) {
        console.log(response);
        //JSON.parse(response){
        let productosAll = JSON.parse(response.trim());
        let template = "";
        productosAll.forEach((producto) => {
          template += `
                  <tr idproducto="${producto.id}">
                      <td>${producto.id}</td>
                      <td>${producto.nombre}</td>
                      <td>${producto.descripcion}</td>
                      <td>${producto.marca}</td>
                      <td>${producto.contenido}</td>
                      <td>${producto.unidades}</td>
                      <td>${producto.precio}</td>
                      <td>${producto.imagen}</td>
                      <td><a href="#" class="editar-producto">editar</a></td>
                      <td><button class="eliminar-producto">eliminar</button></td>
                  </tr>
              `;
        });
        $("#mostrarProductos").html(template);

        //}
      },
    });
  }
  //AJAX para eliminar un producto, Funciona
  $(document).on("click", ".eliminar-producto", function () {
    if (confirm("Are you sure you want to delete it?")) {
      // console.log('clicked');
      // console.log($(this));
      let element = $(this)[0].parentElement.parentElement;
      let id = $(element).attr("idproducto");
      console.log(id);
      $.post(
        "http://localhost/delivery/controller/ZetaControllerMaster.php?actionProducto=eliminarProducto",
        { id },
        function (response) {
          console.log(response);
          mostrarProductos();
        }
      );
    }
  });

  //AJAX para editar y actualizar  un personal, se obtiene el id personal de la clase html declarada en tr Y despues se le hace una solicitud para mostrar un unico usuario, del cual se llenara los datos en los inputs para poder ser editados, por ultimo se declara la variable edit como true para que en la funcion AGREGAR PERSONAL de este mismo js reconozca el valor de edit y mande al controllador master para Actualizar y editar
  $(document).on("click", ".editar-producto", function () {
    console.log("editing");
    let element = $(this)["0"].parentElement.parentElement;
    let id = $(element).attr("idproducto");
    console.log(id);
    $.post(
      "http://localhost/delivery/controller/ZetaControllerMaster.php?actionProductos=productoUnico",
      { id },
      function (response) {
        //console.log(response);
        const producto = JSON.parse(response);
        $("#nombre").val(producto.nombre);
        $("#descripcion").val(producto.descripcion);
        $("#marca").val(producto.marca);
        $("#contenido").val(producto.contenido);
        $("#unidades").val(producto.unidades);
        $("#precio").val(producto.precio);
        $("#imagen").val(producto.imagen);
        $("#idProducto").val(producto.id_producto);

        edit = true;
      }
    );
  });
});
