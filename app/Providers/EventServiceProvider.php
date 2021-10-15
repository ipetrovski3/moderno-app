<?php

namespace App\Providers;

use App\Models\Order;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen(BuildingMenu::class, function (BuildingMenu $event) {
            $orders = Order::all();
            $event->menu->addAfter('products', [
                'text' => 'Нарачки',
                'icon' => 'fas fa-shoppingcart',
                'submenu' => [
                    [
                        'text' => 'Сите Нарачки',
                        'label' => $orders->count(),
                        'label_color' => 'success',
                        'url' => route('orders.index', 'status=all'),
                    ],
                    [
                        'text' => 'Примени',
                        'label' => $orders->where('status', 'received')->count(),
                        'label_color' => 'success',
                        'url' => route('orders.index', 'status=received' ),
                    ],
                    [
                        'text' => 'Потврдени',
                        'label' => $orders->where('status', 'confirmed')->count(),
                        'label_color' => 'success',
                        'url' => route('orders.index', 'status=confirmed' ),
                    ],
                    [
                        'text' => 'Во Производство',
                        'label' => $orders->where('status', 'in_production')->count(),
                        'label_color' => 'success',
                        'url' => route('orders.index', 'status=in_production' ),
                    ],
                    [
                        'text' => 'Испратени',
                        'label' => $orders->where('status', 'shipped')->count(),
                        'label_color' => 'success',
                        'url' => route('orders.index', 'status=shipped' ),
                    ],
                    [
                        'text' => 'Комплетирани',
                        'label' => $orders->where('status', 'completed')->count(),
                        'label_color' => 'success',
                        'url' => route('orders.index', 'status=completed' ),
                        ],
    
                ]
            ]);
        });
    }
}
