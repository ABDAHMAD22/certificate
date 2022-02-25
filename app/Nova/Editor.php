<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use NovaAttachMany\AttachMany;

class Editor extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Editor::class;

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
        'name', 'email'
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

            Text::make('Email')
                ->sortable()
                ->rules('required', 'email', 'max:254')
                ->creationRules('unique:editors,email')
                ->updateRules('unique:editors,email,{{resourceId}}'),

            Password::make('Password')
                ->onlyOnForms()
                ->creationRules('required', 'min:6')
                ->updateRules('nullable', 'min:6'),

            Image::make('Image')
                ->rules('nullable', 'mimes:jpg,png,jpeg'),

            BelongsTo::make('User'),

            AttachMany::make('Permits')
                ->rules('min:1'),

            BelongsToMany::make('Permits')->hideFromDetail(),
            Text::make('Permits', function () {
                return $this->resource->permits->pluck('name');
            })->onlyOnDetail(),
        ];
    }

    public function cards(Request $request)
    {
        return [];
    }
}
