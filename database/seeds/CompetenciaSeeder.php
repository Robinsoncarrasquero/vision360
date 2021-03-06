<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Competencia;
use App\Grado;

class CompetenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        //
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); //DESACTIVA EL CHECKEO DE CLAVES FORANEAS

        DB::table('competencias')->truncate();
        DB::table('grados')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); //ACTIVA EL CHECKEO DE CLAVES FORANEAS

        //GENERAL
        $competencia=factory(Competencia::class)->create([
            'name'=>'Adaptabilidad al Cambio',
            'tipo_id'=>1,
            'description'=>'Es la capacidad para adaptarse y amoldarse a los cambios. Se referencia a la capacidad de modificar la propia conducta para alcanzar determinados objetivos cuando surgen dificultades o cambios en el medio. Se asocia con la versatilidad del comportamiento para adaptarse a distintos contextos, situaciones, medios y personas rápida y adecuadamente. Implica conducir a su grupo en función de la correcta comprensión de los escenarios cambiantes dentro de las políticas de la organización.',
        ]);

        //Creamos Los grados de la competencias
        $gradoa=factory(Grado::class)->create([
            'grado'=>'A',
            'ponderacion'=>100,
            'competencia_id'=>$competencia->id,
            'description'=>'Realiza adaptaciones organizacionales y estratégicas a corto, mediano y largo plazo en respuesta a los cambios del entorno o las necesidades de la situación considerando al especial dimensión del tiempo que se da en el entorno digital.',
        ]);
        //Creamos Los grados de la competencias
        $gradob=factory(Grado::class)->create([
            'grado'=>'B',
            'ponderacion'=>75,
            'competencia_id'=>$competencia->id,
            'description'=>'Adapta tácticas y objetivos para afrontar una situación o solucionar problemas. Revisa y evalúa sistemáticamente las consecuencias positivas y/o negativas de las acciones pasadas para agregar valor a la nueva solución. Utiliza el fracaso de otros en su propio beneficio.',

        ]);
        //Creamos Los grados de la competencias
        $gradob=factory(Grado::class)->create([
            'grado'=>'C',
            'ponderacion'=>50,
            'competencia_id'=>$competencia->id,
            'description'=>'Observa la situación objetivamente y puede reconocer la validez del punto de vista de otros, utilizando dicha información de manera selectiva para modificar sólo en ocasiones su forma de actuar.'

        ]);
        //Creamos Los grados de la competencias
        $gradob=factory(Grado::class)->create([
            'grado'=>'D',
            'ponderacion'=>25,
            'competencia_id'=>$competencia->id,
            'description'=>'Suele aferrarse a sus propias opiniones. En ocasiones no reconoce la validez de la perspectiva de otras personas. Siempre sigue los procedimientos. No manifiesta una actitud crítica respecto a su actuación.'

        ]);

        //Creamos Los grados de la competencias
        $gradod=factory(Grado::class)->create([
            'grado'=>'E',
            'ponderacion'=>0,
            'competencia_id'=>$competencia->id
        ]);


        //ESPECIFICA
        $competencia1 = factory(App\Competencia::class)->create([
            'name'=>'Identificación con la Institución',
            'tipo_id'=>1,
        ]);

        //Creamos Los grados de la competencias
        $gradoA=factory(Grado::class)->create([
            'grado'=>'A',
            'ponderacion'=>100,
            'competencia_id'=>$competencia1->id
        ]);

        //Creamos Los grados de la competencias
        $gradob=factory(Grado::class)->create([
            'grado'=>'B',
            'ponderacion'=>75,
            'competencia_id'=>$competencia1->id
        ]);

        //Creamos Los grados de la competencias
        $gradoc=factory(Grado::class)->create([
            'grado'=>'C',
            'ponderacion'=>50,
            'competencia_id'=>$competencia1->id
        ]);

        //Creamos Los grados de la competencias
        $gradod=factory(Grado::class)->create([
            'grado'=>'D',
            'ponderacion'=>25,
            'competencia_id'=>$competencia1->id
        ]);

        //Creamos Los grados de la competencias
        $gradod=factory(Grado::class)->create([
            'grado'=>'E',
            'competencia_id'=>$competencia1->id,
            'ponderacion'=>0,

        ]);

        //TECNICA
        $competencia1 = factory(App\Competencia::class)->create([
            'name'=>'Capacidad Tecnica',
            'tipo_id'=>4,
        ]);

        //Creamos Los grados de la competencias
        $gradoA=factory(Grado::class)->create([
            'grado'=>'A',
            'ponderacion'=>100,
            'competencia_id'=>$competencia1->id
        ]);

        //Creamos Los grados de la competencias
        $gradob=factory(Grado::class)->create([
            'grado'=>'B',
            'ponderacion'=>75,
            'competencia_id'=>$competencia1->id
        ]);

        //Creamos Los grados de la competencias
        $gradoc=factory(Grado::class)->create([
            'grado'=>'C',
            'ponderacion'=>50,
            'competencia_id'=>$competencia1->id
        ]);

        //Creamos Los grados de la competencias
        $gradod=factory(Grado::class)->create([
            'grado'=>'D',
            'ponderacion'=>25,
            'competencia_id'=>$competencia1->id
        ]);

        //Creamos Los grados de la competencias
        $gradod=factory(Grado::class)->create([
            'grado'=>'E',
            'competencia_id'=>$competencia1->id,
            'ponderacion'=>0,

        ]);


        //SUPERVISOR
        $competencia1 = factory(App\Competencia::class)->create([
            'name'=>'Liderazgo',
            'tipo_id'=>2,
        ]);

        //Creamos Los grados de la competencias
        $gradoA=factory(Grado::class)->create([
            'grado'=>'A',
            'ponderacion'=>100,
            'competencia_id'=>$competencia1->id
        ]);

        //Creamos Los grados de la competencias
        $gradob=factory(Grado::class)->create([
            'grado'=>'B',
            'ponderacion'=>75,
            'competencia_id'=>$competencia1->id
        ]);

        //Creamos Los grados de la competencias
        $gradoc=factory(Grado::class)->create([
            'grado'=>'C',
            'ponderacion'=>50,
            'competencia_id'=>$competencia1->id
        ]);

        //Creamos Los grados de la competencias
        $gradod=factory(Grado::class)->create([
            'grado'=>'D',
            'ponderacion'=>25,
            'competencia_id'=>$competencia1->id
        ]);

        //Creamos Los grados de la competencias
        $gradod=factory(Grado::class)->create([
            'grado'=>'E',
            'competencia_id'=>$competencia1->id,
            'ponderacion'=>0,

        ]);


        //SUPERVISOR
        $competencia1 = factory(App\Competencia::class)->create([
            'name'=>'Orientacion a Resultados',
            'tipo_id'=>2
        ]);

        //Creamos Los grados de la competencias
        $gradoA=factory(Grado::class)->create([
            'grado'=>'A',
            'ponderacion'=>100,
            'competencia_id'=>$competencia1->id
        ]);

        //Creamos Los grados de la competencias
        $gradob=factory(Grado::class)->create([
            'grado'=>'B',
            'ponderacion'=>75,
            'competencia_id'=>$competencia1->id
        ]);

        //Creamos Los grados de la competencias
        $gradoc=factory(Grado::class)->create([
            'grado'=>'C',
            'ponderacion'=>50,
            'competencia_id'=>$competencia1->id
        ]);

        //Creamos Los grados de la competencias
        $gradod=factory(Grado::class)->create([
            'grado'=>'D',
            'ponderacion'=>25,
            'competencia_id'=>$competencia1->id
        ]);

        //Creamos Los grados de la competencias
        $gradod=factory(Grado::class)->create([
            'grado'=>'E',
            'competencia_id'=>$competencia1->id,
            'ponderacion'=>0,

        ]);



        //ESPECIFICA
        $competencia1 = factory(App\Competencia::class)->create([
            'name'=>'Iniciativa',
            'tipo_id'=>3,
        ]);

        //Creamos Los grados de la competencias
        $gradoA=factory(Grado::class)->create([
            'grado'=>'A',
            'ponderacion'=>100,
            'competencia_id'=>$competencia1->id
        ]);

        //Creamos Los grados de la competencias
        $gradob=factory(Grado::class)->create([
            'grado'=>'B',
            'ponderacion'=>75,
            'competencia_id'=>$competencia1->id
        ]);

        //Creamos Los grados de la competencias
        $gradoc=factory(Grado::class)->create([
            'grado'=>'C',
            'ponderacion'=>50,
            'competencia_id'=>$competencia1->id
        ]);

        //Creamos Los grados de la competencias
        $gradod=factory(Grado::class)->create([
            'grado'=>'D',
            'ponderacion'=>25,
            'competencia_id'=>$competencia1->id
        ]);

        //Creamos Los grados de la competencias
        $gradod=factory(Grado::class)->create([
            'grado'=>'E',
            'competencia_id'=>$competencia1->id,
            'ponderacion'=>0,

        ]);

        //ESPECIFICA
        $competencia1 = factory(App\Competencia::class)->create([
            'name'=>'Desarrollo de otros',
            'tipo_id'=>3,
        ]);

        //Creamos Los grados de la competencias
        $gradoA=factory(Grado::class)->create([
            'grado'=>'A',
            'ponderacion'=>100,
            'competencia_id'=>$competencia1->id
        ]);

        //Creamos Los grados de la competencias
        $gradob=factory(Grado::class)->create([
            'grado'=>'B',
            'ponderacion'=>75,
            'competencia_id'=>$competencia1->id
        ]);

        //Creamos Los grados de la competencias
        $gradoc=factory(Grado::class)->create([
            'grado'=>'C',
            'ponderacion'=>50,
            'competencia_id'=>$competencia1->id
        ]);

        //Creamos Los grados de la competencias
        $gradod=factory(Grado::class)->create([
            'grado'=>'D',
            'ponderacion'=>25,
            'competencia_id'=>$competencia1->id
        ]);

        //Creamos Los grados de la competencias
        $gradod=factory(Grado::class)->create([
            'grado'=>'E',
            'competencia_id'=>$competencia1->id,
            'ponderacion'=>0,

        ]);

    //ESPECIFICA
    $competencia1 = factory(App\Competencia::class)->create([
        'name'=>'Etica e integridad',
        'tipo_id'=>3,
    ]);

    //Creamos Los grados de la competencias
    $gradoA=factory(Grado::class)->create([
        'grado'=>'A',
        'ponderacion'=>100,
        'competencia_id'=>$competencia1->id
    ]);

    //Creamos Los grados de la competencias
    $gradob=factory(Grado::class)->create([
        'grado'=>'B',
        'ponderacion'=>75,
        'competencia_id'=>$competencia1->id
    ]);

    //Creamos Los grados de la competencias
    $gradoc=factory(Grado::class)->create([
        'grado'=>'C',
        'ponderacion'=>50,
        'competencia_id'=>$competencia1->id
    ]);

    //Creamos Los grados de la competencias
    $gradod=factory(Grado::class)->create([
        'grado'=>'D',
        'ponderacion'=>25,
        'competencia_id'=>$competencia1->id
    ]);

    //Creamos Los grados de la competencias
    $gradod=factory(Grado::class)->create([
        'grado'=>'E',
        'competencia_id'=>$competencia1->id,
        'ponderacion'=>0,

    ]);


    }
}
