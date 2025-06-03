<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $fillable = ['nama', 'nip', 'gender', 'alamat', 'kontak', 'email', 'foto'];

    public function pkls()
    {
        return $this->hasMany(Pkl::class);
    }

    public function infoGender(): string
    {
        return match ($this->gender) {
            'L' => 'Laki-laki',
            'P' => 'Perempuan',
            default => 'Tidak diketahui',
        };
    }
}
