<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            // ELECTRONICS (ID: 1)
            [
                'category_id' => 1,
                'name' => 'iPhone 15 Pro Max',
                'description' => 'The ultimate iPhone with titanium design, A17 Pro chip, and 48MP camera system.',
                'price' => 24999000,
                'image' => 'https://images.unsplash.com/photo-1695048133142-1a20484d2569?auto=format&fit=crop&q=80&w=800',
                'stock' => 50
            ],
            [
                'category_id' => 1,
                'name' => 'MacBook Air M2',
                'description' => 'Supercharged by M2. Strikingly thin design. 13.6-inch Liquid Retina display.',
                'price' => 18999000,
                'image' => 'https://images.unsplash.com/photo-1611186871348-b1ce696e52c9?auto=format&fit=crop&q=80&w=800'
            ],
            [
                'category_id' => 1,
                'name' => 'Sony WH-1000XM5',
                'description' => 'Industry-leading noise canceling headphones with exceptional sound quality.',
                'price' => 5999000,
                'image' => 'https://images.unsplash.com/photo-1618366712010-f4ae9c647dcb?auto=format&fit=crop&q=80&w=800'
            ],
            [
                'category_id' => 1,
                'name' => 'PlayStation 5 Console',
                'description' => 'Experience lightning fast loading with an ultra-high speed SSD.',
                'price' => 9699000,
                'image' => 'https://images.unsplash.com/photo-1606144042614-b0417c0ed615?auto=format&fit=crop&q=80&w=800'
            ],

            // FASHION (ID: 2)
            [
                'category_id' => 2,
                'name' => 'Nike Air Jordan 1 High',
                'description' => 'Iconic style, premium leather, and comfort for everyday wear.',
                'price' => 2899000,
                'image' => 'https://images.unsplash.com/photo-1552346154-21d32810aba3?auto=format&fit=crop&q=80&w=800'
            ],
            [
                'category_id' => 2,
                'name' => 'Levi\'s Denim Jacket',
                'description' => 'Classic trucker jacket that gets better with every wear.',
                'price' => 1499000,
                'image' => 'https://images.unsplash.com/photo-1601333762779-83bf81eaad56?auto=format&fit=crop&q=80&w=800'
            ],
            [
                'category_id' => 2,
                'name' => 'Ray-Ban Aviator Sunglasses',
                'description' => 'Timeless design meeting modern quality. 100% UV protection.',
                'price' => 2200000,
                'image' => 'https://images.unsplash.com/photo-1572635196237-14b3f281503f?auto=format&fit=crop&q=80&w=800'
            ],
            [
                'category_id' => 2,
                'name' => 'Adidas Ultraboost Light',
                'description' => 'Experience epic energy with the lightest Ultraboost ever.',
                'price' => 3000000,
                'image' => 'https://images.unsplash.com/photo-1587563871167-1ee9c731aefb?auto=format&fit=crop&q=80&w=800'
            ],

            // HOME (ID: 3)
            [
                'category_id' => 3,
                'name' => 'Minimalist Coffee Table',
                'description' => 'Modern oak wood coffee table perfect for any living room.',
                'price' => 1250000,
                'image' => 'https://images.unsplash.com/photo-1532372320572-cda25653a26d?auto=format&fit=crop&q=80&w=800'
            ],
            [
                'category_id' => 3,
                'name' => 'Ceramic Flower Vase',
                'description' => 'Handcrafted ceramic vase to elevate your home decor.',
                'price' => 450000,
                'image' => 'https://images.unsplash.com/photo-1581783342308-f792ca438912?auto=format&fit=crop&q=80&w=800'
            ],
            [
                'category_id' => 3,
                'name' => 'Aromatherapy Diffuser',
                'description' => 'Ultrasonic essential oil diffuser with LED mood lighting.',
                'price' => 380000,
                'image' => 'https://images.unsplash.com/photo-1602928321679-560bb453f190?auto=format&fit=crop&q=80&w=800'
            ],
            [
                'category_id' => 3,
                'name' => 'Luxury Cotton Bed Sheets',
                'description' => '400 thread count Egyptian cotton sheets for the perfect sleep.',
                'price' => 899000,
                'image' => 'https://images.unsplash.com/photo-1631679706909-1844bbd07221?auto=format&fit=crop&q=80&w=800'
            ],

            // BOOKS (ID: 4)
            [
                'category_id' => 4,
                'name' => 'Atomic Habits',
                'description' => 'An Easy & Proven Way to Build Good Habits & Break Bad Ones.',
                'price' => 280000,
                'image' => 'https://images.unsplash.com/photo-1544947950-fa07a98d237f?auto=format&fit=crop&q=80&w=800'
            ],
            [
                'category_id' => 4,
                'name' => 'The Psychology of Money',
                'description' => 'Timeless lessons on wealth, greed, and happiness.',
                'price' => 150000,
                'image' => 'https://images.unsplash.com/photo-1592496431122-2349e0fbc666?auto=format&fit=crop&q=80&w=800'
            ],
            [
                'category_id' => 4,
                'name' => 'Design of Everyday Things',
                'description' => 'The fundamental principles of great design and usability.',
                'price' => 320000,
                'image' => 'https://images.unsplash.com/photo-1589829085413-56de8ae18c73?auto=format&fit=crop&q=80&w=800'
            ],
            [
                'category_id' => 4,
                'name' => 'Sapiens: A Brief History',
                'description' => 'Explore the history of humankind from the Stone Age to the Silicon Age.',
                'price' => 290000,
                'image' => 'https://images.unsplash.com/photo-1541963463532-d68292c34b19?auto=format&fit=crop&q=80&w=800'
            ],

            // SPORTS (ID: 5)
            [
                'category_id' => 5,
                'name' => 'Yoga Mat Premium',
                'description' => 'Non-slip eco-friendly yoga mat for your daily practice.',
                'price' => 350000,
                'image' => 'https://images.unsplash.com/photo-1601925260368-ae2f83cf8b7f?auto=format&fit=crop&q=80&w=800'
            ],
            [
                'category_id' => 5,
                'name' => 'Dumbbell Set 10kg',
                'description' => 'Adjustable dumbbell set for home workout.',
                'price' => 850000,
                'image' => 'https://images.unsplash.com/photo-1638536532686-d610adfc8e5c?auto=format&fit=crop&q=80&w=800'
            ],
        ];

        foreach ($products as $product) {
            Product::create($product + ['stock' => 20]);
        }
    }
}
