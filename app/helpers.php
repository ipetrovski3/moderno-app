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
      case 'App\Models\Companies':
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
}
