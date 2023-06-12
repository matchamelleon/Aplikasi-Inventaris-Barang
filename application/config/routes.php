<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//dashboar
$route['dashboard'] = 'Welcome/index';

//end dashboard

//page user
$route['data-user'] = 'User/index';
$route['tambah-user'] = 'User/tambahUser';
$route['edit-user/(:any)'] = 'User/editprofile/$1';
$route['hapus-user/(:any)'] = 'User/hapus/$1';
$route['password-edit/(:any)'] = 'User/password/$1';

$route['password-edit-user/(:any)'] = 'User/passworduser/$1';

$route['foto-edit-user/(:any)'] = 'User/editfoto/$1';


//satuan
$route['satuan'] = 'Satuan/index';
$route['tambah-data-satuan'] = 'Satuan/tambahdata';
$route['hapus-satuan/(:any)'] = 'Satuan/hapussatuan/$1';
$route['edit-satuan/(:any)'] = 'Satuan/editsatuan/$1';

//end satuan

//login
$route['Login'] = 'Auth/index';
$route['proses-login'] = 'Auth/proseslogin';
$route['logout'] = 'Auth/Logout';


//produk
//kategori
$route['kategori-produk'] = 'Kategori/index';
$route['tambah-kategori'] = 'Kategori/tambahkategori';
$route['hapus-kategori/(:any)'] = 'Kategori/hapuskategori/$1';
$route['edit-kategori/(:any)'] = 'Kategori/editkategori/$1';

//data-produk
$route['data-produk'] = 'Produk/index';
$route['tambah-produk'] = 'Produk/tambahproduk';
$route['hapus-produk/(:any)'] = 'Produk/hapusproduk/$1';
$route['edit-produk/(:any)'] = 'Produk/editproduk/$1';

//produk keluar
$route['produk-keluar'] = 'Produk_keluar/index';
$route['tambah-produk-keluar'] = 'Produk_keluar/tambah';
$route['hapus-produk-keluar/(:any)'] = 'Produk_keluar/hapus/$1';

//produk masuk
$route['produk-masuk'] = 'Produk_masuk/index';
$route['tambah-produk-masuk'] = 'Produk_masuk/tambah';
$route['hapus-produk-masuk/(:any)'] = 'Produk_masuk/hapus/$1';

//pemasok
$route['pemasok'] = 'Pemasok/index';
$route['tambah-pemasok'] = 'Supplier/tambah';
$route['edit-pemasok/(:any)'] = 'Supplier/edit/$1';
$route['hapus-pemasok/(:any)'] = 'Supplier/hapus/$1';
$route['active/(:any)'] = 'Supplier/aktif/$1';

//request
$route['request-produk'] = 'Request/index';
$route['tambah-request-produk'] = 'Request/tambah';
$route['edit-request-produk/(:any)'] = 'Request/edit/$1';
$route['hapus-request-produk/(:any)'] = 'Request/hapus/$1';
$route['update-status/(:any)'] = 'Request/updatestatus/$1';

//cetak laporan

$route['cetak-laporan'] = 'Laporan/index';

$route['produk-masuk-bulanan'] = 'Laporan/masuk_bulanan';
$route['produk-masuk-tahunan'] = 'Laporan/masuk_tahunan';

$route['produk-keluar-bulanan'] = 'Laporan/keluar_bulanan';
$route['produk-keluar-tahunan'] = 'Laporan/keluar_tahunan';


//profile
$route['profiles-user'] = 'Profiles/index';
