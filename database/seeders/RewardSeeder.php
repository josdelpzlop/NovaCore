<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RewardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rewards = [
            [
                'name' => 'Pionero Lunar',
                'slug' => 'pionero_lunar',
                'description' => 'Completar tu primera lección en la academia.',
                'color' => '#94a3b8',
                'text_color' => '#cbd5e1',
                'icon' => '<svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>',
                'requirement_type' => 'lessons',
                'requirement_value' => 1,
            ],
            [
                'name' => 'Cazador Estelar',
                'slug' => 'cazador_estelar',
                'description' => 'Asistir a 5 eventos astronómicos registrados.',
                'color' => '#06b6d4',
                'text_color' => '#67e8f9',
                'icon' => '<svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>',
                'requirement_type' => 'events',
                'requirement_value' => 5,
            ],
            [
                'name' => 'Rey de los Anillos',
                'slug' => 'rey_anillos',
                'description' => 'Completa un total de 5 lecciones de la academia.',
                'color' => '#f59e0b',
                'text_color' => '#fbbf24',
                'icon' => '<svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="6"></circle><path d="M22 12c0-2-8-5-20-3"></path><path d="M22 12c0 2-8 5-20 3"></path></svg>',
                'requirement_type' => 'lessons',
                'requirement_value' => 5,
            ],
            [
                'name' => 'Vuelo Inaugural',
                'slug' => 'vuelo_inaugural',
                'description' => 'Asistir a tu primer evento astronómico.',
                'color' => '#ef4444',
                'text_color' => '#fca5a5',
                'icon' => '<svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M12 15l-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"></path><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"></path></svg>',
                'requirement_type' => 'events',
                'requirement_value' => 1,
            ],
            [
                'name' => 'Leyenda Nova',
                'slug' => 'leyenda_nova',
                'description' => 'Alcanzar el nivel máximo: Ente Espacial (Nivel MAX).',
                'color' => '#fbbf24',
                'text_color' => '#fde68a',
                'icon' => '<svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>',
                'requirement_type' => 'level_max',
                'requirement_value' => 0,
            ],
        ];

        foreach ($rewards as $reward) {
            \App\Models\Reward::create($reward);
        }
    }
}
