<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code', 'alamat', 'npwp', 'bpjs', 'nama_bank', 'no_rekening', 'nama_akun'];

}
