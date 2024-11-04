<?php

namespace App\Traits;

trait SearchableTrait
{
    /**
     * Apply search conditions to the query.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $search
     * @param array $searchableFields
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function applySearch($query, $search, $searchableFields)
    {
        if ($search && strlen($search) > 2) {
            $query->where(function ($q) use ($search, $searchableFields) {
                $terms = explode(' ', $search);
                foreach ($terms as $term) {
                    $q->where(function ($q) use ($term, $searchableFields) {
                        foreach ($searchableFields as $field) {
                            $q->orWhere($field, 'LIKE', "%{$term}%");
                        }
                    });
                }
            });
        }

        return $query;
    }
}
