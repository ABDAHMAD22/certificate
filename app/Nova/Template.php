<?php

namespace App\Nova;

use DigitalCreative\ConditionalContainer\ConditionalContainer;
use DigitalCreative\ConditionalContainer\HasConditionalContainer;
use DigitalCreative\JsonWrapper\HasJsonWrapper;
use DigitalCreative\JsonWrapper\JsonWrapper;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Timothyasp\Color\Color;

class Template extends Resource
{
    use HasConditionalContainer;

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Template::class;

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
                ->rules('nullable', 'max:255'),

            Image::make('Image')->rules('mimes:jpg,png,jpeg')->creationRules('required'),

            BelongsTo::make('Type')->rules('required'),

            BelongsTo::make('Font')->rules('required'),

            ConditionalContainer::make([
                JsonWrapper::make('settings', [
                    Number::make('Type x')->rules('required')->withMeta([
                        'value' => (function () {
                            return $this->settings['type_x'] ?? 0;
                        })(),
                    ]),
                    Number::make('Type y')->rules('required')->withMeta([
                        'value' => (function () {
                            return $this->settings['type_y'] ?? 0;
                        })(),
                    ]),
                    Number::make('Type Size')->rules('required')->withMeta([
                        'value' => (function () {
                            return $this->settings['type_size'] ?? 100;
                        })(),
                    ]),
                    Color::make('Type Color')->slider()->rules('required')->withMeta([
                        'value' => (function () {
                            return $this->settings['type_color'] ?? '#000000';
                        })(),
                    ]),
                    Number::make('Type Word x')->rules('required')->withMeta([
                        'value' => (function () {
                            return $this->settings['type_word_x'] ?? 0;
                        })(),
                    ]),
                    Number::make('Type Word y')->rules('required')->withMeta([
                        'value' => (function () {
                            return $this->settings['type_word_y'] ?? 0;
                        })(),
                    ]),
                    Number::make('Type Word Size')->rules('required')->withMeta([
                        'value' => (function () {
                            return $this->settings['type_word_size'] ?? 58;
                        })(),
                    ]),
                    Color::make('Type Word Color')->slider()->rules('required')->withMeta([
                        'value' => (function () {
                            return $this->settings['type_word_color'] ?? '#000000';
                        })(),
                    ]),
                    Number::make('Student Name x')->rules('required')->withMeta([
                        'value' => (function () {
                            return $this->settings['student_name_x'] ?? 0;
                        })(),
                    ]),
                    Number::make('Student Name y')->rules('required')->withMeta([
                        'value' => (function () {
                            return $this->settings['student_name_y'] ?? 0;
                        })(),
                    ]),
                    Number::make('Student Name Size')->rules('required')->withMeta([
                        'value' => (function () {
                            return $this->settings['student_name_size'] ?? 100;
                        })(),
                    ]),
                    Color::make('Student Name Color')->slider()->rules('required')->withMeta([
                        'value' => (function () {
                            return $this->settings['student_name_color'] ?? '#000000';
                        })(),
                    ]),
                    //
                    Number::make('Trainer Name x')->rules('required')->withMeta([
                        'value' => (function () {
                            return $this->settings['trainer_name_x'] ?? 0;
                        })(),
                    ]),
                    Number::make('Trainer Name y')->rules('required')->withMeta([
                        'value' => (function () {
                            return $this->settings['trainer_name_y'] ?? 0;
                        })(),
                    ]),
                    Number::make('Trainer Name Size')->rules('required')->withMeta([
                        'value' => (function () {
                            return $this->settings['trainer_name_size'] ?? 100;
                        })(),
                    ]),
                    Color::make('Trainer Name Color')->slider()->rules('required')->withMeta([
                        'value' => (function () {
                            return $this->settings['trainer_name_color'] ?? '#000000';
                        })(),
                    ]),
                    Number::make('Accreditation No x')->rules('required')->withMeta([
                        'value' => (function () {
                            return $this->settings['accreditation_no_x'] ?? 0;
                        })(),
                    ]),
                    Number::make('Accreditation No y')->rules('required')->withMeta([
                        'value' => (function () {
                            return $this->settings['accreditation_no_y'] ?? 0;
                        })(),
                    ]),
                    Number::make('Accreditation No Size')->rules('required')->withMeta([
                        'value' => (function () {
                            return $this->settings['accreditation_no_size'] ?? 35;
                        })(),
                    ]),
                    Color::make('Accreditation No Color')->slider()->rules('required')->withMeta([
                        'value' => (function () {
                            return $this->settings['accreditation_no_color'] ?? '#000000';
                        })(),
                    ]),
                    Number::make('ID No x')->rules('required')->withMeta([
                        'value' => (function () {
                            return $this->settings['id_no_x'] ?? 0;
                        })(),
                    ]),
                    Number::make('ID No y')->rules('required')->withMeta([
                        'value' => (function () {
                            return $this->settings['id_no_y'] ?? 0;
                        })(),
                    ]),
                    Number::make('ID No Size')->rules('required')->withMeta([
                        'value' => (function () {
                            return $this->settings['id_no_size'] ?? 35;
                        })(),
                    ]),
                    Color::make('ID No Color')->slider()->rules('required')->withMeta([
                        'value' => (function () {
                            return $this->settings['id_no_color'] ?? '#000000';
                        })(),
                    ]),
                    Number::make('Title x')->rules('required')->withMeta([
                        'value' => (function () {
                            return $this->settings['title_x'] ?? 0;
                        })(),
                    ]),
                    Number::make('Title y')->rules('required')->withMeta([
                        'value' => (function () {
                            return $this->settings['title_y'] ?? 0;
                        })(),
                    ]),
                    Number::make('Title Size')->rules('required')->withMeta([
                        'value' => (function () {
                            return $this->settings['title_size'] ?? 75;
                        })(),
                    ]),
                    Color::make('Title Color')->slider()->rules('required')->withMeta([
                        'value' => (function () {
                            return $this->settings['title_color'] ?? '#000000';
                        })(),
                    ]),
                    Number::make('Subtitle y')->rules('required')->withMeta([
                        'value' => (function () {
                            return $this->settings['subtitle_y'] ?? 0;
                        })(),
                    ]),
                    Number::make('Date x')->rules('required')->withMeta([
                        'value' => (function () {
                            return $this->settings['date_x'] ?? 0;
                        })(),
                    ]),
                    Number::make('Date y')->rules('required')->withMeta([
                        'value' => (function () {
                            return $this->settings['date_y'] ?? 0;
                        })(),
                    ]),
                    Number::make('Date Size')->rules('required')->withMeta([
                        'value' => (function () {
                            return $this->settings['date_size'] ?? 42;
                        })(),
                    ]),
                    Color::make('Date Color')->slider()->rules('required')->withMeta([
                        'value' => (function () {
                            return $this->settings['date_color'] ?? '#000000';
                        })(),
                    ]),
                    Number::make('Days x')->rules('required')->withMeta([
                        'value' => (function () {
                            return $this->settings['days_x'] ?? 0;
                        })(),
                    ]),
                    Number::make('Days y')->rules('required')->withMeta([
                        'value' => (function () {
                            return $this->settings['days_y'] ?? 0;
                        })(),
                    ]),
                    Number::make('Days Size')->rules('required')->withMeta([
                        'value' => (function () {
                            return $this->settings['days_size'] ?? 35;
                        })(),
                    ]),
                    Color::make('Days Color')->slider()->rules('required')->withMeta([
                        'value' => (function () {
                            return $this->settings['days_color'] ?? '#000000';
                        })(),
                    ]),
                    Number::make('Hours x')->rules('required')->withMeta([
                        'value' => (function () {
                            return $this->settings['hours_x'] ?? 0;
                        })(),
                    ]),
                    Number::make('Hours y')->rules('required')->withMeta([
                        'value' => (function () {
                            return $this->settings['hours_y'] ?? 0;
                        })(),
                    ]),
                    Number::make('Hours Size')->rules('required')->withMeta([
                        'value' => (function () {
                            return $this->settings['hours_size'] ?? 42;
                        })(),
                    ]),
                    Color::make('Hours Color')->slider()->rules('required')->withMeta([
                        'value' => (function () {
                            return $this->settings['hours_color'] ?? '#000000';
                        })(),
                    ]),
                ])
            ])->if('type = 1'),

            ConditionalContainer::make([
                JsonWrapper::make('settings', [
                    Number::make('Title Size')->rules('required')->withMeta([
                        'value' => (function () {
                            return $this->settings['title_size'] ?? 40;
                        })(),
                    ]),
                    Number::make('Trainer Size')->rules('required')->withMeta([
                        'value' => (function () {
                            return $this->settings['trainer_size'] ?? 30;
                        })(),
                    ]),
                    Number::make('Trainer About Size')->rules('required')->withMeta([
                        'value' => (function () {
                            return $this->settings['trainer_about_size'] ?? 25;
                        })(),
                    ]),
                    Number::make('Price Size')->rules('required')->withMeta([
                        'value' => (function () {
                            return $this->settings['price_size'] ?? 50;
                        })(),
                    ]),
                    Number::make('Currency Size')->rules('required')->withMeta([
                        'value' => (function () {
                            return $this->settings['currency_size'] ?? 40;
                        })(),
                    ]),
                    Number::make('Type Size')->rules('required')->withMeta([
                        'value' => (function () {
                            return $this->settings['type_size'] ?? 16;
                        })(),
                    ]),
                    Number::make('Mobile Size')->rules('required')->withMeta([
                        'value' => (function () {
                            return $this->settings['mobile_size'] ?? 22;
                        })(),
                    ]),
                    Number::make('Whatsapp Size')->rules('required')->withMeta([
                        'value' => (function () {
                            return $this->settings['whatsapp_size'] ?? 22;
                        })(),
                    ]),
                    Number::make('Hours No Size')->rules('required')->withMeta([
                        'value' => (function () {
                            return $this->settings['hours_no_size'] ?? 22;
                        })(),
                    ]),
                    Number::make('Date Size')->rules('required')->withMeta([
                        'value' => (function () {
                            return $this->settings['date_size'] ?? 18;
                        })(),
                    ]),
                    Number::make('Place Size')->rules('required')->withMeta([
                        'value' => (function () {
                            return $this->settings['place_size'] ?? 18;
                        })(),
                    ]),
                    Number::make('Axes Size')->rules('required')->withMeta([
                        'value' => (function () {
                            return $this->settings['axes_size'] ?? 18;
                        })(),
                    ]),
                    Number::make('Features Size')->rules('required')->withMeta([
                        'value' => (function () {
                            return $this->settings['features_size'] ?? 18;
                        })(),
                    ]),
                    Number::make('Time Size')->rules('required')->withMeta([
                        'value' => (function () {
                            return $this->settings['time_size'] ?? 18;
                        })(),
                    ]),
                ]),
            ])->if('type = 2'),
        ];
    }

    public function cards(Request $request)
    {
        return [];
    }
}
