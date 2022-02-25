<?php

namespace App\Nova;

use App\Rules\CustomExists;
use Khalin\Nova\Field\Link;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use MrMonat\Translatable\Translatable;

class Partner extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Partner::class;

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
        'Name'
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
            //, new CustomExists(\App\Partner::class, $request->resourceId)

            Link::make('Link')
                ->url(function () {
                    return $this->link;
                })
                ->text("Open Link")
                ->blank()
                ->rules('nullable', 'url'),

            Image::make('Logo')->rules('mimes:jpg,png,jpeg,svg')->creationRules('required'),
        ];
    }

    public function cards(Request $request)
    {
        return [];
    }
}
