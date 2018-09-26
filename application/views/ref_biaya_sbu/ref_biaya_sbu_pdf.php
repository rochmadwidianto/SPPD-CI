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
        <h2>Ref_biaya_sbu List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>BiayaSbuKode</th>
		<th>BiayaSbuNama</th>
		
            </tr><?php
            foreach ($biayasbu_data as $biayasbu)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $biayasbu->biayaSbuKode ?></td>
		      <td><?php echo $biayasbu->biayaSbuNama ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>