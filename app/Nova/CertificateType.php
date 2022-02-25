<?php

namespace App\Nova;

use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;

class CertificateType extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\CertificateType::class;

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

            Text::make('Word')
                ->rules('required', 'max:255'),
        ];
    }

    public function cards(Request $request)
    {
        return [];
    }
}
