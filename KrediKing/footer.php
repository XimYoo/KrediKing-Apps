<footer class="main-footer">
    <strong>Copyright &copy; 2024-2045 <a href="https://KrediKing.io">KrediKing.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0.0
    </div>
</footer>

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<!-- DataTables & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": [
                {
                    extend: 'copy',
                    exportOptions: {
                        columns: ':not(:last-child)'
                    }
                },
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: ':not(:last-child)'
                    }
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: ':not(:last-child)'
                    }
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: ':not(:last-child)'
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: ':not(:last-child)'
                    }
                },
                'colvis'
            ]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('sidebar-search-input');
        const menuItems = document.querySelectorAll('#sidebar-menu .nav-item');

        searchInput.addEventListener('input', function() {
            const query = searchInput.value.toLowerCase();

            menuItems.forEach(item => {
                const linkText = item.querySelector('.nav-link p').textContent.toLowerCase();
                if (linkText.includes(query)) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var currentURL = window.location.href;

        // Object to store page titles and breadcrumbs
        var pageInfo = {
            'page=data-Credit-Card': {
                title: 'Credit Cards',
                breadcrumb: '<li class="breadcrumb-item"><a href="#">Home</a></li><li class="breadcrumb-item active">Credit Cards</li>'
            },
            'page=data-monthly-bill': {
                title: 'Monthly Bills',
                breadcrumb: '<li class="breadcrumb-item"><a href="#">Home</a></li><li class="breadcrumb-item active">Monthly Bills</li>'
            },
            'page=data-transaction': {
                title: 'Transactions',
                breadcrumb: '<li class="breadcrumb-item"><a href="#">Home</a></li><li class="breadcrumb-item active">Transactions</li>'
            },
            'page=data-statistics': {
                title: 'Statistics',
                breadcrumb: '<li class="breadcrumb-item"><a href="#">Home</a></li><li class="breadcrumb-item active">Statistics</li>'
            }
        };

        // Function to update page title and breadcrumb
        function updatePageInfo() {
            for (var key in pageInfo) {
                if (currentURL.indexOf(key) !== -1) {
                    var pageTitle = document.getElementById('pageTitle');
                    if (pageTitle) {
                        pageTitle.innerText = pageInfo[key].title;
                    }

                    var breadcrumbItem = document.getElementById('breadcrumbItem');
                    if (breadcrumbItem) {
                        breadcrumbItem.innerHTML = pageInfo[key].breadcrumb;
                    }

                    // Change tab title
                    document.title = 'KrediKing | ' + pageInfo[key].title;
                    break;
                }
            }
        }

        // Call function to update page info
        updatePageInfo();
    });
</script>
