
<?php 

use App\Models\Author;
use App\Models\BookCategory;
use App\Models\Books;

$books= Books::all();
$books1= Books::all()

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore Books</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h2 class="mb-4">Explore Books</h2>
        <!-- Action Buttons -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <form class="d-flex" method="GET" action="#">
                <input type="text" class="form-control me-2" placeholder="Search books..." name="search">
                <button class="btn btn-outline-primary" type="submit">
                    <i class="bi bi-search"></i> Search
                </button>
            </form>
        </div>

       
        <div class="table-responsive">
            <table class="table table-striped table-hover " style="text-align:center">
                <thead class="table-dark">
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Published Date</th>
                        <th>Remaining Copies</th>
                        <th>Availability</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                @foreach($books as $books)

                <tbody id="booksTable">
                    <tr>
                        <td>{{$books->id}}</td>
                        <td>{{$books->Title}}</td>
                        <td><?php
                            $author_id = $books->author_id;
                           
                             $authorModel=Author::find($author_id);
                        
                             if(!empty($authorModel)){
                                echo $authorModel['Author_Name'];
                             } 
                          
                            ?></td>
                        <td><?php
                            $category_id = $books->category_id;
                            BookCategory::all();
                             $category=BookCategory::find($category_id);
                             if(!empty($category)){
                                echo $category['Category'];
                             }   
                            ?></td>
                        <td>{{$books->Published_date}}</td>
                        <td>{{$books->No_of_copies}}</td>
                        <td><span class="badge bg-success"></span>{{$books->Availability}}</td>
                        <td>
                            <a href="/add_to_cart">
                                <button class="btn btn-sm btn-warning ">
                                    <i class="bi bi-cart"></i> Add to Cart
                            </a>
                           
                            </button>
                            
{{--                                   
                            <a href="/students" class="btn btn-sm btn-danger checkout">
                                <i class="bi bi-trash"></i> Check Out
                            </a> --}}
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>


    <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cartModalLabel">Cart Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    The book has been added to your cart!
                    <?
                    return redirect('/explore_books');
                    ?>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

 
    <div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="checkoutModalLabel">Checkout Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    You have successfully checked out the book!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- JavaScript for Button Functionality -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
          
            document.querySelectorAll('.add-to-cart').forEach(button => {
                button.addEventListener('click', () => {
                    const cartModal = new bootstrap.Modal(document.getElementById('cartModal'));
                    cartModal.show();
                });
            });

            // Handle Checkout
            document.querySelectorAll('.checkout').forEach(button => {
                button.addEventListener('click', () => {
                    // Show modal or perform AJAX request
                    const checkoutModal = new bootstrap.Modal(document.getElementById('checkoutModal'));
                    checkoutModal.show();
                });
            });
        });
    </script>
</body>

</html>
