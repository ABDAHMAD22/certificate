<?php

namespace App;

use I18N_Arabic;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Ads extends Model
{
    protected $fillable = ['title', 'subtitle', 'trainer_name', 'trainer_about',
        'attached_image', 'media_id', 'image', 'price', 'mobile', 'date_type', 'start_date', 'end_date',
        'hours_no', 'place', 'ads_type_id', 'target_id', 'template_id', 'user_id',
        'editor_id', 'is_completed'
    ];

    protected $appends = ['date_type_letter'];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    const Times = ['08:00 am', '09:00 am', '10:00 am', '11:00 am', '12:00 pm', '01:00 pm', '02:00 pm',
        '03:00 pm', '04:00 pm', '05:00 pm', '06:00 pm', '07:00 pm', '08:00 pm', '09:00 pm', '10:00 pm'
    ];

    public function adsType()
    {
        return $this->belongsTo(AdsType::class);
    }

    public function contents()
    {
        return $this->hasMany(AdsContent::class);
    }

    public function features()
    {
        return $this->hasMany(AdsFeature::class);
    }

    public function times()
    {
        return $this->hasMany(AdsTime::class);
    }

    public function target()
    {
        return $this->belongsTo(Target::class);
    }

    public function template()
    {
        return $this->belongsTo(Template::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function editor()
    {
        return $this->belongsTo(Editor::class);
    }

    public function getDateTypeLetterAttribute()
    {
        return isset($this->attributes["date_type"]) && $this->attributes["date_type"] ? trans("app.date_type_{$this->attributes["date_type"]}") : trans("app.date_type_{$this->attributes["date_type"]}");
    }

    public static function getTimeText($time)
    {
        $from_am = str_contains($time, 'am');
        $time_text = null;
        if ($from_am) {
            $start = str_replace(' am', '', $time);
            $time_text = ' ص ' . $start;
        } else {
            $start = str_replace(' pm', '', $time);
            $time_text = ' م ' . $start;
        }
        return $time_text;
    }

    public static function getTimeTextRTL($time)
    {
        $from_am = str_contains($time, 'am');
        $time_text = null;
        if ($from_am) {
            $start = str_replace(' am', '', $time);
            $time_text = $start . ' ص ';
        } else {
            $start = str_replace(' pm', '', $time);
            $time_text = $start . ' م ';
        }
        return $time_text;
    }

    public static function generateAds($model)
    {
        $ads = $model;
        $template = $ads->template;
        $imgName = $template->image;
        $imgPath = storage_path('app/public/' . $imgName);
        $img = Image::make($imgPath);
        $arabic = new I18N_Arabic('Glyphs');
        $number = new I18N_Arabic('Transliteration');
        $font_file = $template->font->file;

        $attached_image_path = null;
        if (Storage::exists($ads->attached_image)) {
            $attached_image_path = storage_path('app/public/' . $ads->attached_image);
        }
        if (!$ads->attached_image && $ads->media_id) {
            $attached_image_path = Media::find($ads->media_id)->getPath();
        }
        if($attached_image_path) {
            $attached_image = Image::make($attached_image_path);
            $w = 400;
            $attached_image_new = $attached_image->fit($w, $w, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            $mask = Image::canvas($w, $w, '#000');
            $mask->circle($w, $w / 2, $w / 2, function ($draw) {
                $draw->background('#fff');
            });
            $new_img = $attached_image_new->mask($mask, false);
            $img->insert($new_img, 'top-left', 65, 55);
        }

//        $course_title = $arabic->utf8Glyphs("دورة بعنوان");
//        $x_course_title = 786;
//        $y_course_title = 320;
//        $img->text($course_title, $x_course_title, $y_course_title, function ($font) use ($font_file) {
//            $font->file(storage_path('app/public/sst-arabic-medium.ttf'));
//            $font->size(45);
//            $font->color('#ffffff');
//            $font->align('center');
//            $font->valign('center');
//        });

        $title_text = $arabic->utf8Glyphs($ads->title);
        $x_title = 786;
        $y_title = 384;
        if ($ads->subtitle) {
            $y_title = 360;
            $subtitle_text = $arabic->utf8Glyphs($ads->subtitle);
            $y_subtitle = 430;
            $img->text($subtitle_text, $x_title, $y_subtitle, function ($font) use ($font_file, $template) {
                $font->file(storage_path('app/public/' . $font_file));
                $font->size($template->settings['title_size']);//60
                $font->color('#4d8a8a');
                $font->align('center');
                $font->valign('center');
            });
        }
        $img->text($title_text, $x_title, $y_title, function ($font) use ($font_file, $template) {
            $font->file(storage_path('app/public/' . $font_file));
            $font->size($template->settings['title_size']);//35
            $font->color('#4d8a8a');
            $font->align('center');
            $font->valign('center');
        });

        $trainer_name = ' المدرب ' . $ads->trainer_name;
        $trainer_name_text = $arabic->utf8Glyphs($trainer_name);
        $x_trainer_name = 265;
        //$y_trainer_name = 515;
        $y_trainer_name = 495;
        $img->text($trainer_name_text, $x_trainer_name, $y_trainer_name, function ($font) use ($font_file, $template) {
            $font->file(storage_path('app/public/' . $font_file));
            $font->size($template->settings['trainer_size']);//30
            $font->color('#656565');
            $font->align('center');
            $font->valign('center');
        });

        $trainer_about = $ads->trainer_about;
        $trainer_about_text = $arabic->utf8Glyphs($trainer_about);
        $x_trainer_about = 265;
        $y_trainer_about = 585;
        $img->text($trainer_about_text, $x_trainer_about, $y_trainer_about, function ($font) use ($font_file, $template) {
            $font->file(storage_path('app/public/' . $font_file));
            $font->size($template->settings['trainer_about_size']);//25
            $font->color('#656565');
            $font->align('center');
            $font->valign('center');
        });

        $price = $ads->price;
        $price_text = $number->ar2en($price);
        $x_price = 250;
        $y_price = 1000;
        $img->text($price_text, $x_price, $y_price, function ($font) use ($font_file, $template) {
            $font->file(storage_path('app/public/' . $font_file));
            $font->size($template->settings['price_size']);//50
            $font->color('#4d8a8a');
            $font->align('center');
            $font->valign('center');
        });

        $currency_text = $arabic->utf8Glyphs('ريـالاً');
        $x_currency = 255;
        $y_currency = 1050;
        $img->text($currency_text, $x_currency, $y_currency, function ($font) use ($font_file, $template) {
            $font->file(storage_path('app/public/' . $font_file));
            $font->size($template->settings['currency_size']);//40
            $font->color('#374352');
            $font->align('center');
            $font->valign('center');
        });

        $label1_text = $arabic->utf8Glyphs($ads->adsType->name);
        $x_label1 = 170;
        $y_label1 = 1040;
        $img->text($label1_text, $x_label1, $y_label1, function ($font) use ($font_file, $template) {
            $font->file(storage_path('app/public/' . $font_file));
            $font->size($template->settings['type_size']);//16
            $font->color('#4e5867');
            $font->align('right');
        });

//        $label1_text = $arabic->utf8Glyphs('شهادة');
//        $x_label1 = 164;
//        $y_label1 = 1020;
//        $img->text($label1_text, $x_label1, $y_label1, function ($font) use ($font_file, $template) {
//            $font->file(storage_path('app/public/' . $font_file));
//            $font->size(22);
//            $font->color('#4e5867');
//            $font->align('right');
//        });
//
//        $label2_text = $arabic->utf8Glyphs('معتمدة');
//        $x_label2 = 164;
//        $y_label2 = 1060;
//        $img->text($label2_text, $x_label2, $y_label2, function ($font) use ($font_file, $template) {
//            $font->file(storage_path('app/public/' . $font_file));
//            $font->size(22);
//            $font->color('#4e5867');
//            $font->align('right');
//        });

        $mobile_text = $number->ar2en($ads->mobile);
        $x_mobile = 800;
        $y_mobile = 1165;
        //$y_mobile = 1178;
        $img->text($mobile_text, $x_mobile, $y_mobile, function ($font) use ($font_file, $template) {
            $font->file(storage_path('app/public/' . $font_file));
            $font->size($template->settings['mobile_size']);//22
            $font->color('#373d54');
            $font->align('center');
            $font->valign('center');
        });

        $whatsapp_text = $number->ar2en($ads->mobile);
        $x_whatsapp = 800;
        $y_whatsapp = 1242;
        //$y_whatsapp = 1255;
        $img->text($whatsapp_text, $x_whatsapp, $y_whatsapp, function ($font) use ($font_file, $template) {
            $font->file(storage_path('app/public/' . $font_file));
            $font->size($template->settings['whatsapp_size']);//22
            $font->color('#373d54');
            $font->align('center');
            $font->valign('center');
        });

        $hours_no = $number->ar2en($ads->hours_no);
        $hours_text = $arabic->utf8Glyphs('ساعة تدريبية');
        $hours_no_text = $hours_text . $hours_no;
        $x_hours = 580;
        $y_hours = 1150;
        //$x_hours = 600;
        //$y_hours = 1160;
        $img->text($hours_no_text, $x_hours, $y_hours, function ($font) use ($font_file, $template) {
            $font->file(storage_path('app/public/' . $font_file));
            $font->size($template->settings['hours_no_size']);//22
            $font->color('#60656e');
            $font->align('right');
        });

        $x_time = 580;
        $y_time = 1150;
        //$x_time = 600;
        //$y_time = 1160;
        foreach ($ads->times as $key => $item) {
            $time_text = self::getTimeText($item->to) . ' - ' . self::getTimeText($item->from);
            $y_time_item = $y_time + (($key + 1) * 25);
            $img->text($time_text, $x_time, $y_time_item, function ($font) use ($font_file, $template) {
                $font->file(storage_path('app/public/' . $font_file));
                $font->size($template->settings['time_size']);//18
                $font->color('#3b4250');
                $font->align('right');
            });
        }

        $start_date_text = $arabic->utf8Glyphs($ads->date_type_letter) . ' ' . $ads->start_date->format('Y/m/d');
        $x_date_text = 585;
        $y_start_date_text = 1228;
        //$x_date_text = 600;
        //$y_start_date_text = 1238;
        $img->text($start_date_text, $x_date_text, $y_start_date_text, function ($font) use ($font_file, $template) {
            $font->file(storage_path('app/public/' . $font_file));
            $font->size($template->settings['date_size']);//16
            $font->color('#60656e');
            $font->align('right');
        });

        $end_date_text = $arabic->utf8Glyphs($ads->date_type_letter) . ' ' . $ads->end_date->format('Y/m/d');
        $y_end_date_text = 1252;
        //$y_end_date_text = 1262;
        $img->text($end_date_text, $x_date_text, $y_end_date_text, function ($font) use ($font_file, $template) {
            $font->file(storage_path('app/public/' . $font_file));
            $font->size($template->settings['date_size']);//16
            $font->color('#60656e');
            $font->align('right');
        });

        $place_text = $arabic->utf8Glyphs($ads->place);
        $x_place = 330;
        $y_place = 1225;
        //$y_place = 1240;
        $img->text($place_text, $x_place, $y_place, function ($font) use ($font_file, $template) {
            $font->file(storage_path('app/public/' . $font_file));
            $font->size($template->settings['place_size']);//18
            $font->color('#60656e');
            $font->align('center');
            $font->valign('center');
        });

        //$x_content = 946;
        $x_content = 1025;
        $y_content = 570;
        foreach ($ads->contents as $key => $item) {
            $axes_plus = ($key + 1);
            $content_title_text = $arabic->utf8Glyphs($item->title) . ' - ' . '0' . $axes_plus;
            $y_content_item = $y_content + ($axes_plus * 55);
            $img->text($content_title_text, $x_content, $y_content_item, function ($font) use ($font_file, $template) {
                $font->file(storage_path('app/public/' . $font_file));
                $font->size($template->settings['axes_size']);//18
                $font->color('#4e5867');
                $font->align('right');
            });
        }

        //$x_feature = 376;
        $x_feature = 465;
        $y_feature = 698;
        foreach ($ads->features as $key => $item) {
            $feature_plus = ($key + 1);
            $feature_title_text = $arabic->utf8Glyphs($item->title) . ' - ' . '0' . $feature_plus;
            $y_feature_item = $y_feature + ($feature_plus * 55);
            $img->text($feature_title_text, $x_feature, $y_feature_item, function ($font) use ($font_file, $template) {
                $font->file(storage_path('app/public/' . $font_file));
                $font->size($template->settings['features_size']);//18
                $font->color('#4e5867');
                $font->align('right');
            });
        }

        $name = uniqid();
        $path = 'app/public/ads/' . $name . '.jpg';
        $img->save(storage_path($path));
        $namePath = 'ads/' . $name . '.jpg';
        return $namePath;
    }

//    public function templates() {
//        return $this->morphMany(Template::class, 'templatable');
//    }
}
