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
        <h2>Ref_mak List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>MakKode</th>
		<th>MakNama</th>
		<th>MakBiayaSbuId</th>
		
            </tr><?php
            foreach ($mak_data as $mak)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $mak->makKode ?></td>
		      <td><?php echo $mak->makNama ?></td>
		      <td><?php echo $mak->makBiayaSbuId ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>