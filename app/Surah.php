<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Surah extends Model
{
	use SoftDeletes;

	protected $dates = ['deleted_at'];

    protected $fillable = [
        'nama_surat',
		
    ];
}
