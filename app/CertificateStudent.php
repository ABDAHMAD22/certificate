<?php

namespace App;

use DateTime;
use I18N_Arabic;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

//use Johntaa\Arabic\I18N_Arabic;

class CertificateStudent extends Model
{
    protected $fillable = ['name', 'id_no', 'email', 'image', 'certificate_id', 'user_id', 'is_completed',
        'title', 'subtitle', 'date_type', 'trainer_name', 'start_date', 'end_date', 'days_no', 'hours_no',
    ];

    protected $appends = ['date_type_letter'];

    protected $attributes = ['is_completed' => 0];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    public function certificate()
    {
        return $this->belongsTo(Certificate::class);
    }

    public function getDateTypeLetterAttribute()
    {
        return isset($this->attributes["date_type"]) && $this->attributes["date_type"] ? trans("app.date_type_{$this->attributes["date_type"]}") : trans("app.date_type_{$this->attributes["date_type"]}");
    }

    public static function getDays($fdate, $tdate)
    {
        try {
            $datetime1 = new DateTime($fdate);
            $datetime2 = new DateTime($tdate);
            $interval = $datetime1->diff($datetime2);
            $days = $interval->format('%a') + 1;
        } catch (\Exception $ex) {
        }
        return $days ?? '';
    }

    public static function generateCertificate($model)
    {
        $certificate = $model->certificate;
        $template = $certificate->template;
        $type = $certificate->certificateType;
        $imgName = $template->image;
        $imgPath = storage_path('app/public/' . $imgName);
        $img = Image::make($imgPath);
        $arabic = new I18N_Arabic('Glyphs');
        $number = new I18N_Arabic('Transliteration');

        $x = 1000;//$img->width() / 2 - 80;
        $font_file = $template->font->file;

        if($template->settings['type_x'] > 0) {
            $type_text = $arabic->utf8Glyphs($type->name);
            $y_type = 380;
            $img->text($type_text, $template->settings['type_x'], $template->settings['type_y'], function ($font) use ($font_file, $template) {
                $font->file(storage_path('app/public/' . $font_file));
                $font->size($template->settings['type_size']);//80
                $font->color($template->settings['type_color']);//#0F7B62
                $font->align('center');
                $font->valign('center');
            });
        }

        $name = $model->name;
        $name_text = $arabic->utf8Glyphs($name);
        $y_name = 1130;//702;
        $img->text($name_text, $template->settings['student_name_x'], $template->settings['student_name_y'], function ($font) use ($font_file, $template) {
            $font->file(storage_path('app/public/' . $font_file));
            $font->size($template->settings['student_name_size']);//60 //$template->settings['student_name_size']
            $font->color($template->settings['student_name_color']);
            $font->align('center');
            $font->valign('center');
        });

        if($template->settings['trainer_name_x'] > 0) {
            $trainer_name = $model->trainer_name;
            $trainer_name_text = $arabic->utf8Glyphs($trainer_name);
            $img->text($trainer_name_text, $template->settings['trainer_name_x'], $template->settings['trainer_name_y'], function ($font) use ($font_file, $template) {
                $font->file(storage_path('app/public/' . $font_file));
                $font->size($template->settings['trainer_name_size']);
                $font->color($template->settings['trainer_name_color']);
                $font->align('center');
                $font->valign('center');
            });
        }

        if($template->settings['accreditation_no_x'] > 0) {
            $accreditation_no_text = $number->ar2en($certificate->accreditation_no);
            $x_accreditation_no = 1550;
            $y_accreditation_no = 835;
            $img->text($accreditation_no_text, $template->settings['accreditation_no_x'], $template->settings['accreditation_no_y'], function ($font) use ($font_file, $template) {
                $font->file(storage_path('app/public/' . $font_file));
                $font->size($template->settings['accreditation_no_size']);//35
                $font->color($template->settings['accreditation_no_color']);//#5f605f
                $font->align('right');
                $font->valign('center');
            });
        }

        $id_no_text = $model->id_no;//$number->ar2en($model->id_no);
        $x_id_no = 1655;//590;
        $y_id_no = 1285;//835;
        $img->text($id_no_text, $template->settings['id_no_x'], $template->settings['id_no_y'], function ($font) use ($font_file, $template) {
            $font->file(storage_path('app/public/' . $font_file));
            $font->size($template->settings['id_no_size']);//35 //$template->settings['id_no_size']
            $font->color($template->settings['id_no_color']);//#5f605f
            $font->align('right');
            $font->valign('center');
        });

        if($template->settings['type_word_x'] > 0) {
            $type_word_text = $arabic->utf8Glyphs($type->word);
            $x_type_word = 1150;
            $y_type_word = 925;
            $img->text($type_word_text, $template->settings['type_word_x'], $template->settings['type_word_y'], function ($font) use ($font_file, $template) {
                $font->file(storage_path('app/public/JFFlat.ttf'));
                $font->size($template->settings['type_word_size']);//58
                $font->color($template->settings['type_word_color']);//#5f605f
                $font->align('center');
                $font->valign('center');
            });
        }

        //$certificate
        if($template->settings['title_x'] > 0) {
            $title_text = $arabic->utf8Glyphs($model->title);
            $title_y = $template->settings['title_y'];//1060;
            if ($model->subtitle) {
                $title_y = $template->settings['title_y'] - 40;
                $subtitle_text = $arabic->utf8Glyphs($model->subtitle);
                $y_subtitle = 1120;
                $img->text($subtitle_text, $template->settings['title_x'], $template->settings['subtitle_y'], function ($font) use ($font_file, $template) {
                    $font->file(storage_path('app/public/' . $font_file));
                    $font->size($template->settings['title_size']);//60
                    $font->color($template->settings['title_color']);//#0F7B62
                    $font->align('center');
                    $font->valign('center');
                });
            }
            $img->text($title_text, $template->settings['title_x'], $title_y, function ($font) use ($font_file, $template) {
                $font->file(storage_path('app/public/' . $font_file));
                $font->size($template->settings['title_size']);//60
                $font->color($template->settings['title_color']);
                $font->align('center');
                $font->valign('center');
            });
        }

        //$certificate
        if($template->settings['date_x'] > 0) {
            $date_text = $arabic->utf8Glyphs($model->date_type_letter) . $model->start_date->format('Y/m/d');
            if(isset($model->end_date) && $model->end_date) {
                $date_text = $arabic->utf8Glyphs($model->date_type_letter) . ' ' . $model->end_date->format('Y/m/d') . ' - ' . $model->start_date->format('Y/m/d');
            }
            $y_date_text = 1210;
            $img->text($date_text, $template->settings['date_x'], $template->settings['date_y'], function ($font) use ($font_file, $template) {
                $font->file(storage_path('app/public/' . $font_file));
                $font->size($template->settings['date_size']);//42
                $font->color($template->settings['date_color']);//#5f605f
                $font->align('center');
                $font->valign('center');
            });
        }

        //$certificate
        if($template->settings['days_x'] > 0) {
            $days_text = $number->ar2en($model->days_no);//self::getDays($model->start_date, $model->end_date);
            $x_days = 1358;
            $y_days = 1278;
            $img->text($days_text, $template->settings['days_x'], $template->settings['days_y'], function ($font) use ($font_file, $template) {
                $font->file(storage_path('app/public/' . $font_file));
                $font->size($template->settings['days_size']);//35
                $font->color($template->settings['days_color']);//#0F7B62
                $font->align('center');
                $font->valign('center');
            });
        }

        //$certificate
        if($template->settings['hours_x'] > 0) {
            $hours_text = $number->ar2en($model->hours_no);
            $x_hours = 1100;
            $y_hours = 1278;
            $img->text($hours_text, $template->settings['hours_x'], $template->settings['hours_y'], function ($font) use ($font_file, $template) {
                $font->file(storage_path('app/public/' . $font_file));
                $font->size($template->settings['hours_size']);//42
                $font->color($template->settings['hours_color']);//#0F7B62
                $font->align('center');
                $font->valign('center');
            });
        }

//        $textx = $arabic->utf8Glyphs('لمدة 31 من الأيام، (30) من الساعات التدريبية');
//        $img->text($textx, 1100, 1150, function ($font) use ($font_file, $template) {
//            $font->file(storage_path('app/public/' . $font_file));
//            $font->size(40);//42
//            $font->color($template->settings['hours_color']);//#0F7B62
//            $font->align('center');
//            $font->valign('center');
//        });

        $name = uniqid();
        $path = 'app/public/certificates/' . $name . '.jpg';
        $img->save(storage_path($path));
        $namePath = 'certificates/' . $name . '.jpg';
        return $namePath;
    }
    //Type Size 80
    //Type Word Size 58
    //Student Name Size 60
    //accreditation no Size 35
    //id no Size 35
    //Title Size 60
    //Date Size 42
    //Days Size 35
    //Hours Size 42

//    protected static function boot()
//    {
//        parent::boot(); // TODO: Change the autogenerated stub
//        static::creating(function ($model) {
//            $model->image = self::generateCertificate($model);
//        });
//    }
}
