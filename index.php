<?php
    
    class Category {
        public $name;
        public $icon;

        function __construct(string $name, string $icon) {
            
            $this->name = $name;
            $this->icon = $icon;
        }
    }

    class Product {

        public $title;
        public $price;
        public $img;
        protected $category;

        function __construct(string $title, float $price, string $img,Category|null $category = null) {
            
            $this->title = $title;
            $this->price = $price;
            $this->img = $img;
            
            $this->setCategory($category);
        }

        public function getCategory() {
            return $this->category;
        }
        public function setCategory(Category|null $category) {
           
            
                $this->category = $category;
            
            
        }
    }

    class Food extends Product {
        public $ingredients;

        function __construct(string $title, float $price, string $img,Category|null $category = null, $ingredients = null) {

            parent::__construct($title, $price, $img, $category);

            $this->ingredients = $ingredients;
        }
    }
    class Toy extends Product {
        public $material;

        function __construct(string $title, float $price, string $img,Category|null $category = null, $material = null) {

            parent::__construct($title, $price, $img, $category);

            $this->material = $material;
        }
    }
    class Petbed extends Product {
        public $size;

        function __construct(string $title, float $price, string $img,Category|null $category = null, $size = null) {

            parent::__construct($title, $price, $img, $category);

            $this->size = $size;
        }
    }

    $cani = new Category('Cani','🐕');
    $gatti = new Category('Gatti','🐈‍⬛');

    $prodottoPerGatti = new Product(
        'Prodotto generico per gatti',
        13.99,
        'https://www.cdc.gov/healthy-pets/media/images/2024/04/Cat-on-couch.jpg',
        $gatti
    );

    $ciboPerGatti = new Food(
        'Cibo per gatti',
        6.99,
        'https://www.cdc.gov/healthy-pets/media/images/2024/04/Cat-on-couch.jpg',
        $gatti,
        'sale, salmone, olio'
    );

    $giocoPerGatti = new Toy(
        'Gioco per gatti',
        6.99,
        'https://www.cdc.gov/healthy-pets/media/images/2024/04/Cat-on-couch.jpg',
        $gatti,
        'gomma'
    );

    $cucciaPerGatti = new Petbed(
        'Cuccia per gatti',
        6.99,
        'https://www.cdc.gov/healthy-pets/media/images/2024/04/Cat-on-couch.jpg',
        $gatti,
        'medium'
    );


    $prodottoPerCani = new Product(
        'Prodotto generico per cani',
        13.99,
        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQgmZCoTeVJHM7ZCcQou4hWf0kKNyaxKmp9CQ&s',
        $cani
    );

    $ciboPerCani = new Food(
        'Cibo per cani',
        6.99,
        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQgmZCoTeVJHM7ZCcQou4hWf0kKNyaxKmp9CQ&s',
        $cani,
        'sale, salmone, olio'
    );

    $giocoPerCani = new Toy(
        'Gioco per cani',
        6.99,
        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQgmZCoTeVJHM7ZCcQou4hWf0kKNyaxKmp9CQ&s',
        $cani,
        'gomma'
    );

    $cucciaPerCani = new Petbed(
        'Cuccia per cani',
        6.99,
        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQgmZCoTeVJHM7ZCcQou4hWf0kKNyaxKmp9CQ&s',
        $cani,
        'medium'
    );

    $products = [
        $prodottoPerCani,
        $ciboPerCani,
        $cucciaPerCani,
        $giocoPerCani,
        $prodottoPerGatti,
        $ciboPerGatti,
        $giocoPerGatti,
        $cucciaPerGatti
    ];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PHP OOP 2</title>

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>
        
        <header class="py-4 mb-4">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <h1>
                            PHP OOP 2
                        </h1>
                    </div>
                </div>
            </div>
        </header>

        <main>
            <div class="container">
                <div class="row g-3">
                    <?php
                       foreach($products as $product) {

                       
                    ?>
                        <div class="col-3">
                            <div class="card">
                                <img src="<?php echo $product->img; ?>" class="card-img-top" alt="<?php echo $product->title; ?>">
                                <div class="card-body">
                                    <h2>
                                        <?php echo $product->title; ?>
                                    </h2>
                                    <h5>
                                        &euro; <?php echo $product->price; ?>
                                    </h5>
                                    <h6>
                                        <?php echo $product->getCategory()->icon; ?>
                                        <?php echo $product->getCategory()->name; ?>
                                    </h6>
                                </div>
                            </div>
                        </div>  
                    <?php
                        } 
                    ?>
                </div>
            </div>
        </main>

    </body>
</html>