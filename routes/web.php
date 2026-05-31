<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Clogin;
use App\Http\Controllers\Canggota;
use App\Http\Controllers\Cbuku;
use App\Http\Controllers\Ckategori;
use App\Http\Controllers\Cpeminjaman;
use App\Http\Controllers\Cpengembalian;
use App\Http\Controllers\Cpengguna;


Route::middleware("guest")->group(function() {
    Route::get("/login", [Clogin::class, 'index'])->name('login');
    Route::post('/login', [Clogin::class, 'login_proses'])->name('login_proses');
});

Route::middleware("auth")->group(function() {
    Route::get('/', function () {
        return view('layout.dashboard');
    })->name("layout.dashboard");


    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get("/anggota", [Canggota::class, "index"])->name("anggota.index");
        Route::get("/anggota/add", [Canggota::class, "add"])->name("anggota.add");
        Route::post("/anggota/save", [Canggota::class, "save"])->name("anggota.save");
        Route::get("/anggota/{id}/edit", [Canggota::class, "edit"])->name("anggota.edit");
        Route::put("/anggota/{id}/update", [Canggota::class, "update"])->name("anggota.update");
        Route::delete("/anggota/{id}/delete", [Canggota::class, "delete"])->name("anggota.delete");
    });

    Route::get("/anggota", [Canggota::class, "index"])->name("anggota.index");
    Route::get("/anggota/add", [Canggota::class, "add"])->name("anggota.add");
    Route::post("/anggota/save", [Canggota::class, "save"])->name("anggota.save");
    Route::get("/anggota/{id}/edit", [Canggota::class, "edit"])->name("anggota.edit");
    Route::put("/anggota/{id}/update", [Canggota::class, "update"])->name("anggota.update");
    Route::delete("/anggota/{id}/delete", [Canggota::class, "delete"])->name("anggota.delete");

    Route::get("/buku", [Cbuku::class, "index"])->name("buku.index");
    Route::get("/buku/add", [Cbuku::class, "add"])->name("buku.add");
    Route::post("/buku/save", [Cbuku::class, "save"])->name("buku.save");
    Route::get("/buku/{id}/edit", [Cbuku::class, "edit"])->name("buku.edit");
    Route::put("/buku/{id}/update", [Cbuku::class, "update"])->name("buku.update");
    Route::delete("/buku/{id}/delete", [Cbuku::class, "delete"])->name("buku.delete");

    Route::get("/kategori", [Ckategori::class, "index"])->name("kategori.index");
    Route::get("/kategori/add", [Ckategori::class, "add"])->name("kategori.add");
    Route::post("/kategori/save", [Ckategori::class, "save"])->name("kategori.save");
    Route::get("/kategori/{id}/edit", [Ckategori::class, "edit"])->name("kategori.edit");
    Route::put("/kategori/{id}/update", [Ckategori::class, "update"])->name("kategori.update");
    Route::delete("/kategori/{id}/delete", [Ckategori::class, "delete"])->name("kategori.delete");

    Route::get("/peminjaman", [Cpeminjaman::class, "index"])->name("peminjaman.index");
    Route::get("/peminjaman/add", [Cpeminjaman::class, "add"])->name("peminjaman.add");
    Route::post("/peminjaman/save", [Cpeminjaman::class, "save"])->name("peminjaman.save");
    Route::get("/peminjaman/{id}/edit", [Cpeminjaman::class, "edit"])->name("peminjaman.edit");
    Route::put("/peminjaman/{id}/update", [Cpeminjaman::class, "update"])->name("peminjaman.update");
    Route::delete("/peminjaman/{id}/delete", [Cpeminjaman::class, "delete"])->name("peminjaman.delete");

    Route::get("/pengembalian", [Cpengembalian::class, "index"])->name("pengembalian.index");
    Route::get("/pengembalian/add", [Cpengembalian::class, "add"])->name("pengembalian.add");
    Route::post("/pengembalian/save", [Cpengembalian::class, "save"])->name("pengembalian.save");
    Route::get("/pengembalian/{id}/edit", [Cpengembalian::class, "edit"])->name("pengembalian.edit");
    Route::put("/pengembalian/{id}/update", [Cpengembalian::class, "update"])->name("pengembalian.update");
    Route::delete("/pengembalian/{id}/delete", [Cpengembalian::class, "delete"])->name("pengembalian.delete");

    Route::get("/pengguna", [Cpengguna::class, "index"])->name("pengguna.index");
    Route::get("/pengguna/add", [Cpengguna::class, "add"])->name("pengguna.add");
    Route::post("/pengguna/save", [Cpengguna::class, "save"])->name("pengguna.save");
    Route::get("/pengguna/{id}/edit", [Cpengguna::class, "edit"])->name("pengguna.edit");
    Route::put("/pengguna/{id}/update", [Cpengguna::class, "update"])->name("pengguna.update");
    Route::delete("/pengguna/{id}/delete", [Cpengguna::class, "delete"])->name("pengguna.delete");

    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    })->name('logout');
});
