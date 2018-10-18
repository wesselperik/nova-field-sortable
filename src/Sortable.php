<?php

namespace Dewsign\NovaFieldSortable;

use Laravel\Nova\Fields\Field;

class Sortable extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'nova-field-sortable';

    /**
     * Indicates if the element should be shown on the index view.
     *
     * @var bool
     */
    public $showOnIndex = true;

    /**
     * Indicates if the element should be shown on the detail view.
     *
     * @var bool
     */
    public $showOnDetail = false;

    /**
     * Indicates if the element should be shown on the creation view.
     *
     * @var bool
     */
    public $showOnCreation = false;

    /**
     * Indicates if the element should be shown on the update view.
     *
     * @var bool
     */
    public $showOnUpdate = false;
}
