<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        try {
            $pengeluaran = Transaction::where('type', '=', '0')->get()->sum('nominal');
            $pemasukan = Transaction::where('type', '=', '1')->get()->sum('nominal');
            $saldo = $pemasukan - $pengeluaran;
            return view('dashboard', compact('saldo', 'pengeluaran', 'pemasukan'));
        } catch (\Throwable $th) {
            dd($th);
            abort(404);
        }
    }
}
