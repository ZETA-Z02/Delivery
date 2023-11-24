$.ajax({
  url: "http://localhost/delivery/controller/ZetaControllerMaster.php?actionDashboard=mostrarGraficos",
  type: "GET",
  success: function (response) {
    console.log(response);
    let grafico = JSON.parse(response);
    let nombres = grafico[0].nombres;
    let stock = grafico[0].stock;
    console.log(nombres, "-", stock);

    const ctx = document.getElementById("myChart");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: nombres,
        datasets: [
          {
            label: "productos stock",
            data: stock,
            borderWidth: 1,
          },
        ],
      },
      options: {
        scales: {
          y: {
            beginAtZero: true,
          },
        },
      },
    });
  },
});
