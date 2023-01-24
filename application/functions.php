<?php 
session_start();
    $conn = mysqli_connect("localhost", "root", "", "database_polairud");
    $alat = query('SELECT * FROM dt_alat');

    function query($query) {
        global $conn;
        $result = mysqli_query($conn, $query);    
        $rows = [];
        while( $row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    function tambah($data){
        global $conn;
        global $alat;
        $nmkp = htmlspecialchars($data["nama_kapal"]);
        $nlkp = htmlspecialchars($data["no_lambung_kapal"]);
        $klas = htmlspecialchars($data["klas_kapal"]);
        $thn = htmlspecialchars($data["thn_kp"]);
        $jais = htmlspecialchars($data['jumlah_ais']);
        $kais = htmlspecialchars($data['kondisi_ais']);
        $mais = htmlspecialchars($data['merk_ais']);
        $keais = htmlspecialchars($data['ket_ais']);
        $jap = htmlspecialchars($data['jumlah_autopilot']);
        $kap = htmlspecialchars($data['kondisi_autopilot']);
        $map = htmlspecialchars($data['merk_autopilot']);
        $kemap = htmlspecialchars($data['ket_autopilot']);
        $jcc = htmlspecialchars($data['jumlah_cctv']);
        $kcc = htmlspecialchars($data['kondisi_cctv']);
        $mcc = htmlspecialchars($data['merk_cctv']);
        $kecc = htmlspecialchars($data['ket_cctv']);
        $jcl = htmlspecialchars($data['jumlah_clinometer']);
        $kcl = htmlspecialchars($data['kondisi_clinometer']);
        $mcl = htmlspecialchars($data['merk_clinometer']);
        $kecl = htmlspecialchars($data['ket_clinometer']);
        $jec = htmlspecialchars($data['jumlah_ecdis']);
        $kec = htmlspecialchars($data['kondisi_ecdis']);
        $mec = htmlspecialchars($data['merk_ecdis']);
        $keec = htmlspecialchars($data['ket_ecdis']);
        $jes = htmlspecialchars($data['jumlah_echosounder']);
        $kes = htmlspecialchars($data['kondisi_echosounder']);
        $mesmtp = htmlspecialchars($data['merk_echosounder']);
        $kees = htmlspecialchars($data['ket_echosounder']);
        $jgc = htmlspecialchars($data['jumlah_gyrocompass']);
        $kgc = htmlspecialchars($data['kondisi_gyrocompass']);
        $mgc = htmlspecialchars($data['merk_gyrocompass']);
        $kegp = htmlspecialchars($data['ket_gps']);
        $jgp = htmlspecialchars($data['jumlah_gps']);
        $kgp = htmlspecialchars($data['kondisi_gps']);
        $mgp = htmlspecialchars($data['merk_gps']);
        $kegc = htmlspecialchars($data['ket_gyrocompass']);
        $jht = htmlspecialchars($data['jumlah_ht']);
        $kht = htmlspecialchars($data['kondisi_ht']);
        $mht = htmlspecialchars($data['merk_ht']);
        $keht = htmlspecialchars($data['ket_ht']);
        $jks = htmlspecialchars($data['jumlah_komunikasisatellite']);
        $kks = htmlspecialchars($data['kondisi_komunikasisatellite']);
        $mks = htmlspecialchars($data['merk_komunikasisatellite']);
        $keks = htmlspecialchars($data['ket_komunikasisatellite']);
        $jmc = htmlspecialchars($data['jumlah_magneticcompass']);
        $kmc = htmlspecialchars($data['kondisi_magneticcompass']);
        $mmc = htmlspecialchars($data['merk_magneticcompass']);
        $kemc = htmlspecialchars($data['ket_magneticcompass']);
        $jmr = htmlspecialchars($data['jumlah_morse']);
        $kmr = htmlspecialchars($data['kondisi_morse']);
        $mmr = htmlspecialchars($data['merk_morse']);
        $kemr = htmlspecialchars($data['ket_morse']);
        $jnt = htmlspecialchars($data['jumlah_navtex']);
        $knt = htmlspecialchars($data['kondisi_navtex']);
        $mnt = htmlspecialchars($data['merk_navtex']);
        $kent = htmlspecialchars($data['ket_navtex']);
        $jpa = htmlspecialchars($data['jumlah_publicaddressor']);
        $kpa = htmlspecialchars($data['kondisi_publicaddressor']);
        $mpa = htmlspecialchars($data['merk_publicaddressor']);
        $kepa = htmlspecialchars($data['ket_publicaddressor']);
        $jr = htmlspecialchars($data['jumlah_radar']);
        $kr = htmlspecialchars($data['kondisi_radar']);
        $mr = htmlspecialchars($data['merk_radar']);
        $ker = htmlspecialchars($data['ket_radar']);
        $jrg = htmlspecialchars($data['jumlah_rvhfgroundtoair']);
        $krg = htmlspecialchars($data['kondisi_rvhfgroundtoair']);
        $mrg = htmlspecialchars($data['merk_rvhfgroundtoair']);
        $kerh = htmlspecialchars($data['ket_rhf']);
        $jrh = htmlspecialchars($data['jumlah_rhf']);
        $krh = htmlspecialchars($data['kondisi_rhf']);
        $mrh = htmlspecialchars($data['merk_rhf']);
        $kerg = htmlspecialchars($data['ket_rvhfgroundtoair']);
        $jrm = htmlspecialchars($data['jumlah_rvhfmarine']);
        $krm = htmlspecialchars($data['kondisi_rvhfmarine']);
        $mrm = htmlspecialchars($data['merk_rvhfmarine']);
        $kerm = htmlspecialchars($data['ket_rvhfmarine']);
        $jsl = htmlspecialchars($data['jumlah_speedlog']);
        $ksl = htmlspecialchars($data['kondisi_speedlog']);
        $msl = htmlspecialchars($data['merk_speedlog']);
        $kesl = htmlspecialchars($data['ket_speedlog']);
        $jti = htmlspecialchars($data['jumlah_telephoneinternal']);
        $kti = htmlspecialchars($data['kondisi_telephoneinternal']);
        $mti = htmlspecialchars($data['merk_telephoneinternal']);
        $keti = htmlspecialchars($data['ket_telephoneinternal']);
        $jtp = htmlspecialchars($data['jumlah_teropong']);
        $ktp = htmlspecialchars($data['kondisi_teropong']);
        $mtp = htmlspecialchars($data['merk_teropong']);
        $ketp = htmlspecialchars($data['ket_teropong']);
        $jws = htmlspecialchars($data['jumlah_windspeed']);
        $kws = htmlspecialchars($data['kondisi_windspeed']);
        $mws = htmlspecialchars($data['merk_windspeed']);
        $kews = htmlspecialchars($data['ket_windspeed']);

        // foreach ($alat as $row ){
        //     ${$row['alat_abbrev_jml']} = htmlspecialchars($data['"jumlah_'.$row['alat_id'].'"']);
        //     ${$row['alat_abbrev_knd']} = htmlspecialchars($data['"kondisi_'.$row['alat_id'].'"']);
        //     ${$row['alat_abbrev_merk']} = htmlspecialchars($data['"merk_'.$row['alat_id'].'"']);#
        // };
        
        
        $query = "INSERT INTO db_kp
                    VALUES
                ('', '$nmkp', '$nlkp', '$klas', '$thn', ";
        foreach ($alat as $row){
            $query .= " '". ${$row['alat_abbrev_jml']} ."', '". ${$row['alat_abbrev_knd']} ."', '". ${$row['alat_abbrev_merk']} ."', '".${$row['alat_abbrev_ket']}."', ";
        };
        $query = rtrim($query, ", ");
        $query .= ")";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }


    function hapus($id){
        global $conn;
        mysqli_query($conn, "DELETE FROM db_kp WHERE id = $id");

        return mysqli_affected_rows($conn);

    }
        
    function ubah($data){
        global $conn;
        global $alat;
        $id = $data["id"];
        $nmkp = htmlspecialchars($data["nama_kapal"]);
        $nlkp = htmlspecialchars($data["no_lambung_kapal"]);
        $klas = htmlspecialchars($data["klas_kapal"]);
        $thn = htmlspecialchars($data["thn_kp"]);
        $jais = htmlspecialchars($data['jumlah_ais']);
        $kais = htmlspecialchars($data['kondisi_ais']);
        $mais = htmlspecialchars($data['merk_ais']);
        $keais = htmlspecialchars($data['ket_ais']);
        $jap = htmlspecialchars($data['jumlah_autopilot']);
        $kap = htmlspecialchars($data['kondisi_autopilot']);
        $map = htmlspecialchars($data['merk_autopilot']);
        $kemap = htmlspecialchars($data['ket_autopilot']);
        $jcc = htmlspecialchars($data['jumlah_cctv']);
        $kcc = htmlspecialchars($data['kondisi_cctv']);
        $mcc = htmlspecialchars($data['merk_cctv']);
        $kecc = htmlspecialchars($data['ket_cctv']);
        $jcl = htmlspecialchars($data['jumlah_clinometer']);
        $kcl = htmlspecialchars($data['kondisi_clinometer']);
        $mcl = htmlspecialchars($data['merk_clinometer']);
        $kecl = htmlspecialchars($data['ket_clinometer']);
        $jec = htmlspecialchars($data['jumlah_ecdis']);
        $kec = htmlspecialchars($data['kondisi_ecdis']);
        $mec = htmlspecialchars($data['merk_ecdis']);
        $keec = htmlspecialchars($data['ket_ecdis']);
        $jes = htmlspecialchars($data['jumlah_echosounder']);
        $kes = htmlspecialchars($data['kondisi_echosounder']);
        $mesmtp = htmlspecialchars($data['merk_echosounder']);
        $kees = htmlspecialchars($data['ket_echosounder']);
        $jgc = htmlspecialchars($data['jumlah_gyrocompass']);
        $kgc = htmlspecialchars($data['kondisi_gyrocompass']);
        $mgc = htmlspecialchars($data['merk_gyrocompass']);
        $kegp = htmlspecialchars($data['ket_gps']);
        $jgp = htmlspecialchars($data['jumlah_gps']);
        $kgp = htmlspecialchars($data['kondisi_gps']);
        $mgp = htmlspecialchars($data['merk_gps']);
        $kegc = htmlspecialchars($data['ket_gyrocompass']);
        $jht = htmlspecialchars($data['jumlah_ht']);
        $kht = htmlspecialchars($data['kondisi_ht']);
        $mht = htmlspecialchars($data['merk_ht']);
        $keht = htmlspecialchars($data['ket_ht']);
        $jks = htmlspecialchars($data['jumlah_komunikasisatellite']);
        $kks = htmlspecialchars($data['kondisi_komunikasisatellite']);
        $mks = htmlspecialchars($data['merk_komunikasisatellite']);
        $keks = htmlspecialchars($data['ket_komunikasisatellite']);
        $jmc = htmlspecialchars($data['jumlah_magneticcompass']);
        $kmc = htmlspecialchars($data['kondisi_magneticcompass']);
        $mmc = htmlspecialchars($data['merk_magneticcompass']);
        $kemc = htmlspecialchars($data['ket_magneticcompass']);
        $jmr = htmlspecialchars($data['jumlah_morse']);
        $kmr = htmlspecialchars($data['kondisi_morse']);
        $mmr = htmlspecialchars($data['merk_morse']);
        $kemr = htmlspecialchars($data['ket_morse']);
        $jnt = htmlspecialchars($data['jumlah_navtex']);
        $knt = htmlspecialchars($data['kondisi_navtex']);
        $mnt = htmlspecialchars($data['merk_navtex']);
        $kent = htmlspecialchars($data['ket_navtex']);
        $jpa = htmlspecialchars($data['jumlah_publicaddressor']);
        $kpa = htmlspecialchars($data['kondisi_publicaddressor']);
        $mpa = htmlspecialchars($data['merk_publicaddressor']);
        $kepa = htmlspecialchars($data['ket_publicaddressor']);
        $jr = htmlspecialchars($data['jumlah_radar']);
        $kr = htmlspecialchars($data['kondisi_radar']);
        $mr = htmlspecialchars($data['merk_radar']);
        $ker = htmlspecialchars($data['ket_radar']);
        $jrg = htmlspecialchars($data['jumlah_rvhfgroundtoair']);
        $krg = htmlspecialchars($data['kondisi_rvhfgroundtoair']);
        $mrg = htmlspecialchars($data['merk_rvhfgroundtoair']);
        $kerh = htmlspecialchars($data['ket_rhf']);
        $jrh = htmlspecialchars($data['jumlah_rhf']);
        $krh = htmlspecialchars($data['kondisi_rhf']);
        $mrh = htmlspecialchars($data['merk_rhf']);
        $kerg = htmlspecialchars($data['ket_rvhfgroundtoair']);
        $jrm = htmlspecialchars($data['jumlah_rvhfmarine']);
        $krm = htmlspecialchars($data['kondisi_rvhfmarine']);
        $mrm = htmlspecialchars($data['merk_rvhfmarine']);
        $kerm = htmlspecialchars($data['ket_rvhfmarine']);
        $jsl = htmlspecialchars($data['jumlah_speedlog']);
        $ksl = htmlspecialchars($data['kondisi_speedlog']);
        $msl = htmlspecialchars($data['merk_speedlog']);
        $kesl = htmlspecialchars($data['ket_speedlog']);
        $jti = htmlspecialchars($data['jumlah_telephoneinternal']);
        $kti = htmlspecialchars($data['kondisi_telephoneinternal']);
        $mti = htmlspecialchars($data['merk_telephoneinternal']);
        $keti = htmlspecialchars($data['ket_telephoneinternal']);
        $jtp = htmlspecialchars($data['jumlah_teropong']);
        $ktp = htmlspecialchars($data['kondisi_teropong']);
        $mtp = htmlspecialchars($data['merk_teropong']);
        $ketp = htmlspecialchars($data['ket_teropong']);
        $jws = htmlspecialchars($data['jumlah_windspeed']);
        $kws = htmlspecialchars($data['kondisi_windspeed']);
        $mws = htmlspecialchars($data['merk_windspeed']);
        $kews = htmlspecialchars($data['ket_windspeed']);
        
        $query = "UPDATE db_kp SET
                    nama_kapal ='$nmkp',
                    no_lambung_kapal ='$nlkp',
                    klas_kapal = '$klas',
                    thn_kp = '$thn', ";

        foreach ($alat as $row){
            $query .= "jumlah_". $row['alat_id']." = '". ${$row['alat_abbrev_jml']} ."', kondisi_". $row['alat_id'] ." = '".${$row['alat_abbrev_knd']}."', merk_".$row['alat_id']."= '".${$row['alat_abbrev_merk']}."', ket_".$row['alat_id']."= '". ${$row['alat_abbrev_ket']}.",";
        };

        $query = rtrim($query, ", "); 

        
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }
    function filter($keyword) {
        $query = "SELECT * FROM db_kp
                    WHERE $keyword > 0
                    ORDER BY $keyword DESC;
                    ";
        echo "<style>thead > tr th:not( #no, #nm_kp, #nlk, #klas, #thn, #".$keyword.",#edit), tbody > tr td:not(#no, #nm_kp, #nlk, #klas, #thn, #".$keyword.", #edit){display: none;};</style>";
        return query($query);
    };
    function cari($keywords){
        global $conn;
        $query =  "SELECT * FROM db_kp 
                    WHERE 
                    nama_kapal LIKE '%$keywords%'OR
                    no_lambung_kapal LIKE '%$keywords%' 
                    ";
            return query($query);
    }


?>