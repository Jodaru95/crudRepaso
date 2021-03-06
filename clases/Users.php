<?php
namespace Clases;
use PDO,PDOException;

class Users extends Conexion{
    private $id;
    private $nombre;
    private $apellidos;
    private $username;
    private $mail;
    private $pass;

    public function __construct(){
        parent::__construct();
    }
    //----------------CRUD----------------------
    public function create(){
        $con="insert into users(nombre,apellidos,username,mail,pass) values (:n,:a,:u,:m,:p)";
        $stmt= parent::$conexion->prepare($con);
        try{
            $stmt->execute([
                ':n'=>$this->nombre,
                ':a'=>$this->apellidos,
                ':u'=>$this->username,
                ':m'=>$this->mail,
                ':p'=>$this->pass,
            ]);
        }catch(PDOException $ex){
            die("Error al insertar el usuario. Mensaje: ".$ex->getMessage());
        }
    }
    public function delete(){

    }
    public function update(){

    }
    public function read(){

    }
    //----------OTHER FUNCTIONS-----------------
    public function borrarTodo(){
        $con = "delete from users";
        $stmt = parent::$conexion->prepare($con);
        try {
            $stmt->execute();
        } catch (PDOException $ex) {
            die("Error al borrar todo: " . $ex->getMessage());
        }
    }
    public function validarUsuario(string $n, $p){
        $con="select * from users where username=:n AND pass=:p";
        $stmt=parent::$conexion->prepare($con);
        try{
            $stmt->execute([
                ':n'=>$n,
                ':p'=>$p
            ]);
        }catch(PDOException $ex){
            die("Error al validad el usuario. Mensaje:".$ex->getMessage());
        }
        $fila=$stmt->fetch(PDO::FETCH_OBJ);
        return ($fila!=null)?true:false;
    }

    
    //----------GETTERS & SETTERS---------------
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of apellidos
     */ 
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set the value of apellidos
     *
     * @return  self
     */ 
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of mail
     */ 
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set the value of mail
     *
     * @return  self
     */ 
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get the value of pass
     */ 
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * Set the value of pass
     *
     * @return  self
     */ 
    public function setPass($pass)
    {
        $this->pass = $pass;

        return $this;
    }
}//FINCLASS