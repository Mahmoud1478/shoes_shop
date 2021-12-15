<?php
namespace  database\inc;


use Cassandra\Statement;
use JetBrains\PhpStorm\Pure;

class Connection{
    protected  static \PDO $connection;
    protected  \PDOStatement $statement  ;
    protected  array $values = [];
    private static array $options = [
        \PDO::ATTR_DEFAULT_FETCH_MODE=>\PDO::FETCH_OBJ,
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
    ];
    use Query;
    protected function __construct(){

        if (!isset($this->connection)){
            try {
                static::$connection = new \PDO(DB_DRIVER.':host='.DB_Host.';dbname='.DB_NAME.';charset=utf8',DB_USER,DB_PASS,static::$options);
                $this->reset();

            }catch (\PDOException $e){
                echo $e->getMessage();
            }

        }
    }

    public  function prepare($statement): static
    {
       $this->statement = static::$connection->prepare($statement);
        return $this ;
    }
    public function transaction(): static
    {
        static::$connection->commit();
        return $this;
    }
    protected function execute(): static{
        $this->statement->execute();
        return $this;
    }
    public  function save(): static
    {
        $this->prepare($this->getQuery())->bind($this->values);
        $this->reset();
        $this->values = [];
        return  $this;
    }
    public function get_all(): bool|array
    {
        $this->save();
        return $this->statement->fetchAll();
    }
    public function first(): bool|\stdClass
    {
        $this->save();
        return $this->statement->fetch();
    }
    public function bind($values): static
    {
        foreach ($values as $index => $value){
            $this->statement->bindValue($index+1,$value);
        }
        $this->execute();
        return  $this;
    }
    public function getQuery(): string
    {
        return $this->resolve();
    }
    public function getValues(): array
    {
        return $this->values;
    }
}