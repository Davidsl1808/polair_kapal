<?php 
    require 'functions.php';

    $id = $_GET["id"];
    $ida = $_GET["alat_id"];


    if( hapus($id) > 0 ) {
        echo "
            <script>
                alert('data berhasil dihapus');
                document.location.href = '../views/tables.php?id=$ida'
            </script>
            ";
    }


?>