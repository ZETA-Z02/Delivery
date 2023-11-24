$(function () {
  let edit = false;
  console.log("loginAdmin ready!!!!!");
  function mostrarLogin() {
    $.ajax({
      url: "http://localhost/delivery/controller/ZetaControllerMaster.php?actionLoginAdmin=mostrarLogin",
      type: "GET",
      success: function (response) {
        //console.log(response);
        //JSON.parse(response){
        let loginAll = JSON.parse(response);
        let template = "";
        loginAll.forEach((login) => {
          template += `
                    <tr idlogin="${login.id_login}">
                        <td>${login.id_login}</td>
                        <td>${login.usuario}</td>
                        <td>${login.password}</td>
                        <td>${login.id_cliente}</td>
                        <td>${login.id_personal}</td>
                        <td>${login.nivel}</td>
                        <td><a href="#" class="editar-login">editar</a></td>
                        <td><button class="eliminar-login">eliminar</button></td>
                    </tr>
                `;
        });
        $("#mostrarLogin").html(template);
        //}
      },
    });
  }

  function mostrarNombresPersonal(){
    $.ajax({
      url: "http://localhost/delivery/controller/ZetaControllerMaster.php?actionLoginAdmin=mostrarPersonalLogin",
      type: "GET",
      success: function (response) {
        //console.log(response);
        //JSON.parse(response){
        let personalAll = JSON.parse(response);
        let template = "";
        personalAll.forEach((personal) => {
          template += `
              <option value="${personal.id_personal}">${personal.nombres}</option>
                `;
        });
        $("#login").html(template);
        //}
      },
    });
  }
  

  //guardar-login
  $("#login-form").submit(function (e) {
    // console.log('enviando');
    const postData = {
      usuario: $("#usuario").val(),
      password: $("#password").val(),
      id_login: $("#login").val(),
      nivel: $("#nivel").val(),
    };

    const url =
      edit === false
        ? "http://localhost/delivery/controller/ZetaControllerMaster.php?actionLoginAdmin=guardarLogin"
        : "http://localhost/delivery/controller/ZetaControllerMaster.php?actionLoginAdmin=editarLogin";
    console.log(postData, url);
    
    $.post(url, postData, function (response) {
      //console.log(response);
      $("#login-form").trigger("reset");
      mostrarLogin();
      mostrarNombresPersonal();
    });
    e.preventDefault();
  });

  $(document).on("click", ".editar-login", function () {
    //console.log("editing");
    let element = $(this)["0"].parentElement.parentElement;
    let id = $(element).attr("idlogin");
    //console.log(id);
    $.post(
      "http://localhost/delivery/controller/ZetaControllerMaster.php?actionLoginAdmin=unicoLogin",
      { id },
      function (response) {
        //console.log(response);
        const login = JSON.parse(response);
        console.log(login);
        $("#usuario").val(login.usuario);
        $("#password").val(login.password);
        $("#nivel").val(login.nivel);
        // $("#idLogin").val(login.id_login);
        // $("#nombre").val(login.nombre);
        let template = "";
          template += `
              <option value="${login.id_login}">${login.nombre}</option>
                `;
        $("#login").html(template);
        edit = true;
      }
    );
  });

    //AJAX para eliminar un login, Funciona
    $(document).on("click", ".eliminar-login", function () {
      if (confirm("Are you sure you want to delete it?")) {
        // console.log('clicked');
        // console.log($(this));
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr("idlogin");
        console.log(id);
        $.post(
          "http://localhost/delivery/controller/ZetaControllerMaster.php?actionLoginAdmin=eliminarLogin",
          { id },
          function (response) {
            console.log(response);
            mostrarLogin();
          }
        );
      }
    });
  mostrarLogin();
  mostrarNombresPersonal();
});
