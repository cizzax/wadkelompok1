<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
{
    $pelanggan = Pelanggan::orderBy('id', 'asc')->get();
    return view('pelanggan.index', compact('pelanggan'));
}
    public function create()
    {
        return view('pelanggan.tambah');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|max:255',
            'nomor' => 'required|string|max:20',
            'levelmember' => 'required|in:Basic,Gold,VIP',
        ]);

        Pelanggan::create($data);

        return redirect()
            ->route('pelanggan.index')
            ->with('success', 'Member berhasil ditambahkan.');
    }

    public function edit(Pelanggan $pelanggan)
    {
        return view('pelanggan.edit', compact('pelanggan'));
    }

    public function update(Request $request, Pelanggan $pelanggan)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|max:255',
            'nomor' => 'required|string|max:20',
            'levelmember' => 'required|in:Basic,Gold,VIP',
        ]);

        $pelanggan->update($data);

        return redirect()
            ->route('pelanggan.index')
            ->with('success', 'Member berhasil diperbarui.');
    }

    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();

        return redirect()
            ->route('pelanggan.index')
            ->with('success', 'Member berhasil dihapus.');
    }
}
