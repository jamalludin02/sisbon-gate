<?php

use App\Http\Controllers\ctrlAkun;
use App\Http\Controllers\ctrlDashboard;
use App\Http\Controllers\ctrlGaji;
use App\Http\Controllers\ctrlJabatan;
use App\Http\Controllers\ctrlKriteriaPenilaian;
use App\Http\Controllers\ctrlLaporanGaji;
use App\Http\Controllers\ctrlLaporanPenilaian;
use App\Http\Controllers\ctrlLaporanPresensi;
use App\Http\Controllers\ctrlPegawai;
use App\Http\Controllers\ctrlPenilaian;
use App\Http\Controllers\ctrlPeriodePenilaian;
use App\Http\Controllers\ctrlPresensi;
use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Services\AttendanceService;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

Route::get('/', function () {
    return view('home');
});

Route::get('/timestamp', function () {
    date_default_timezone_set('Asia/Jakarta');
    return response()->json(['timestamp' => now()->format('H:i:s')]);
})->name('timestamp');

Auth::routes();


// route group Admin
// RouteGroup::prefix('admin')
Route::group(['middleware' => ['auth', 'Admin'], 'prefix' => 'admin'], function () {
    // Route::get('/', fn() => view('pages.admin.dashboard'))->name('admin.dashboard');
    Route::get('/', [ctrlDashboard::class, 'indexAdmin'])->name('admin.dashboard');    

    // Jabatan
    Route::group(['prefix' => 'jabatan'], function () {
        Route::get('/', [ctrlJabatan::class, 'AdminShow'])->name('admin.jabatan');
        Route::get('/create', fn() => view('pages.admin.jabatanCreate'))->name('admin.jabatan.create');
        Route::post('/created', [ctrlJabatan::class, 'AdminCreated'])->name('admin.jabatan.created');
        Route::get('/edit/{id}', [ctrlJabatan::class, 'AdminEdit'])->name('admin.jabatan.edit');
        Route::post('/update/{id}', [ctrlJabatan::class, 'AdminUpdate'])->name('admin.jabatan.update');
        Route::get('/delete/{id}', [ctrlJabatan::class, 'AdminDelete'])->name('admin.jabatan.delete');
    });

    // Pegawai
    Route::group(['prefix' => 'pegawai'], function () {
        Route::get('/', [ctrlPegawai::class, 'AdminShow'])->name('admin.pegawai');
        Route::get('/create', function () {
            $jabatan = Jabatan::all();
            return view('pages.admin.pegawaiCreate', compact('jabatan'));
        })->name('admin.pegawai.create');
        Route::post('/created', [ctrlPegawai::class, 'AdminCreated'])->name('admin.pegawai.created');
        Route::get('/edit/{id}', [ctrlPegawai::class, 'AdminEdit'])->name('admin.pegawai.edit');
        Route::post('/update/{id}', [ctrlPegawai::class, 'AdminUpdate'])->name('admin.pegawai.update');
        Route::get('/delete/{id}', [ctrlPegawai::class, 'AdminDelete'])->name('admin.pegawai.delete');
    });

    // Akun
    Route::group(['prefix' => 'akun'], function () {
        Route::get('/', [ctrlAkun::class, 'AdminShow'])->name('admin.akun');
        Route::get('/create', function () {
            $pegawai = Pegawai::select('id', 'nama')->get();
            return view('pages.admin.akunCreate', compact('pegawai'));
        })->name('admin.akun.create');
        Route::post('/created', [ctrlAkun::class, 'AdminCreated'])->name('admin.akun.created');
        Route::get('/edit/{id}', [ctrlAkun::class, 'AdminEdit'])->name('admin.akun.edit');
        Route::post('/update/{id}', [ctrlAkun::class, 'AdminUpdate'])->name('admin.akun.update');
        Route::get('/delete/{id}', [ctrlAkun::class, 'AdminDelete'])->name('admin.akun.delete');
        Route::get('/reset-password/{id}', [ctrlAkun::class, 'AdminResetPassword'])->name('admin.akun.reset-password');
    });

    // periode penilaian
    Route::group(['prefix' => 'periode-penilaian'], function () {
        Route::get('/', [ctrlPeriodePenilaian::class, 'AdminShow'])->name('admin.periode-penilaian');
        Route::get('/create', function () {
            $year = date('Y');
            return view('pages.admin.periodeCreate', compact('year'));
        })->name('admin.periode-penilaian.create');
        Route::post('/created', [ctrlPeriodePenilaian::class, 'AdminCreated'])->name('admin.periode-penilaian.created');
        Route::get('/edit/{id}', [ctrlPeriodePenilaian::class, 'AdminEdit'])->name('admin.periode-penilaian.edit');
        Route::post('/update/{id}', [ctrlPeriodePenilaian::class, 'AdminUpdate'])->name('admin.periode-penilaian.update');
        Route::get('/delete/{id}', [ctrlPeriodePenilaian::class, 'AdminDelete'])->name('admin.periode-penilaian.delete');
    });

    // kriteria penilaian
    Route::group(['prefix' => 'kriteria-penilaian'], function () {
        Route::get('/', [ctrlKriteriaPenilaian::class, 'AdminShow'])->name('admin.kriteria-penilaian');
        Route::get('/create', fn() => view('pages.admin.kriteriaCreate'))->name('admin.kriteria-penilaian.create');
        Route::post('/created', [ctrlKriteriaPenilaian::class, 'AdminCreated'])->name('admin.kriteria-penilaian.created');
        Route::get('/edit/{id}', [ctrlKriteriaPenilaian::class, 'AdminEdit'])->name('admin.kriteria-penilaian.edit');
        Route::post('/update/{id}', [ctrlKriteriaPenilaian::class, 'AdminUpdate'])->name('admin.kriteria-penilaian.update');
        Route::get('/delete/{id}', [ctrlKriteriaPenilaian::class, 'AdminDelete'])->name('admin.kriteria-penilaian.delete');
    });

    Route::get('/data-presensi', [ctrlPresensi::class, 'dataPresensi'])->name('admin.presensi');
    Route::get('/data-presensi/{year?}/{month?}/{day?}/{dayName}', [ctrlPresensi::class, 'showDataPresensi'])->name('admin.presensi.form');
    Route::post('/store/data-presensi/{year?}/{month?}/{day?}', [ctrlPresensi::class, 'storeDataPresensi'])->name('admin.presensi.store');

    Route::get('penilaian', [ctrlPenilaian::class, 'getPeriodActive'])->name('admin.penilaian');
    Route::get('penilaian/{id}', [ctrlPenilaian::class, 'pegawaiList'])->name('admin.penilaian.select');
    Route::get('penilaian/{periode_id}/{pegawai_id}', [ctrlPenilaian::class, 'formPenilaian'])->name('admin.penilaian.form');
    Route::post('penilaian/{periode_id}/{pegawai_id}', [ctrlPenilaian::class, 'storePenilaian'])->name('admin.penilaian.store');

    Route::get('laporan-penilaian/{id?}', [ctrlLaporanPenilaian::class, 'index'])->name('admin.laporan-penilaian');
    Route::get('laporan-presensi', [ctrlLaporanPresensi::class, 'dataLaporan'])->name('admin.laporan-presensi');
    Route::get('laporan-gaji', [ctrlLaporanGaji::class, 'index'])->name('admin.laporan-gaji');
});


// route group SPV
Route::group(['middleware' => ['auth', 'SPV'], 'prefix' => 'spv'], function () {
    // Route::get('/', fn() => view('pages.supervisor.dashboard'))->name('spv.dashboard');
    Route::get('/', [ctrlDashboard::class, 'indexSupervisor'])->name('spv.dashboard');

    Route::get('/data-presensi/{year?}/{month?}', [ctrlPresensi::class, 'dataPresensi'])->name('spv.presensi');
    Route::get('/data-presensi/{year?}/{month?}/{day?}/{dayName}', [ctrlPresensi::class, 'showDataPresensi'])->name('spv.presensi.form');
    Route::post('/store/data-presensi/{year?}/{month?}/{day?}', [ctrlPresensi::class, 'storeDataPresensi'])->name('spv.presensi.store');

    Route::get('penilaian', [ctrlPenilaian::class, 'getPeriodActive'])->name('spv.penilaian');
    Route::get('penilaian/{id}', [ctrlPenilaian::class, 'pegawaiList'])->name('spv.penilaian.select');
    Route::get('penilaian/{periode_id}/{pegawai_id}', [ctrlPenilaian::class, 'formPenilaian'])->name('spv.penilaian.form');
    Route::post('penilaian/{periode_id}/{pegawai_id}', [ctrlPenilaian::class, 'storePenilaian'])->name('spv.penilaian.store');

    Route::get('laporan-penilaian/{id?}', [ctrlLaporanPenilaian::class, 'index'])->name('spv.laporan-penilaian');
    Route::get('laporan-presensi', [ctrlLaporanPresensi::class, 'dataLaporan'])->name('spv.laporan-presensi');
    Route::get('laporan-gaji', [ctrlLaporanGaji::class, 'index'])->name('spv.laporan-gaji');
});

Route::get('/akun', [ctrlAkun::class, 'show'])->name('show-akun');
Route::post('/akun', [ctrlAkun::class, 'update'])->name('update-akun');


Route::get('/laporan-penilaian/{id?}', [ctrlLaporanPenilaian::class, 'printAsPdf'])->name('print.laporan-penilaian');
Route::get('/laporan-presensi/{year?}/{month?}', [ctrlLaporanPresensi::class, 'printAsPdf'])->name('print.laporan-presensi');
Route::get('/laporan-gaji/{year?}/{month?}', [ctrlLaporanGaji::class, 'printAsPdf'])->name('print.laporan-gaji');
