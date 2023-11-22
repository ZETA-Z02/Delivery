$(function () {
  function mostrarInventario() {
    $.ajax({
      url: "http://localhost/delivery/controller/ZetaControllerMaster.php?actionInventario=mostrarInventario",
      type: "GET",
      success: function (response) {
        //console.log(response);
        //JSON.parse(response){
        let inventarioAll = JSON.parse(response);
        let template = "";
        inventarioAll.forEach((inventario) => {
          template += `
                    <tr>
                        <td>${inventario.nombreProducto}</td>
                        <td>${inventario.marca}</td>
                        <td>${inventario.contenido}</td>
                        <td>${inventario.cantidad}</td>
                        <td>${inventario.nombreRepartidor}</td>
                        <td>${inventario.fecha}</td>
                    </tr>
                `;
        });
        $("#mostrarInventario").html(template);
        //}
      },
    });
  }
  //mostrar productos registrados en el formulario
  $.ajax({
    url: "http://localhost/delivery/controller/ZetaControllerMaster.php?actionInventario=mostrarProductos",
    type: "GET",
    success: function (response) {
      //console.log(response);
      //JSON.parse(response){
      let productosAll = JSON.parse(response);
      let template = "";
      productosAll.forEach((producto) => {
        template += `
            <option value="${producto.idProducto}">${producto.nombres}</option>
              `;
      });
      $("#producto").html(template);
      //}
    },
  });
  //mostrar repartidores registrados en el formulario
  $.ajax({
    url: "http://localhost/delivery/controller/ZetaControllerMaster.php?actionInventario=mostrarRepartidores",
    type: "GET",
    success: function (response) {
      //console.log(response);
      //JSON.parse(response){
      let repartidoresAll = JSON.parse(response);
      let template = "";
      repartidoresAll.forEach((repartidor) => {
        template += `
             <option value="${repartidor.idRepartidor}">${repartidor.nombres}</option>
              `;
      });
      $("#repartidor").html(template);
      //}
    },
  });

  $("#inventario-form").submit(function (e) {
    const postData = {
      producto: $("#producto").val(),
      repartidor: $("#repartidor").val(),
      cantidad: $("#cantidad").val(),
      fecha: $("#fecha").val(),
    };
    let url = "http://localhost/delivery/controller/ZetaControllerMaster.php?actionInventario=guardarInventario";
    //console.log(postData);
    $.post(url,postData,function(response){
      console.log(response);
      mostrarInventario();
      $("#inventario-form").trigger("reset");
    });
    e.preventDefault();
  });
  mostrarInventario();
});
