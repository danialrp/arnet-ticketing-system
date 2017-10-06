<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contents')->delete();

        DB::table('contents')->insert([
            ['id' => 1, 'owner' => 1, 'ticket_id' => 1, 'created_fa' => '1395-08-13 11:21:48', 'body' => 'داستان حول محور دو شخصیت اصلی به نام‌های پابلو اسکوبار (با بازی واگنر موورا) سرکرده گروه کلمبیایی کوکائین و خاویر پینا (با بازی پدرو پاسکال) مأمور مکزیکی ستاد مبارزه با مواد مخدر DEA می‌گذرد که پینا از سوی مقامات عالی رتبه آمریکایی طی یک مأموریت به کلمبیا فرستاده می‌شود تا اسکوبار را دستگیر کند یا در بدترین حالت او را به قتل برساند'],
            ['id' => 2, 'owner' => 3, 'ticket_id' => 1, 'created_fa' => '1395-08-14 11:21:48', 'body' => 'حوری مشترک در ماجرایی در برابر گروه دیگری قرار می‌گیرند و تلاش می‌کنند تا موفق شوند و به هدفشان برسند. معمولاً آنچه که باعث شروع داستان می‌شود حادثه‌ای است که هدف شخصیت‌ها را شکل می‌دهد و در پایان‌بندی پاسخی برای حادثه ایجاد شده به دست می‌آید. در ماجرای نیمروز شروع مبارزه مسلحانه از طرف مجاهدین خلق که همزمان با عزل بنی‌صدر در ریاست جمهوریست شروع تحقیقات سپاه و آغاز درام است. به مرور گروهی ۵ نفره تشکیل می‌شود که در آن رحیم (احمد مهرانفر) سرپرست، مسعود (مهدی زمین پرداز) بازجو، صادق (جواد عزتی) حفاظت اطلاعات، حامد (مهردادزی‌فر) سرپرست گروه ضربت است'],
            ['id' => 3, 'owner' => 1, 'ticket_id' => 1, 'created_fa' => '1395-08-14 11:22:48', 'body' => 'ر برابر گروه دیگری قرار می‌گیرند و تلاش می‌کنند تا موفق شوند و به هدفشان برسنر برابر گروه دیگری قرار می‌گیرند و تلاش می‌کنند تا موفق شوند و به هدفشان برسنر برابر گروه دیگری قرار می‌گیرند و تلاش می‌کنند تا موفق شوند و به هدفشان برسنر برابر گروه دیگری قرار می‌گیرند و تلاش می‌کنند تا موفق شوند و به هدفشان برسنر برابر گروه دیگری قرار می‌گیرند و تلاش می‌کنند تا موفق شوند و به هدفشان برسنر برابر گروه دیگری قرار می‌گیرند و تلاش می‌کنند تا موفق شوند و به هدفشان برسنر برابر گروه دیگری قرار می‌گیرند و تلاش می‌کنند تا موفق شوند و به هدفشان برسنر برابر گروه دیگری قرار می‌گیرند و تلاش می‌کنند تا موفق شوند و به هدفشان برسنر برابر گروه دیگری قرار می‌گیرند و تلاش می‌کنند تا موفق شوند و به هدفشان برسنر برابر گروه دیگری قرار می‌گیرند و تلاش می‌کنند تا موفق شوند و به هدفشان برسنبا در برابر گروه دیگری قرار می‌گیرند و تلاش می‌کنند تا موفق شوند و به هدفشان برسند. معمولاً آنچه که باعث شروع داستان می‌شود حادثه‌ای است که هدف شخصیت‌ها را شکل می‌دهد و در پایان‌بندی پاسخی برای حادثه ایجاد شده به دست می‌آید. در ماجرای نیمروز شروع مبارزه مسلحانه از طرف یقات سپاه و آغاز درام است. به مرور گروهی ۵ نفره تشکیل می‌شود که در آن رحیم (احمد مهرانفر) سرپرست، مسعود (مهدی زمین پرداز) بازجو، صادق (جواد عزتی) حفاظت اطلاعات، حامد (مهرداد صدیقیان) دستیار سرپرست/گروه ضربت و کمال (هادی حجازی‌فر) سرپرست گروه ضربت است'],
            ['id' => 4, 'owner' => 3, 'ticket_id' => 1, 'created_fa' => '1395-08-16 11:21:48', 'body' => 'درام محوری ماجرای نیمروز از نوع گروه در برابر گروه است. در این شکل درام چند شخصیت با اهداف مختلف اما با هدف محوری مشترک در ماجرایی در برابر گروه دیگری قرار می‌گیرند و تلاش می‌کنند تا موفق شوند و به هدفشان برسند. معمولاً آنچه که باعث شروع داستان می‌شود حادثه‌ای است که هدف شخصیت‌ها را شکل می‌دهد و در پایان‌بندی پاسخی برای حادثه ایجاد شده به دست می‌آید. در ماجرای نیمروز شروع مبارزه مسلحانه از طرف مجاهدین خلق که همزما و آغاز درام است. به  مسعود (مهدی زمین پرداز) بازجو، صوه ضربت است'],
            ['id' => 5, 'owner' => 2, 'ticket_id' => 2, 'created_fa' => '1395-08-17 11:21:48', 'body' => 'داستان حول محور دو شخصیت اصلی به نام‌های پابلو اسکوبار (با بازی واگنر موورا) سرکرده گروه کلمبیایی کوکائین و خاویر پینا (با بازی پدرو پاسکال) مأمور مکزیکی ستاد مبارزه با مواد مخه قتل برساند'],
            ['id' => 6, 'owner' => 4, 'ticket_id' => 3, 'created_fa' => '1395-08-15 11:21:48', 'body' => 'داستان حول محور دو شخصیت اصلی به نام‌های پابلو اسکوبار (با بازی واگنر موورا) سرکرده گروه کلمبیایی کوکائین و خاویر پینا (با بازی پدرو پاسکال) مأمور مکزیکی ستاد مبارزه با مواد مخدر DEA می‌گذرد که پینا از سوی مقامات عالی رتبه آمریکایی طی یک مأموریت به کلمبیا فرستاده می‌شود تا اسکوبار را دستگیر کند یا در بدترین حالت او را به قتل برساند'],
            ['id' => 7, 'owner' => 2, 'ticket_id' => 3, 'created_fa' => '1395-08-18 11:21:48', 'body' => ' حادثه ایجاد شده به دست می‌آید. در ماجرای نیمروز شروع مبارزه مسلحانه از طرف مجاهدین خلق که همزمان با عزل بنی‌صدر در ریاست جمهوریست شروع تحقیقات سپاه و آغاز درام است. به مرور گروهی ۵ نفره تشکیل می‌شود که در آن رحیم (احمد مهرانفر) سرپرست، مسعود (مهدی زمین پرداز) بازجو، صادق (جواد عزتی) حفاظت اطلاعات، حامد (مهرداد صدیقیان) دستیار سرپرست/گروه ضربت و کمال (هادی حجازی‌فر) سرپرست گروه ضربت است']

        ]);
    }
}
