$(function () {
  let visits = {
    totals: [],
    dates: [],
  };

  var oReq = new XMLHttpRequest();
  oReq.onload = function () {
    let json = JSON.parse(this.responseText);
    json.forEach((element) => {
      visits["totals"].push(parseInt(element.total_views));
      visits["dates"].push(moment(element.date).format("MMMM"));
      charts.initChartsPages();
    });
  };

  console.log(visits);
  oReq.open("get", "/gallery/admin/includes/get-data.php", true);
  oReq.send();

  charts = {
    initPickColor: function () {
      $(".pick-class-label").click(function () {
        var new_class = $(this).attr("new-class");
        var old_class = $("#display-buttons").attr("data-class");
        var display_div = $("#display-buttons");
        if (display_div.length) {
          var display_buttons = display_div.find(".btn");
          display_buttons.removeClass(old_class);
          display_buttons.addClass(new_class);
          display_div.attr("data-class", new_class);
        }
      });
    },

    initDocChart: function () {
      chartColor = "#FFFFFF";

      ctx = document.getElementById("chartHours").getContext("2d");

      myChart = new Chart(ctx, {
        type: "line",

        data: {
          labels: [
            "Jan",
            "Feb",
            "Mar",
            "Apr",
            "May",
            "Jun",
            "Jul",
            "Aug",
            "Sep",
            "Oct",
          ],
          datasets: [
            {
              borderColor: "#6bd098",
              backgroundColor: "#6bd098",
              pointRadius: 0,
              pointHoverRadius: 0,
              borderWidth: 3,
              data: [300, 310, 316, 322, 330, 326, 333, 345, 338, 354],
            },
            {
              borderColor: "#f17e5d",
              backgroundColor: "#f17e5d",
              pointRadius: 0,
              pointHoverRadius: 0,
              borderWidth: 3,
              data: [320, 340, 365, 360, 370, 385, 390, 384, 408, 420],
            },
            {
              borderColor: "#fcc468",
              backgroundColor: "#fcc468",
              pointRadius: 0,
              pointHoverRadius: 0,
              borderWidth: 3,
              data: [370, 394, 415, 409, 425, 445, 460, 450, 478, 484],
            },
          ],
        },
        options: {
          legend: {
            display: false,
          },

          tooltips: {
            enabled: false,
          },

          scales: {
            yAxes: [
              {
                ticks: {
                  fontColor: "#9f9f9f",
                  beginAtZero: false,
                  maxTicksLimit: 5,
                  //padding: 20
                },
                gridLines: {
                  drawBorder: false,
                  zeroLineColor: "#ccc",
                  color: "rgba(255,255,255,0.05)",
                },
              },
            ],

            xAxes: [
              {
                barPercentage: 1.6,
                gridLines: {
                  drawBorder: false,
                  color: "rgba(255,255,255,0.1)",
                  zeroLineColor: "transparent",
                  display: false,
                },
                ticks: {
                  padding: 20,
                  fontColor: "#9f9f9f",
                },
              },
            ],
          },
        },
      });
    },

    initChartsPages: function () {
      chartColor = "#FFFFFF";

      ctx = document.getElementById("chartHours").getContext("2d");

      myChart = new Chart(ctx, {
        type: "line",

        data: {
          labels: [
            "Jan",
            "Feb",
            "Mar",
            "Apr",
            "May",
            "Jun",
            "Jul",
            "Aug",
            "Sep",
            "Oct",
          ],
          datasets: [
            {
              borderColor: "#6bd098",
              backgroundColor: "#6bd098",
              pointRadius: 0,
              pointHoverRadius: 0,
              borderWidth: 3,
              data: [300, 310, 316, 322, 330, 326, 333, 345, 338, 354],
            },
            {
              borderColor: "#f17e5d",
              backgroundColor: "#f17e5d",
              pointRadius: 0,
              pointHoverRadius: 0,
              borderWidth: 3,
              data: [320, 340, 365, 360, 370, 385, 390, 384, 408, 420],
            },
            {
              borderColor: "#fcc468",
              backgroundColor: "#fcc468",
              pointRadius: 0,
              pointHoverRadius: 0,
              borderWidth: 3,
              data: [370, 394, 415, 409, 425, 445, 460, 450, 478, 484],
            },
          ],
        },
        options: {
          legend: {
            display: false,
          },

          tooltips: {
            enabled: false,
          },

          scales: {
            yAxes: [
              {
                ticks: {
                  fontColor: "#9f9f9f",
                  beginAtZero: false,
                  maxTicksLimit: 5,
                  //padding: 20
                },
                gridLines: {
                  drawBorder: false,
                  zeroLineColor: "#ccc",
                  color: "rgba(255,255,255,0.05)",
                },
              },
            ],

            xAxes: [
              {
                barPercentage: 1.6,
                gridLines: {
                  drawBorder: false,
                  color: "rgba(255,255,255,0.1)",
                  zeroLineColor: "transparent",
                  display: false,
                },
                ticks: {
                  padding: 20,
                  fontColor: "#9f9f9f",
                },
              },
            ],
          },
        },
      });

      ctx = document.getElementById("chartEmail").getContext("2d");

      myChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: [1, 2, 3],
          datasets: [
            {
              label: "Emails",
              pointRadius: 0,
              pointHoverRadius: 0,
              backgroundColor: ["#e3e3e3", "#4acccd", "#fcc468", "#ef8157"],
              borderWidth: 0,
              data: [342, 480, 530, 120],
            },
          ],
        },

        options: {
          legend: {
            display: false,
          },

          pieceLabel: {
            render: "percentage",
            fontColor: ["white"],
            precision: 2,
          },

          tooltips: {
            enabled: false,
          },

          scales: {
            yAxes: [
              {
                ticks: {
                  display: false,
                },
                gridLines: {
                  drawBorder: false,
                  zeroLineColor: "transparent",
                  color: "rgba(255,255,255,0.05)",
                },
              },
            ],

            xAxes: [
              {
                barPercentage: 1.6,
                gridLines: {
                  drawBorder: false,
                  color: "rgba(255,255,255,0.1)",
                  zeroLineColor: "transparent",
                },
                ticks: {
                  display: false,
                },
              },
            ],
          },
        },
      });

      var speedCanvas = document.getElementById("speedChart");

      var dataFirst = {
        data : visits.totals,
        fill: false,
        borderColor: "#fbc658",
        backgroundColor: "transparent",
        pointBorderColor: "#fbc658",
        pointRadius: 4,
        pointHoverRadius: 4,
        pointBorderWidth: 8,
      };
      console.log(dataFirst);

      var speedData = {
        labels: visits.dates,
        datasets: [dataFirst],
      };
      console.log(speedData);

      var chartOptions = {
        legend: {
          display: false,
          position: "top",
        },
      };

      var lineChart = new Chart(speedCanvas, {
        type: "line",
        hover: false,
        data: speedData,
        options: chartOptions,
      });
    },
  };
});
