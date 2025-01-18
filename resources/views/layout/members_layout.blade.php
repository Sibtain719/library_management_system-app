,<?php
use App\Models\User;

$user= User::all();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Library Members</title>
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        
        <div class="d-flex justify-content-between align-items-center mb-3">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBookModal">
                <i class="bi bi-bookmark-plus"></i> Add Members
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
                        <th>Id</th>
                        <th>Member Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name}}</td>
                        <th>{{ $user->email}}</th>
                        <th>{{ $user->role}}</th>
                        <td>
                            
                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal" 
                                    data-bs-target="#editBookModal" 
                                    data-id="{{ $user->id }}" 
                                    data-name="{{ $user->Username }}">
                                <i class="bi bi-pencil-square"></i> Edit
                            </button>

                         
                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" 
                                    data-bs-target="#deleteBookModal" 
                                    data-id="{{ $user->id }}" 
                                    data-name="{{ $user->Username }}">
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
                    <h5 class="modal-title" id="addBookModalLabel">Add New Member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/add_member" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="bookTitle" class="form-label">Name</label>
                            <input type="text" class="form-control" id="bookTitle" name="name" required>
                        </div>

                        <div class="mb-3">
                            <label for="bookTitle" class="form-label">Email</label>
                            <input type="text" class="form-control" id="bookTitle" name="email" required>
                        </div>
                           
                        <div class="mb-3">
                            <label for="editBookCategory" class="form-label">Role</label>
                            <input type="text" class="form-control" id="editBookCategory" name="role" required>
                        </div>

                        <div class="mb-3">
                            <label for="bookTitle" class="form-label">Password</label>
                            <input type="text" class="form-control" id="bookTitle" name="password" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Add Member</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editBookModal" tabindex="-1" aria-labelledby="editBookModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editBookModalLabel">Edit Member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="GET" id="editCategoryForm">
                        <div class="mb-3">
                            <label for="editBookCategory" class="form-label">Member Name</label>
                            <input type="text" class="form-control" id="editBookCategory" name="name" required>
                        </div>

                        <div class="mb-3">
                            <label for="editBookCategory" class="form-label">Email</label>
                            <input type="text" class="form-control" id="editBookCategory" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="editBookCategory" class="form-label">Role</label>
                            <input type="text" class="form-control" id="editBookCategory" name="role" required>
                        </div>

                       
                        
                        <button type="submit" class="btn btn-primary">Update Member</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

 
    <div class="modal fade" id="deleteBookModal" tabindex="-1" aria-labelledby="deleteBookModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteBookModalLabel">Delete Member</h5>
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
            form.action = `update_member/${id}`;
            document.getElementById('editBookCategory').value = name;
        });

        const deleteBookModal = document.getElementById('deleteBookModal');
        deleteBookModal.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget;
            const id = button.getAttribute('data-id');
            const name = button.getAttribute('data-name');
            const form = document.getElementById('deleteCategoryForm');
            form.action = `delete_member/${id}`;
            document.getElementById('deleteCategoryName').textContent = `Are you sure you want to delete member: ${Username}?`;
        });
    </script>
</body>

</html>
