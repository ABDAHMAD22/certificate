<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;

class Ads extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Ads::class;

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

            Text::make('Title'),

            Text::make('Subtitle'),

            Text::make('Trainer Name', 'trainer_name'),

            Textarea::make('Trainer About', 'trainer_about'),

            Image::make('Attached Image', 'attached_image'),

            Image::make('Image')->hideFromIndex(),

            Number::make('Price'),

            Text::make('Mobile'),

            DateTime::make('Start Date', 'start_date')->hideFromIndex(),

            DateTime::make('End Date', 'end_date')->hideFromIndex(),

            Number::make('Hours No', 'hours_no'),

            Text::make('Place')->hideFromIndex(),

            BelongsTo::make('Ads Type', 'adsType'),

            BelongsTo::make('Target'),

            BelongsTo::make('Template'),

            HasMany::make('Contents', 'contents', AdsContent::class),

            HasMany::make('Features', 'features', AdsFeature::class),

            HasMany::make('Times', 'times', AdsTime::class),
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

    public function cards(Request $request)
    {
        return [];
    }
}
