<?php

namespace Database\Seeders;

use App\Models\Desarrollador;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class desarrolladoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $developers = [
            [
                'id' => 1,
                'nombre' => 'Jose Miguel Risco Muñoz',
                'descripcion' => 'Estudiante de Desarrollo de Aplicaciones Web con interés por construir proyectos funcionales y bien estructurados. Siempre en busca de nuevos conocimientos que amplíen su visión del desarrollo.',
                'linkedin' => 'https://www.linkedin.com/in/jose-miguel-risco-mu%C3%B1oz-01b108258/',
                'github' => 'https://github.com/jose050204',
                'foto' => 'images/jose.jpg',
            ],
            [
                'id' => 2,
                'nombre' => 'Jeremy Intriago Pachay',
                'descripcion' => 'Estudiante de DAW con curiosidad por todas las capas del desarrollo web. Le motiva entender cómo encajan el frontend y el backend para crear aplicaciones completas.',
                'linkedin' => 'https://www.linkedin.com/in/jeremy-intriago-6735202b3/',
                'github' => 'https://github.com/injerr',
                'foto' => 'images/jeremy.jpg',
            ],
            [
                'id' => 3,
                'nombre' => 'Justin Monteiro Delicado',
                'descripcion' => '
Estudiante de Desarrollo de Aplicaciones Web con aspiraciones de convertirse en desarrollador full-stack. Disfruta aprendiendo tanto del lado del cliente como del servidor.',
                'linkedin' => 'https://www.linkedin.com/in/justin-monteiro-delicado-109b1b262/',
                'github' => 'https://github.com/duustixx',
                'foto' => 'images/justin.jpg',
            ],
            [
                'id' => 4,
                'nombre' => 'Marc Gilavert Orea',
                'descripcion' => 'Estudiante de DAW con ganas de crecer profesionalmente en el sector tecnológico. Le apasiona el proceso de transformar ideas en aplicaciones web reales y funcionales.',
                'linkedin' => 'https://www.linkedin.com/in/marc-gilavert-orea-b1851a2b3/',
                'github' => 'https://github.com/duustixx',
                'foto' => 'images/marc.jpg',
            ],
            [
                'id' => 5,
                'nombre' => 'Solaymane Roukdi Amhaj',
                'descripcion' => 'Estudiante de DAW con actitud proactiva y capacidad de adaptación. Comprometido con su formación y con aportar lo mejor de sí mismo en cada proyecto del equipo.',
                'linkedin' => 'https://www.linkedin.com/in/solaymane/',
                'github' => 'https://github.com/solaymane-rk',
                'foto' => 'images/solaymane.jpg',
            ],
        ];

        foreach ($developers as $dev) {
            Desarrollador::updateOrCreate(
                ['id' => $dev['id']],
                $dev
            );
        }
    }
}
