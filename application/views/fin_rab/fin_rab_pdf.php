<!doctype html>
<html>
    <head>
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
        <h2>Rencana Anggaran Belanja (RAB)</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
        		<th>Tahun Anggaran</th>
        		<th>Kode</th>
        		<th>Nama</th>
        		<th>Keterangan</th>
        		<th>Nominal</th>
		
            </tr><?php
            foreach ($rab_data as $rab)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $rab->rabTahunAnggaran ?></td>
		      <td><?php echo $rab->rabKode ?></td>
		      <td><?php echo $rab->rabNama ?></td>
		      <td><?php echo $rab->rabKeterangan ?></td>
		      <td><?php echo $rab->rabNominalTotal ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>