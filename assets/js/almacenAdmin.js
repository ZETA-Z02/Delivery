$(function () {
  console.log("jquery funcionando!!, pagina almacen");
  mostrarAlmacen();
  //AJAX para mostrar y listar el almacen en la tabla, se hace una solicitud al controllador master
  function mostrarAlmacen() {
    $.ajax({
      url: "http://localhost/delivery/controller/ZetaControllerMaster.php?actionAlmacen=mostrarAlmacen",
      type: "GET",
      success: function (response) {
        //console.log(response);
        //JSON.parse(response){
        let almacenAll = JSON.parse(response);
        let template = "";
        almacenAll.forEach((almacen) => {
          template += `
                  <tr">
                      <td>${almacen.nombre}</td>
                      <td>${almacen.marca}</td>
                      <td>${almacen.contenido}</td>
                      <td>${almacen.fecha}</td>
                      <td>${almacen.cantidad}</td>
                      <td>agotado o disponible</td>
                  </tr>
              `;
        });
        $("#mostrarAlmacen").html(template);

        //}
      },
    });
  }
});
