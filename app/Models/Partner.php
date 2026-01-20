<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partner extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'logo',
        'website',
        'description',
        'type',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }

    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function getTypeLabelAttribute()
    {
        return match($this->type) {
            'technology' => 'Technology Partner',
            'strategic' => 'Strategic Partner',
            'client' => 'Client',
            'investor' => 'Investor',
            default => ucfirst($this->type),
        };
    }
}
