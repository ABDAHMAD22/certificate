<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;

class AdsTime extends Resource
{
    public static $displayInNavigation = false;
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\AdsTime::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'from';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'from', 'to',
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

            Text::make('From')
                ->rules('required', 'max:255'),

            Text::make('To')
                ->rules('required', 'max:255'),

            BelongsTo::make('Ads', 'ads', Ads::class),
        ];
    }

    public static function authorizedToCreate(Request $request)
    {
        return false;
    }

    public function authorizedToUpdate(Request $request)
    {
        return false;
    }

    public function authorizedToDelete(Request $request)
    {
        return false;
    }

    public function cards(Request $request)
    {
        return [];
    }
}
