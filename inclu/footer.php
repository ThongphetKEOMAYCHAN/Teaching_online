  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script>
       $(document).ready(function() {
            $('#table').DataTable();
       });
       var el = document.getElementById("wrapper");
       var toggleButton = document.getElementById("menu-toggle");

       toggleButton.onclick = function() {
            el.classList.toggle("toggled");
       };
  </script>
  </body>

  </html>