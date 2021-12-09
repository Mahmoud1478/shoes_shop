<?php
namespace  database\inc;


class Connection{
    private ?\PDO $connection = null ;
    private  \PDOStatement|null $statement  ;
    private array $options = [
        \PDO::ATTR_DEFAULT_FETCH_MODE=>\PDO::FETCH_ASSOC,
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
    ];
    public function __construct(){
        if ($this->connection === null){
            try {
                $this->connection = new \PDO('mysql:host=localhost;dbname=shoes_store;charset=utf8','root','toor',$this->options);

            }catch (\PDOException $e){
                echo $e->getMessage();
            }

        }
    }

    public function prepare($statement){
        $this->statement = $this->connection->prepare($statement);
        return $this;
    }
    public function save(){
        $this->connection->commit();
        return $this;
    }
    public function execute(){
        $this->statement->execute();
        return $this;
    }

    public function get_all(){
        return  $this->statement->fetchAll();
    }
    public function first(){
        return  $this->statement->fetchOne();
    }
    public function bind($values){
        foreach ($values as $index => $value){
            $this->statement->bindValue($index+1,$value);
        }
        return  $this;
    }

}