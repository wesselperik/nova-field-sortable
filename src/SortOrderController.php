<?php

namespace Dewsign\NovaFieldSortable;

use Illuminate\Routing\Controller;
use Laravel\Nova\Http\Requests\NovaRequest;

class SortOrderController extends Controller
{
    public function __invoke(NovaRequest $request) {
        $resource = $request->findResourceOrFail();

        $resource->authorizeToUpdate($request);

        $resource->setNewOrder($request->get('items', []));
    }
}
