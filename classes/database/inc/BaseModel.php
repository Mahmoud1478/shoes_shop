<?php

namespace database\inc;

const INSERT_STATEMENT = 'INSERT INTO %s (%s) VALUES (%s)';
const SELECT_STATEMENT = 'SELECT %s FROM %s';
const DELETE_STATEMENT = 'DELETE  FROM %s';
const WHERE_STATEMENT = ' WHERE %s %s ?';
const OR_STATEMENT = ' OR %s %s ?';
const AND_STATEMENT = ' AND %s %s ?';
const BETWEEN_STATEMENT = ' WHERE %s BETWEEN ? AND ?';
const AND_BETWEEN_STATEMENT = ' AND %s BETWEEN ? AND ?';
const UPDATE_STATEMENT = 'update %s set %s';
const ORDERBY_STATEMENT = ' ORDER BY %s %s';
const GROUPBY_STATEMENT = ' GROUP BY %s ';
const HASMaNY_STATEMENT = ' join {foreign_table} on {local_table}.id = {on}';
const BLONGSTO_STATEMENT = ' join {foreign_table} on {local_key} = {foreign_key}';
const JOIN_STATEMENT = ' JOIN %s';
const LEFT_JOIN_STATEMENT = ' LEFT JOIN %s';
const RIGHT_JOIN_STATEMENT = ' RIGHT JOIN %s';
const ON_JOIN_STATEMENT = ' ON %s = %s';

class BaseModel extends Connection
{
    protected  string $tableName;
    public function __construct()
    {
        parent::__construct();
        $this->tableName = $this->getName();
    }

    private function getName(): bool|string
    {
        $exploded_ = explode(DS,static::class);
        return end($exploded_);
    }

    public  function create(array $columns){
        $querySegments = Format::prepareSelect($columns);
        $this->PREFIX_STATEMENT = vsprintf(INSERT_STATEMENT,[$this->tableName,$querySegments['columns'],$querySegments['placeholder']]);
        $this->values  = array_merge($this->values , $querySegments['values']);
        //array_push($this->values,...$querySegments['values']);
        $this->save();
    }

    public  function select(string...$columns): static
    {
        $this->PREFIX_STATEMENT = vsprintf(SELECT_STATEMENT,[Format::join(',',$columns),$this->tableName]);
        return $this ;
    }
    public  function update(array $columns): static
    {

        $this->PREFIX_STATEMENT = vsprintf(UPDATE_STATEMENT,[$this->tableName,Format::prepareUpdate($columns)]);
        $this->values  = array_merge($this->values,array_values($columns));
        //array_push($this->values,...$querySegments['values']);
        return $this;
    }
    public  function delete(): static
    {
        $this->PREFIX_STATEMENT = vsprintf(DELETE_STATEMENT,[$this->tableName,]);
        return $this;
    }
    public  function where(string $condition , $value , string $operator = '='): static
    {
        $statement = strpos($this->WHERE_STATEMENT,'WHERE')?AND_STATEMENT:WHERE_STATEMENT;
        $this->WHERE_STATEMENT .= vsprintf($statement,[$condition,$operator]);
        array_push($this->values ,$value);
        return $this;
    }
    public function orWhere(string $condition , $value , string $operator = '='): static
    {
        $this->OR_STATEMENT .= vsprintf(OR_STATEMENT,[$condition,$operator]);
        array_push($this->values ,$value);
        return $this;
    }

    public function between(string $condition , $start , $end): static
    {
        $statement = strpos($this->WHERE_STATEMENT,'WHERE')?AND_BETWEEN_STATEMENT:BETWEEN_STATEMENT;
        $this->WHERE_STATEMENT .= vsprintf($statement , [$condition,]);
        array_push($this->values ,$start,$end);
        return $this;
    }
    public function orderBy(string $column , string $mode = 'ASC'): static
    {
        $this->ORDERBY_STATEMENT = vsprintf(ORDERBY_STATEMENT,[$column,$mode]);
        return $this;
    }
    public function groupBy(string $column): static
    {
        $this->GROUPBY_STATEMENT = vsprintf(GROUPBY_STATEMENT,[$column,]);
        return $this;
    }
    public function limit(int $num): static
    {
        $this->LIMIT_STATEMENT = ' LIMIT '.$num;
        return $this;
    }
    public function join(string $table): static
    {
        $this->JOIN_STATEMENT .= vsprintf(JOIN_STATEMENT,[$table,]);
        return $this;
    }
    public function leftJoin(string $table): static
    {
        $this->JOIN_STATEMENT .= vsprintf(LEFT_JOIN_STATEMENT,[$table,]);
        return $this;
    }
    public function rightJoin(string $table): static
    {
        $this->JOIN_STATEMENT .= vsprintf(RIGHT_JOIN_STATEMENT,[$table,]);
        return $this;
    }
    public function on(string $localKey , string $foreignKey): static
    {
        $this->JOIN_STATEMENT .= vsprintf(ON_JOIN_STATEMENT,[$localKey,$foreignKey]);
        return $this;
    }

    public  function all(): bool|array
    {
        return $this->select('*')->get_all();
    }
    public  function find(int $id): bool|\stdClass
    {
        return $this->select('*')->where('id',$id)->limit(1)->first();
    }
}