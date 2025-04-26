<?php

namespace Tests\Feature\UserPreferences;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserPreferenceControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guest_cannot_access_preferences_page()
    {
        $response = $this->get(route('user-preferences.index'));
        
        $response->assertRedirect(route('login'));
    }

    /** @test */
    public function authenticated_user_can_view_preferences_page()
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)
            ->get(route('user-preferences.index'));
        
        $response->assertOk();
        $response->assertViewIs('UserPreferences.Views.Index');
        $response->assertViewHas(['preferences', 'availableThemes', 'availableLanguages']);
    }

    /** @test */
    public function user_can_update_preferences()
    {
        $user = User::factory()->create([
            'theme' => 'light',
            'language' => 'es'
        ]);
        
        $response = $this->actingAs($user)
            ->put(route('user-preferences.update'), [
                'theme' => 'dark',
                'language' => 'en'
            ]);
        
        $response->assertRedirect();
        $response->assertSessionHas('message', 'Preferencias actualizadas correctamente.');
        
        $this->assertEquals('dark', $user->fresh()->theme);
        $this->assertEquals('en', $user->fresh()->language);
    }

    /** @test */
    public function user_cannot_update_preferences_with_invalid_theme()
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)
            ->put(route('user-preferences.update'), [
                'theme' => 'invalid-theme',
                'language' => 'es'
            ]);
        
        $response->assertSessionHasErrors('theme');
    }

    /** @test */
    public function user_cannot_update_preferences_with_invalid_language()
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)
            ->put(route('user-preferences.update'), [
                'theme' => 'light',
                'language' => 'invalid-language'
            ]);
        
        $response->assertSessionHasErrors('language');
    }

    /** @test */
    public function it_tracks_who_edited_preferences()
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)
            ->put(route('user-preferences.update'), [
                'theme' => 'dark',
                'language' => 'en'
            ]);
        
        $this->assertEquals($user->id, $user->fresh()->edit_user_id);
    }
} 