<?php

use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Page::create([
            'title' => ['en' => 'About Us', 'ar' => 'من نحن'],
            'slug' => 'about',
            'active' => true,
            'details' => [
                'en' => '<p>Shehada Tech, is an electronic service that aims to serve training establishments, trainers and trainers by making it easy to design and issue training announcements and certificates for courses and programs.</p>
                        <p>We put in a Shehada Tech that is affordable for everyone, you will not need to bother to design yourself, search for someone who designs for you, or delay issuing advertisements and certificates, we are here to serve you.</p>
                        <p>Shehada Tech, a service provided by (Al Shawi Training and Consulting) that meets your needs and aims to your satisfaction.</p>',
                'ar' => '<p>شهادة تك ، هي خدمة إلكترونية تهدف لخدمة المنشآت التدريبية والمدربين والمدربات وذلك عبر إتاحة تصميم وإصدار الإعلانات التدريبية والشهادات للدورات والبرامج بكل سهولة .</p>
                    <p>وضعنـا في شهادة تك باقات في متناول الجميع ، لن تحتاج الآن إلى عناء التصميم بنفسك ، أو البحث عمن يصمم لك ، أو التأخر في إصدار الإعلانات والشهادات ، نحن هنـا في خدمتك .</p>
                    <p>شهادة تك ، خدمة مقدمة من ( الشاوي للتدريب والاستشارات ) تلبي احتياجاتكم وتهدف لرضاكم .</p>',
            ],
        ]);
        \App\Page::create([
            'title' => ['en' => 'Terms', 'ar' => 'الشروط والأحكام'],
            'slug' => 'terms',
            'active' => true,
            'details' => [
                'en' => '<h4>General Provisions</h4>
                    <p>Tech certificate, is an electronic service that aims to serve training establishments, trainers and trainers by making it easy to design and issue training announcements and certificates for courses and programs.</p>
                    <p>We put a certificate in the package, affordable packages for everyone, now you will not need to bother designing yourself, searching for someone who designs for you, or delaying issuing advertisements and certificates, we are here to serve you</p>
                    <h4>Pledges and guarantees</h4>
                    <ul>
                        <li>Comply with all laws, regulations and rules in force in the Kingdom of Saudi Arabia when using the site or services</li>
                        <li>Provide complete and correct information according to what is required to fill in fields such as name, phone number, email and other required data. And pledge your full responsibility</li>
                        <li>We are not responsible for any use of any content that has been created, stored or uploaded by any third party</li>
                        <li>We do not guarantee that the functional aspects of the website or its content will be error free, without interruption or free from unauthorized access, or to meet your requirements, or that the website, its contents or the server it provides is free from viruses or other harmful components</li>
                    </ul>',
                'ar' => '<h4>أحكام عامة</h4>
                    <p>شهادة تك ، هي خدمة إلكترونية تهدف لخدمة المنشآت التدريبية والمدربين والمدربات وذلك عبر إتاحة تصميم وإصدار الإعلانات التدريبية والشهادات للدورات والبرامج بكل سهولة .</p>
                    <p>وضعنـا في شهادة تك باقات في متناول الجميع ، لن تحتاج الآن إلى عناء التصميم بنفسك ، أو البحث عمن يصمم لك ، أو التأخر في إصدار الإعلانات والشهادات ، نحن هنـا في خدمتك .</p>
                    <h4>التعهدات والضمانات</h4>
                    <ul>
                        <li>
                        <p>الامتثال لجميع القوانين واللوائح والقواعد المعمول بها في المملكة العربية السعودية عند استخدام الموقع أو الخدمات.</p>
                        </li>
                        <li>
                        <p>تقديم معلومات كاملة وصحيحة وفقاً لما هو مطلوب لملأ الحقول مثل الاسم ورقم الهاتف والبريد الإلكتروني وغيرها من البيانات المطلوبة. وتتعهدبمسئوليتك الكاملة&nbsp;عن أي أخطاء في هذه المعلومات.</p>
                        </li>
                        <li>
                        <p>نحن لا نتحمل أية مسؤولية عن أي استخدام لأي محتوى تم وضعه أو تخزينه أو رفعه من قِبل أي طرف ثالث.</p>
                        </li>
                        <li>
                        <p>نحن لا نضمن بأن الجوانب الوظيفية للموقع الإلكتروني أو محتواه ستكون خالية من الأخطاء، دون انقطاع أو خالياً من الوصول غير المصرح به، أو لتلبية متطلباتك، أو أن الموقع الإلكتروني أو محتوياته أو الخادم الذي يعمل على توفيره خالٍ من الفيروسات أو غيرها من المكونات الضارة.</p>
                        </li>
                    </ul>',
            ],
        ]);
    }
}
