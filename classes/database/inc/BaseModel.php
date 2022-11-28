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
const JOIN_STATEMENT = ' %sJOIN %s';
const ON_JOIN_STATEMENT = ' ON %s %s %s';

class BaseModel extends Connection
{
    protected string $tableName;
    public function __construct()
    {
        parent::__construct();
        $this->tableName = $this->getName();
    }

    private function getName(): string
    {
        $exploded_ = explode(DS, static::class);
        return end($exploded_);
    }

    public function create(array $columns): static
    {
        $querySegments = Format::prepareSelect($columns);
        $this->PREFIX_STATEMENT = vsprintf(INSERT_STATEMENT, [$this->tableName, $querySegments['columns'], $querySegments['placeholder']]);
        $this->values = array_merge($this->values, $querySegments['values']);
        //array_push($this->values,...$querySegments['values']);
//        $this->save();
        return $this;
    }

    public function select(string...$columns): static
    {
        $this->PREFIX_STATEMENT = vsprintf(SELECT_STATEMENT, [Format::joinColumns($columns), $this->tableName]);;
        return $this;
    }
    public function update(array $columns): static
    {

        $this->PREFIX_STATEMENT = vsprintf(UPDATE_STATEMENT, [$this->tableName, Format::joinUpdateColumns(array_keys($columns))]);
        $this->values = array_merge($this->values, array_values($columns));
        //array_push($this->values,...$querySegments['values']);
        return $this;
    }
    public function delete(): static
    {
        $this->PREFIX_STATEMENT = vsprintf(DELETE_STATEMENT, [$this->tableName]);
        return $this;
    }
    public function where(string $column, $value, string $operator = '='): static
    {
        $statement = strpos($this->WHERE_STATEMENT, 'WHERE') ? AND_STATEMENT : WHERE_STATEMENT;
        $this->WHERE_STATEMENT .= vsprintf($statement, [$column, $operator]);
        $this->values[] = $value;
        return $this;
    }
    public function orWhere(string $column, $value, string $operator = '='): static
    {
        $this->OR_STATEMENT .= vsprintf(OR_STATEMENT, [$column, $operator]);
        $this->values[] = $value;
        return $this;
    }

    public function between(string $column, $start, $end): static
    {
        $statement = strpos($this->WHERE_STATEMENT, 'WHERE') ? AND_BETWEEN_STATEMENT : BETWEEN_STATEMENT;
        $this->WHERE_STATEMENT .= vsprintf($statement, [$column]);
        array_push($this->values, $start, $end);
        return $this;
    }
    public function orderBy(string $column, string $mode = 'ASC'): static
    {
        $this->ORDERBY_STATEMENT = vsprintf(ORDERBY_STATEMENT, [$column, $mode]);
        return $this;
    }
    public function groupBy(string $column): static
    {
        $this->GROUPBY_STATEMENT = vsprintf(GROUPBY_STATEMENT, [$column]);
        return $this;
    }
    public function limit(int $num): static
    {
        $this->LIMIT_STATEMENT = ' LIMIT ' . $num;
        return $this;
    }
    public function join(string $table): static
    {
        $this->JOIN_STATEMENT .= vsprintf(JOIN_STATEMENT, ['',$table]);
        return $this;
    }
    public function leftJoin(string $table): static
    {
        $this->JOIN_STATEMENT .= vsprintf(JOIN_STATEMENT, ['LEFT ',$table]);
        return $this;
    }
    public function rightJoin(string $table): static
    {
        $this->JOIN_STATEMENT .= vsprintf(JOIN_STATEMENT, ['Right ',$table]);
        return $this;
    }
    public function on(string $localKey, string $foreignKey ,string $operator = '='): static
    {
        $this->JOIN_STATEMENT .= vsprintf(ON_JOIN_STATEMENT, [$localKey,$operator,$foreignKey]);
        return $this;
    }

    public function all(): array
    {
        return $this->select('*')->get_all();
    }
    public function find(int $id)
    {
        return $this->select('*')->where('id', $id)->limit(1)->first();
    }

    /*reals*/

    protected function hasOne()
    {}
    protected function hasMany()
    {}
    protected function belongsTo()
    {}
    protected function belongsToMany()
    {}

}
