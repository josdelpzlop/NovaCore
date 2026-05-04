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
            ],
            [
                'title' => 'Eclipse Total de Luna - Abril 2026',
                'description' => 'Durante la madrugada del 14 al 15 de abril de 2026, se produjo un eclipse total de Luna visible desde América, Europa occidental y África. La Luna atravesó completamente la sombra de la Tierra (umbra), adquiriendo un intenso tono rojizo cobrizo durante 58 minutos. Este fenómeno, conocido popularmente como "Luna de Sangre", se produce porque la atmósfera terrestre filtra y desvía la luz solar, dejando pasar principalmente las longitudes de onda rojas que iluminan tenuemente la superficie lunar. La magnitud de la umbra alcanzó 1.42, lo que significa que la Luna quedó completamente sumergida en la sombra, produciendo un oscurecimiento especialmente profundo en su borde norte.',
                'date' => '2026-04-15',
            ],
            [
                'title' => 'Tránsito de Mercurio',
                'description' => 'Un tránsito de Mercurio ocurre cuando el planeta más pequeño del sistema solar pasa directamente entre la Tierra y el Sol, apareciendo como un diminuto punto negro moviéndose lentamente por el disco solar. Este evento astronómico se produce aproximadamente 13 veces por siglo, ya que la órbita de Mercurio está inclinada 7° respecto al plano de la eclíptica. Históricamente, los tránsitos de Mercurio fueron cruciales para calcular la distancia Tierra-Sol (Unidad Astronómica). Con telescopios modernos equipados con filtros solares, se puede observar el pequeño disco de Mercurio (apenas 1/194 del diámetro aparente del Sol) cruzando la fotosfera en aproximadamente 5 horas y media.',
                'date' => '2026-03-20',
            ],
            [
                'title' => 'Pilares de la Creación (M16)',
                'description' => 'Los Pilares de la Creación son columnas de gas interestelar y polvo situadas en la Nebulosa del Águila (M16), a unos 6.500 años luz de la Tierra en la constelación de Serpens. Estas estructuras, inmortalizadas por el telescopio Hubble en 1995, son regiones activas de formación estelar donde la radiación de las estrellas jóvenes cercanas erosiona lentamente el gas, revelando "huevos de estrellas" (EGGs: Evaporating Gaseous Globules) en sus puntas. El pilar más largo mide aproximadamente 4 años luz de altura. Las imágenes del telescopio James Webb en infrarrojo han penetrado el polvo opaco, revelando por primera vez las protoestrellas nacientes ocultas dentro de los pilares.',
                'date' => '2026-02-10',
            ],
            [
                'title' => 'Conjunción Venus-Júpiter',
                'description' => 'Una de las conjunciones planetarias más espectaculares del año se produjo cuando Venus y Júpiter, los dos objetos más brillantes del cielo nocturno después de la Luna, se acercaron a tan solo 0.3° de separación angular. A simple vista parecían casi fundirse en un único punto de luz deslumbrante en el cielo del atardecer. Venus, con una magnitud aparente de -4.1, y Júpiter, con -2.3, crearon un espectáculo visible incluso desde ciudades con contaminación lumínica. A pesar de su aparente cercanía, los dos planetas estaban separados por más de 600 millones de kilómetros en el espacio. Este tipo de conjunción estrecha ocurre aproximadamente cada 2 años.',
                'date' => '2026-01-28',
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
                    'image_path' => null,
                ]
            );
        }

        echo "Creados " . Fenomeno::count() . " fenómenos.\n";
    }
}
