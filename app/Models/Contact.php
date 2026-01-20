<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'company',
        'subject',
        'message',
        'inquiry_type',
        'status',
        'admin_notes',
        'ip_address',
    ];

    public function scopeNew($query)
    {
        return $query->where('status', 'new');
    }

    public function getStatusLabelAttribute()
    {
        return match($this->status) {
            'new' => 'New',
            'read' => 'Read',
            'replied' => 'Replied',
            'archived' => 'Archived',
            default => ucfirst($this->status),
        };
    }

    public function getStatusColorAttribute()
    {
        return match($this->status) {
            'new' => 'blue',
            'read' => 'yellow',
            'replied' => 'green',
            'archived' => 'gray',
            default => 'gray',
        };
    }

    public function getInquiryTypeLabelAttribute()
    {
        return match($this->inquiry_type) {
            'general' => 'General Inquiry',
            'demo' => 'Demo Request',
            'partnership' => 'Partnership',
            'support' => 'Support',
            'careers' => 'Careers',
            'investment' => 'Investment',
            default => ucfirst($this->inquiry_type),
        };
    }
}
