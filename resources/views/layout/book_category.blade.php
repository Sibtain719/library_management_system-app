<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Category</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h2 class="mb-4">Add Book Categories</h2>
        
        <div class="d-flex justify-content-between align-items-center mb-3">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBookModal">
                <i class="bi bi-bookmark-plus"></i> Add Category
            </button>
            <form class="d-flex" method="GET" action="#">
                <input type="text" class="form-control me-2" placeholder="Search books..." name="search">
                <button class="btn btn-outline-primary" type="submit">
                    <i class="bi bi-search"></i> Search
                </button>
            </form>
        </div>

       
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Sr.No</th>
                        <th>Category Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($category as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->Category }}</td>
                        <td>
                            
                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal" 
                                    data-bs-target="#editBookModal" 
                                    data-id="{{ $category->id }}" 
                                    data-name="{{ $category->Category }}">
                                <i class="bi bi-pencil-square"></i> Edit
                            </button>

                            
                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" 
                                    data-bs-target="#deleteBookModal" 
                                    data-id="{{ $category->id }}" 
                                    data-name="{{ $category->Category }}">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="addBookModal" tabindex="-1" aria-labelledby="addBookModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addBookModalLabel">Add New Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/add_category" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="bookTitle" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="bookTitle" name="category" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editBookModal" tabindex="-1" aria-labelledby="editBookModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editBookModalLabel">Edit Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="GET" id="editCategoryForm">
                        <div class="mb-3">
                            <label for="editBookCategory" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="editBookCategory" name="category" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteBookModal" tabindex="-1" aria-labelledby="deleteBookModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteBookModalLabel">Delete Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="deleteCategoryName"></p>
                    <form method="GET" id="deleteCategoryForm">
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      
        const editBookModal = document.getElementById('editBookModal');
        editBookModal.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget;
            const id = button.getAttribute('data-id');
            const name = button.getAttribute('data-name');
            const form = document.getElementById('editCategoryForm');
            form.action = `update_category/${id}`;
            document.getElementById('editBookCategory').value = name;
        });

        const deleteBookModal = document.getElementById('deleteBookModal');
        deleteBookModal.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget;
            const id = button.getAttribute('data-id');
            const name = button.getAttribute('data-name');
            const form = document.getElementById('deleteCategoryForm');
            form.action = `delete_category/${id}`;
            document.getElementById('deleteCategoryName').textContent = `Are you sure you want to delete category: ${name}?`;
        });
    </script>
</body>

</html>
