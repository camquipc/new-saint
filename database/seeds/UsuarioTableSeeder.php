<?php

use Illuminate\Database\Seeder;



class UsuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        \DB::table('departamentos')->insert([
            array(

                'nombre' => ucfirst('administración'),
                'status' => true,

            ), array(

                'nombre' => ucfirst('alimento'),
                'status' => true,

            ),
            array(

                'nombre' => ucfirst('Informática'),
                'status' => true,

            )
            , array(

                'nombre' => ucfirst('turismo'),
                'status' => true,

            )
            , array(

                'nombre' => ucfirst('mercadeo'),
                'status' => true,
            ),
            array(

                'nombre' => ucfirst('mantenimiento') . ' ' . ucfirst('naval'),
                'status' => true,
            ),
            array(

                'nombre' => ucfirst('mecánica ') . ' ' . ucfirst('naval'),
                'status' => true,
            ),
            array(

                'nombre' => ucfirst('deporte'),
                'status' => true,
            ),
            array(

                'nombre' => ucfirst('agroalimentaria'),
                'status' => true,
            ),
        ]);

        \DB::table('categorias')->insert([
            array(

                'nombre' => ucfirst('Redes'),
                'status' => true,

            ), array(

                'nombre' => ucfirst('Desarrollo de Software'),
                'status' => true,

            ),
            array(

                'nombre' => ucfirst('Soporte Técnico'),
                'status' => true,

            )
            , array(

                'nombre' => ucfirst('Directivo'),
                'status' => true,

            )
            , array(

                'nombre' => ucfirst('Ninguno'),
                'status' => true,
            )
        ]);

        \DB::table('personas')->insert(array(

            'p_nombre'   => 'Soporte',
            's_nombre'   => '',
            'p_apellido' => 'Técnico',
            's_apellido' => '',
            'ci'         => 12345678,
        ));

         //admin= 1, soporte tecnico = 2 usuario = 3 secretaria= 4

        \DB::table('users')->insert(array(

            'persona_id' => 1,
            'categoria_id' => 4,
            'departamento_id' => 3,
            'usuario'    => 'admin',
            'password'   => bcrypt('admin'),
            'tipo'       => 5,
            'status'     => true,
        ));

       
        \DB::table('desarrolladores')->insert([

            array(
                'nombre' => ucfirst('Francisco'),
                'apellido' => ucfirst('Campos'),
                'grado_i' => ucfirst('Tsu Informática'),
                'rool' =>    ucfirst('developer'),
                'email' => 'camqui2011@gmail.com'
            ),
            array(
                'nombre' => ucfirst('deibimar'),
                'apellido' => ucfirst('Velásquez'),
                'grado_i' => ucfirst('Tsu Informática'),
                'rool' =>    ucfirst('frontend'),
                'email' => 'deibimar_15@hotmail.com '
            ),
            array(
                'nombre' => ucfirst('maria fabiola'),
                'apellido' => ucfirst('giraldo'),
                'grado_i' => ucfirst('Tsu Informática'),
                'rool' =>    ucfirst('documentation'),
                'email' => 'deibimar_15@hotmail.com '
            ),
            array(
                'nombre' => ucfirst('lebsy'),
                'apellido' => ucfirst('mayora'),
                'grado_i' => ucfirst('Tsu Informática'),
                'rool' =>    ucfirst('database'),
                'email' => 'lebsymayora@gmail.com'
            ),
           

        ]);


        \DB::table('sistemas')->insert(array(
            'sistema_nombre'     => 'Sait',
            'sistema_detalle'   => 'Sistema Adminstrativo de Incidencias Tecnologicas',
            'sistema_version' => 'v1',
            'logo' => 'img/new-logo.png'
        ));

        \DB::table('motivos')->insert([
            array(
                'nombre'     => 'Revisión y reparación de equipo de computación',
                'categoria_id'   => 3  
            ),
            array(
                'nombre'     => 'Revisión y reparación de equipo de Impresora',
                'categoria_id'   => 3  
            ),
            array(
                'nombre'     => 'Revisión y reparación de equipo de Monitor',
                'categoria_id'   => 3  
            ),
            array(
                'nombre'     => 'Revisión y reparación de equipo de Video Beans',
                'categoria_id'   => 3  
            ),
            array(
                'nombre'     => 'Revisión y reparación de equipo de Fotocopiadora',
                'categoria_id'   => 3 
            ),
            array(
                'nombre'     => 'Recarga de Toner y cartucho de tinta',
                'categoria_id'   => 3 
            )
            ,
            array(
                'nombre'     => 'Revisión de Conexión de red',
                'categoria_id'   => 1  
            ),
            array(
                'nombre'     => 'Revisión de punto de red',
                'categoria_id'   => 1 
            ),
            array(
                'nombre'     => 'Colocación de punto de red',
                'categoria_id'   => 1  
            )
            ,
            array(
                'nombre'     => 'Mantenimiento de Sistemas',
                'categoria_id'   => 2  
            ),
            array(
                'nombre'     => 'Soporte de Sistemas',
                'categoria_id'   => 2  
            ),
            array(
                'nombre'     => 'Desarrollo de Sistemas',
                'categoria_id'   => 2  
            )


        ]);
        
        \DB::table('estados')->insert([
            array(
                'estado'     => 'Atendida'  
            ),
            array(
                'estado'     => 'Solucionado'  
            ),

            array(
                'estado' => 'En espera'
            )
            
        ]);

          
        \DB::table('generales')->insert([
            'nombre' => ucfirst('Francisco'),
            'apellido' => ucfirst('Campos')
        ]);
    }
}
