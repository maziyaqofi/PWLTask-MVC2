<?php 
	/**
	 * Bootstrap page
	 * Require file autoload dari vendor
	 */
	require_once __DIR__ . '/vendor/autoload.php';

	use Controllers\Mahasiswa;
	use Controllers\Login;  // Ganti dengan Controller Login

	/**
	 * Tentukan bagaimana halaman akan di-load
	 */
	if(!isset($_GET['act']))
	{
		// Default untuk halaman login
		$controller = new Login(); // Gunakan Controller Login
		$controller->index(); // Panggil method index untuk menampilkan form login
	}
	else
	{
		switch($_GET['act'])
		{
			case 'login' : 
				$controller = new Login();
				$controller->index();  // Tampilkan form login
				break;
			
			case 'auth' : 
				$controller = new Login();
				$controller->auth();   // Proses login
				break;

			case 'logout':
				$controller = new Login();
				$controller->logout(); // Proses logout
				break;
				
			case 'home' : 
				$controller = new Mahasiswa(); // Controller untuk mahasiswa
				$controller->index();
				break;
			
			case 'simpan' :
				$controller = new Mahasiswa();
				$controller->save();
				break;

			case 'tampil-data' :
				$controller = new Mahasiswa();
				$controller->show_data();
				break;

			case 'delete':
				$controller = new Mahasiswa();
				$controller->delete();
				break;
			
			default : 
				// Halaman default
				$controller = new Login(); // Jika tidak ada aksi yang sesuai, arahkan ke login
				$controller->index();
				break;
		}
	}
?>
