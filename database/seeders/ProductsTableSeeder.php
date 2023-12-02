<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'title' => 'Средство для мытья стекол Mr Muscle Профессионал, спрей, 500 мл',
            'category_id' => 1,
            'country' => 'Россия',
            'brand' => 'Mr Muscle',
            'pack' => '105 x 50 x 270 мм',
            'release' => 'Спрей',
            'weight' => 586,
            'price' => 175,
            'news' => 1,
            'desc' => 'Средство для мытья стекол очень быстро и эффективно удаляет любые загрязнения, делая поверхность сияющей и чистой. Благодаря наличию в составе нашатырного спирта продукт не оставляет разводов',
            'amount' => 10,
            'created_at' => NOW()
        ]);

        DB::table('products')->insert([
            'title' => 'Средство для мытья стекол и поверхностей Mr Muscle со спиртом, спрей, 500 мл',
            'category_id' => 1,
            'country' => 'Нидерланды',
            'brand' => 'Mr Muscle',
            'pack' => '105 x 50 x 270 мм',
            'release' => 'Спрей',
            'weight' => 560,
            'price' => 130,
            'hits' => 1,
            'desc' => 'Идеально подходит для окон, зеркал, кафеля, автомобильных стекол, панелей бытовых электроприборов, поверхности холодильника. Не используйте на полированных и лакированных деревянных поверхностях',
            'amount' => 10,
            'created_at' => NOW()
        ]);

        DB::table('products')->insert([
            'title' => 'Средство для мытья окон и зеркал Clin, яблоко, спрей, 500 мл',
            'category_id' => 1,
            'country' => 'Австрия',
            'brand' => 'Clin',
            'pack' => '102 x 50 x 255 мм',
            'release' => 'Спрей',
            'aroma' => 'Яблоко',
            'weight' => 550,
            'price' => 185,
            'promo' => 1,
            'desc' => 'Средство для мытья окон, зеркал и стеклянных поверхностей, обеспечивает блеск и сияние без разводов. Отталкивает воду и грязь. Имеет два режима: спрей – для широких поверхностей, пена – для стойких загрязнений',
            'amount' => 10,
            'created_at' => NOW()
        ]);

        DB::table('products')->insert([
            'title' => 'Очиститель Bravo Pavimenti, нейтральный, 1 л., TENAX',
            'category_id' => 2,
            'country' => 'Италия',
            'brand' => 'Tenax',
            'series' => 'Bravo',
            'density' => 1,
            'ph' => 1,
            'volume' => 1,
            'price' => 1030,
            'news' => 1,
            'desc' => 'Нейтральное моющее средство (мыло для камня), которое можно использовать на мраморе, граните, керамической плитке, резине, пластике и дереве. Тщательно очищает и удаляет жир, не повреждая даже самые деликатные поверхности',
            'amount' => 10,
            'created_at' => NOW()
        ]);

        DB::table('products')->insert([
            'title' => 'Очиститель Bravo Sgrassatore, щелочной, 1л., TENAX',
            'category_id' => 2,
            'country' => 'Италия',
            'brand' => 'Tenax',
            'series' => 'Bravo',
            'density' => 1.1,
            'ph' => 11.5,
            'volume' => 1000,
            'price' => 1300,
            'hits' => 1,
            'desc' => 'Сильноконцентрированное щелочное моющее средство на водной основе для удаления загрязнений синтетической природы (воск, краски, смолы, синтетические масла и чернила) и маслянистой природы (масла, животные и растительные жиры, мыло)',
            'amount' => 10,
            'created_at' => NOW()
        ]);

        DB::table('products')->insert([
            'title' => 'Очиститель Bravo Disincrostante, кислотный, 1 л., TENAX',
            'category_id' => 2,
            'country' => 'Италия',
            'brand' => 'Tenax',
            'series' => 'Bravo',
            'density' => 1.1,
            'ph' => 1.5,
            'volume' => 1000,
            'price' => 1250,
            'promo' => 1,
            'desc' => 'Сильнодействующий кислотосодержащий очиститель на водной основе. Эффективно удаляет высолы, известковый налет, строительную грязь, следы краски и пятен ржавчины',
            'amount' => 10,
            'created_at' => NOW()
        ]);


    }
}
