<?php

namespace Tests\Feature;

use App\Models\Asesor;
use App\Models\Scheme;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Cache;
use Tests\TestCase;

class AsesorCacheTest extends TestCase
{
    use RefreshDatabase;

    public function test_asesor_index_caches_asesors()
    {
        $scheme = Scheme::create([
            'code' => 'TEST01',
            'name' => 'Test Scheme',
            'is_active' => true,
        ]);
        Asesor::create([
            'name' => 'Test Asesor',
            'reg_number' => 'REG01',
            'scheme_id' => $scheme->id,
            'is_active' => true,
        ]);

        $this->assertFalse(Cache::has('asesors_active_with_scheme'));

        $response = $this->get('/uji-kompetensi/asesor');

        $this->assertTrue(Cache::has('asesors_active_with_scheme'));
    }

    public function test_asesor_save_clears_cache()
    {
        Cache::put('asesors_active_with_scheme', 'test');
        $this->assertTrue(Cache::has('asesors_active_with_scheme'));

        $scheme = Scheme::create([
            'code' => 'TEST01',
            'name' => 'Test Scheme',
            'is_active' => true,
        ]);
        Asesor::create([
            'name' => 'Test Asesor',
            'reg_number' => 'REG01',
            'scheme_id' => $scheme->id,
            'is_active' => true,
        ]);

        $this->assertFalse(Cache::has('asesors_active_with_scheme'));
    }

    public function test_scheme_save_clears_cache()
    {
        Cache::put('asesors_active_with_scheme', 'test');
        $this->assertTrue(Cache::has('asesors_active_with_scheme'));

        Scheme::create([
            'code' => 'TEST01',
            'name' => 'Test Scheme',
            'is_active' => true,
        ]);

        $this->assertFalse(Cache::has('asesors_active_with_scheme'));
    }
}
