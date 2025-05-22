<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// cái cũ của file khi tảiải
// Route::get('/', function () {
//     return view('phancuoi');
// });
use App\Http\Controllers\TrangChuController;



Route::get('/', [TrangChuController::class, 'index'])->name('trangchu');
use App\Http\Controllers\TimKiemController;
Route::get('/timkiem', [TimKiemController::class, 'timkiem'])->name('timkiem');
use App\Http\Controllers\DangNhapController;
Route::get('/dangnhap', [DangNhapController::class, 'showForm'])->name('dangnhap');
Route::post('/dangnhap', [DangNhapController::class, 'xulyDangNhap'])->name('dangnhap.xuly');

use App\Http\Controllers\ChiTietSachController;

Route::get('/chitietsach/{id_sach}', [ChiTietSachController::class, 'show'])->name('chitietsach');
Route::post('/chitietsach/{id_sach}/luu-yeu-thich', [ChiTietSachController::class, 'luuYeuThich'])->name('sach.luu_yeu_thich');
Route::post('/lich-su/{id_sach}', [ChiTietSachController::class, 'luuLichSuDoc'])->name('sach.luu_lich_su');
Route::post('/chitietsach/{id_sach}/nhanxet', [ChiTietSachController::class, 'guiNhanXet'])->name('sach.nhanxet');

use App\Http\Controllers\GioiThieuController;
Route::get('/gioithieu', [GioiThieuController::class, 'gioithieu'])->name('gioithieu');

use App\Http\Controllers\TroGiupController;
Route::get('/trogiup', [TroGiupController::class, 'trogiup'])->name('trogiup');
use App\Http\Controllers\AdminController;
Route::get('/admin', [AdminController::class, 'showLoginForm'])->name('admin');
Route::post('/admin', [AdminController::class, 'login'])->name('admin.login');
use App\Http\Controllers\QuanLyController;

Route::get('/quanly', [QuanLyController::class, 'index'])->name('quanly');
use App\Http\Controllers\TaiKhoanController;
Route::get('/taikhoan/sua', [TaiKhoanController::class, 'showForm'])->name('taikhoan.sua');

Route::post('/taikhoan/sua/{id_sv}', [TaiKhoanController::class, 'capNhat'])->name('taikhoan.capnhat');

use App\Http\Controllers\LichSuController;
Route::get('/lichsu', [LichSuController::class, 'lichsu'])->name('lichsu');
use App\Http\Controllers\YeuThichController;
Route::get('/yeuthich', [YeuThichController::class, 'yeuthich'])->name('yeuthich');
use App\Http\Controllers\SachTopController;
Route::get('/sachtop', [SachTopController::class, 'show'])->name('sachtop');
use App\Http\Controllers\DangKyController;

Route::get('/dangky', [DangKyController::class, 'show'])->name('dangky');  
Route::post('/dangky', [DangKyController::class, 'store'])->name('dangky.store');


//quan ly lop
use App\Http\Controllers\QLLOPController;

Route::get('/lop', [QLLOPController::class, 'index'])->name('lop.index');
Route::get('/lop/{id}/edit', [QLLOPController::class, 'edit'])->name('lop.edit');

Route::put('/lop/{id_lop}', [QLLOPController::class, 'update'])->name('lop.update');
Route::delete('/lop/{id_lop}', [QLLOPController::class, 'destroy'])->name('lop.destroy');

use App\Http\Controllers\ThemQLLOPController;
Route::get('/lopthemqllop', [ThemQLLOPController::class, 'themqllop'])->name('themqllop');
Route::post('/lopthemqllop', [ThemQLLOPController::class, 'store'])->name('themqllop.store');


//quan ly muon tra
use App\Http\Controllers\QLMTController;
Route::get('/muontra', [QLMTController::class, 'index'])->name('muontra.index');
Route::get('/muontra/{id}/edit', [QLMTController::class, 'edit'])->name('muontra.edit');

Route::put('/muontra/{id_mt}', [QLMTController::class, 'update'])->name('muontra.update');
Route::delete('/muontra/{id_mt}', [QLMTController::class, 'destroy'])->name('muontra.destroy');

use App\Http\Controllers\ThemQLMTController;
Route::get('/themqlmt', [ThemQLMTController::class, 'themqlmt'])->name('themqlmt');
Route::post('/themqlmt', [ThemQLMTController::class, 'store'])->name('themqlmt.store');


//quan ly nhan xet
use App\Http\Controllers\QLNXController;
Route::get('/nhanxet', [QLNXController::class, 'index'])->name('nhanxet.index');
Route::get('/nhanxet/{id}/edit', [QLNXController::class, 'edit'])->name('nhanxet.edit');

Route::put('/nhanxet/{id_nx}', [QLNXController::class, 'update'])->name('nhanxet.update');
Route::delete('/nhanxet/{id_nx}', [QLNXController::class, 'destroy'])->name('nhanxet.destroy');

use App\Http\Controllers\ThemQLNXController;
Route::get('/themqlnx', [ThemQLNXController::class, 'themqlnx'])->name('themqlnx');
Route::post('/themqlnx', [ThemQLNXController::class, 'store'])->name('themqlnx.store');


//quan ly sach
use App\Http\Controllers\QLSController;
Route::get('/sach', [QLSController::class, 'index'])->name('sach.index');
Route::get('/sach/{id}/edit', [QLSController::class, 'edit'])->name('sach.edit');

Route::put('/sach/{id_sach}', [QLSController::class, 'update'])->name('sach.update');
Route::delete('/sach/{id_sach}', [QLSController::class, 'destroy'])->name('sach.destroy');

use App\Http\Controllers\ThemQLSController;
Route::get('/themqls', [ThemQLSController::class, 'themqls'])->name('themqls');
Route::post('/themqls', [ThemQLSController::class, 'store'])->name('themqls.store');


// quan ly sinh vien
use App\Http\Controllers\QLSVController;
Route::get('/sinhvien', [QLSVController::class, 'index'])->name('sinhvien.index');
Route::get('/sinhvien/{id_sv}/edit', [QLSVController::class, 'edit'])->name('sinhvien.edit');

Route::put('/sinhvien/{id_sv}', [QLSVController::class, 'update'])->name('sinhvien.update');
Route::delete('/sinhvien/{id_sv}', [QLSVController::class, 'destroy'])->name('sinhvien.destroy');

use App\Http\Controllers\ThemQLSVController;
Route::get('/themqlsv', [ThemQLSVController::class, 'themqlsv'])->name('themqlsv');
Route::post('/themqlsv', [ThemQLSVController::class, 'store'])->name('themqlsv.store');


// quan ly tac gia
use App\Http\Controllers\QLTGController;
Route::get('/tacgia', [QLTGController::class, 'index'])->name('tacgia.index');
Route::get('/tacgia/{id_tg}/edit', [QLTGController::class, 'edit'])->name('tacgia.edit');

Route::put('/tacgia/{id_tg}', [QLTGController::class, 'update'])->name('tacgia.update');
Route::delete('/tacgia/{id_tg}', [QLTGController::class, 'destroy'])->name('tacgia.destroy');

use App\Http\Controllers\ThemQLTGController;
Route::get('/themqltg', [ThemQLTGController::class, 'themqltg'])->name('themqltg');
Route::post('/themqltg', [ThemQLTGController::class, 'store'])->name('themqltg.store');




//quan ly the loai
use App\Http\Controllers\QLTLController;
Route::get('/theloai', [QLTLController::class, 'index'])->name('theloai.index');
Route::get('/theloai/{id_tl}/edit', [QLTLController::class, 'edit'])->name('theloai.edit');

Route::put('/theloai/{id_tl}', [QLTLController::class, 'update'])->name('theloai.update');
Route::delete('/theloai/{id_tl}', [QLTLController::class, 'destroy'])->name('theloai.destroy');

use App\Http\Controllers\ThemQLTLController;
Route::get('/themqltl', [ThemQLTLController::class, 'themqltl'])->name('themqltl');
Route::post('/themqltl', [ThemQLTLController::class, 'store'])->name('themqltl.store');


//quan ly tin tuctuc
use App\Http\Controllers\QLTTController;
Route::get('/tintuc', [QLTTController::class, 'index'])->name('tintuc.index');
Route::get('/tintuc/{id_tt}/edit', [QLTTController::class, 'edit'])->name('tintuc.edit');

Route::put('/tintuc/{id_tt}', [QLTTController::class, 'update'])->name('tintuc.update');
Route::delete('/tintuc/{id_tt}', [QLTTController::class, 'destroy'])->name('tintuc.destroy');
use App\Http\Controllers\ThemQLTTController;
Route::get('/themqltt', [ThemQLTTController::class, 'themqltt'])->name('themqltt');
Route::post('/themqltt', [ThemQLTTController::class, 'store'])->name('themqltt.store');

//quan ly admin 
use App\Http\Controllers\QLTKADController;
Route::get('/qladmin', [QLTKADController::class, 'index'])->name('qladmin.index');
Route::get('/qladmin/{id_ad}/edit', [QLTKADController::class, 'edit'])->name('qladmin.edit');

Route::put('/qladmin/{id_ad}', [QLTKADController::class, 'update'])->name('qladmin.update');
Route::delete('/qladmin/{id_ad}', [QLTKADController::class, 'destroy'])->name('qladmin.destroy');
use App\Http\Controllers\ThemQLTKADController;
Route::get('/themqlad', [ThemQLTKADController::class, 'themqlad'])->name('themqlad');
Route::post('/themqlad', [ThemQLTKADController::class, 'store'])->name('themqlad.store');

//quan ly doc gia
use App\Http\Controllers\QLTKDGController;
Route::get('/qldocgia', [QLTKDGController::class, 'index'])->name('qldocgia.index');
Route::get('/qldocgia/{id_dg}/edit', [QLTKDGController::class, 'edit'])->name('qldocgia.edit');

Route::put('/qldocgia/{id_dg}', [QLTKDGController::class, 'update'])->name('qldocgia.update');
Route::delete('/qldocgia/{id_dg}', [QLTKDGController::class, 'destroy'])->name('qldocgia.destroy');
