<?php

namespace Dewsign\NovaFieldSortable;

use Laravel\Nova\Http\Requests\NovaRequest;

trait IsSorted
{
    /**
     * Force the sorting order to always return the manual order
     *
     * @param NovaRequest $request
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function indexQuery(NovaRequest $request, $query)
    {
        if (!$orderBy = array_get((new static::$model)->sortable, 'order_column_name')) {
            return $query;
        }
        return $query->orderBy($orderBy, 'ASC');
    }
}