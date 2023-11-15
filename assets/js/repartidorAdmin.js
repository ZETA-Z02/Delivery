$(function () {
  let edit = false;
  //utiliza ?actionPersonal='accion a realizar'
  console.log("hello world, funciona jquery!!!");
  // $('#task-result').hide();
  mostrarRepartidor();

  //AJAX para buscar informacion de los usuarios, PRACTICAMENTE ES UN BUSCADOR XD

  $("#buscar").keyup(function () {
    if ($("#buscar").val()) {
      let buscar = $("#buscar").val();
      console.log(buscar);
      $.ajax({
        url: "http://localhost/delivery/controller/ZetaControllerMaster.php?actionRepartidor=buscarRepartidor",
        type: "POST",
        data: { buscar },
        success: function (response) {
          console.log(response);
          let repartidorBuscado = JSON.parse(response);
          let template = "";
          console.log(repartidorBuscado);
          repartidorBuscado.forEach((repartidorBus) => {
            console.log(repartidorBus);
            template += `
                <tr idpersonal="${repartidorBus.id}">
                    <td>${repartidorBus.id}</td>
                    <td>${repartidorBus.nombre}</td>
                    <td>${repartidorBus.apellido}</td>
                    <td>${repartidorBus.dni}</td>
                    <td>${repartidorBus.telefono}</td>
                    <td>${repartidorBus.vehiculo}</td>
                    <td><a href="#" class="editar-personal">editar</a></td>
                    <td><button class="eliminar-personal">eliminar</button></td>
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
  $("#personal-form").submit(function (e) {
    // console.log('enviando');
    const postData = {
      nombre: $("#nombre").val(),
      apellido: $("#apellido").val(),
      dni: $("#dni").val(),
      telefono: $("#telefono").val(),
      direccion: $("#direccion").val(),
      estado: $("#estado").val(),
      cargo: $("#cargo").val(),
      id: $("#idPersonal").val(),
    };

    const url =
      edit === false
        ? "http://localhost/delivery/controller/ZetaControllerMaster.php?actionRepartidor=guardarPersonal"
        : "http://localhost/delivery/controller/ZetaControllerMaster.php?actionRepartidor=editarPersonal";
    console.log(postData, url);
    // console.log(postData);

    $.post(url, postData, function (response) {
      console.log(response);
      mostrarRepartidor();

      $("#personal-form").trigger("reset");
    });
    e.preventDefault();
  });
  //AJAX para mostrar y listar el personal en la tabla, se hace una solicitud al controllador master
  function mostrarRepartidor() {
    $.ajax({
      url: "http://localhost/delivery/controller/ZetaControllerMaster.php?actionRepartidor=mostrarRepartidor",
      type: "GET",
      success: function (response) {
        //console.log(response);
        //JSON.parse(response){
        let repartidorAll = JSON.parse(response);
        let template = "";
        repartidorAll.forEach((repartidor) => {
          template += `
                <tr idpersonal="${repartidor.id}">
                    <td>${repartidor.id}</td>
                    <td>${repartidor.nombre}</td>
                    <td>${repartidor.apellido}</td>
                    <td>${repartidor.dni}</td>
                    <td>${repartidor.telefono}</td>
                    <td>${repartidor.vehiculo}</td>
                    <td><a href="#" class="editar-repartidor">editar</a></td>
                    <td><button class="eliminar-repartidor">eliminar</button></td>
                </tr>
            `;
        });
        $("#mostrarRepartidor").html(template);

        //}
      },
    });
  }
  //AJAX para eliminar un personal, Funciona
  $(document).on("click", ".eliminar-personal", function () {
    if (confirm("Are you sure you want to delete it?")) {
      // console.log('clicked');
      // console.log($(this));
      let element = $(this)[0].parentElement.parentElement;
      let id = $(element).attr("idpersonal");
      console.log(id);
      $.post(
        "http://localhost/delivery/controller/ZetaControllerMaster.php?actionRepartidor=eliminarPersonal",
        { id },
        function (response) {
          console.log(response);
          mostrarPersonal();
        }
      );
    }
  });

  //AJAX para editar y actualizar  un personal, se obtiene el id personal de la clase html declarada en tr Y despues se le hace una solicitud para mostrar un unico usuario, del cual se llenara los datos en los inputs para poder ser editados, por ultimo se declara la variable edit como true para que en la funcion AGREGAR PERSONAL de este mismo js reconozca el valor de edit y mande al controllador master para Actualizar y editar
  $(document).on("click", ".editar-personal", function () {
    console.log("editing");
    let element = $(this)["0"].parentElement.parentElement;
    let id = $(element).attr("idpersonal");
    console.log(id);
    $.post(
      "http://localhost/delivery/controller/ZetaControllerMaster.php?actionRepartidor=personalUnico",
      { id },
      function (response) {
        console.log(response);
        const personal = JSON.parse(response);
        $("#nombre").val(personal.nombre);
        $("#apellido").val(personal.apellido);
        $("#dni").val(personal.dni);
        $("#telefono").val(personal.telefono);
        $("#direccion").val(personal.direccion);
        $("#estado").val(personal.estado);
        $("#cargo").val(personal.cargo);
        $("#idPersonal").val(personal.id_personal);

        edit = true;
      }
    );
  });
});
