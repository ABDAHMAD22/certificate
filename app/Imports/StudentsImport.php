<?php

namespace App\Imports;

use App\CertificateStudent;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithLimit;
use Maatwebsite\Excel\Concerns\WithValidation;

class StudentsImport implements ToCollection, ShouldQueue, WithChunkReading, WithLimit
{
    use Importable;

    public $certificate;
    protected $user_id = null;

    public function __construct($certificate)
    {
        $this->certificate = $certificate;
        if (\Auth::guard('web')->check()) {
            $this->user_id = \Auth::guard('web')->id();
        }
        if (\Auth::guard('editor')->check()) {
            $this->user_id = \Auth::guard('editor')->user()->user_id;
        }
    }

    private function removeSpaces($number) {
        $s = ucfirst($number);
        $str = ucwords(strtolower($s));
        return preg_replace('/\s+/', '', $str);
    }

    public function collection(Collection $rows)
    {
        $this->rows = $rows;
        foreach ($rows as $key => $row) {
            if (strtolower($row[0]) != 'name' && User::hasCertificates($this->certificate->user_id)) {
                CertificateStudent::create([
                    'name' => $row[0],
                    'id_no' => $this->removeSpaces($row[1]),
                    'email' => $row[2],
                    'user_id' => $this->user_id,
                    'certificate_id' => $this->certificate->id,
                    'title' => $this->certificate->title,
                    'subtitle' => $this->certificate->subtitle,
                    'date_type' => $this->certificate->date_type,
                    'trainer_name' => $this->certificate->trainer_name,
                    'start_date' => $this->certificate->start_date,
                    'end_date' => $this->certificate->end_date,
                    'days_no' => $this->certificate->days_no,
                    'hours_no' => $this->certificate->hours_no,
                ]);
            }
        }
    }

    public function chunkSize(): int
    {
        return 10;
    }

    public function limit(): int
    {
        return 1010;
    }
}
