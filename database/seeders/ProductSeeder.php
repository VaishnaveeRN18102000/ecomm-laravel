<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
            'name'=> 'Honor7X',
            'price'=>'10999',
            'category'=>'mobile phones',
            'description'=>'4G, Blue, 4GB RAM, 64GB Storage',
            'gallery'=>'https://static.quickmobileshop.com/cs-photos/products/original/honor-8x-dual-sim-128gb-lte-4g-albastru-4gb-ram_10056670_2_1540452611.jpg',
            ],
            [
            'name'=> 'OnePlus7T',
            'price'=>'49999',
            'category'=>'mobile phones',
            'description'=>'6G, Blue, 4GB RAM, 64GB Storage',
            'gallery'=>'https://www.gizmochina.com/wp-content/uploads/2019/09/7t-9_1_1-473x473.png',
            ],
            [
            'name'=> 'One Indian Girl',
            'price'=>'1099',
            'category'=>'books',
            'description'=>'Author: Chetan Bhagat',
            'gallery'=>'https://static.india.com/wp-content/uploads/2016/12/One-Indian-Girl.jpg',
            ],
            [
            'name'=> 'Lenovo IdeaPad Slim 5i',
            'price'=>'44999',
            'category'=>'computers and accessories',
            'description'=>'8GB RAM, 2TB Storage',
            'gallery'=>'https://www.lenovo.com/medias/lenovo-laptops-ideapad-5i-15-series-front-thumbnail.png?context=bWFzdGVyfHJvb3R8NTUwNjJ8aW1hZ2UvcG5nfGg1Yy9oZWMvMTEwOTQ1OTc0NjgxOTAucG5nfDc4NTkyNmU3NzUyYzkxYzU4OGI2YjQ4MmI1ZTlmMDc3NmVmOTFhYjI1NjBmZmI0YWJkM2UzMTljZmJlZThhZjU',
            ],
            [
            'name'=> 'Apple MacBook Pro',
            'price'=>'100999',
            'category'=>'computers and accessories',
            'description'=>'13 inch, 8GB RAM, 2TB Storage',
            'gallery'=>'https://i.pcmag.com/imagery/reviews/038Dr5TVEpwIv8rCljx6UcF-13..1588802180.jpg',
            ],
            [
            'name'=> 'Honor8X',
            'price'=>'10999',
            'category'=>'mobile phones',
            'description'=>'4G, Blue, 4GB RAM, 64GB Storage',
            'gallery'=>'https://static.quickmobileshop.com/cs-photos/products/original/honor-8x-dual-sim-128gb-lte-4g-albastru-4gb-ram_10056670_2_1540452611.jpg',
            ],
            [
            'name'=> 'Dell Inspiron 15 2 in 1 laptop',
            'price'=>'56999',
            'category'=>'computers and accessories',
            'description'=>'8GB RAM, 2TB Storage',
            'gallery'=>'https://i.dell.com/is/image/DellContent//content/dam/global-asset-library/Products/Notebooks/Inspiron/15_7506_2n1/in7506t_ctb_00055lf110_gy.psd?fmt=pjpg&pscan=auto&scl=1&wid=3634&hei=2218&qlt=85,0&resMode=sharp2&op_usm=1.75,0.3,2,0&size=3634,2218',
            ],
            [
            'name'=> 'The Scion of Ikshvaku',
            'price'=>'1199',
            'category'=>'books',
            'description'=>'Author: Amish Tripathi',
            'gallery'=>'http://im.rediff.com/getahead/2015/dec/31fiction-book1a.jpg',
            ],
        ]
        );
    }
}
