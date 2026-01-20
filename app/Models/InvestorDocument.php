<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvestorDocument extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'file_path',
        'file_type',
        'description',
        'category',
        'is_public',
        'download_count',
        'is_active',
    ];

    protected $casts = [
        'is_public' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopePublic($query)
    {
        return $query->where('is_public', true);
    }

    public function incrementDownloads()
    {
        $this->increment('download_count');
    }

    public function getCategoryLabelAttribute()
    {
        return match($this->category) {
            'pitch_deck' => 'Pitch Deck',
            'annual_report' => 'Annual Report',
            'financials' => 'Financial Reports',
            'governance' => 'Corporate Governance',
            'other' => 'Other Documents',
            default => ucfirst($this->category),
        };
    }
}
