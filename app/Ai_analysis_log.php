<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ai_analysis_log extends Model
{
    protected $fillable = [
        'image_path',
        'success',
        'message',
        'class',
        'confidence',
        'request_timestamp',
        'response_timestamp'
    ];
}
