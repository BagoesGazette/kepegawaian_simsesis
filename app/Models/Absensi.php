<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;
    protected $table = "tb_import";
    protected $fillable = [
        "name",
        "date",
        "on_duty",
        "off_duty",
        "clock_in",
        "clock_out"
    ];
}
