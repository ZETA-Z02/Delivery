//? This code is for animating details
//? of summary component and slightly modified
//? https://css-tricks.com/how-to-animate-the-
//? details-element-using-waapi/

class Accordion {
  constructor(el) {
    this.el = el;
    this.summary = el.querySelector("summary");
    this.content = el.querySelector(".faq-content");
    this.expandIcon = this.summary.querySelector(".expand-icon");
    this.animation = null;
    this.isClosing = false;
    this.isExpanding = false;
    this.summary.addEventListener("click", (e) => this.onClick(e));
  }

  onClick(e) {
    e.preventDefault();
    this.el.style.overflow = "hidden";

    if (this.isClosing || !this.el.open) {
      this.open();
    } else if (this.isExpanding || this.el.open) {
      this.shrink();
    }
  }

  shrink() {
    this.isClosing = true;

    const startHeight = `${this.el.offsetHeight}px`;
    const endHeight = `${this.summary.offsetHeight}px`;

    if (this.animation) {
      this.animation.cancel();
    }

    this.animation = this.el.animate(
      {
        height: [startHeight, endHeight],
      },
      {
        duration: 400,
        easing: "ease-out",
      }
    );

    this.animation.onfinish = () => {
      this.expandIcon.setAttribute("src", "../assets/svg/plus.svg");
      return this.onAnimationFinish(false);
    };
    this.animation.oncancel = () => {
      this.expandIcon.setAttribute("src", "../assets/svg/plus.svg");
      return (this.isClosing = false);
    };
  }

  open() {
    this.el.style.height = `${this.el.offsetHeight}px`;
    this.el.open = true;
    window.requestAnimationFrame(() => this.expand());
  }

  expand() {
    this.isExpanding = true;

    const startHeight = `${this.el.offsetHeight}px`;
    const endHeight = `${
      this.summary.offsetHeight + this.content.offsetHeight
    }px`;

    if (this.animation) {
      this.animation.cancel();
    }

    this.animation = this.el.animate(
      {
        height: [startHeight, endHeight],
      },
      {
        duration: 350,
        easing: "ease-out",
      }
    );

    this.animation.onfinish = () => {
      this.expandIcon.setAttribute("src", "../assets/svg/minus.svg");
      return this.onAnimationFinish(true);
    };
    this.animation.oncancel = () => {
      this.expandIcon.setAttribute("src", "../assets/svg/minus.svg");
      return (this.isExpanding = false);
    };
  }

  onAnimationFinish(open) {
    this.el.open = open;
    this.animation = null;
    this.isClosing = false;
    this.isExpanding = false;
    this.el.style.height = this.el.style.overflow = "";
  }
}

document.querySelectorAll("details").forEach((el) => {
  new Accordion(el);
});

/*PEDIDOS ADMIN CRUD O LO QUE SEA LO DE ARRIBA ES LA ANIMACION */

function mostrarPedidos() {
  //console.log('esta wea funciona');
  $.ajax({
    url: "http://localhost/delivery/controller/ZetaControllerMaster.php?actionPedidos=mostrarPedidos",
    type: "GET",
    success: function (response) {
      console.log(response);
      let pedidosAll = JSON.parse(response);
      let templatePedidos = "";

      pedidosAll.forEach((pedido) => {
        templatePedidos += `
          <details>
            <summary>
                <span class="faq-title">
                  <h3>${pedido.id_pedido}-|-${pedido.id_cliente}-|-${pedido.destino}-|-id personal encargado:${pedido.id_personal}</h3>
                </span>
                <img src="../assets/svg/plus.svg" class="expand-icon" alt="Plus">
            </summary>
            <div class="faq-content">
                <div class="table-personal">
                  <table>
                    <thead>
                      <tr>
                        <th>id_producto</th>
                        <th>cantidad</th>
                        <th>unidad medida</th>
                        <th>precio</th>
                        <th>subtotal</th>
                      </tr>
                    </thead>
                    <tbody class="mostrarDetalles${pedido.id_pedido}">
                      
                    </tbody>
                  </table>
                </div>
              </div>
          </details>
          `;
        $.ajax({
          url: "http://localhost/delivery/controller/ZetaControllerMaster.php?actionPedidos=mostrarDetalles",
          data: { id: pedido.id_pedido },
          type: "POST",
          success: function (response) {
            console.log(response, "otro->");
            let detallesAll = JSON.parse(response);
            let templateDetalles = "";
            detallesAll.forEach((detalle) => {
              templateDetalles += `
                <tr>
                  <td>${detalle.id_pedido}---${detalle.id_producto}</td>
                  <td>${detalle.cantidad}</td>
                  <td>${detalle.unidad}</td>
                  <td>${detalle.precio}</td>
                  <td>${detalle.subtotal}</td>
                </tr>
                `;
            });
            $(`.mostrarDetalles${pedido.id_pedido}`).html(templateDetalles);
          }
        });
      });

      $(".faq-container").html(templatePedidos);
    },
  });
}

mostrarPedidos();
