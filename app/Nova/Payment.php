<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\MorphTo;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Textarea;

class Payment extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Payment::class;

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
        'id',
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
            ID::make()->sortable(),

            BelongsTo::make('User')->nullable()
                ->withMeta(['extraAttributes' => [
                    'readonly' => true
                ]]),

            Number::make('Price')->rules(['required', 'numeric']),

            BelongsTo::make('Payment Type', 'paymentType')
                ->withMeta(['extraAttributes' => [
                'readonly' => true
            ]]),

            BelongsTo::make('Status'),

//            MorphTo::make('Paymentable')->types([
//                BankTransfer::class,
//            ])->nullable()->withMeta(['extraAttributes' => [
//                'readonly' => true
//            ]]),
        ];
    }

    public static function authorizedToCreate(Request $request)
    {
        return false;
    }

//    public function authorizedToUpdate(Request $request)
//    {
//        return false;
//    }

    /**
     * Get the cards available for the request.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [
            (new Actions\ChangeStatus)
                ->confirmText('Please select status?')
                ->confirmButtonText('Save')
                ->cancelButtonText("Cancel")->showOnTableRow(),
        ];
    }
}
