$(function(){
  console.log('loginAdmin ready!!!!!');
  function mostrarLogin() {
        $.ajax({
          url: "http://localhost/delivery/controller/ZetaControllerMaster.php?actionLoginAdmin=mostrarLogin",
          type: "GET",
          success: function (response) {
            console.log(response);
            //JSON.parse(response){
            let personalAll = JSON.parse(response);
            let template = "";
            personalAll.forEach((personal) => {
              template += `
                    <tr idpersonal="${personal.id}">
                        <td>${personal.id}</td>
                        <td>${personal.nombre}</td>
                        <td>${personal.apellido}</td>
                        <td>${personal.dni}</td>
                        <td>${personal.telefono}</td>
                        <td>${personal.direccion}</td>
                        <td>${personal.estado}</td>
                        <td>${personal.cargo}</td>
                        <td><a href="#" class="editar-personal">editar</a></td>
                        <td><button class="eliminar-personal">eliminar</button></td>
                    </tr>
                `;
            });
            $("#mostrarPersonal").html(template);
            //}
          },
        });
    }
    mostrarLogin();
});