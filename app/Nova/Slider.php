<?php

namespace App\Nova;

use App\Rules\CustomExists;
use Khalin\Nova\Field\Link;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use MrMonat\Translatable\Translatable;

class Slider extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Slider::class;

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

            Text::make('Title')
                ->rules('required', 'max:255'),

            Textarea::make('Description')->hideFromIndex(),

            Image::make('Image')
                ->rules(['file', 'image', 'mimes:jpg,png,jpeg,svg', 'max:2048'])
                ->creationRules('required')
                ->updateRules('nullable'),

            Text::make('Button Text', 'button_text')
                ->rules('nullable'),

            Image::make('Button Icon', 'button_icon')
                ->rules([($request->button_text ? 'required' : ''), 'file', 'image', 'mimes:jpg,png,jpeg,svg', 'max:2048']),

            Link::make('Button link', 'button_link')
                ->url(function () {
                    return $this->button_link;
                })
                ->text("Open Link")
                ->blank()
                ->rules('nullable'),
        ];
    }

    public function cards(Request $request)
    {
        return [];
    }
}
