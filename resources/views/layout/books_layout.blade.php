<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Books</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h2 class="mb-4">Manage Books</h2>
        <!-- Action Buttons -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBookModal">
                <i class="bi bi-bookmark-plus"></i> Add Book
            </button>
            <form class="d-flex" method="GET" action="#">
                <input type="text" class="form-control me-2" placeholder="Search books..." name="search">
                <button class="btn btn-outline-primary" type="submit">
                    <i class="bi bi-search"></i> Search
                </button>
            </form>
        </div>

        <!-- Books Table -->
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Sr.No</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>No of Copies</th>
                        <th>Category</th>
                        <th>Published Date</th>
                        <th>Availability</th>
                        <th>Borrowed By</th>
                        <th>Actions</th>
                    </tr>
                    
                </thead>
                @foreach($books as $books)
                <tbody>
                    <!-- Sample Data -->
                    <tr>
                        <td>{{$books->id}}</td>
                        <td>{{$books->Title}}</td>
                        <td>{{$books->Author}}</td>
                        <td>{{$books->No_of_copies}}</td>
                        <td>{{$books->Category}}</td>
                        <td>{{$books->Published_date}}</td>
                        <td><span class="badge bg-success">{{$books->Availibility}}</span></td>
                        <td>{{$books->Borrowed_by}}</td>
                        <td>
                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editBookModal">
                                <i class="bi bi-pencil-square"></i> Edit
                            </button>
                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteBookModal">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </td>
                    </tr>
                   
                </tbody>
              @endforeach
            </table>
        </div>
    </div>

 
    <div class="modal fade" id="addBookModal" tabindex="-1" aria-labelledby="addBookModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addBookModalLabel">Add New Book</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/addBook" method="GET" >
                        <div class="mb-3">
                            <label for="bookTitle" class="form-label">Title</label>
                            <input type="text" class="form-control" id="bookTitle" name="title" required>
                        </div>
                        
                        <div class="mb-3">
                                <label for="bookAuthor" class="form-label">Select Author</label>
                              <br>
                              
                                <select select class="form-select" aria-label="Default select example">
                                    <option selected>Select Author</option>  
                                    @foreach($author as $author)  
                                 <option value="{{$author->Author_Name}}"> {{$author->Author_Name}}</option>
                                 @endforeach
                                </select>
                                
                           
                        </div>
                       
                        <div class="mb-3">
                            <label for="No_of_copies" class="form-label">No of Copies</label>
                            <input type="text" class="form-control" id="No_of_copies" name="no_of_copies" required>
                        </div>

                        <div class="mb-3">
                            <label for="bookCategory" class="form-label">Category</label>
                            <br>
                            <select select class="form-select" aria-label="Default select example">
                                <option selected>Select Category</option>  
                                @foreach($category as $category)  
                             <option value="{{$category->Category}}"> {{$category->Category}}</option>
                             @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="bookPublishedDate" class="form-label">Published Date</label>
                            <input type="date" class="form-control" id="bookPublishedDate" name="published_date" required>
                        </div>
                        <div class="mb-3">
                            <label for="bookAvailability" class="form-label">Availability</label>
                            <select class="form-select" id="bookAvailability" name="availability" required>
                                <option value="available">Available</option>
                                <option value="unavailable">Unavailable</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="bookPublishedDate" class="form-label">Borrowed By</label>
                            <input type="borrowed_by" class="form-control" id="borrowed_by" name="borrowed_by" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Add Book</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Book Modal -->
    <div class="modal fade" id="editBookModal" tabindex="-1" aria-labelledby="editBookModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editBookModalLabel">Edit Book</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="#">
                        <div class="mb-3">
                            <label for="editBookTitle" class="form-label">Title</label>
                            <input type="text" class="form-control" id="editBookTitle" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="editBookAuthor" class="form-label">Author</label>
                            <input type="text" class="form-control" id="editBookAuthor" name="author" required>
                        </div>
                        <div class="mb-3">
                            <label for="editBookCategory" class="form-label">Category</label>
                            <input type="text" class="form-control" id="editBookCategory" name="category" required>
                        </div>
                        <div class="mb-3">
                            <label for="editBookPublishedDate" class="form-label">Published Date</label>
                            <input type="date" class="form-control" id="editBookPublishedDate" name="published_date" required>
                        </div>
                        <div class="mb-3">
                            <label for="editBookAvailability" class="form-label">Availability</label>
                            <select class="form-select" id="editBookAvailability" name="availability" required>
                                <option value="available">Available</option>
                                <option value="unavailable">Unavailable</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Book</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Book Modal -->
    <div class="modal fade" id="deleteBookModal" tabindex="-1" aria-labelledby="deleteBookModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteBookModalLabel">Delete Book</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this book?
                </div>
                <div class="modal-footer">
                    <form method="POST" action="#">
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
