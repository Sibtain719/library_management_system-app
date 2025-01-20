<?php 

use App\Models\Author;
use App\Models\BookCategory;
use App\Models\Books;

$books = Books::all();

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
            <table class="table table-striped table-hover text-center">
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
                <tbody id="booksTable">
                    @foreach($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->Title }}</td>
                        <td>{{ Author::find($book->author_id)->Author_Name }}</td>
                        <td>{{ BookCategory::find($book->category_id)->Category }}</td>
                        <td>{{ $book->Published_date }}</td>
                        <td>{{ $book->No_of_copies }}</td>
                        <td>
                            <span class="badge {{ $book->No_of_copies > 0 ? 'bg-success' : 'bg-danger' }}">
                                {{ $book->No_of_copies <= 0 ? 'Unavailable' : 'Available' }}
                            </span>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-warning add-to-cart" data-id="{{ $book->id }}" data-title="{{ $book->Title }}">
                                <i class="bi bi-cart"></i> Add to Cart
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            <button id="proceedToCart" class="btn btn-sm btn-primary">
                <i class="bi bi-arrow-right-circle"></i> Proceed to Cart
            </button>
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
                    The book has been added to your cart successfully!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const cart = {};

        document.addEventListener('DOMContentLoaded', () => {
            // Handle Add to Cart button
            document.querySelectorAll('.add-to-cart').forEach(button => {
                button.addEventListener('click', () => {
                    const bookId = button.dataset.id;
                    const bookTitle = button.dataset.title;

                    if (cart[bookId]) {
                        cart[bookId].quantity += 1;
                    } else {
                        cart[bookId] = { id: bookId, title: bookTitle, quantity: 1 };
                    }

                    sessionStorage.setItem('cart', JSON.stringify(cart));

                    const cartModal = new bootstrap.Modal(document.getElementById('cartModal'));
                    cartModal.show();
                });
            });

            document.getElementById('proceedToCart').addEventListener('click', () => {
                const cartData = sessionStorage.getItem('cart');
                if (!cartData) {
                    alert('Your cart is empty!');
                    return;
                }
                
                window.location.href = `/add_to_cart?cart=${encodeURIComponent(cartData)}`;
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
