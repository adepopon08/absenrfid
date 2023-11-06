<?php
include "_header.php";

include  "_top_menu.php";
include "_side_menu.php";
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div id="cekkartu"></div>
        </div><!-- /.container-fluid -->
    </section>


</div>

<?php
include "_footer.php";
?>

<script type="text/javascript">
    $(document).ready(function() {
        setInterval(function() {
            $("#cekkartu").load('cekkartu.php');
        }, 2000);
    });
</script>