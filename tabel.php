<!DOCTYPE html>

<?php
include 'functions.php';

?>

<?=template_header('Home')?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <div class="content">
    <center><h2>Daftar Mahasiswa</h2></center>
    <center><h4></h4></center>
    <center> <style>
        table {
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th rowspan="2">Nama</th>
        </tr>
        <tr>
            <th>NIM</th>
            <th>Program Studi</th>
            <th>Email</th>
            <th>Password</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
        </tr>
        <tr>
            <td>Kim Namjoon</td>
            <td>1234</td>
            <td>IT</td>
            <td>namu@gmail.com</td>
            <td>8112</td>
            <td>laki-laki</td>
            <td>1/10/1999</td>
            <td>Jogjakarta</td>
        </tr>
        <tr>
            <td>Kim Seokjin</td>
            <td>1245</td>
            <td>IT</td>
            <td>jin@gmail.com</td>
            <td>cimiw12</td>
            <td>laki-laki</td>
            <td>2/05/1997</td>
            <td>Bali</td>
        </tr>
        <tr>
            <td>Min Yonggi</td>
            <td>1256</td>
            <td>IT</td>
            <td>yoggi@gmail.com</td>
            <td>81005</td>
            <td>laki-laki</td>
            <td>6/12/2000</td>
            <td>Jogjakarta</td>
        </tr>
        <tr>
            <td>Jung hoseok</td>
            <td>1290</td>
            <td>IT</td>
            <td>hoseok@gmail.com</td>
            <td>00000</td>
            <td>laki-laki</td>
            <td>7/5/1999</td>
            <td>Jogjakarta</td>
        </tr>
        <tr>
            <td>Park Jimin</td>
            <td>1266</td>
            <td>IT</td>
            <td>nchimm@gmail.com</td>
            <td>76689</td>
            <td>laki-laki</td>
            <td>10/10/1995</td>
            <td>Sumatera Utara</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
</center>
</body>
</html>

<?=template_footer()?>
