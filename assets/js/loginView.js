$(document).ready(function () {
  $(".my-formLogin").submit(function (event) {
    event.preventDefault();

    const username = $("#usuario").val();
    const password = $("#password").val();
    //console.log(username);
    //console.log(password);
    // Realizar una solicitud AJAX para enviar los datos al controlador
    $.ajax({
      url: "http://localhost/delivery/controller/ZetaControllerMaster.php?actionLogin=LogIn",
      method: "POST",
      data: {
        username: username,
        password: password,
      },
      success: function (response) {
        //console.log(response);
        //EL REPONSE OSEA LA RESPUESTA DEBE SER LA RUTA DE INGRESO DEPENDIENDO EL NIVEL DE USUARIO
        // Verificar la respuesta del controlador
        if (response && typeof response === "string" && response.trim() !== "" && response!=false) {
          // El inicio de sesión fue exitoso, redirigir o realizar otras acciones
          //console.log("Inicio de sesión exitoso");
          window.location.href = response;
        } else {
          //console.log("error");
          // El inicio de sesión falló, mostrar un mensaje de error
          const DOMerror = document.querySelector(".containerLogin");
          const miNodo = document.createElement("div");
          miNodo.classList.add("error");
          miNodo.textContent =
            "Credenciales inválidas. Por favor, inténtelo nuevamente.";
          // Insertar al principio del contenedor
          DOMerror.insertBefore(miNodo, DOMerror.firstChild);
          
        }
      },
      error: function () {
        const DOMerror = document.querySelector("#containerLogin");
        console.log(DOMerror);
        const miNodo = document.createElement("div");
        miNodo.classList.add("error");
        miNodo.textContent =
          "Error en la solicitud. Por favor, inténtelo nuevamente.";
        // Insertar al principio del contenedor
        DOMerror.insertBefore(miNodo, DOMerror.firstChild);
        console.log("error");
      },
    });
  });
});
