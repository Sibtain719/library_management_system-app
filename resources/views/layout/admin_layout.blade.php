<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }
        .sidebar {
            height: 100vh;
            width: 250px;
            background-color: #343a40;
            color: #fff;
            position: fixed;
            top: 0;
            left: 0;
            overflow-y: auto;
        }
        .sidebar h3 {
            text-align: center;
            margin: 20px 0;
            font-size: 1.5rem;
        }
        .sidebar .nav-link {
            color: #adb5bd;
            padding: 10px 20px;
            display: block;
            font-size: 1rem;
        }
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            color: #fff;
            background-color: #495057;
        }
        .navbar {
            margin-left: 250px;
            background-color: #343a40;
            color: #fff;
        }
        .navbar .navbar-brand {
            color: #fff;
        }
        .navbar .navbar-brand:hover {
            color: #adb5bd;
        }
        .navbar .nav-item .nav-link {
            color: #fff;
        }
        .navbar .nav-item .nav-link:hover {
            color: #adb5bd;
        }
        .content-wrapper {
            margin-left: 250px;
            padding: 20px;
        }
        .footer {
            margin-left: 250px;
            background-color: #343a40;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: calc(100% - 250px);
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h3>Admin Panel</h3>
        <nav class="nav flex-column">
            <a class="nav-link active" href="#">Dashboard</a>
            <a class="nav-link" href="/book_category">Add Books Category</a>
            <a class="nav-link" href="/members">Add Members</a>
            <a class="nav-link" href="/author_names">Add Authors</a>
            <a class="nav-link" href="#">Settings</a>
            <a class="nav-link" href="/login">Logout</a>
        </nav>
    </div>

    
    <div class="content-wrapper">
        
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Library Management</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Help</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        
        <div class="container mt-4">
            <h1>Welcome to the Admin Panel</h1>
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">Add Books Category</h5>
                            <p class="card-text ">Different book Categories.</p>
                            <a href="/book_category" class="btn btn-primary">Add Categories</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">Add Author's</h5>
                            <p class="card-text ">Author's of Books</p>
                            <a href="/author_names" class="btn btn-primary">Add Author's</a>
                        </div>
                    </div>
                </div>


                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">Manage Members</h5>
                            <p class="card-text">Manage library members.</p>
                            <a href="/members" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">Transactions</h5>
                            <p class="card-text">Track borrowing and returns.</p>
                            <a href="/transaction" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div> --}}
                
            </div>
        </div>
    </div>

    
    <footer class="footer">
        <p>&copy;Library Management System. All Rights Reserved.</p>
    </footer>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
