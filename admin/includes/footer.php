  </div>
  <!-- container end -->

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>


  <script src="/gallery/admin/js/script.js"></script>

  <script>
    google.charts.load('current', {
      'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Views', <?= $session->count ?>],
        ['Photos', <?= Photo::count_all() ?>],
        ['Comments', <?= Comment::count_all() ?>],
        ['Users', <?= User::count_all() ?>],
      ]);

      var options = {
        legend: 'none',
        pieSliceText: 'label',
        backgroundColor: 'transparent',
        title: ''
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart'));

      chart.draw(data, options);
    }
  </script>
  </body>

  </html>