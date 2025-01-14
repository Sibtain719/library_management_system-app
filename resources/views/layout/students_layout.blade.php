<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <!-- Dashboard Container -->
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
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
                            <a href="#" class="nav-link text-white">
                                <i class="bi bi-book"></i> Borrowed Books
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="#" class="nav-link text-white">
                                <i class="bi bi-list-check"></i> Library Rules
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="#" class="nav-link text-white">
                                <i class="bi bi-box-arrow-right"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 p-4">
                <h2>Welcome, <span class="fw-bold">Student Name</span>!</h2>
                <p class="text-muted">Here’s an overview of your library activity.</p>

                <!-- Profile Section -->
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <i class="bi bi-person-circle"></i> My Profile
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Name:</strong> John Doe</p>
                                <p><strong>Email:</strong> john.doe@example.com</p>
                                <p><strong>Contact:</strong> +123456789</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Registration Date:</strong> 2025-01-10</p>
                                <p><strong>Membership ID:</strong> STU12345</p>
                                <p><strong>Books Borrowed:</strong> 3</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Borrowed Books Section -->
                <div class="card mb-4">
                    <div class="card-header bg-success text-white">
                        <i class="bi bi-book"></i> Borrowed Books
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Book Title</th>
                                        <th>Author</th>
                                        <th>Borrowed Date</th>
                                        <th>Due Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Introduction to Algorithms</td>
                                        <td>Thomas H. Cormen</td>
                                        <td>2025-01-05</td>
                                        <td>2025-01-20</td>
                                        <td><span class="badge bg-success">On Time</span></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Clean Code</td>
                                        <td>Robert C. Martin</td>
                                        <td>2025-01-08</td>
                                        <td>2025-01-23</td>
                                        <td><span class="badge bg-warning text-dark">Due Soon</span></td>
                                    </tr>
                                    <!-- Repeat rows dynamically -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Library Rules Section -->
                <div class="card">
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
