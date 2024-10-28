<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        $pesanan = Pesanan::all();
        return response()->json([
            'status' => 'success',
            'data' => $pesanan
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => ['required', 'numeric'],
            'hewan_id' => ['required', 'numeric'],
            'layanan_id' => ['required', 'numeric'],
            'tanggal_pesanan' => ['required', 'date'],
            'status' => ['required', 'string'],
            'total_harga' => ['required', 'numeric'],
            'catatan' => ['nullable', 'string', 'max:255'],
        ]);

        $pesanan = Pesanan::create($data);

        return response()->json([
            'status' => 'success',
            'message' => 'Pesanan berhasil dibuat',
            'data' => $pesanan
        ], 201);
    }

    public function show($id)
    {
        $pesanan = Pesanan::find($id);
        
        if (!$pesanan) {
            return response()->json([
                'status' => 'error',
                'message' => 'Pesanan tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $pesanan
        ]);
    }

    public function update(Request $request, $id)
    {
        $pesanan = Pesanan::find($id);

        if (!$pesanan) {
            return response()->json([
                'status' => 'error',
                'message' => 'Pesanan tidak ditemukan'
            ], 404);
        }

        $data = $request->validate([
            'user_id' => ['required', 'numeric'],
            'hewan_id' => ['required', 'numeric'],
            'layanan_id' => ['required', 'numeric'],
            'tanggal_pesanan' => ['required', 'date'],
            'status' => ['required', 'string'],
            'total_harga' => ['required', 'numeric'],
            'catatan' => ['nullable', 'string', 'max:255'],
        ]);

        $pesanan->update($data);

        return response()->json([
            'status' => 'success',
            'message' => 'Pesanan berhasil diperbarui',
            'data' => $pesanan
        ]);
    }

    public function destroy($id)
    {
        $pesanan = Pesanan::find($id);

        if (!$pesanan) {
            return response()->json([
                'status' => 'error',
                'message' => 'Pesanan tidak ditemukan'
            ], 404);
        }

        $pesanan->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Pesanan berhasil dihapus'
        ]);
    }
}
