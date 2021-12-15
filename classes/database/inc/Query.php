<?php

namespace database\inc;

trait Query
{
    protected  string $PREFIX_STATEMENT;

    protected  string $WHERE_STATEMENT;
    protected  string $OR_STATEMENT;
    protected  string $ORDERBY_STATEMENT;
    protected  string $GROUPBY_STATEMENT;
    protected  string $HASMaNY_STATEMENT;
    protected  string $BLONGSTO_STATEMENT;
    protected  string $JOIN_STATEMENT;
    protected  string $LIMIT_STATEMENT;



    public  function resolve(): string
    {
        return $this->PREFIX_STATEMENT.$this->JOIN_STATEMENT.$this->WHERE_STATEMENT.$this->OR_STATEMENT.$this->ORDERBY_STATEMENT.$this->GROUPBY_STATEMENT.$this->LIMIT_STATEMENT;
    }
    public  function reset()
    {
         $this->PREFIX_STATEMENT='';
         $this->WHERE_STATEMENT='';
         $this->OR_STATEMENT='';
         $this->ORDERBY_STATEMENT='';
         $this->GROUPBY_STATEMENT='';
         $this->HASMaNY_STATEMENT='';
         $this->BLONGSTO_STATEMENT='';
         $this->JOIN_STATEMENT='';
         $this->LIMIT_STATEMENT ='';

    }

}