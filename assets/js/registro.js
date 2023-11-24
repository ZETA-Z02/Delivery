const container = document.getElementById("container");
const registerBtn = document.getElementById("register");
const loginBtn = document.getElementById("login");

registerBtn.addEventListener("click", () => {
  container.classList.add("active");
});

loginBtn.addEventListener("click", () => {
  container.classList.remove("active");
});

/*animacion lo de arriba-NO TOCAR */
$("#container").submit(function (e) {
  //console.log('enviando');
  let password = $("#password").val();
  let password2 = $("#password2").val();
  //console.log(password,' ',password2)
  // Ejemplo de validación adicional
  if (!nombre ||!apellido ||!dni ||!telefono ||!direccion ||!correo || !usuario ||!password) {
    alert("Por favor, complete todos los campos.");
    e.preventDefault();
    return;
  }

  if (password != password2) {
    alert("Las contraseñas no coinciden. Por favor, inténtelo de nuevo.");
    e.preventDefault(); // Evitar el envío del formulario si las contraseñas no coinciden
  } else {
    // Resto del código para enviar los datos al servidor
    const postData = {
      nombre: $("#nombre").val(),
      apellido: $("#apellido").val(),
      dni: $("#dni").val(),
      telefono: $("#telefono").val(),
      direccion: $("#direccion").val(),
      correo: $("#correo").val(),
      usuario: $("#usuario").val(),
      password: password, // Usar la contraseña ingresada
    };
    //console.log(postData);

    const url =
      "http://localhost/delivery/controller/ZetaControllerMaster.php?actionRegistro=registrar";

    $.post(url, postData, function (response) {
      //console.log(response);
      if (response == true) {
        window.location.href = "http://localhost/delivery/view/loginView.php";
      } else {
        console.log('error');
      }
    })
  }
  e.preventDefault();
});
