<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions | Library Management System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">Transactions</h2>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTransactionModal">
                Add New Transaction
            </button>
        </div>

        <!-- Transactions Table -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>#</th>
                        <th>Transaction ID</th>
                        <th>Student Name</th>
                        <th>Book Title</th>
                        <th>Issued Date</th>
                        <th>Due Date</th>
                        <th>Return Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Sample Data -->
                    <tr>
                        <td>1</td>
                        <td>T001</td>
                        <td>John Doe</td>
                        <td>Effective Java</td>
                        <td>2025-01-12</td>
                        <td>2025-01-19</td>
                        <td>2025-01-15</td>
                        <td><span class="badge bg-success">Returned</span></td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="#" class="btn btn-info btn-sm">View</a>
                                <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm">Delete</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>T002</td>
                        <td>Jane Smith</td>
                        <td>Learning Laravel</td>
                        <td>2025-01-10</td>
                        <td>2025-01-17</td>
                        <td>Not Returned</td>
                        <td><span class="badge bg-warning">Pending</span></td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="#" class="btn btn-info btn-sm">View</a>
                                <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm">Delete</a>
                            </div>
                        </td>
                    </tr>
                    <!-- Add More Rows as Needed -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal for Adding New Transaction -->
    <div class="modal fade" id="addTransactionModal" tabindex="-1" aria-labelledby="addTransactionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTransactionModalLabel">Add New Transaction</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Add New Transaction Form -->
                    <form action="#" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="transaction_id" class="form-label">Transaction ID</label>
                            <input type="text" class="form-control" id="transaction_id" name="transaction_id" required>
                        </div>
                        <div class="mb-3">
                            <label for="student_name" class="form-label">Student Name</label>
                            <input type="text" class="form-control" id="student_name" name="student_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="book_title" class="form-label">Book Title</label>
                            <input type="text" class="form-control" id="book_title" name="book_title" required>
                        </div>
                        <div class="mb-3">
                            <label for="issued_date" class="form-label">Issued Date</label>
                            <input type="date" class="form-control" id="issued_date" name="issued_date" required>
                        </div>
                        <div class="mb-3">
                            <label for="due_date" class="form-label">Due Date</label>
                            <input type="date" class="form-control" id="due_date" name="due_date" required>
                        </div>
                        <div class="mb-3">
                            <label for="return_date" class="form-label">Return Date (Optional)</label>
                            <input type="date" class="form-control" id="return_date" name="return_date">
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="Pending">Pending</option>
                                <option value="Returned">Returned</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Transaction</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
