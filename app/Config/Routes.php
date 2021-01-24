<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// $routes->get('/', 'Home::index');
// $routes->get('/perbarui', 'Home::perbarui');
// $routes->get('/telusuri', 'Home::telusuri');
$routes->get('/', 'Pages\Home::index');
$routes->get('/perbarui', 'Pages\Home::perbarui');
$routes->get('/telusuri', 'Pages\Home::telusuri');
$routes->get('/perbaruiDosen', 'Pages\Home::perbaruiDosen');
$routes->get('/years', 'Pages\Years::yearsPage');

//routers laporan
$routes->get('/laporan/(:num)', 'Pages\Laporan::laporan/$1');
$routes->get('/cetak-biodata/(:num)', 'Pages\Laporan::cetakBiodata/$1');
$routes->get('/cetak-laporan/(:num)', 'Pages\Laporan::cetakLaporan/$1');
$routes->get('/cetak-asistensi/(:num)', 'Pages\Laporan::cetakAsistensi/$1');
$routes->get('/cetak-kolokium/(:num)', 'Pages\Laporan::cetakKolokium/$1');
$routes->get('/cetak-pendadaran/(:num)', 'Pages\Laporan::cetakPendadaran/$1');
$routes->get('/cetak-lomba/(:num)', 'Pages\Laporan::cetakLomba/$1');
$routes->get('/cetak-jurnal/(:num)', 'Pages\Laporan::cetakJurnal/$1');
$routes->get('/cetak-kerja-praktek/(:num)', 'Pages\Laporan::cetakKp/$1');

//routers perbarui mahasiswa
$routes->get('/perbaruiMhs/(:segment)', 'Pages\Home::perbaruiMhs/$1');
$routes->get('/perbaruiMhs', 'Pages\Home::perbaruiMhs');
$routes->delete('/deleteMahasiswa/(:num)/(:num)', 'Pages\Home::deleteMahasiswa/$1/$2');

//routers perbarui angkatan
$routes->get('/perbaruiAngkatan', 'Pages\Home::perbaruiAngkatan');
$routes->delete('/deleteAngkatan/(:segment)', 'Pages\Home::deleteAngkatan/$1');
$routes->get('/tambahAngkatan', 'Pages\Home::tambahAngkatan');

//routers yudisium
$routes->get('/yudisium/(:num)', 'Pages\Yudisium::yudisium/$1');
$routes->get('/transkrip-nilai/(:segment)', 'Pages\Yudisium::printNilai/$1');
$routes->get('/surat-lulus/(:segment)', 'Pages\Yudisium::printSuratLulus/$1');
$routes->get('/edit-yudisium/(:num)', 'Pages\Yudisium::editYudisium/$1');
$routes->post('/update-yudisium/(:num)/(:num)', 'Pages\Yudisium::updateYudisium/$1/$2');

//routers Data Mahasiswa
$routes->get('/detail/(:num)', 'Pages\Mahasiswa::detailStudent/$1');
$routes->get('/tambahMahasiswa', 'Pages\Mahasiswa::tambahMahasiswa');
$routes->post('/saveMahasiswa', 'Pages\Mahasiswa::saveTambahMahasiswa');
$routes->get('/edit-mahasiswa/(:num)', 'Pages\Mahasiswa::editMahasiswa/$1');
$routes->post('/update-mahasiswa/(:num)/(:num)', 'Pages\Mahasiswa::updateMahasiswa/$1/$2');

//routers KP
$routes->get('/kerja-praktek/(:num)', 'Pages\KerjaPraktek::kerjaPraktek/$1');
$routes->get('/berita-acara-kp/(:segment)', 'Pages\KerjaPraktek::printBeritaAcara/$1');
$routes->get('/absensi-kp/(:segment)', 'Pages\KerjaPraktek::printAbsensi/$1');
$routes->get('/surat-tugas-kp/(:segment)', 'Pages\KerjaPraktek::printSuratTugas/$1');
$routes->get('/edit-kp/(:num)', 'Pages\KerjaPraktek::editKp/$1');
$routes->post('/update-kp/(:num)/(:num)', 'Pages\KerjaPraktek::updateKp/$1/$2');

//routers Kolokium
$routes->get('/kolokium/(:num)', 'Pages\Kolokium::kolokium/$1');
$routes->get('/berita-acara-kolokium/(:segment)', 'Pages\Kolokium::printBeritaAcara/$1');
$routes->get('/edit-kolokium/(:num)', 'Pages\Kolokium::editKolokium/$1');
$routes->post('/update-kolokium/(:num)/(:num)', 'Pages\Kolokium::updateKolokium/$1/$2');

//routers Pendadaran
$routes->get('/pendadaran/(:num)', 'Pages\Pendadaran::pendadaran/$1');
$routes->get('/berita-acara-pendadaran/(:segment)', 'Pages\Pendadaran::printBeritaAcara/$1');
$routes->get('/edit-pendadaran/(:num)', 'Pages\Pendadaran::editPendadaran/$1');
$routes->post('/update-pendadaran/(:num)/(:num)', 'Pages\Pendadaran::updatePendadaran/$1/$2');

//routers Skripsi
$routes->get('/skripsi/(:num)', 'Pages\Skripsi::skripsi/$1');
$routes->get('/edit-skripsi/(:num)', 'Pages\Skripsi::editSkripsi/$1');
$routes->post('/update-skripsi/(:num)/(:num)', 'Pages\Skripsi::updateSkripsi/$1/$2');

//routers Lomba
$routes->get('/lomba/(:num)', 'Pages\Lomba::lomba/$1');
$routes->get('/sertifikat-lomba/(:segment)', 'Pages\Lomba::printSertifikat/$1');
$routes->get('/tambah-lomba/(:num)', 'Pages\Lomba::tambahLomba/$1');
$routes->post('/saveLomba/(:num)', 'Pages\Lomba::saveLomba/$1');
$routes->delete('/delete-lomba/(:num)/(:num)', 'Pages\Lomba::deleteLomba/$1/$2');
$routes->get('/edit-lomba/(:num)/(:num)', 'Pages\Lomba::editLomba/$1/$2');
$routes->post('/update-lomba/(:num)/(:num)', 'Pages\Lomba::updateLomba/$1/$2');

//routes jurnal
$routes->get('/jurnal/(:num)', 'Pages\Jurnal::jurnal/$1');
$routes->get('/lihat-jurnal/(:segment)', 'Pages\Jurnal::printJurnal/$1');
$routes->get('/tambah-jurnal/(:num)', 'Pages\Jurnal::tambahJurnal/$1');
$routes->post('/saveJurnal/(:num)', 'Pages\Jurnal::saveJurnal/$1');
$routes->delete('/delete-jurnal/(:num)/(:num)', 'Pages\Jurnal::deleteJurnal/$1/$2');
$routes->get('/edit-jurnal/(:num)/(:num)', 'Pages\Jurnal::editJurnal/$1/$2');
$routes->post('/update-jurnal/(:num)/(:num)', 'Pages\Jurnal::updateJurnal/$1/$2');

//routers Asistensi
$routes->get('/asistensi/(:num)', 'Pages\Asistensi::asistensi/$1');
$routes->get('/sertifikat-asistensi/(:segment)', 'Pages\Asistensi::printSertifikat/$1');
$routes->get('/tambah-asistensi/(:num)', 'Pages\Asistensi::tambahAsistensi/$1');
$routes->post('/saveAsistensi/(:num)', 'Pages\Asistensi::saveAsistensi/$1');
$routes->delete('/delete-asistensi/(:num)/(:num)', 'Pages\Asistensi::deleteAsistensi/$1/$2');
$routes->get('/edit-asistensi/(:num)/(:num)', 'Pages\Asistensi::editAsistensi/$1/$2');
$routes->post('/update-asistensi/(:num)/(:num)', 'Pages\Asistensi::updateAsistensi/$1/$2');

$routes->get('/daftar-mahasiswa/(:num)', 'Pages\StudentList::studentList/$1'); //untuk akses studentsList dari tahun 
$routes->get('/daftar-mahasiswa', 'Pages\StudentList::studentList'); //untuk akses studentList dari pencarian


/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
