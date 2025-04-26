<?php

namespace Tests\Feature\Layout;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ResponsiveLayoutTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Simula un User-Agent móvil
     */
    protected function setMobileUserAgent()
    {
        $this->withHeaders([
            'User-Agent' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0 Mobile/15E148 Safari/604.1'
        ]);
    }

    /**
     * Simula un User-Agent de escritorio
     */
    protected function setDesktopUserAgent()
    {
        $this->withHeaders([
            'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'
        ]);
    }

    /**
     * @test
     */
    public function mobile_navigation_is_present_in_layout()
    {
        $user = User::factory()->create();
        $this->setMobileUserAgent();
        
        $response = $this->actingAs($user)
            ->get('/dashboard');

        $response->assertStatus(200);
        $response->assertSee('mobile-menu-button');
        $response->assertSee('md:hidden'); // Clase para ocultar en desktop
    }

    /**
     * @test
     */
    public function desktop_navigation_is_present_in_layout()
    {
        $user = User::factory()->create();
        $this->setDesktopUserAgent();
        
        $response = $this->actingAs($user)
            ->get('/dashboard');

        $response->assertStatus(200);
        $response->assertSee('hidden md:flex'); // Clase para mostrar en desktop
    }

    /**
     * @test
     */
    public function user_menu_is_present_in_desktop_layout()
    {
        $user = User::factory()->create([
            'name' => 'Test User'
        ]);
        $this->setDesktopUserAgent();
        
        $response = $this->actingAs($user)
            ->get('/dashboard');

        $response->assertStatus(200);
        $response->assertSee('Test User');
        $response->assertSee('Profile');
        $response->assertSee('Log Out');
    }

    /**
     * @test
     */
    public function mobile_bottom_navigation_is_present()
    {
        $user = User::factory()->create();
        $this->setMobileUserAgent();
        
        $response = $this->actingAs($user)
            ->get('/dashboard');

        $response->assertStatus(200);
        $response->assertSee('fixed bottom-0');
        $response->assertSee('md:hidden');
    }
} 