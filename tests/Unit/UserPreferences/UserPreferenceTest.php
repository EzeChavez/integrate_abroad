<?php

namespace Tests\Unit\UserPreferences;

use Tests\TestCase;
use App\Modules\UserPreferences\Models\UserPreference;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserPreferenceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_available_themes()
    {
        $themes = UserPreference::getAvailableThemes();
        
        $this->assertEquals(['light', 'dark'], $themes);
        $this->assertCount(2, $themes);
    }

    /** @test */
    public function it_returns_available_languages()
    {
        $languages = UserPreference::getAvailableLanguages();
        
        $this->assertEquals(['es', 'en'], $languages);
        $this->assertCount(2, $languages);
    }

    /** @test */
    public function user_has_default_theme_and_language()
    {
        $user = User::factory()->create();
        
        $this->assertEquals('light', $user->theme);
        $this->assertEquals('es', $user->language);
    }

    /** @test */
    public function user_can_change_theme_and_language()
    {
        $user = User::factory()->create();
        
        $user->update([
            'theme' => 'dark',
            'language' => 'en',
            'edit_user_id' => $user->id
        ]);
        
        $this->assertEquals('dark', $user->fresh()->theme);
        $this->assertEquals('en', $user->fresh()->language);
    }
} 