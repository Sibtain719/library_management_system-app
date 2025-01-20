<?php
use App\Models\User;

$user= User::all();


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
  
    <div class="container-fluid">
        <div class="row">
         
            <div class="col-md-3 bg-dark text-white min-vh-100">
                <div class="p-4">
                    <h3 class="text-center">Student Dashboard</h3>
                    <ul class="nav flex-column mt-4">
                        <li class="nav-item mb-2">
                            <a href="#" class="nav-link text-white">
                                <i class="bi bi-person-circle"></i> My Profile
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="/explore_books/{{$student->id}}" class="nav-link text-white">
                                <i class="bi bi-book"></i> Explore Books
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <button class="nav-link text-white" id="library_rules" data-bs-target="#library_rules">
                                <i class="bi bi-list-check"></i> Library Rules
                            </button>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="/login" class="nav-link text-white">
                                <i class="bi bi-box-arrow-right"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

           
            <div class="col-md-9 p-4">
                <h2>Welcome, <span class="fw-bold">{{$student->name}}</span>!</h2>
                <p class="text-muted">Here’s an overview of your library activity.</p>

             
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <i class="bi bi-person-circle"></i> My Profile
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Membership ID:   {{$student->id}}</strong> </p>
                                <p><strong>Name:    {{$student->name}}</strong> </p>
                                <p><strong>Email:   {{$student->email}}</strong> </p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Registration Date:</strong> </p>
                                <p><strong>Books Borrowed:</strong> </p>
                            </div>
                        </div>
                    </div>
                </div>

              
                <div class="card mb-4">
                    <div class="card-header bg-success text-white">
                        <i class="bi bi-book"></i> Borrowed Books
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Id</th>
                                        <th>Book Title</th>
                                        <th>Author</th>
                                        <th>Borrowed Date</th>
                                        <th>Due Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><span class="badge bg-success">On Time</span></td>
                                    </tr>
                                   
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

              
                <div class="modal fade card" id="library_rules" tabindex="-1" aria-labelledby="library_rules" aria-hidden="true">
                    <div class="card-header bg-info text-white">
                        <i class="bi bi-list-check"></i> Library Rules
                    </div>
                    <div class="card-body">
                        <ul>
                            <li>Books must be returned within 15 days.</li>
                            <li>A fine of $1 per day applies for overdue books.</li>
                            <li>Handle books with care to avoid damage charges.</li>
                            <li>Lost books must be reported immediately.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
