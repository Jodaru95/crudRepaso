<?php
namespace Clases;
require '../vendor/autoload.php';
use Faker\Factory;
use Clases\Users;

class Datos{
    public $faker;

    public function __construct($tabla, $cantidad){
        $this->faker=Factory::create('es_ES');
        switch($tabla){
            case "users":
                $this->crearUsuarios($cantidad);
                break;
            case "tags":
                $this->crearTags($cantidad);
                break;
        }//FINdelSwitch
    }
    public function crearUsuarios($n){
        $usuario= new Users();
        //borramos todos para que no de error
        $usuario->borrarTodo();
        //-----------------------------
        $usuario->setNombre("Paco");
        $usuario->setApellidos("The Best");
        $usuario->setUsername("admin");
        $usuario->setMail("admin@gmail.com");
        
        $pass=hash('sha256',"secret0");
        $usuario->setPass($pass);
        $usuario->create();
        for($i=0;$i<$n-1;$i++){
            $usuario->setNombre($this->faker->firstName());
            $usuario->setApellidos($this->faker->lastName()." ".$this->faker->lastName());
            $usuario->setUsername($this->faker->unique()->userName);
            $usuario->setMail($this->faker->unique()->email);
            $usuario->setPass($this->faker->sha256);
            $usuario->create();
        }
        $usuario = null;
    }
}//FINCLASS