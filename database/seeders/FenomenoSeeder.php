<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fenomeno;
use Illuminate\Support\Str;

class FenomenoSeeder extends Seeder
{
    public function run()
    {
        $fenomenos = [
            [
                'title' => 'Nebulosa de Orión (M42)',
                'description' => 'La Nebulosa de Orión es una de las nebulosas difusas más brillantes del cielo nocturno, visible a simple vista. Situada a unos 1.344 años luz de la Tierra, es la región de formación estelar masiva más cercana a nuestro sistema solar. En su interior se encuentra el famoso Trapecio, un cúmulo abierto de estrellas jóvenes y calientes cuya radiación ultravioleta ioniza el gas circundante, creando el resplandor característico de la nebulosa. Con un diámetro de aproximadamente 24 años luz, M42 contiene suficiente gas y polvo para formar miles de estrellas nuevas. Las observaciones con el telescopio espacial Hubble han revelado numerosos discos protoplanetarios (proplyds) dentro de ella, que algún día podrían dar lugar a nuevos sistemas planetarios.',
                'date' => '2026-04-15',
                'image_path' => 'https://images.unsplash.com/photo-1462331940025-496dfbfc7564?q=80&w=800&auto=format&fit=crop',
            ],
            [
                'title' => 'Eclipse Total de Luna',
                'description' => 'Durante la madrugada del 14 al 15 de abril de 2026, se produjo un eclipse total de Luna visible desde América, Europa occidental y África. La Luna atravesó completamente la sombra de la Tierra (umbra), adquiriendo un intenso tono rojizo cobrizo durante 58 minutos. Este fenómeno, conocido popularmente como "Luna de Sangre", se produce porque la atmósfera terrestre filtra y desvía la luz solar, dejando pasar principalmente las longitudes de onda rojas que iluminan tenuemente la superficie lunar. La magnitud de la umbra alcanzó 1.42, lo que significa que la Luna quedó completamente sumergida en la sombra, produciendo un oscurecimiento especialmente profundo en su borde norte.',
                'date' => '2026-04-15',
                'image_path' => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=800&auto=format&fit=crop',
            ],
            [
                'title' => 'Vía Láctea desde la Tierra',
                'description' => 'La Vía Láctea es nuestra galaxia espiral barrada, compuesta por cientos de miles de millones de estrellas. Desde la Tierra, que se encuentra en uno de sus brazos espirales exteriores, aparece como una banda luminosa y difusa que cruza el cielo nocturno. Esta banda está formada por la luz combinada de incontables estrellas lejanas y nubes interestelares que no pueden distinguirse a simple vista. Su observación en cielos oscuros, lejos de la contaminación lumínica, es uno de los espectáculos naturales más sobrecogedores.',
                'date' => '2026-03-20',
                'image_path' => 'https://images.unsplash.com/photo-1419242902214-272b3f66ee7a?q=80&w=800&auto=format&fit=crop',
            ],
            [
                'title' => 'Pilares de la Creación (M16)',
                'description' => 'Los Pilares de la Creación son columnas de gas interestelar y polvo situadas en la Nebulosa del Águila (M16), a unos 6.500 años luz de la Tierra en la constelación de Serpens. Estas estructuras, inmortalizadas por el telescopio Hubble en 1995, son regiones activas de formación estelar donde la radiación de las estrellas jóvenes cercanas erosiona lentamente el gas, revelando "huevos de estrellas" (EGGs: Evaporating Gaseous Globules) en sus puntas. El pilar más largo mide aproximadamente 4 años luz de altura. Las imágenes del telescopio James Webb en infrarrojo han penetrado el polvo opaco, revelando por primera vez las protoestrellas nacientes ocultas dentro de los pilares.',
                'date' => '2026-02-10',
                'image_path' => 'https://images.unsplash.com/photo-1543722530-d2c3201371e7?q=80&w=800&auto=format&fit=crop',
            ],
            [
                'title' => 'Aurora Boreal Extrema',
                'description' => 'Las auroras boreales son fenómenos luminosos que ocurren en las regiones polares cuando las partículas cargadas procedentes del Sol interactúan con el campo magnético de la Tierra y la alta atmósfera. Las tormentas geomagnéticas intensas pueden provocar auroras espectaculares que se extienden hacia latitudes más bajas de lo habitual, tiñendo el cielo con cortinas danzantes de colores verdes, púrpuras y rojos, dependiendo de los gases atmosféricos excitados.',
                'date' => '2026-01-28',
                'image_path' => 'https://images.unsplash.com/photo-1483086431886-3590a88317fe?q=80&w=800&auto=format&fit=crop',
            ],
        ];

        foreach ($fenomenos as $f) {
            Fenomeno::updateOrCreate(
                ['slug' => Str::slug($f['title'])],
                [
                    'title' => $f['title'],
                    'slug' => Str::slug($f['title']),
                    'description' => $f['description'],
                    'date' => $f['date'],
                    'image_path' => $f['image_path'],
                ]
            );
        }

        echo "Creados " . Fenomeno::count() . " fenómenos.\n";
    }
}
