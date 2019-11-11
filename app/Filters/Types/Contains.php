<?php

namespace App\Filters\Types;

use Illuminate\Database\Eloquent\Builder;

class Contains implements TypeQuery
{
    protected function fullTextWildcards($term)
    {
        $reservedSymbols = ['-', '+', '<', '>', '@', '(', ')', '~'];
        $term = str_replace($reservedSymbols, '', $term);
 
        $words = explode(' ', $term);
 
        foreach($words as $key => $word) {
            if(strlen($word) >= 3) {
                $words[$key] = '+' . $word . '*';
            }
        }
 
        $searchTerm = implode( ' ', $words);
 
        return $searchTerm;
    }
 
    public function search(Builder $builder, Array $data)
    {
        // $columns = implode(',',$this->searchable);
 
        return $builder->whereRaw("MATCH ({$data['field']}) AGAINST (? IN BOOLEAN MODE)" , $this->fullTextWildcards($data['value']));
    }
}