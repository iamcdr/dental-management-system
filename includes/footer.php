<footer class="app-footer">
    <div class="row">
        <div class="col-xs-12">
            <div class="footer-copyright">
                Copyright © 2016 A.D. Ramoneda Dental Clinic Dental Management System
            </div>
        </div>
    </div>
</footer>
</div>

</div>
<script src="./assets/jQuery/jquery-3.1.1.min.js"></script>
<script src="./assets/datatables/jquery.dataTables.min.js"></script>
<script src="./assets/datatables/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="./assets/js/vendor.js"></script>
<script type="text/javascript" src="./assets/js/app.js"></script>

<script>
    $(document).ready(function() {
        $('#content').DataTable();
    });

    window.setTimeout(function() {
        $(".alert").not("#payrollAlert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 10000);

</script>
<?php
//unset session for alerts
$_SESSION['POST'] = [];
$_SESSION['POST'] = null;
$_SESSION['ALERTS'] = [];
$_SESSION['ALERTS'] = null;
?>
