<?php
namespace  database\inc;

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
        if (!isset(static::$connection)){
            try {
                static::$connection = new \PDO(DB_DRIVER.':host='.DB_Host.';dbname='.DB_NAME.';charset=utf8',DB_USER,DB_PASS,static::$options);
                $this->reset();
            }catch (\PDOException $e)
            {
                echo $e->getMessage();
            }
        }
    }

    public  function prepare($statement)
    {
        $this->statement = static::$connection->prepare($statement);
        return $this ;
    }
    public function transaction()
    {
        static::$connection->commit();
        return $this;
    }
    protected function execute(){
        $this->statement->execute();
        return $this;
    }
    public  function save()
    {
        $this->prepare($this->getQuery())->bind($this->values);
        $this->reset();
        $this->values = [];
        return  $this;
    }
    public function get_all()
    {
        $this->save();
        return $this->statement->fetchAll();
    }
    public function first()
    {
        $this->save();
        return $this->statement->fetchObject(static::class);
    }
    public function bind($values)
    {
        foreach ($values as $index => $value){
            $this->statement->bindValue($index+1,$value);
        }
        $this->execute();
        return  $this;
    }
    public function count(): int
    {
        return $this->statement->rowCount();
    }
    public static function lastInserted(): string
    {
        return static::$connection->lastInsertId();
    }
        public function getQuery()
    {
        return $this->resolve();
    }
    public function getValues()
    {
        return $this->values;
    }
}