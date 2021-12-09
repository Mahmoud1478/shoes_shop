<?php

namespace database\inc;

const INSERT_STATEMENT = 'INSERT INTO {table} ({columns}) VALUES ({placeholder})';
const SELECT_STATEMENT = 'SELECT {columns} FROM {table}';
const DELETE_STATEMENT = 'DELETE  FROM {table}';
const WHERE_STATEMENT = ' WHERE {condition} {operator} ?';
const OR_STATEMENT = ' OR {condition} {operator} ?';
const AND_STATEMENT = ' AND {condition} {operator} ?';
const BETWEEN_STATEMENT = ' WHERE {column} BETWEEN ? AND ?';
const AND_BETWEEN_STATEMENT = ' AND {column} BETWEEN ? AND ?';
const UPDATE_STATEMENT = 'update {table} set {columns}';
const ORDERBY_STATEMENT = ' ORDER BY {column} {how}';
const GROUPBY_STATEMENT = ' GROUP BY {column} ';
const HASMaNY_STATEMENT = ' join {foreign_table} on {local_table}.id = {on}';
const BLONGSTO_STATEMENT = ' join {foreign_table} on {local_key} = {foreign_key}';
const JOIN_STATEMENT = ' JOIN {foreign_table}';
const LEFT_JOIN_STATEMENT = ' LEFT JOIN {foreign_table}';
const RIGHT_JOIN_STATEMENT = ' RIGHT JOIN {foreign_table}';
const ON_JOIN_STATEMENT = ' ON {local_key} = {foreign_key}';

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

    public function create(array $columns){
        $querySegments = Format::prepareSelect($columns);
        $preparedQuery =  Format::replace([
            'table'=>$this->tableName,
            'columns'=>$querySegments['columns'],
            'placeholder'=>$querySegments['placeholder']
        ],INSERT_STATEMENT);
        $this->queryString=$preparedQuery;
        $this->values = array_merge($this->values , $querySegments['values']);
        //array_push($this->values,...$querySegments['values']);
        $this->save();
    }

    public function select(string...$columns): static
    {
        $preparedQuery =  Format::replace([
            'table'=>$this->tableName,
            'columns'=>Format::join(',',$columns),
        ],SELECT_STATEMENT);
        $this->queryString=$preparedQuery;
        return $this;
    }
    public function update(array $columns): static
    {
        $preparedQuery =  Format::replace([
            'table'=>$this->tableName,
            'columns'=>Format::prepareUpdate($columns),
        ],UPDATE_STATEMENT);
        $this->queryString=$preparedQuery;
        $this->values = array_merge($this->values , array_values($columns));
        //array_push($this->values,...$querySegments['values']);
        return $this;
    }
    public function delete(): static
    {
        $preparedQuery =  Format::replace([
            'table'=>$this->tableName,
        ],DELETE_STATEMENT);
        $this->queryString=$preparedQuery;
        return $this;
    }
    public function where(string $condition , $value , string $operator = '='): static
    {
        $preparedQuery =  Format::replace([
            'condition'=>$condition,
            'operator'=>$operator,
        ],!strpos($this->queryString,'WHERE')?WHERE_STATEMENT :AND_STATEMENT);
        $this->queryString .= $preparedQuery;
        array_push($this->values,$value);
        return $this;
    }
    public function orWhere(string $condition , $value , string $operator = '='): static
    {
        $preparedQuery =  Format::replace([
            'condition'=>$condition,
            'operator'=>$operator,
        ],OR_STATEMENT);
        $this->queryString .= $preparedQuery;
        array_push($this->values,$value);
        return $this;
    }

    public function between(string $condition , $start , $end): static
    {
        $preparedQuery =  Format::replace([
            'column'=>$condition,
        ],!strpos($this->queryString,'WHERE')?BETWEEN_STATEMENT :AND_BETWEEN_STATEMENT);
        $this->queryString .= $preparedQuery;
        array_push($this->values,$start,$end);
        return $this;
    }
    public function orderBy(string $column , string $mode = 'ASC'): static
    {
        $preparedQuery =  Format::replace([
            'column'=>$column,
            'how'=>$mode,
        ],ORDERBY_STATEMENT);
        $this->queryString .= $preparedQuery;
        return $this;
    }
    public function groupBy(string $column): static
    {
        $preparedQuery =  Format::replace([
            'column'=>$column,
        ],GROUPBY_STATEMENT);
        $this->queryString .= $preparedQuery;
        return $this;
    }
    public function join(string $table): static
    {
        $preparedQuery =  Format::replace([
            'foreign_table'=>$table,
        ],JOIN_STATEMENT);
        $this->queryString .= $preparedQuery;
        return $this;
    }
    public function leftJoin(string $table): static
    {
        $preparedQuery =  Format::replace([
            'foreign_table'=>$table,
        ],LEFT_JOIN_STATEMENT);
        $this->queryString .= $preparedQuery;
        return $this;
    }
    public function rightJoin(string $table): static
    {
        $preparedQuery =  Format::replace([
            'foreign_table'=>$table,
        ],RIGHT_JOIN_STATEMENT);
        $this->queryString .= $preparedQuery;
        return $this;
    }
    public function on(string $localKey , string $foreignKey): static
    {
        $preparedQuery =  Format::replace([
            'local_key'=>$localKey,
            'foreign_key'=>$foreignKey
        ],ON_JOIN_STATEMENT);
        $this->queryString .= $preparedQuery;
        return $this;
    }
}