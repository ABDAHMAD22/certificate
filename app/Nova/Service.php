<?php

namespace App\Nova;

use App\Rules\CustomExists;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Image;
use MrMonat\Translatable\Translatable;

class Service extends Resource
{
    public static $displayInNavigation = false;
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Service::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'title'
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

            Translatable::make('Title')
                ->rules('required', 'max:255'),
            //, new CustomExists(\App\Service::class, $request->resourceId)

            Translatable::make('Description')->hideFromIndex(),

            Translatable::make('Details')->hideFromIndex()->trix(),

            Image::make('Icon')->rules('mimes:jpg,png,jpeg,svg'),
        ];
    }

    public function cards(Request $request)
    {
        return [];
    }
}
