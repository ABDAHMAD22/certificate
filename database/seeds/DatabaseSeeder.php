<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CountrySeeder::class);
        $this->call(CitySeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(PageSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(SliderSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(TypeSeeder::class);
        $this->call(FontSeeder::class);
        $this->call(LanguageSeeder::class);
        $this->call(PartnerSeeder::class);
        $this->call(CenterSeeder::class);
        $this->call(TrainerSeeder::class);
        $this->call(TemplateSeeder::class);
        $this->call(PermitSeeder::class);
        $this->call(UserPermitSeeder::class);
        $this->call(CertificateTypeSeeder::class);
        $this->call(AdsTypeSeeder::class);
        $this->call(TargetSeeder::class);
        $this->call(DesignServiceSeeder::class);
        $this->call(DesignSubServiceSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(PaymentTypeSeeder::class);
        $this->call(PackageSeeder::class);
        $this->call(BankSeeder::class);
        $this->call(BankTransferSeeder::class);
        $this->call(AlbumSeeder::class);
    }
}
