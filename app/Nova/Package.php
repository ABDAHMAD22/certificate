<?php

namespace App\Nova;

use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Package extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Package::class;

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

            Number::make('Price')
                ->rules(['required', 'numeric']),

            Number::make('Certificates No')
                ->rules(['required', 'numeric']),

            Number::make('Certificates Free No')
                ->rules(['nullable', 'numeric'])
                ->withMeta([
                    'value' => (function () {
                        return $this->certificates_free_no ?? 0;
                    })(),
                ]),

            Number::make('Ads No')
                ->rules(['required', 'numeric']),

            //Number::make('Cards No')->rules(['required', 'numeric']),
        ];
    }

    public function cards(Request $request)
    {
        return [];
    }
}
