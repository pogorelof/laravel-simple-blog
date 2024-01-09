<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.net',
            'password' => Hash::make('admin'),
            'role' => 'ADMIN'
        ]);
        $user = User::create([
            'name' => 'user',
            'email' => 'user@user.com',
            'password' => Hash::make('user')
        ]);

        $admin->articles()->create([
            'title' => 'Первая запись блога!',
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            ]);

        $user->articles()->create([
            'title' => 'События 2023 года в изображениях от Европейского космического агентства',
            'text' => 'Специалисты Европейского космического агентства (ESA) опубликовали снимки и изображения, которые иллюстрируют важнейшие события в космической сфере ушедшего года.',
            'photo_path' => 'uploads/photo2.jpeg'
            ]);
        $user->articles()->create([
            'title' => '«Волшебные острова» в морях Титана оказались айсбергами из странных материалов',
            'text' => 'В 2014 году миссия «Кассини-Гюйгенс» обнаружила в морях и озерах Титана, спутника Сатурна, яркие пятна, которые перемещались со временем. Долгое время ученые не могли понять, что это за странное явление. Похоже, теперь объяснение найдено: речь о крупных айсбергах (правда, совсем не из водного льда).',
            'photo_path' => 'uploads/photo3.jpeg'
            ]);
        $user->articles()->create([
            'title' => 'Пангея Ультима: станет ли она могилой для млекопитающих?',
            'text' => 'Британский вулканолог и научный обозреватель Робин Джордж Эндрюс разбирает в Scientific American недавние прогнозы ученых, связанные с образованием нового суперконтинента. Naked Science перевел его статью для русскоязычной аудитории.
Насколько видит глаз, повсюду простираются дюны, переливаясь под безжалостным солнцем. Это золотисто-охристое песчаное море показалось бы бесконечным любому существу, блуждающему по его просторам. Но никто не бродит по этой пустыне, здесь нет ни глотка воды. После того как все материки слились в единый суперконтинент, влага и большая часть животных остались лишь в призрачных воспоминаниях.',
            'photo_path' => 'uploads/photo4.jpeg'
            ]);
        $user->articles()->create([
            'title' => 'События 2023 года на спутниковых снимках',
            'text' => 'Американская компания Maxar Technologies опубликовала спутниковые снимки, которые запечатлели некоторые из наиболее знаковых конфликтов и катаклизмов 2023 года.',
            'photo_path' => 'uploads/photo1.jpeg'
        ]);
        $user->articles()->create([
            'title' => 'Первые наблюдения о рынке недвижимости в январе 2024',
            'text' => 'Застройщики думают, что делать с комиссиями за льготную ипотеку
Пошли слухи, что ВТБ и «Альфа» с середины января присоединяются к Сберу и тоже вводят комиссии для застройщиков за выдачу их клиентам льготной ипотеки. И теперь девелоперы по всей стране думают, как им выкручиваться: кто-то заявил о бойкоте, кто-то — о сотрудничестве с банками.

А кто-то уже даже опубликовал новые цены в двух вариантах — при обычной покупке (за наличные или в рыночную ипотеку) и при льготной ипотеке. Во втором случае квартира выходит дороже на пару миллионов, чтобы застройщик мог компенсировать комиссию банку.

При этом вариантов, что конкретно происходит со второй ценой, несколько:

Где-то просто взяли исходную цену и увеличили для льготной ипотеки.
Где-то вывели в продажи новый корпус дешевле, а для льготной ипотеки оставили старую цену.
Где-то добавили кешбэк: нужна льготная ипотека — бери квартиру на 2,3 млн дороже, а 2,1 млн мы тебе вернем. Да, ЦБ кешбэки тоже не одобрял, но вот так.

Короче, в ближайшее время на рынке появится целая куча самых разных схем, в которые застройщики попытаются впихнуть свою комиссию. Но, честно говоря, есть большое сомнение, что эти схемы проживут долго.

Скорее всего, власти попытаются как-то разрулить ситуацию: либо запретят банкам вводить комиссии за льготную ипотеку, либо застройщикам повышать по ней цены, либо вернут банкам субсидию, из-за которой разгорелся сыр-бор. Причина одна: настолько явное завышение цен по льготной ипотеке (которая всегда позиционировалась для народа как мера повышения доступности жилья) — вообще не лучшее событие перед грядущими выборами.',
            'photo_path' => 'uploads/photo5.png'
            ]);
    }
}
