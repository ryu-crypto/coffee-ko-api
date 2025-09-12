<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = [
            'Espresso Blends' => [
                [
                    'name' => 'Americano',
                    'price' => 120,
                    'image' => 'https://images.unsplash.com/photo-1587986047683-9f0faffbe2c2?auto=format&fit=crop&w=800&q=80',
                ],
                [
                    'name' => 'Cafe Latte',
                    'price' => 150,
                    'image' => 'https://images.unsplash.com/photo-1509042239860-f550ce710b93?auto=format&fit=crop&w=800&q=80',
                ],
                [
                    'name' => 'Spanish Latte',
                    'price' => 160,
                    'image' => 'https://images.unsplash.com/photo-1561882468-9110e03e0f78?auto=format&fit=crop&w=800&q=80',
                ],
                [
                    'name' => 'Vanilla Latte',
                    'price' => 160,
                    'image' => 'https://images.unsplash.com/photo-1617196039897-c2c3e04a77da?auto=format&fit=crop&w=800&q=80',
                ],
                [
                    'name' => 'Hazelnut Latte',
                    'price' => 160,
                    'image' => 'https://images.unsplash.com/photo-1623667827524-f1e17f2a61e3?auto=format&fit=crop&w=800&q=80',
                ],
                [
                    'name' => 'Dirty Matcha',
                    'price' => 170,
                    'image' => 'https://images.unsplash.com/photo-1604908176997-1013b56d1c18?auto=format&fit=crop&w=800&q=80',
                ],
                [
                    'name' => 'Mocha Latte',
                    'price' => 160,
                    'image' => 'https://images.unsplash.com/photo-1541167760496-1628856ab772?auto=format&fit=crop&w=800&q=80',
                ],
                [
                    'name' => 'Caramel Macchiato',
                    'price' => 170,
                    'image' => 'https://images.unsplash.com/photo-1541167760496-1628856ab772?auto=format&fit=crop&w=800&q=80',
                ],
            ],

            'Fruit Tea' => [
                [
                    'name' => 'Peach Fruit Tea',
                    'price' => 65,
                    'image' => 'https://images.unsplash.com/photo-1617196039897-c2c3e04a77da?auto=format&fit=crop&w=800&q=80',
                ],
                [
                    'name' => 'Lychee Fruit Tea',
                    'price' => 65,
                    'image' => 'https://images.unsplash.com/photo-1617196040512-39c1b2e3f1a3?auto=format&fit=crop&w=800&q=80',
                ],
                [
                    'name' => 'Green Apple Fruit Tea',
                    'price' => 65,
                    'image' => 'https://images.unsplash.com/photo-1571070171022-9811cf80d66e?auto=format&fit=crop&w=800&q=80',
                ],
                [
                    'name' => 'Blueberry Fruit Tea',
                    'price' => 65,
                    'image' => 'https://images.unsplash.com/photo-1621263762009-68360d6a8f26?auto=format&fit=crop&w=800&q=80',
                ],
                [
                    'name' => 'Strawberry Fruit Tea',
                    'price' => 65,
                    'image' => 'https://images.unsplash.com/photo-1611078489935-9e6e6f4a7c4e?auto=format&fit=crop&w=800&q=80',
                ],
            ],

            'Matcha Series' => [
                [
                    'name' => 'Matcha',
                    'price' => 120,
                    'image' => 'https://images.unsplash.com/photo-1604908811861-9a2e2f8b2a45?auto=format&fit=crop&w=800&q=80',
                ],
                [
                    'name' => 'Blueberry Matcha',
                    'price' => 130,
                    'image' => 'https://images.unsplash.com/photo-1621263762009-68360d6a8f26?auto=format&fit=crop&w=800&q=80',
                ],
                [
                    'name' => 'Strawberry Matcha',
                    'price' => 130,
                    'image' => 'https://images.unsplash.com/photo-1611078489935-9e6e6f4a7c4e?auto=format&fit=crop&w=800&q=80',
                ],
            ],

            'Frappes' => [
                [
                    'name' => 'Cookies n’ Cream Frappe',
                    'price' => 129,
                    'image' => 'https://images.unsplash.com/photo-1606761568499-6d40850c8b42?auto=format&fit=crop&w=800&q=80',
                ],
                [
                    'name' => 'Choco Frappe',
                    'price' => 129,
                    'image' => 'https://images.unsplash.com/photo-1590080876273-bdd8c5bcacae?auto=format&fit=crop&w=800&q=80',
                ],
                [
                    'name' => 'Strawberry Frappe',
                    'price' => 139,
                    'image' => 'https://images.unsplash.com/photo-1611078489935-9e6e6f4a7c4e?auto=format&fit=crop&w=800&q=80',
                ],
                [
                    'name' => 'Matcha Frappe',
                    'price' => 139,
                    'image' => 'https://images.unsplash.com/photo-1604908811861-9a2e2f8b2a45?auto=format&fit=crop&w=800&q=80',
                ],
            ],

            'Rice Meals' => [
                [
                    'name' => 'Hotdog Meal',
                    'price' => 85,
                    'image' => 'https://images.unsplash.com/photo-1617196039897-c2c3e04a77da?auto=format&fit=crop&w=800&q=80',
                ],
                [
                    'name' => 'Hungarian Sausage Meal',
                    'price' => 110,
                    'image' => 'https://images.unsplash.com/photo-1621263762009-68360d6a8f26?auto=format&fit=crop&w=800&q=80',
                ],
            ],

            'Snacks' => [
                [
                    'name' => 'Solo Fries',
                    'price' => 50,
                    'image' => 'https://images.unsplash.com/photo-1585238342024-78d387f1c456?auto=format&fit=crop&w=800&q=80',
                ],
                [
                    'name' => 'Barkada Fries',
                    'price' => 90,
                    'image' => 'https://images.unsplash.com/photo-1585238342024-78d387f1c456?auto=format&fit=crop&w=800&q=80',
                ],
                [
                    'name' => 'Siomai Sandwich',
                    'price' => 45,
                    'image' => 'https://images.unsplash.com/photo-1571070171022-9811cf80d66e?auto=format&fit=crop&w=800&q=80',
                ],
                [
                    'name' => 'Hotdog Sandwich',
                    'price' => 45,
                    'image' => 'https://images.unsplash.com/photo-1617196039897-c2c3e04a77da?auto=format&fit=crop&w=800&q=80',
                ],
                [
                    'name' => 'Hungarian Sausage Sandwich',
                    'price' => 75,
                    'image' => 'https://images.unsplash.com/photo-1621263762009-68360d6a8f26?auto=format&fit=crop&w=800&q=80',
                ],
            ],
        ];

        return view('home', compact('products'));
    }
}
