<?php

namespace database\inc;

class Format
{
    public static function replace(array $values , string $target): string
    {
        foreach ($values as $key=> $value){
            $target = str_replace('{'.$key.'}',$value,$target);
        }
        return $target;
    }
    public static function join(string $separator,array $values): string
    {
        $result = '';
        $last = end($values);
        foreach ($values as $value){
           if ($value !== $last){
               $result .= $value.$separator;
           }else{
               $result .= $value;
           }
        }
        return $result;
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
            array_push( $result['values'],$value);
        }
        return $result;
    }
    public static function prepareUpdate(array $columns): string
    {
        $result = '';
        $last = array_key_last($columns);
        foreach ($columns as $column => $value){
            if ($column !== $last){
                $result .= $column.' = ?,';
            }else{
                $result .= $column.' = ?';
            }
        }
        return $result;
    }
}