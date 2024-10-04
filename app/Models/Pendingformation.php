<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendingformation extends Model
{
    const UNDER_REVIEW_STATUS = 'under review';
    const PUBLISHED_STATUS = 'published';
    const REJECTED_STATUS = 'rejected';
    const NO_CONTENT_YET_STATUS = 'No content uploaded yet';
    use HasFactory;
}
