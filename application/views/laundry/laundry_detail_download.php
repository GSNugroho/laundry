<html>
<head>
<style>
body {font-family: sans-serif;
	font-size: 10pt;
}
p {	margin: 0pt; }
table.items {
	border: 0.1mm solid #000000;
}
td { vertical-align: top; }
.items td {
	border-left: 0.1mm solid #000000;
	border-right: 0.1mm solid #000000;
}
table thead td { background-color: #EEEEEE;
	text-align: center;
	border: 0.1mm solid #000000;
	font-variant: small-caps;
}
.items td.blanktotal {
	background-color: #EEEEEE;
	border: 0.1mm solid #000000;
	background-color: #FFFFFF;
	border: 0mm none #000000;
	border-top: 0.1mm solid #000000;
	border-right: 0.1mm solid #000000;
}
.items td.totals {
	text-align: right;
	border: 0.1mm solid #000000;
}
.items td.cost {
	text-align: "." center;
}
</style>
</head>
<body>


<div style="text-align: right">Tanggal Cetak : <?php echo date('d-m-Y');?></div>

<table width="100%" style="font-family: serif;" cellpadding="10">
    <tr>
        <td width="45%" style="border: 0.1mm solid #888888; "><span style="font-size: 7pt; color: #555555; font-family: sans;"></span>
        <?php foreach($rincian as $row){?>
            <br />Tanggal Laundry : <?php echo date('d-m-Y', strtotime($row->tgl_transaksi));?>
            <br />Tempat Laundry             : <?php echo $row->laundry;?>
            <br />Alamat Laundry              :<?php echo $row->almt_laundry;?>
            <br />Penanggngjawab            : <?php echo $row->pic;?>
        <?php }?>
        </td>
    </tr>
</table>

<br />

<table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
    <thead>
        <tr>
            <th width="33%">Nama Pakaian</th>
            <th width="33%">Kategori</th>
            <th width="33%">Foto Pakaian</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($detail_rincian as $row){
            ?>
            <tr>
                <td align="center"><?php echo $row->nm_pakaian;?></td>
                <td align="center"><?php echo $row->kategori;?></td>
                <td><img src='<?php echo base_url().'upload/'.$row->foto_pakaian;?>' width='100' height='100' /></td>
            </tr>
        <?php }?>
    </tbody>
</table>
</body>
</html>