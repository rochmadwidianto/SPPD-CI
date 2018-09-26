<section class='content-header'>
    <h1>
        TRANSAKSI
        <small>Daftar Semua Transaksi</small>
    </h1>
    <ol class='breadcrumb'>
        <li><a href='#'><i class='fa fa-suitcase'></i>Transaksi</a></li>
        <li class='active'>Daftar Semu Transaksi</li>
    </ol>
</section>     
<script src="<?php echo base_url('assets/js/plugins/datatables/jquery-1.11.3.min.js'); ?>"></script>
<script>    
    $(document).ready(function(){  
        $.fn.dataTable.ext.errMode = 'throw';                  
        $('#mytable').dataTable( {                  
        "Processing": true, 
        "ServerSide": true,
        "iDisplayLength": 25,
        "oLanguage": {
                    "sSearch": "Search Data :  ",
                    "sZeroRecords": "Data Masih Kosong",
                    "sEmptyTable": "No data available in table"
                    },
        "ajax": "<?php echo base_url('transaksi/view_data_lunas');?>",
        "columns": [
                { "mData": "no" },
                { "mData": "kode_transaksi" },
                { "mData": "no_telp" },
                { "mData": "nama_pelanggan" },  
                { "mData": "nominal" },                
                { "mData": "harga" },                           
                { "mData": "tgl_transaksi" },
                { "mData": "status" },                           
                { "mData": "detail" },
                { "mData": "edit" },
                ],
        "footerCallback": function (row, data, start, end, display) {
                var api = this.api(), data;
                // Remove the formatting to get integer data for summation
                var intVal = function (i) {
                    return typeof i === 'string' ?
                            i.replace(/,.*|\D/g, '') * 1 :
                            typeof i === 'number' ?
                            i : 0;
                };
                // Total over all pages
                total = api
                        .column(5)
                        .data()
                        .reduce(function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);
                // Total over this page
                pageTotal = api
                        .column(5, {page: 'current'})
                        .data()
                        .reduce(function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);                
                // Update footer
                $(api.column(5).footer()).html(
                        'Rp ' + pageTotal + ' '
                        );
                $(api.column(6).footer()).html(
                        ' ( Total : Rp ' + total + ')'
                        );
            }
        } );
    });
</script>   
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box box-primary'>  
                <div class='box-header with-border'>
                    <h3 class='box-title'><?php echo anchor('transaksi/create/', '<i class="glyphicon glyphicon-plus"></i>Tambah Data', array('class' => 'btn btn-primary btn-sm')); ?>
                        <?php echo anchor(site_url('transaksi/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body table-responsive'>
                    <table class="table table-bordered table-striped" id="mytable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Trans</th>
                                <th>No Telp</th>
                                <th>Pelanggan</th>
                                <th>Nominal</th>
                                <th>Harga</th>                                
                                <th>Tgl Transaksi</th>
                                <th>Status</th>
                                <th>Detail</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th colspan="5" style="text-align:right">SubTotal:</th>
                                <th></th>
                                <th colspan="3"></th>
                            </tr>
                        </tfoot>
                        <tbody>
                           
                        </tbody>
                    </table>					
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->

