<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\MorphMany;
use Laravel\Nova\Fields\Text;

class BankTransfer extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\BankTransfer::class;

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

            BelongsTo::make('Bank'),

            BelongsTo::make('User'),

            BelongsTo::make('Package'),

            Text::make('Account Holder'),

            Image::make('Invoice'),

            MorphMany::make('Payments'),
        ];
    }

    public static function authorizedToCreate(Request $request)
    {
        return false;
    }

    public function cards(Request $request)
    {
        return [];
    }
}
