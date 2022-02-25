<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Permit extends Resource
{
    public static $displayInNavigation = false;
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Permit::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'name',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__("ID"), "id")->sortable(),

            Text::make('Name')
                ->rules('required', 'max:255'),

            Text::make('Key')
                ->rules('required', 'max:255'),
        ];
    }

    public static function relatableQuery(NovaRequest $request, $query)
    {
        $type = $request->model()->getTable() == 'editors' ? \App\Permit::TYPE_EDITOR : \App\Permit::TYPE_USER;
        return $query->whereType($type);
    }

    public function cards(Request $request)
    {
        return [];
    }
}
