<?php

use App\Models\Category;

class Helpers
{
    public static function color($status)
    {
        switch ($status) {
            case 'received':
                return 'danger';
                break;
            case 'confirmed':
                return 'warning';
                break;
            case 'in_production':
                return 'primary';
                break;
            case 'shipped':
                return 'info';
                break;
            case 'completed':
                return 'success';
                break;
        }
    }

    public static function buyer_type($type)
    {
        switch ($type) {
            case 'App\Models\Customer':
                return 'Физичко Лице';
                break;
            case 'App\Models\Company':
                return 'Правно Лице';
                break;
        }
    }

    public static function sum_prices($customer)
    {
        $customer_orders = $customer->orders->where('status', 'completed')->all();
        $amounts = [];
        foreach ($customer_orders as $order) {
            $amounts[] = intval(str_replace(',', '', $order->total_price));
        }
        return number_format(array_sum($amounts), 2);
    }

    public static function get_categories()
    {
        $categories = Category::where('active', true)->get();

        return $categories;
    }


    public static function towns()
    {
        $towns = array('Скопје', 'Берово', 'Битола', 'Богданци', 'Валандово', 'Велес', 'Виница', 'Гевгелија', 'Дебар', 'Делчево', 'Демир Капија', 'Демир Хисар', 'Кичево', 'Кочани', 'Кратово', 'Крива Паланка', 'Крушево', 'Куманово', 'Македонски Брод', 'Македонска Каменица', 'Неготино', 'Охрид', 'Пехчево', 'Прилеп', 'Пробиштип', 'Радовиш', 'Ресен', 'Свети Николе', 'Струга', 'Струмица', 'Тетово', 'Штип');

        return $towns;
    }

    public static function without_vat($price)
    {
        return $price - ($price * 18 / 100);
    }

    public static function transform_name($name)
    {
        switch ($name) {
            case 'Igor Petrovski':
                return 'Игор Петровски';
                break;
            case 'Bojan Petrovski':
                return 'Бојан Петровски';
                break;

            default:
                # code...
                break;
        }
    }

    public static function latin_to_cyrillic($latinString)
    {
        $cyr = [
            'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п',
            'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я',
            'А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П',
            'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я'
        ];
        $lat = [
            'a', 'b', 'v', 'g', 'd', 'e', 'io', 'zh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p',
            'r', 's', 't', 'u', 'f', 'h', 'ts', 'ch', 'sh', 'sht', 'a', 'i', 'y', 'e', 'yu', 'ya',
            'A', 'B', 'V', 'G', 'D', 'E', 'Io', 'Zh', 'Z', 'I', 'Y', 'K', 'L', 'M', 'N', 'O', 'P',
            'R', 'S', 'T', 'U', 'F', 'H', 'Ts', 'Ch', 'Sh', 'Sht', 'A', 'I', 'Y', 'e', 'Yu', 'Ya'
        ];
        return str_replace($lat, $cyr, $latinString);
    }

    public static function set_product_class($option)
    {
        switch ($option) {

            case '1':
                return '';
                break;
            case '2':
                return 'top-featured';
                break;
            case '3':
                return 'best-seller';
                break;
        }

    }

}
