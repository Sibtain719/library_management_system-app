<?php 
use App\Models\BookCategory;
use App\Models\Books;
use App\Models\Author;


$b1 = new Books;
$book = [];

if (isset($_GET['cart'])) {
    $book = $_GET['cart'];
    $book = json_decode($book, true); 
    //$book= htmlspecialchars();
    //print_r($book);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book - Add To Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<style>
    .cart-item img {
        max-width: 100px;
        height: auto;
    }

    .quantity-input {
        width: 50px;
    }

    .cart-summary {
        background-color: #f8f9fa;
        border-radius: 10px;
    }
</style>
</head>
<body>
    <div class="container py-5">
        <h1 class="mb-5">Your Book Cart</h1>
        <div class="row">
            <div class="col-lg-8">
                <!-- Cart Items -->
                <div class="card mb-4">
                    <div class="card-body">
                        <?php if (!empty($book)) : ?>
                            <?php foreach ($book as $item) : ?>
                                <div class="row cart-item mb-3">
                                    
                                    <div class="col-md-5">
                                        <h5 class="card-title strong">Book Title :<?= htmlspecialchars($item['title']) ?></h5>
                                        <h6 class="card-title strong">
                                            Category :
                                            <?php 
                                               $b= Books::find(htmlspecialchars($item['id']));
                                                $c_id= $b->category_id;
                                                   $book_category= BookCategory::find($c_id);
                                                ?>
                                                {{$book_category->Category}}
                               </h6>
                               <p class="strong">
                                Author :
                                <?php 
                                               $b= Books::find(htmlspecialchars($item['id']));
                                                $a_id= $b->author_id;
                                                   $author= Author::find($a_id);
                                                ?>
                                                {{$author->Author_Name}}

                               </p>

                                        
                                    </div>
                                    <div class="col-md-2">
                                        <div class="input-group">
                                            <button class="btn btn-outline-secondary btn-sm" type="button">-</button>
                                            <input style="max-width:100px" type="text" class="form-control form-control-sm text-center quantity-input" value="<?= htmlspecialchars($item['quantity']) ?>">
                                            <button class="btn btn-outline-secondary btn-sm" type="button">+</button>
                                        </div>
                                    </div>
                                    <div class="col-md-2 text-end">
                                      
                                        <button class="btn btn-sm btn-outline-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </div>
                                <hr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <p>Your cart is empty.</p>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- Continue Shopping Button -->
                <div class="text-start mb-4">
                    <a href="{{ url()->previous() }}" class="btn btn-outline-primary">
                        <i class="bi bi-arrow-left me-2"></i>Continue Shopping
                    </a>
                </div>
            </div>
            <div class="col-lg-4">
                <!-- Cart Summary -->
                <div class="card cart-summary">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Order Summary</h5>
                      
                        <div class="d-flex justify-content-between mb-3">
            
                        <button class="btn btn-primary w-100">Proceed to Checkout</button>
                    </div>
                </div>
                <!-- Promo Code -->
                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Apply Promo Code</h5>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Enter promo code">
                            <button class="btn btn-outline-secondary" type="button">Apply</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
