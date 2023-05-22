<?php

namespace App\Http\Controllers;

use App\Models\RiwayatPembelian;
use App\Models\User;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $mingguAwal = Carbon::now()->startOfWeek()->format('Y-m-d');
        $mingguAkhir = Carbon::now()->endOfWeek()->format('Y-m-d');
        $mingguLaluAwal = Carbon::now()->subWeek()->startOfWeek()->format('Y-m-d');
        $mingguLaluAkhir = Carbon::now()->subWeek()->endOfWeek()->format('Y-m-d');
        $bulanIni = Carbon::now()->month;
        $bulanLalu = Carbon::now()->subMonth()->month;
        $tanggalSebelumnya = Carbon::now()->subDay()->format('Y-m-d');

        $uangHariIni = RiwayatPembelian::where('tanggal_pembelian', '=', date('Y-m-d'))->sum('total_harga');
        $uangKemarin = RiwayatPembelian::where('tanggal_pembelian', '=', $tanggalSebelumnya)->sum('total_harga');
        $uangSelisih = $uangHariIni - $uangKemarin;
        if ($uangKemarin == 0) {
            $persenHariIni = $uangHariIni * 100;
        } else {
            if ($uangKemarin > $uangHariIni) {
                $persenHariIni = intval($uangSelisih / $uangKemarin * 100);
            } else {
                $persenHariIni = intval($uangSelisih / $uangKemarin * 100);
            }
        }

        $uangMingguIni = RiwayatPembelian::where('tanggal_pembelian', '>=', $mingguAwal)->where('tanggal_pembelian', '<=', $mingguAkhir)->sum('total_harga');
        $uangMingguLalu = RiwayatPembelian::where('tanggal_pembelian', '>=', $mingguLaluAwal)->where('tanggal_pembelian', '<=', $mingguLaluAkhir)->sum('total_harga');
        $uangMingguSelisih = $uangMingguIni - $uangMingguLalu;
        if ($uangMingguLalu == 0) {
            $persenMingguIni = $uangMingguIni * 100;
        } else {
            if ($uangMingguLalu > $uangMingguIni) {
                $persenMingguIni = intval($uangMingguSelisih / $uangMingguLalu * 100);
            } else {
                $persenMingguIni = intval($uangMingguSelisih / $uangMingguLalu * 100);
            }
        }

        $uangBulanIni = RiwayatPembelian::whereMonth('tanggal_pembelian', $bulanIni)->sum('total_harga');
        $uangBulanLalu = RiwayatPembelian::whereMonth('tanggal_pembelian', $bulanLalu)->sum('total_harga');
        $uangBulanSelisih = $uangBulanIni - $uangBulanLalu;
        if ($uangBulanLalu == 0) {
            $persenBulanIni = $uangBulanIni * 100;
        } else {
            if ($uangBulanLalu > $uangBulanIni) {
                $persenBulanIni = intval($uangBulanSelisih / $uangBulanLalu * 100);
            } else {
                $persenBulanIni = intval($uangBulanSelisih / $uangBulanLalu * 100);
            }
        }

        $userBaru = User::whereMonth('created_at', $bulanIni)->count();
        $userBaruBulanLalu = User::whereMonth('created_at', $bulanLalu)->count();
        $userBaruSelisih = $userBaru - $userBaruBulanLalu;
        if ($userBaruBulanLalu == 0) {
            $persenUserBaru = $userBaru * 100;
        } else {
            if ($userBaruBulanLalu > $uangBulanIni) {
                $persenUserBaru = intval($userBaruSelisih / $userBaruBulanLalu * 100);
            } else {
                $persenUserBaru = intval($userBaruSelisih / $userBaruBulanLalu * 100);
            }
        }
        $tahunIni = Carbon::now()->year;
        $tahunLalu = Carbon::now()->subYear()->year;
        $Jan = RiwayatPembelian::whereYear('tanggal_pembelian', $tahunIni)->whereMonth('tanggal_pembelian', 1)->count();
        $Feb = RiwayatPembelian::whereYear('tanggal_pembelian', $tahunIni)->whereMonth('tanggal_pembelian', 2)->count();
        $Mar = RiwayatPembelian::whereYear('tanggal_pembelian', $tahunIni)->whereMonth('tanggal_pembelian', 3)->count();
        $Apr = RiwayatPembelian::whereYear('tanggal_pembelian', $tahunIni)->whereMonth('tanggal_pembelian', 4)->count();
        $May = RiwayatPembelian::whereYear('tanggal_pembelian', $tahunIni)->whereMonth('tanggal_pembelian', 5)->count();
        $Jun = RiwayatPembelian::whereYear('tanggal_pembelian', $tahunIni)->whereMonth('tanggal_pembelian', 6)->count();
        $Jul = RiwayatPembelian::whereYear('tanggal_pembelian', $tahunIni)->whereMonth('tanggal_pembelian', 7)->count();
        $Aug = RiwayatPembelian::whereYear('tanggal_pembelian', $tahunIni)->whereMonth('tanggal_pembelian', 8)->count();
        $Sep = RiwayatPembelian::whereYear('tanggal_pembelian', $tahunIni)->whereMonth('tanggal_pembelian', 9)->count();
        $Oct = RiwayatPembelian::whereYear('tanggal_pembelian', $tahunIni)->whereMonth('tanggal_pembelian', 10)->count();
        $Nov = RiwayatPembelian::whereYear('tanggal_pembelian', $tahunIni)->whereMonth('tanggal_pembelian', 11)->count();
        $Dec = RiwayatPembelian::whereYear('tanggal_pembelian', $tahunIni)->whereMonth('tanggal_pembelian', 12)->count();
        $persenGrafik = RiwayatPembelian::whereYear('tanggal_pembelian', $tahunIni)->count();
        $persenGrafikLalu = RiwayatPembelian::whereYear('tanggal_pembelian', $tahunLalu)->count();
        $persenGrafikSelisih = $persenGrafik - $persenGrafikLalu;
        if ($persenGrafikLalu == 0) {
            $persenGrafikTahunIni = $persenGrafik * 100;
        } else {
            if ($persenGrafikLalu > $persenGrafik) {
                $persenGrafikTahunIni = intval($persenGrafikSelisih / $persenGrafikLalu * 100);
            } else {
                $persenGrafikTahunIni = intval($persenGrafikSelisih / $persenGrafikLalu * 100);
            }
        }
        return view('pages.dashboard', compact('uangHariIni', 'uangMingguIni', 'uangBulanIni', 'userBaru', 'persenHariIni', 'persenMingguIni', 'persenBulanIni', 'persenUserBaru', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec', 'persenGrafikTahunIni', 'tahunLalu'));
    }
}