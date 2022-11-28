<?php

namespace database\inc;

class Format
{
    public static function joinColumns (array $values): string
    {
        return implode(',',$values);
    }

    public static function  joinUpdateColumns(array $values): string
    {
        return implode('=%s,',$values).'=%s';
    }

    public static function joinStatementSegments (array $segments): string
    {
        return implode(' ',$segments);
    }

    public static function prepareSelect(array $columns): array
    {
        $result = [];
        $result['columns']='';
        $result['placeholder']='';
        $result['values']=[];
        $last = array_key_last($columns);
        foreach ($columns as $column => $value){
            if ($column !== $last){
                $result['columns'] .= $column.',';
                $result['placeholder'] .= '?,';
            }else{
                $result['columns'] .= $column;
                $result['placeholder'] .= '?';
            }
            $result['values'][] = $value;
        }
        return $result;
    }
}