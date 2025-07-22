<?php

namespace App\Models;

use App\Models\Pms;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Customer extends Model
{
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'customer_name',
        'os_server',
        'ip_server',
        'server_type',
        'interface_note',
        'pms_id'
    ];

    public function pms()
    {
        return $this->belongsTo(Pms::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // handle uuid
            $model->id = (string) Str::uuid();
        });
    }
}
