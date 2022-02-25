<?php

namespace App\Nova;

use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class DesignService extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\DesignService::class;

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
        'name'
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

            HasMany::make('Design Sub Service', 'designSubServices', DesignSubService::class),

            Text::make('Sub Services Count', function () {
                return $this->resource->design_sub_services_count;
            })->exceptOnForms(),
        ];
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->withCount('designSubServices');
    }

    public static function detailQuery(NovaRequest $request, $query)
    {
        return $query->withCount('designSubServices');
    }

    public function cards(Request $request)
    {
        return [];
    }
}
