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
        <h2>Ref_tahun_anggaran List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>ThAnggaranNama</th>
		<th>ThAnggaranIsAktif</th>
		<th>ThAnggaranIsOpen</th>
		<th>ThAnggaranBuka</th>
		<th>ThAnggaranTutup</th>
		
            </tr><?php
            foreach ($tahunanggaran_data as $tahunanggaran)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $tahunanggaran->thAnggaranNama ?></td>
		      <td><?php echo $tahunanggaran->thAnggaranIsAktif ?></td>
		      <td><?php echo $tahunanggaran->thAnggaranIsOpen ?></td>
		      <td><?php echo $tahunanggaran->thAnggaranBuka ?></td>
		      <td><?php echo $tahunanggaran->thAnggaranTutup ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>