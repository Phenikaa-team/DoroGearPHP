<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class ProductSeeder extends Seeder
{
    private function uploadImage($fileName)
    {
        if (empty($fileName)) {
            echo "  Empty filename detected. Skipping.\n";
            return null;
        }

        $imagePath = storage_path('app/seed_images/' . $fileName);

        if (!file_exists($imagePath)) {
            echo "  File not found: {$fileName}. Skipping.\n";
            return null;
        }

        $file = new File($imagePath);
        $storedPath = Storage::putFile('public/products', $file);

        return Storage::url($storedPath);
    }
    public function run(): void
    {
        Storage::deleteDirectory('public/products');
        Storage::makeDirectory('public/products');
        $this->command->info('Đã dọn dẹp và tạo lại thư mục /public/products trên Cloudinary.');

        $cpuCategory = Category::where('name', 'CPU')->first();
        $mainboardCategory = Category::where('name', 'Mainboard')->first();
        $ramCategory = Category::where('name', 'RAM')->first();
        $gpuCategory = Category::where('name', 'GPU')->first();
        $storageCategory = Category::where('name', 'Storage')->first();

        if (!$cpuCategory || !$mainboardCategory || !$ramCategory || !$gpuCategory || !$storageCategory) {
            $this->command->error('Categories chưa được tạo. Hãy chạy CategorySeeder trước!');
            return;
        }

        // CPU Products
        $cpuProducts = [
            [
                'name' => 'CPU Intel Core i5-13400F (Up To 4.60GHz, 10 Nhân 16 Luồng, 20 MB, LGA 1700)',
                'description' => 'CPU hiệu năng cao cho gaming và làm việc đa nhiệm',
                'category_id' => $cpuCategory->category_id,
                'price' => 3999000,
                'discount_percent' => 14,
                'rating' => 4.9,
                'sold_count' => 350,
                'stock' => 45,
                'main_image' => 'i5-13400f_main.jpg',
                'other_images' => ['i5-13400f_1.jpg', 'i5-13400f_2.jpg'],
                'warranty' => '36 tháng',
                'spec' => [
                    'Socket' => 'LGA1700',
                    'Cores' => 10,
                    'Threads' => 16,
                    'BaseClock' => '2.5GHz',
                    'BoostClock' => '4.6GHz',
                    'Cache' => '20MB'
                ]
            ],
            [
                'name' => 'CPU Intel Core i5-12400F (Up To 4.40GHz, 6 Nhân 12 Luồng, 18 MB, LGA 1700)',
                'description' => 'CPU phổ thông cho gaming và văn phòng',
                'category_id' => $cpuCategory->category_id,
                'price' => 3299000,
                'discount_percent' => 10,
                'rating' => 4.8,
                'sold_count' => 420,
                'stock' => 60,
                'main_image' => 'i5-12400f_main.jpg',
                'other_images' => ['i5-12400f_1.jpg', 'i5-12400f_2.jpg'],
                'warranty' => '36 tháng',
                'spec' => [
                    'Socket' => 'LGA1700',
                    'Cores' => 6,
                    'Threads' => 12,
                    'BaseClock' => '2.5GHz',
                    'BoostClock' => '4.4GHz',
                    'Cache' => '18MB'
                ]
            ],
            [
                'name' => 'CPU Intel Core i7-13700K (Up To 5.40GHz, 16 Nhân 24 Luồng, 30 MB, LGA 1700)',
                'description' => 'CPU cao cấp cho gaming và content creation',
                'category_id' => $cpuCategory->category_id,
                'price' => 8990000,
                'discount_percent' => 8,
                'rating' => 5.0,
                'sold_count' => 180,
                'stock' => 25,
                'main_image' => 'i7-13700K_main.jpg',
                'other_images' => ['i7-13700K_1.jpg', 'i7-13700K_2.jpg'],
                'warranty' => '36 tháng',
                'spec' => [
                    'Socket' => 'LGA1700',
                    'Cores' => 16,
                    'Threads' => 24,
                    'BaseClock' => '3.4GHz',
                    'BoostClock' => '5.4GHz',
                    'Cache' => '30MB'
                ]
            ],
            [
                'name' => 'CPU AMD Ryzen 5 5600X (Up To 4.6GHz, 6 Nhân 12 Luồng, 35 MB, AM4)',
                'description' => 'CPU AMD hiệu năng cao cho gaming',
                'category_id' => $cpuCategory->category_id,
                'price' => 3490000,
                'discount_percent' => 12,
                'rating' => 4.7,
                'sold_count' => 290,
                'stock' => 38,
                'main_image' => 'asus-b660m_main.jpg',
                'other_images' => ['asus-b660m_1.jpg', 'asus-b660m_2.jpg'],
                'warranty' => '36 tháng',
                'spec' => [
                    'Socket' => 'AM4',
                    'Cores' => 6,
                    'Threads' => 12,
                    'BaseClock' => '3.7GHz',
                    'BoostClock' => '4.6GHz',
                    'Cache' => '35MB'
                ]
            ],
        ];

        // Mainboard Products
        $mainboardProducts = [
            [
                'name' => 'Mainboard ASUS TUF GAMING B660M-PLUS WIFI D4',
                'description' => 'Bo mạch chủ gaming tầm trung với WiFi 6',
                'category_id' => $mainboardCategory->category_id,
                'price' => 3290000,
                'discount_percent' => 7,
                'rating' => 4.8,
                'sold_count' => 220,
                'stock' => 32,
                'main_image' => '',
                'other_images' => [''],
                'warranty' => '36 tháng',
                'spec' => [
                    'Socket' => 'LGA1700',
                    'Chipset' => 'B660',
                    'RAM' => 'DDR4',
                    'FormFactor' => 'mATX',
                    'WiFi' => 'WiFi 6'
                ]
            ],
            [
                'name' => 'Mainboard MSI B550M PRO-VDH WIFI',
                'description' => 'Bo mạch chủ AMD với WiFi tích hợp',
                'category_id' => $mainboardCategory->category_id,
                'price' => 2590000,
                'discount_percent' => 10,
                'rating' => 4.6,
                'sold_count' => 175,
                'stock' => 28,
                'main_image' => '',
                'other_images' => [''],
                'warranty' => '36 tháng',
                'spec' => [
                    'Socket' => 'AM4',
                    'Chipset' => 'B550',
                    'RAM' => 'DDR4',
                    'FormFactor' => 'mATX',
                    'WiFi' => 'WiFi 6'
                ]
            ],
        ];

        // RAM Products
        $ramProducts = [
            [
                'name' => 'RAM Kingston Fury Beast 16GB (2x8GB) DDR4 3200MHz',
                'description' => 'RAM gaming hiệu năng cao với tản nhiệt',
                'category_id' => $ramCategory->category_id,
                'price' => 1190000,
                'discount_percent' => 15,
                'rating' => 4.9,
                'sold_count' => 580,
                'stock' => 120,
                'main_image' => '',
                'other_images' => [''],
                'warranty' => '36 tháng',
                'spec' => [
                    'Capacity' => '16GB (2x8GB)',
                    'Type' => 'DDR4',
                    'Speed' => '3200MHz',
                    'CAS' => 'CL16'
                ]
            ],
            [
                'name' => 'RAM Corsair Vengeance RGB 32GB (2x16GB) DDR4 3600MHz',
                'description' => 'RAM RGB cao cấp cho gaming và workstation',
                'category_id' => $ramCategory->category_id,
                'price' => 2790000,
                'discount_percent' => 12,
                'rating' => 5.0,
                'sold_count' => 340,
                'stock' => 65,
                'main_image' => '',
                'other_images' => [''],
                'warranty' => '36 tháng',
                'spec' => [
                    'Capacity' => '32GB (2x16GB)',
                    'Type' => 'DDR4',
                    'Speed' => '3600MHz',
                    'CAS' => 'CL18',
                    'RGB' => 'Yes'
                ]
            ],
        ];

        // GPU Products
        $gpuProducts = [
            [
                'name' => 'VGA ASUS TUF Gaming GeForce RTX 4060 Ti 8GB GDDR6',
                'description' => 'Card đồ họa gaming mạnh mẽ với Ray Tracing',
                'category_id' => $gpuCategory->category_id,
                'price' => 11990000,
                'discount_percent' => 5,
                'rating' => 4.9,
                'sold_count' => 145,
                'stock' => 22,
                'main_image' => '',
                'other_images' => [''],
                'warranty' => '36 tháng',
                'spec' => [
                    'GPU' => 'RTX 4060 Ti',
                    'VRAM' => '8GB GDDR6',
                    'Boost' => '2565 MHz',
                    'TDP' => '160W'
                ]
            ],
            [
                'name' => 'VGA MSI GeForce RTX 4070 GAMING X TRIO 12GB GDDR6X',
                'description' => 'Card đồ họa cao cấp cho gaming 1440p/4K',
                'category_id' => $gpuCategory->category_id,
                'price' => 16490000,
                'discount_percent' => 3,
                'rating' => 5.0,
                'sold_count' => 98,
                'stock' => 15,
                'main_image' => '',
                'other_images' => [''],
                'warranty' => '36 tháng',
                'spec' => [
                    'GPU' => 'RTX 4070',
                    'VRAM' => '12GB GDDR6X',
                    'Boost' => '2610 MHz',
                    'TDP' => '200W'
                ]
            ],
        ];

        // Storage Products
        $storageProducts = [
            [
                'name' => 'SSD Samsung 980 PRO 1TB M.2 NVMe PCIe Gen 4.0',
                'description' => 'Ổ cứng SSD tốc độ cao cho gaming và workstation',
                'category_id' => $storageCategory->category_id,
                'price' => 2690000,
                'discount_percent' => 18,
                'rating' => 5.0,
                'sold_count' => 420,
                'stock' => 85,
                'main_image' => '',
                'other_images' => [''],
                'warranty' => '60 tháng',
                'spec' => [
                    'Capacity' => '1TB',
                    'Interface' => 'PCIe 4.0 x4',
                    'Read' => '7000 MB/s',
                    'Write' => '5000 MB/s'
                ]
            ],
            [
                'name' => 'SSD WD Black SN850X 2TB M.2 NVMe PCIe Gen 4.0',
                'description' => 'Ổ cứng SSD gaming hiệu năng cao',
                'category_id' => $storageCategory->category_id,
                'price' => 4890000,
                'discount_percent' => 10,
                'rating' => 4.9,
                'sold_count' => 210,
                'stock' => 42,
                'main_image' => '',
                'other_images' => [''],
                'warranty' => '60 tháng',
                'spec' => [
                    'Capacity' => '2TB',
                    'Interface' => 'PCIe 4.0 x4',
                    'Read' => '7300 MB/s',
                    'Write' => '6600 MB/s'
                ]
            ],
        ];

        $this->command->info('Bắt đầu seeding sản phẩm và upload ảnh...');
        $allProducts = array_merge($cpuProducts, $mainboardProducts, $ramProducts, $gpuProducts, $storageProducts);

        foreach ($allProducts as $productData) {

            $mainImageName = $productData['main_image'] ?? null;
            $otherImageNames = $productData['other_images'] ?? [];

            unset($productData['main_image'], $productData['other_images']);

            if ($mainImageName) {
                $productData['main_image'] = $this->uploadImage($mainImageName);
            } else {
                $productData['main_image'] = 'https://via.placeholder.com/300x300/CCCCCC/FFFFFF?text=No+Image';
            }

            $otherImagePaths = [];
            if (!empty($otherImageNames)) {
                foreach ($otherImageNames as $imageName) {
                    if (empty($imageName)) continue;

                    $imageUrl = $this->uploadImage($imageName);
                    if ($imageUrl) {
                        $otherImagePaths[] = $imageUrl;
                    }
                }
            }
            $productData['other_images'] = $otherImagePaths;

            Product::create($productData);

        }

        $this->command->info('Hoàn tất seeding sản phẩm và upload ảnh!');
    }
}
