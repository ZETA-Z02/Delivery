//Utiliza ?actionCLiente='accion a realizar'
$(function () {
  let edit = false;

  console.log("hello world, funciona jquery!!!");
  //$('#task-result').hide();
  mostrarCliente();

  //AJAX para buscar informacion de los usuarios, PRACTICAMENTE ES UN BUSCADOR XD

  $("#buscar").keyup(function () {
    if ($("#buscar").val()) {
      let buscar = $("#buscar").val();
      console.log(buscar);
      $.ajax({
        url: "http://localhost/delivery/controller/ZetaControllerMaster.php?actionCliente=buscarCliente",
        type: "POST",
        data: { buscar },
        success: function (response) {
          console.log(response);
          let clienteBuscado = JSON.parse(response);
          let template = "";
          console.log(clienteBuscado);
          clienteBuscado.forEach((clienteBus) => {
            console.log(clienteBus);
            template += `
              
                  <tr idpersonal="${clienteBus.id}">
                      <td>${clienteBus.id}</td>
                      <td>${clienteBus.nombre}</td>
                      <td>${clienteBus.apellido}</td>
                      <td>${clienteBus.dni}</td>
                      <td>${clienteBus.telefono}</td>
                      <td>${clienteBus.direccion}</td>
                      <td>${clienteBus.correo}</td>
                      <td><a href="#" class="editar-cliente">editar</a></td>
                      <td><button class="eliminar-cliente">eliminar</button></td>
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
  $("#cliente-form").submit(function (e) {
    // console.log('enviando');
    const postData = {
      nombre: $("#nombre").val(),
      apellido: $("#apellido").val(),
      dni: $("#dni").val(),
      telefono: $("#telefono").val(),
      direccion: $("#direccion").val(),
      correo: $("#correo").val(),
      id: $("#idCliente").val(),
    };

    const url =
      edit === false
        ? "http://localhost/delivery/controller/ZetaControllerMaster.php?actionCliente=guardarCliente"
        : "http://localhost/delivery/controller/ZetaControllerMaster.php?actionCliente=editarCliente";
    console.log(postData, url);
    // console.log(postData);

    $.post(url, postData, function (response) {
      console.log(response);
      mostrarCliente();

      $("#personal-form").trigger("reset");
    });
    e.preventDefault();
  });
  //AJAX para mostrar y listar el personal en la tabla, se hace una solicitud al controllador master
  function mostrarCliente() {
    $.ajax({
      url: "http://localhost/delivery/controller/ZetaControllerMaster.php?actionCliente=mostrarCliente",
      type: "GET",
      success: function (response) {
        //console.log(response);
        //JSON.parse(response){
        let clienteAll = JSON.parse(response);
        let template = "";
        clienteAll.forEach((cliente) => {
          template += `
                  <tr idcliente="${cliente.id}">
                      <td>${cliente.id}</td>
                      <td>${cliente.nombre}</td>
                      <td>${cliente.apellido}</td>
                      <td>${cliente.dni}</td>
                      <td>${cliente.telefono}</td>
                      <td>${cliente.direccion}</td>
                      <td>${cliente.correo}</td>
                      <td><a href="#" class="editar-cliente">editar</a></td>
                      <td><button class="eliminar-cliente">eliminar</button></td>
                  </tr>
              `;
        });
        $("#mostrarCliente").html(template);

        //}
      },
    });
  }
  //AJAX para eliminar un CLIENTE, Funciona
  $(document).on("click", ".eliminar-cliente", function () {
    if (confirm("Are you sure you want to delete it?")) {
      //console.log('clicked');
      //console.log($(this));
      let element = $(this)[0].parentElement.parentElement;
      let id = $(element).attr("idcliente");
      console.log(id);
      $.post(
        "http://localhost/delivery/controller/ZetaControllerMaster.php?actionCliente=eliminarCliente",
        { id },
        function (response) {
          console.log(response);
          mostrarCliente();
        }
      );
    }
  });

  //AJAX para editar y actualizar  un CLiente, se obtiene el id Cliente de la clase html declarada en tr Y despues se le hace una solicitud para mostrar un unico usuario, del cual se llenara los datos en los inputs para poder ser editados, por ultimo se declara la variable edit como true para que en la funcion AGREGAR CLIENTE de este mismo js reconozca el valor de edit y mande al controllador master para Actualizar y editar
  $(document).on("click", ".editar-cliente", function () {
    console.log("editing");
    let element = $(this)["0"].parentElement.parentElement;
    let id = $(element).attr("idcliente");
    console.log(id);
    $.post(
      "http://localhost/delivery/controller/ZetaControllerMaster.php?actionCliente=clienteUnico",
      { id },
      function (response) {
        console.log(response);
        const cliente = JSON.parse(response);
        $("#nombre").val(cliente.nombre);
        $("#apellido").val(cliente.apellido);
        $("#dni").val(cliente.dni);
        $("#telefono").val(cliente.telefono);
        $("#direccion").val(cliente.direccion);
        $("#correo").val(cliente.correo);
        $("#idCliente").val(cliente.id_cliente);

        edit = true;
      }
    );
  });
});
