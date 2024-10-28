<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';

    protected $fillable = [
        'user_id',
        'hewan_id',
        'layanan_id',
        'tanggal_pesanan',
        'status',
        'total_harga',
        'catatan'
    ];

    protected $casts = [
        'tanggal_pesanan' => 'date',
        'total_harga' => 'decimal:2'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function hewan()
    {
        return $this->belongsTo(Hewan::class);
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }
}
