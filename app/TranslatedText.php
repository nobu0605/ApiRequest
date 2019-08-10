<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TranslatedText extends Model
{
    protected $fillable = [
        'output_type',
        'inputText',
        'translatedText',
        'request_timestamp',
        'response_timestamp'
    ];
}
