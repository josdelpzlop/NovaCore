<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Level;
use App\Models\Lesson;
use App\Models\Event;
use App\Models\Reward;
use App\Models\Rank;
use App\Models\User;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class MasterContentSeeder extends Seeder
{
    public function run()
    {
        // ===== 1. MAKE ADMIN USER =====
        $admin = User::where('email', 'admin@gmail.com')->first();
        if ($admin) {
            $admin->role = 'admin';
            $admin->password = Hash::make('12345678');
            $admin->save();
            echo "Usuario admin@gmail.com actualizado a admin.\n";
        }

        // ===== 2. RANKS =====
        Rank::truncate();
        Rank::create(['number' => 1, 'title' => 'Explorador Novato', 'min_xp' => 0, 'color' => '#1cc88a']);
        Rank::create(['number' => 2, 'title' => 'Astronauta Curioso', 'min_xp' => 200, 'color' => '#36b9cc']);
        Rank::create(['number' => 3, 'title' => 'Ingeniero de Vuelo', 'min_xp' => 600, 'color' => '#4e73df']);
        Rank::create(['number' => 4, 'title' => 'Ayudante Estelar', 'min_xp' => 1000, 'color' => '#eab308']);
        Rank::create(['number' => 'MAX', 'title' => 'Ente Espacial', 'min_xp' => 2000, 'color' => '#a855f7']);

        // ===== 3. LEVELS =====
        Level::query()->delete();
        $l1 = Level::create(['title'=>'Sistema Solar','slug'=>'sistema-solar','badge'=>'Iniciado','description'=>'Explora nuestro vecindario cósmico, desde el ardiente Sol hasta los confines de Plutón.']);
        $l2 = Level::create(['title'=>'Vida de las Estrellas','slug'=>'vida-de-las-estrellas','badge'=>'Intermedio','description'=>'Descubre cómo nacen, viven y mueren los motores termonucleares del universo.']);
        $l3 = Level::create(['title'=>'Relatividad y Tiempo','slug'=>'relatividad-y-tiempo','badge'=>'Avanzado','description'=>'Adéntrate en los misterios de Einstein, la curvatura del espacio y los agujeros negros.']);

        // ===== 4. LESSONS =====
        \DB::table('lesson_user')->truncate();
        Lesson::query()->delete();

        // -- Nivel 1: Sistema Solar --
        Lesson::create(['level_id'=>$l1->id,'title'=>'El Sol: Nuestra Estrella','slug'=>'el-sol-nuestra-estrella','type'=>'text','order'=>1,
            'content'=>'<h2>🌞 El Corazón del Sistema Solar</h2><p>El Sol es una estrella de tipo espectral G2V situada en el centro de nuestro sistema solar. Representa el <strong>99.86%</strong> de la masa total del sistema y su gravedad mantiene en órbita a todos los planetas, asteroides y cometas.</p><h3>Datos Fundamentales</h3><ul><li><strong>Diámetro:</strong> 1.392.700 km (109 veces el de la Tierra)</li><li><strong>Temperatura superficial:</strong> ~5.500 °C</li><li><strong>Temperatura del núcleo:</strong> ~15 millones de °C</li><li><strong>Edad:</strong> ~4.600 millones de años</li></ul><h3>Fusión Nuclear</h3><p>En el núcleo del Sol, los átomos de hidrógeno se fusionan para formar helio mediante la <em>cadena protón-protón</em>. Este proceso libera enormes cantidades de energía en forma de luz y calor. Cada segundo, el Sol convierte aproximadamente <strong>600 millones de toneladas</strong> de hidrógeno en helio.</p><p>La luz solar tarda unos <strong>8 minutos y 20 segundos</strong> en llegar a la Tierra, recorriendo 150 millones de kilómetros a la velocidad de la luz.</p>']);

        Lesson::create(['level_id'=>$l1->id,'title'=>'Los Planetas Rocosos','slug'=>'los-planetas-rocosos','type'=>'text','order'=>2,
            'content'=>'<h2>🪨 Mercurio, Venus, Tierra y Marte</h2><p>Los cuatro planetas más cercanos al Sol se conocen como <strong>planetas rocosos</strong> o terrestres. Tienen superficies sólidas compuestas de roca y metal.</p><h3>Mercurio</h3><p>El planeta más pequeño y cercano al Sol. Su temperatura oscila entre -180°C y 430°C. No tiene atmósfera significativa ni lunas.</p><h3>Venus</h3><p>Conocido como el "gemelo malvado" de la Tierra. Su densa atmósfera de CO₂ crea un efecto invernadero extremo con temperaturas de <strong>465°C</strong>, más caliente que Mercurio.</p><h3>Tierra</h3><p>Nuestro hogar. El único planeta conocido que alberga vida. Su atmósfera rica en nitrógeno y oxígeno, junto con agua líquida, la hacen única.</p><h3>Marte</h3><p>El "planeta rojo" debe su color al óxido de hierro. Tiene el volcán más grande del sistema solar: <strong>Olympus Mons</strong> (21 km de altura).</p>']);

        Lesson::create(['level_id'=>$l1->id,'title'=>'Los Gigantes Gaseosos','slug'=>'los-gigantes-gaseosos','type'=>'text','order'=>3,
            'content'=>'<h2>🪐 Júpiter, Saturno, Urano y Neptuno</h2><p>Más allá del cinturón de asteroides se encuentran los gigantes del sistema solar, planetas masivos compuestos principalmente de gas y hielo.</p><h3>Júpiter</h3><p>El planeta más grande. Su <strong>Gran Mancha Roja</strong> es una tormenta que lleva activa más de 400 años. Tiene al menos 95 lunas conocidas, incluyendo las cuatro lunas galileanas: Ío, Europa, Ganímedes y Calisto.</p><h3>Saturno</h3><p>Famoso por sus espectaculares anillos de hielo y roca. Aunque todos los gigantes gaseosos tienen anillos, los de Saturno son los más visibles y extensos.</p><h3>Urano y Neptuno</h3><p>Conocidos como <em>gigantes de hielo</em>. Urano tiene una inclinación axial extrema de 98°, rodando de lado en su órbita. Neptuno tiene los vientos más rápidos del sistema solar, superando los <strong>2.000 km/h</strong>.</p>']);

        $quiz1 = json_encode([
            ['question'=>'¿Qué porcentaje de la masa del sistema solar representa el Sol?','options'=>['50%','75%','99.86%','85%'],'correct'=>2],
            ['question'=>'¿Cuál es el planeta más caliente del sistema solar?','options'=>['Mercurio','Venus','Marte','Júpiter'],'correct'=>1],
            ['question'=>'¿Qué planeta tiene el volcán Olympus Mons?','options'=>['Venus','Tierra','Marte','Júpiter'],'correct'=>2],
            ['question'=>'¿Cuántas lunas galileanas tiene Júpiter?','options'=>['2','4','8','12'],'correct'=>1],
            ['question'=>'¿Qué planeta rota "de lado" con una inclinación de 98°?','options'=>['Neptuno','Saturno','Urano','Júpiter'],'correct'=>2],
        ]);
        Lesson::create(['level_id'=>$l1->id,'title'=>'Examen del Sistema Solar','slug'=>'examen-sistema-solar','type'=>'quiz','order'=>4,'content'=>$quiz1]);

        // -- Nivel 2: Vida de las Estrellas --
        Lesson::create(['level_id'=>$l2->id,'title'=>'Nacimiento en Nebulosas','slug'=>'nacimiento-en-nebulosas','type'=>'text','order'=>1,
            'content'=>'<h2>🌌 De Polvo a Estrellas</h2><p>Las estrellas nacen en inmensas nubes de gas y polvo llamadas <strong>nebulosas</strong>. Estas nubes pueden tener cientos de años luz de diámetro y contienen principalmente hidrógeno y helio.</p><h3>El Proceso de Formación</h3><ol><li><strong>Fragmentación:</strong> Perturbaciones gravitacionales (como ondas de choque de supernovas cercanas) causan que regiones de la nebulosa colapsen.</li><li><strong>Protoestrella:</strong> El gas se comprime y calienta, formando un núcleo denso llamado protoestrella.</li><li><strong>Ignición nuclear:</strong> Cuando la temperatura del núcleo alcanza ~10 millones de °C, comienza la fusión del hidrógeno y nace una estrella.</li></ol><h3>Nebulosas Famosas</h3><ul><li><strong>Nebulosa de Orión (M42):</strong> La guardería estelar más cercana, a 1.344 años luz</li><li><strong>Pilares de la Creación:</strong> Columnas de gas en la Nebulosa del Águila (M16)</li><li><strong>Nebulosa de la Tarántula:</strong> La región de formación estelar más activa del Grupo Local</li></ul>']);

        Lesson::create(['level_id'=>$l2->id,'title'=>'Secuencia Principal','slug'=>'secuencia-principal','type'=>'text','order'=>2,
            'content'=>'<h2>⭐ La Vida Adulta de una Estrella</h2><p>Una vez que una estrella inicia la fusión nuclear estable, entra en la <strong>secuencia principal</strong>, donde pasará la mayor parte de su vida. Nuestro Sol lleva 4.600 millones de años en esta fase y le quedan otros 5.000 millones.</p><h3>Diagrama Hertzsprung-Russell</h3><p>Los astrónomos clasifican las estrellas según su temperatura y luminosidad en el diagrama H-R. Las estrellas de la secuencia principal forman una banda diagonal que va desde estrellas rojas frías y tenues hasta azules calientes y brillantes.</p><h3>Clasificación Espectral</h3><p>Las estrellas se clasifican con las letras <strong>O, B, A, F, G, K, M</strong> (de más caliente a más fría). Nuestro Sol es tipo G2V:</p><ul><li><strong>O y B:</strong> Azules, >10.000°C, vida corta (millones de años)</li><li><strong>G:</strong> Amarillas, ~5.500°C, vida media (~10.000 millones de años)</li><li><strong>M:</strong> Rojas, <3.500°C, vida muy larga (billones de años)</li></ul>']);

        Lesson::create(['level_id'=>$l2->id,'title'=>'Muerte Estelar: Gigantes y Supernovas','slug'=>'muerte-estelar','type'=>'text','order'=>3,
            'content'=>'<h2>💥 El Final de las Estrellas</h2><p>El destino final de una estrella depende de su <strong>masa</strong>.</p><h3>Estrellas de Baja Masa (como el Sol)</h3><p>Al agotar el hidrógeno, la estrella se expande convirtiéndose en una <strong>gigante roja</strong>. Las capas exteriores se expulsan formando una nebulosa planetaria, y el núcleo se contrae en una <strong>enana blanca</strong>: un objeto del tamaño de la Tierra pero con la masa del Sol.</p><h3>Estrellas Masivas</h3><p>Las estrellas con más de 8 masas solares mueren de forma espectacular en una <strong>supernova</strong>, liberando más energía en segundos que el Sol en toda su vida. El núcleo restante puede formar:</p><ul><li><strong>Estrella de neutrones:</strong> Un objeto de apenas 20 km de diámetro pero con 1.4-2 masas solares</li><li><strong>Agujero negro:</strong> Si la masa del núcleo supera ~3 masas solares, nada puede detener el colapso</li></ul>']);

        $quiz2 = json_encode([
            ['question'=>'¿Dónde nacen las estrellas?','options'=>['En agujeros negros','En nebulosas','En planetas gaseosos','En el vacío'],'correct'=>1],
            ['question'=>'¿A qué temperatura comienza la fusión nuclear en una protoestrella?','options'=>['1.000 °C','100.000 °C','10 millones de °C','1.000 millones de °C'],'correct'=>2],
            ['question'=>'¿Qué tipo espectral es nuestro Sol?','options'=>['O2','A1','G2','M5'],'correct'=>2],
            ['question'=>'¿Qué queda tras la muerte de una estrella masiva?','options'=>['Enana blanca','Nebulosa solar','Estrella de neutrones o agujero negro','Un nuevo planeta'],'correct'=>2],
        ]);
        Lesson::create(['level_id'=>$l2->id,'title'=>'Quiz: Ciclo Estelar','slug'=>'quiz-ciclo-estelar','type'=>'quiz','order'=>4,'content'=>$quiz2]);

        // -- Nivel 3: Relatividad y Tiempo --
        Lesson::create(['level_id'=>$l3->id,'title'=>'Relatividad Especial','slug'=>'relatividad-especial','type'=>'text','order'=>1,
            'content'=>'<h2>⚡ La Revolución de 1905</h2><p>En 1905, Albert Einstein publicó la <strong>Teoría de la Relatividad Especial</strong>, cambiando para siempre nuestra comprensión del espacio y el tiempo.</p><h3>Los Dos Postulados</h3><ol><li>Las leyes de la física son iguales para todos los observadores en movimiento uniforme</li><li>La velocidad de la luz en el vacío es constante (~300.000 km/s) para todos los observadores</li></ol><h3>Consecuencias</h3><ul><li><strong>Dilatación del tiempo:</strong> Un reloj en movimiento marca el tiempo más lento que uno en reposo. A 90% de la velocidad de la luz, el tiempo se ralentiza un 56%</li><li><strong>Contracción de la longitud:</strong> Los objetos se acortan en la dirección del movimiento</li><li><strong>E = mc²:</strong> La masa y la energía son equivalentes. Una pequeña cantidad de masa contiene una enorme energía</li></ul>']);

        Lesson::create(['level_id'=>$l3->id,'title'=>'Espacio-Tiempo Curvo','slug'=>'espacio-tiempo-curvo','type'=>'text','order'=>2,
            'content'=>'<h2>🕳️ La Relatividad General</h2><p>En 1915, Einstein extendió su teoría con la <strong>Relatividad General</strong>: la gravedad no es una fuerza, sino la curvatura del espacio-tiempo causada por la masa y la energía.</p><h3>La Analogía de la Cama Elástica</h3><p>Imagina una cama elástica estirada. Si colocas una bola de bolos en el centro, la tela se deforma. Cualquier canica que pases cerca rodará hacia la bola, no porque sea "atraída", sino porque sigue la curvatura de la tela. Así funciona la gravedad según Einstein.</p><h3>Predicciones Confirmadas</h3><ul><li><strong>Deflexión de la luz:</strong> La luz se curva al pasar cerca de objetos masivos (confirmado en el eclipse de 1919)</li><li><strong>Ondas gravitacionales:</strong> Ondulaciones en el espacio-tiempo, detectadas por LIGO en 2015</li><li><strong>Dilatación gravitacional:</strong> Los relojes van más lentos en campos gravitatorios intensos. Los satélites GPS deben corregir este efecto</li></ul>']);

        Lesson::create(['level_id'=>$l3->id,'title'=>'Agujeros Negros','slug'=>'agujeros-negros','type'=>'text','order'=>3,
            'content'=>'<h2>🕳️ Los Monstruos del Cosmos</h2><p>Un agujero negro es una región del espacio donde la gravedad es tan intensa que <strong>nada puede escapar</strong>, ni siquiera la luz.</p><h3>Anatomía de un Agujero Negro</h3><ul><li><strong>Singularidad:</strong> El punto central de densidad infinita</li><li><strong>Horizonte de eventos:</strong> El "punto de no retorno" desde donde nada puede escapar</li><li><strong>Disco de acreción:</strong> Material supercaliente orbitando el agujero negro a velocidades relativistas</li><li><strong>Chorros relativistas:</strong> Algunos agujeros negros lanzan jets de partículas a casi la velocidad de la luz</li></ul><h3>Tipos de Agujeros Negros</h3><ul><li><strong>Estelares:</strong> 3-100 masas solares, formados por supernovas</li><li><strong>Supermasivos:</strong> Millones a miles de millones de masas solares, en centros galácticos</li><li><strong>Sagitario A*:</strong> El agujero negro supermasivo en el centro de la Vía Láctea (~4 millones de masas solares)</li></ul>']);

        $quiz3 = json_encode([
            ['question'=>'¿En qué año publicó Einstein la Relatividad Especial?','options'=>['1895','1905','1915','1925'],'correct'=>1],
            ['question'=>'¿Qué famosa ecuación relaciona masa y energía?','options'=>['F = ma','E = mc²','PV = nRT','a² + b² = c²'],'correct'=>1],
            ['question'=>'Según la Relatividad General, ¿qué es la gravedad?','options'=>['Una fuerza de atracción','Curvatura del espacio-tiempo','Magnetismo inverso','Energía oscura'],'correct'=>1],
            ['question'=>'¿Cómo se llama el agujero negro del centro de la Vía Láctea?','options'=>['Cygnus X-1','Andrómeda Prime','Sagitario A*','TON 618'],'correct'=>2],
            ['question'=>'¿Qué es el horizonte de eventos?','options'=>['El borde del universo','El punto de no retorno de un agujero negro','El límite de la atmósfera','La órbita de Plutón'],'correct'=>1],
        ]);
        Lesson::create(['level_id'=>$l3->id,'title'=>'Desafío de Einstein','slug'=>'desafio-einstein','type'=>'quiz','order'=>4,'content'=>$quiz3]);

        // ===== 5. EVENTS =====
        Event::query()->delete();
        $events = [
            ['title'=>'Lluvia de Estrellas Perseidas','description'=>'Observa una de las lluvias de meteoros más espectaculares del año. Las Perseidas producen hasta 100 meteoros por hora, creando un espectáculo celestial inolvidable.','location'=>'Observatorio Virtual NovaCore','xp_reward'=>200,'days'=>5],
            ['title'=>'Eclipse Solar Anular','description'=>'Un anillo de fuego en el cielo. La Luna cubrirá el centro del Sol dejando visible un brillante aro dorado. Transmisión en vivo con telescopios profesionales.','location'=>'Transmisión en Vivo - Sala Principal','xp_reward'=>300,'days'=>12],
            ['title'=>'Superluna de Sangre','description'=>'Eclipse lunar total donde la Luna se tiñe de un intenso rojo cobrizo. Aprenderemos sobre la dispersión de Rayleigh y por qué la Luna no desaparece durante el eclipse.','location'=>'Observatorio Norte','xp_reward'=>150,'days'=>20],
            ['title'=>'Alineación Planetaria Júpiter-Saturno','description'=>'Gran conjunción de Júpiter y Saturno, un evento que ocurre cada 20 años. Ambos gigantes aparecerán separados por menos de 0.1° en el cielo nocturno.','location'=>'Planetario Digital','xp_reward'=>250,'days'=>30],
            ['title'=>'Noche de Observación de Andrómeda','description'=>'Sesión especial dedicada a observar la galaxia de Andrómeda (M31), nuestra vecina galáctica a 2.5 millones de años luz. Aprenderemos técnicas de astrofotografía.','location'=>'Telescopio Principal','xp_reward'=>175,'days'=>8],
            ['title'=>'Taller de Astrofotografía Lunar','description'=>'Aprende a capturar impresionantes fotografías de la Luna con tu smartphone y telescopio. Técnicas de exposición, composición y procesado digital.','location'=>'Aula Cósmica - Sala B','xp_reward'=>100,'days'=>15],
            ['title'=>'Paso del Cometa C/2024','description'=>'Un cometa de periodo largo visitará el sistema solar interior. Será visible a simple vista y mostrará una cola espectacular de varios grados de longitud.','location'=>'Terraza de Observación','xp_reward'=>350,'days'=>45],
        ];
        foreach ($events as $e) {
            Event::create(['title'=>$e['title'],'slug'=>Str::slug($e['title']),'description'=>$e['description'],'event_date'=>Carbon::now()->addDays($e['days']),'location'=>$e['location'],'status'=>'upcoming','xp_reward'=>$e['xp_reward']]);
        }

        // ===== 6. REWARDS =====
        Reward::query()->delete();
        $rocketIcon = '<svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M12 15l-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"></path></svg>';
        $moonIcon = '<svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>';
        $starIcon = '<svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>';
        $sunIcon = '<svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line></svg>';
        $ringIcon = '<svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="6"></circle><path d="M22 12c0-2-8-5-20-3"></path><path d="M22 12c0 2-8 5-20 3"></path></svg>';
        $telescopeIcon = '<svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-9-9m0 0L6 6m6 6l6-6M3 21l6-6"></path></svg>';

        $rewards = [
            ['name'=>'Pionero Lunar','slug'=>'pionero_lunar','description'=>'Completar tu primera lección en la academia.','color'=>'#94a3b8','text_color'=>'#cbd5e1','icon'=>$moonIcon,'requirement_type'=>'lessons','requirement_value'=>1],
            ['name'=>'Vuelo Inaugural','slug'=>'vuelo_inaugural','description'=>'Asistir a tu primer evento astronómico.','color'=>'#ef4444','text_color'=>'#fca5a5','icon'=>$rocketIcon,'requirement_type'=>'events','requirement_value'=>1],
            ['name'=>'Estudiante Estelar','slug'=>'estudiante_estelar','description'=>'Completar 3 lecciones de la academia cósmica.','color'=>'#3b82f6','text_color'=>'#93c5fd','icon'=>$starIcon,'requirement_type'=>'lessons','requirement_value'=>3],
            ['name'=>'Rey de los Anillos','slug'=>'rey_anillos','description'=>'Completar 5 lecciones de la academia.','color'=>'#f59e0b','text_color'=>'#fbbf24','icon'=>$ringIcon,'requirement_type'=>'lessons','requirement_value'=>5],
            ['name'=>'Cazador Estelar','slug'=>'cazador_estelar','description'=>'Asistir a 3 eventos astronómicos.','color'=>'#06b6d4','text_color'=>'#67e8f9','icon'=>$starIcon,'requirement_type'=>'events','requirement_value'=>3],
            ['name'=>'Viajero del Cosmos','slug'=>'viajero_cosmos','description'=>'Asistir a 5 eventos astronómicos registrados.','color'=>'#8b5cf6','text_color'=>'#c4b5fd','icon'=>$rocketIcon,'requirement_type'=>'events','requirement_value'=>5],
            ['name'=>'Maestro del Universo','slug'=>'maestro_universo','description'=>'Completar todas las lecciones disponibles (10).','color'=>'#10b981','text_color'=>'#6ee7b7','icon'=>$telescopeIcon,'requirement_type'=>'lessons','requirement_value'=>10],
            ['name'=>'Leyenda Nova','slug'=>'leyenda_nova','description'=>'Alcanzar el nivel máximo: Ente Espacial.','color'=>'#fbbf24','text_color'=>'#fde68a','icon'=>$sunIcon,'requirement_type'=>'level_max','requirement_value'=>0],
        ];
        foreach ($rewards as $r) { Reward::create($r); }

        echo "Seeder completado: 3 niveles, " . Lesson::count() . " lecciones, " . Event::count() . " eventos, " . Reward::count() . " recompensas, 5 rangos.\n";
    }
}
