<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Certificate extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Certificate::class;

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

//            Text::make('Type'),

            BelongsTo::make('Certificate Type', 'certificateType'),

            BelongsTo::make('Template'),

            BelongsTo::make('Language'),

            Text::make('Accreditation No', 'accreditation_no'),

            DateTime::make('Start Date', 'start_date')->hideFromIndex(),

            DateTime::make('End Date', 'end_date')->hideFromIndex(),

            Number::make('Hours No','hours_no'),

            Text::make('Trainer Name', 'trainer_name'),

            Text::make('Certificate Students', function () {
                return $this->resource->certificate_student_count;
            })->exceptOnForms(),

            HasMany::make('Certificate Students', 'CertificateStudent'),
        ];
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->withCount('certificateStudent');
    }

    public static function detailQuery(NovaRequest $request, $query)
    {
        return $query->withCount('certificateStudent');
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
