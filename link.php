<?php
	switch ($_GET['link']) {
		case 'account':
			include("account.php");
			break;
		case 'setting':
			include("setting.php");
			break;
		case 'list_barang':
			include("list_barang.php");
			break;
		case 'list_transaksi':
			include("list_transaksi.php");
			break;
		case 'list_user':
			include("list_user.php");
			break;
		case 'list_kasir':
			include("list_kasir.php");
			break;
		default:
			include("default.php");
			break;
	}
?>