<?php 
require_once '../vendor/autoload.php';
require 'functions.php';

$id = $_GET['id'];
$alat = query("SELECT * FROM dt_alat WHERE id = $id ")[0];   
$alat_com = query("SELECT * FROM dt_alat WHERE tipe_alat = 2");
$alt = "jumlah_".$alat['alat_id'];
$kpl = query("SELECT * FROM db_kp WHERE $alt > 0 ORDER BY klas_kapal");
$alat_baik = query("SELECT * FROM db_kp WHERE kondisi_".$alat['alat_id']."= 'Baik'");
$alat_rr = query("SELECT * FROM db_kp WHERE kondisi_".$alat['alat_id']."= 'Rusak Ringan'");
$alat_rb = query("SELECT * FROM db_kp WHERE kondisi_".$alat['alat_id']."= 'Rusak Berat'");
$id1 = -1;

$mpdf = new \Mpdf\Mpdf([
    'debug' => true,
    'mode' => 'utf-8',
    'format' => 'A4',
    'orientation' => 'P',
    'allow_html_optional_endtags' => true
    
    
    ]);


$html = '

<style>
    *{
        margin :0;
        padding :0;
        box-sizing: border-box;
    }
    body{
        margin:0;
        padding:0;
    }
    table {
        border-collapse: collapse;
    }
    table.data th {
        border: 1px solid black;
    }
    table.data td {
        border: 1px solid black;
    }
    .jumlah{
        margin-top: 10%;
    }

    </style>
    <div class="kop" style="width: 35%; border-bottom: solid 1px black;text-align: center">
        <p style="font-size: 12px;line-height: 1; ">
            BADAN PEMELIHARA KEAMANAN POLRI
            <br>
            KORPS PERAIRAN & UDARA
            <br>
            BAGOPSNAL & TIK
        </p>
    </div>
    <div class="judul">
        <p style="font-size: 15px;line-height: 1; text-align: center;">
            DAFTAR ' . strtoupper($alat['nama_alat']) .' KAPAL POLISI
        </p>
    </div>';
    
    foreach ($kpl as $row){
        if ($id1 != -1 && $id1 != $row['klas_kapal']){
            $html.='
                    </tbody>
                </table>
                ';
        }
        if ($id1 != $row['klas_kapal']){
            $x = 1;
            $html .= '
                <table style="width: 100%;" class="data" cellpadding="8">
                    <caption style="text-align: left; font-size: 14px;margin-top: 20px;">KLAS '.$row['klas_kapal'].'</caption>
                    <thead>
                        <tr>
                            <th><span style="font-size: 11px;">NO</span></th>
                            <th><span style="font-size: 11px;">NAMA KAPAL</span></th>
                            <th><span style="font-size: 11px;">MERK</span></th>
                            <th><span style="font-size: 11px;">KONDISI</span></th>
                            <th><span style="font-size: 11px;">KETERANGAN</span></th>
                        </tr>
                    </thead>
                    <tbody>

        ';
        $id1 = $row['klas_kapal'];
        
        } 
        $html .= '

                        <tr>
                            <td style="width: 5%;"><span style="font-size: 11px;">'.$x.'</span></td>
                            <td style="width: 20%;"><span style="font-size: 11px;">'.$row['nama_kapal'].'</span></td>
                            <td style="width: 20%;"><span style="font-size: 11px;">'.$row['merk_'.$alat['alat_id']].'</span></td>
                            <td style="width: 20%;"><span style="font-size: 11px;">'.$row['kondisi_'.$alat['alat_id']].'</span></td>
                            <td style="width: 35%;"><span style="font-size: 11px;">'.$row['ket_'.$alat['alat_id']].'</span></td>
                        </tr>
                        
                        
                    ';
    $x++;
        
    }
    $html.='
                    </tbody>
                </table>
                ';
    
    

    

    $html .= '
    <div class="jumlah">
        <table>
            <tbody>
                <tr>
                    <td><span style="font-size: 11px;">JUMLAH</span></td>
                    <td><span style="font-size: 11px;">: '. count($kpl) .'</span></td>
                </tr>
                <tr>
                    <td><span style="font-size: 11px;">KONDISI BAIK</span></td>
                    <td><span style="font-size: 11px;">: '. count($alat_baik) .'</span></td>
                </tr>
                <tr>
                    <td><span style="font-size: 11px;">KONDISI RUSAK RINGAN</span></td>
                    <td><span style="font-size: 11px;">: '. count($alat_rr) .'</span></td>
                </tr>
                <tr>
                    <td><span style="font-size: 11px;">KONDISI RUSAK BERAT</span></td>
                    <td><span style="font-size: 11px;">: '. count($alat_rb) .'</span></td>
                </tr>
            </tbody>
        </table>
    </div>
';


$mpdf -> use_kwt = true;
$mpdf->WriteHTML($html);
$mpdf->Output('Daftar '.$alat['nama_alat'].' Kapal Polisi.pdf','I');