<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TranslationHistory extends Model
{
    protected $table = 'translation_history';

    protected $fillable = [
        'user_id',
        'translation_type',
        'original_filename',
        'translated_filename',
        'source_language',
        'target_language',
        'storage_path',
        'signed_url_expires_at',
        'source_text',
        'translated_text',
    ];

    protected $casts = [
        'signed_url_expires_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
