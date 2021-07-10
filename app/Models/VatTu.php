<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VatTu extends Model
{
    protected $fillable = [
        'Ten', 'DonViTinh', 'Phong', 'LoaiVT'
    ];

    protected $table = 'VatTu';

    protected $primaryKey = 'ID';
}
