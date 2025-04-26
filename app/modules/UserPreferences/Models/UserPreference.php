<?php

namespace App\Modules\UserPreferences\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserPreference extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'theme',
        'language',
        'edit_user_id'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the user that owns the preferences.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the user that last edited the preferences.
     */
    public function editUser()
    {
        return $this->belongsTo(User::class, 'edit_user_id');
    }

    /**
     * Available themes
     */
    public static function getAvailableThemes(): array
    {
        return ['light', 'dark'];
    }

    /**
     * Available languages
     */
    public static function getAvailableLanguages(): array
    {
        return ['es', 'en'];
    }
} 