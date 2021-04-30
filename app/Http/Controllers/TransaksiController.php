<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransaksiStore;
use App\Http\Requests\TransaksiUpdate;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (isset($_GET['start']) && isset($_GET['end'])) {
            $start = strtotime($_GET['start']);
            $end = strtotime($_GET['end']);

            if ($start > $end) {
                session()->flash('error');
                return redirect(route('transaksi.index'));
            } else {
                $start = $_GET['start'];
                $end = $_GET['end'];
                $transactions = Transaction::whereBetween('created_at', [$start, $end])->get();
            }
        } else {
            $now = Carbon::now();
            $transactions = Transaction::whereMonth('created_at', $now)->get();
        }

        return view('transaksi.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transaksi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransaksiStore $request)
    {
        try {
            $transaction = Transaction::firstOrCreate($request->validated());

            session()->flash('success', 'Data Transaksi di-Buat !');
            return redirect(route('transaksi.index'));
        } catch (\Throwable $th) {
            session()->flash('error');
            return redirect(route('transaksi.create'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaksi)
    {
        $edit = $transaksi;
        return view('transaksi.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TransaksiUpdate $request, Transaction $transaksi)
    {
        try {
            $transaksi->update($request->validated());

            session()->flash('info', 'Data Transaksi di-Ubah !');
            return redirect(route('transaksi.index'));
        } catch (\Throwable $th) {
            session()->flash('error');
            return redirect(route('transaksi.edit', $transaksi->id));
        }
        dd($transaksi);
        dd($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaksi)
    {
        try {
            $transaksi->delete();
            
            session()->flash('warning', 'Data Transaksi di-Hapus !');
            return redirect(route('transaksi.index'));
        } catch (\Throwable $th) {
            session()->flash('error');
            return redirect(route('transaksi.index'));
        }
        dd($transaksi);
    }
}
