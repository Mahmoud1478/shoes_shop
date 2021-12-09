<?php
namespace  database\inc;


class Connection{
    protected \PDO $connection;
    protected  \PDOStatement $statement  ;
    protected  string $queryString = '';
    protected  array $values = [];
    private array $options = [
        \PDO::ATTR_DEFAULT_FETCH_MODE=>\PDO::FETCH_ASSOC,
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
    ];
    public function __construct(){
        if (!isset($this->connection)){
            try {
                $this->connection = new \PDO(DB_DRIVER.':host='.DB_Host.';dbname='.DB_NAME.';charset=utf8',DB_USER,DB_PASS,$this->options);

            }catch (\PDOException $e){
                echo $e->getMessage();
            }

        }
    }

    public function prepare($statement): static
    {
        $this->statement = $this->connection->prepare($statement);
        return $this;
    }
    public function transaction(): static
    {
        $this->connection->commit();
        return $this;
    }
    protected function execute(): static{
        $this->statement->execute();
        return $this;
    }
    public function save(): static
    {
        $this->prepare($this->queryString)->bind($this->values);
        $this->queryString = '';
        $this->values = [];
        return $this;
    }
    public function get_all(): bool|array
    {
        $this->save();
        $result = $this->statement->fetchAll();
        return $result;
    }
    public function first() :array|bool
    {
        $this->save();
        $result =$this->statement->fetch();
        return $result ;
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
        return $this->queryString;
    }
    public function getValues(): array
    {
        return $this->values;
    }
}