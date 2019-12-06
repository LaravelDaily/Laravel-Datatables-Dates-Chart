<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

    public $table = 'transactions';

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
        'transaction_date',
    ];

    protected $fillable = [
        'amount',
        'created_at',
        'updated_at',
        'deleted_at',
        'description',
        'transaction_date',
    ];

    public function getTransactionDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setTransactionDateAttribute($value)
    {
        $this->attributes['transaction_date'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function scopeFilterDates($query)
    {
        $date = explode(" - ", request()->input('from-to', "")); 

        if(count($date) != 2)
        {
            $date = [now()->subDays(29)->format("Y-m-d"), now()->format("Y-m-d")];
        }

        return $query->whereBetween('transaction_date', $date);
    }
}
