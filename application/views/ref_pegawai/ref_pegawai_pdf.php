<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Ref_pegawai List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>PegawaiNip</th>
		<th>PegawaiNama</th>
		<th>PegawaiPangkat</th>
		<th>PegawaiJabatan</th>
		<th>PegawaiGolonganId</th>
		
            </tr><?php
            foreach ($pegawai_data as $pegawai)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $pegawai->pegawaiNip ?></td>
		      <td><?php echo $pegawai->pegawaiNama ?></td>
		      <td><?php echo $pegawai->pegawaiPangkat ?></td>
		      <td><?php echo $pegawai->pegawaiJabatan ?></td>
		      <td><?php echo $pegawai->pegawaiGolonganId ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>