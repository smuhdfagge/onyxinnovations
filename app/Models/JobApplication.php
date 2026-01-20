<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_listing_id',
        'name',
        'email',
        'phone',
        'resume',
        'cover_letter',
        'linkedin',
        'portfolio',
        'additional_info',
        'status',
        'admin_notes',
    ];

    public function listing()
    {
        return $this->belongsTo(JobListing::class, 'job_listing_id');
    }

    public function getStatusLabelAttribute()
    {
        return match($this->status) {
            'new' => 'New',
            'reviewing' => 'Under Review',
            'shortlisted' => 'Shortlisted',
            'interviewed' => 'Interviewed',
            'offered' => 'Offer Made',
            'rejected' => 'Rejected',
            'hired' => 'Hired',
            default => ucfirst($this->status),
        };
    }

    public function getStatusColorAttribute()
    {
        return match($this->status) {
            'new' => 'blue',
            'reviewing' => 'yellow',
            'shortlisted' => 'indigo',
            'interviewed' => 'purple',
            'offered' => 'green',
            'rejected' => 'red',
            'hired' => 'emerald',
            default => 'gray',
        };
    }
}
