<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            // Smartphone & Tablet (category_id: 1)
            ['category_id' => 1, 'name' => 'Samsung Galaxy A54 5G', 'description' => 'Smartphone Samsung dengan layar Super AMOLED 6.4 inch, RAM 8GB, Storage 256GB, Kamera 50MP', 'price' => 5499000],
            ['category_id' => 1, 'name' => 'iPhone 15 Pro Max', 'description' => 'iPhone terbaru dengan chip A17 Pro, layar 6.7 inch, kamera 48MP, Dynamic Island', 'price' => 21999000],
            ['category_id' => 1, 'name' => 'Xiaomi Redmi Note 12 Pro', 'description' => 'HP Xiaomi dengan layar AMOLED 120Hz, kamera 108MP, fast charging 67W', 'price' => 3799000],
            ['category_id' => 1, 'name' => 'OPPO Reno 10 Pro', 'description' => 'Smartphone OPPO dengan kamera telephoto 32MP, layar 120Hz, charging 80W', 'price' => 6999000],
            ['category_id' => 1, 'name' => 'Vivo V29 5G', 'description' => 'HP Vivo dengan Aura Light Portrait, kamera 50MP, RAM 12GB', 'price' => 5499000],
            ['category_id' => 1, 'name' => 'Samsung Galaxy Tab S9', 'description' => 'Tablet Samsung layar 11 inch, Snapdragon 8 Gen 2, S Pen included', 'price' => 11999000],

            // Laptop & Komputer (category_id: 2)
            ['category_id' => 2, 'name' => 'ASUS ROG Strix G16', 'description' => 'Laptop gaming Intel i7 Gen 13, RTX 4060, RAM 16GB, SSD 512GB', 'price' => 22999000],
            ['category_id' => 2, 'name' => 'Lenovo IdeaPad Slim 5', 'description' => 'Laptop ultrabook AMD Ryzen 7, RAM 16GB, SSD 512GB, layar 14 inch FHD', 'price' => 10999000],
            ['category_id' => 2, 'name' => 'HP Pavilion 15', 'description' => 'Laptop HP Intel Core i5 Gen 12, RAM 8GB, SSD 512GB, Windows 11', 'price' => 8499000],
            ['category_id' => 2, 'name' => 'Acer Aspire 5', 'description' => 'Laptop Acer AMD Ryzen 5, RAM 8GB, SSD 256GB, layar 15.6 inch IPS', 'price' => 7299000],
            ['category_id' => 2, 'name' => 'MacBook Air M2', 'description' => 'Laptop Apple dengan chip M2, RAM 8GB, SSD 256GB, layar Retina 13.6 inch', 'price' => 18999000],
            ['category_id' => 2, 'name' => 'MSI Modern 14', 'description' => 'Laptop kerja Intel Core i5, RAM 8GB, SSD 512GB, desain premium', 'price' => 9499000],

            // TV & Audio (category_id: 3)
            ['category_id' => 3, 'name' => 'Samsung Smart TV 55" 4K', 'description' => 'Smart TV Samsung Crystal UHD 4K, Tizen OS, HDR10+, Voice Assistant', 'price' => 7999000],
            ['category_id' => 3, 'name' => 'LG OLED TV 55"', 'description' => 'TV OLED LG dengan WebOS, Dolby Vision, Dolby Atmos, Magic Remote', 'price' => 17999000],
            ['category_id' => 3, 'name' => 'TCL Android TV 43" 4K', 'description' => 'Smart TV TCL dengan Google TV, layar 4K HDR, built-in Chromecast', 'price' => 4299000],
            ['category_id' => 3, 'name' => 'Sony Soundbar HT-S400', 'description' => 'Soundbar Sony 2.1ch dengan wireless subwoofer, Bluetooth, 330W', 'price' => 2999000],
            ['category_id' => 3, 'name' => 'JBL Flip 6 Speaker', 'description' => 'Speaker portable JBL waterproof IP67, bluetooth, 12 jam battery', 'price' => 1599000],
            ['category_id' => 3, 'name' => 'Sony WH-1000XM5', 'description' => 'Headphone wireless Sony ANC terbaik, 30 jam battery, audio Hi-Res', 'price' => 4999000],

            // Peralatan Rumah Tangga (category_id: 4)
            ['category_id' => 4, 'name' => 'Samsung Kulkas 2 Pintu', 'description' => 'Kulkas Samsung 300L, Digital Inverter, Twin Cooling Plus, hemat listrik', 'price' => 6499000],
            ['category_id' => 4, 'name' => 'LG Mesin Cuci Front Load', 'description' => 'Mesin cuci LG 8.5kg, AI DD, Steam Wash, Smart ThinQ', 'price' => 7999000],
            ['category_id' => 4, 'name' => 'Panasonic AC 1 PK', 'description' => 'AC Panasonic Inverter, Nanoe-G, hemat listrik, auto swing', 'price' => 4599000],
            ['category_id' => 4, 'name' => 'Philips Air Fryer XXL', 'description' => 'Air Fryer Philips 7.3L, Fat Removal Tech, Rapid Air, digital control', 'price' => 3299000],
            ['category_id' => 4, 'name' => 'Sharp Rice Cooker Digital', 'description' => 'Rice cooker Sharp 1.8L, digital display, 12 menu masak, inner pot tebal', 'price' => 899000],
            ['category_id' => 4, 'name' => 'Electrolux Vacuum Cleaner', 'description' => 'Vacuum cleaner Electrolux 2000W, HEPA filter, anti-allergen', 'price' => 1899000],

            // Aksesoris Elektronik (category_id: 5)
            ['category_id' => 5, 'name' => 'Apple AirPods Pro 2', 'description' => 'TWS Apple dengan ANC, Spatial Audio, MagSafe case, 6 jam battery', 'price' => 3999000],
            ['category_id' => 5, 'name' => 'Samsung Galaxy Watch 6', 'description' => 'Smartwatch Samsung, WearOS, BIA sensor, sleep tracking, GPS', 'price' => 4499000],
            ['category_id' => 5, 'name' => 'Logitech MX Master 3S', 'description' => 'Mouse wireless premium, 8000 DPI, silent click, USB-C charging', 'price' => 1599000],
            ['category_id' => 5, 'name' => 'Anker PowerCore 20000mAh', 'description' => 'Power bank Anker 20000mAh, fast charging 22.5W, 2 USB output', 'price' => 499000],
            ['category_id' => 5, 'name' => 'Baseus GaN Charger 65W', 'description' => 'Charger USB-C 65W GaN, multi port, fast charging laptop & HP', 'price' => 399000],
            ['category_id' => 5, 'name' => 'Xiaomi Mi Band 8', 'description' => 'Fitness tracker Xiaomi, AMOLED 1.62 inch, SpO2, 150+ sports mode', 'price' => 599000],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
