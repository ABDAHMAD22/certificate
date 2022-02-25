<?php

namespace App\Nova;

use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;

class Album extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Album::class;

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

            Images::make("Images")
                ->croppable(false)
                ->help('Image size should be 400x400 pixels and it is preferred to be less than 2MB.')
                ->enableExistingMedia()
                ->rules('required')
                ->singleImageRules(['dimensions:min_width=400', 'max:2048']),
        ];
    }

    public function cards(Request $request)
    {
        return [];
    }
}
