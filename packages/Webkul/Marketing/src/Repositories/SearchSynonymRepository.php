<?php

namespace Webkul\Marketing\Repositories;

use Webkul\Core\Eloquent\Repository;
use Illuminate\Support\Facades\DB;

class SearchSynonymRepository extends Repository
{
    /**
     * Specify model class name.
     */
    public function model(): string
    {
        return 'Webkul\Marketing\Contracts\SearchSynonym';
    }

    /**
     * Returns synonyms by query
     *
     * @param  string  $query
     * @return array
     */
    public function getSynonymsByQuery($query)
    {
        $synonyms = [$query];

        $driver = DB::connection()->getDriverName();

        if ($driver === 'mysql') {
            $searchSynonyms = $this->whereRaw('FIND_IN_SET(?, terms)', $synonyms)->get();
        } else {
            $searchSynonyms = $this->whereRaw("? = ANY(string_to_array(terms, ','))", $synonyms)->get();
        }

        foreach ($searchSynonyms as $searchSynonym) {
            $synonyms = array_merge($synonyms, explode(',', $searchSynonym->terms));
        }

        return array_unique($synonyms);
    }
}
