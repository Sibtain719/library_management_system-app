<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports | Library Management System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">Library Reports</h2>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#generateReportModal">
                Generate Report
            </button>
        </div>

        <!-- Reports Table -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>#</th>
                        <th>Report ID</th>
                        <th>Report Type</th>
                        <th>Date Generated</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Sample Data -->
                    <tr>
                        <td>1</td>
                        <td>R001</td>
                        <td>Book Issuance Report</td>
                        <td>2025-01-12</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="#" class="btn btn-info btn-sm">View</a>
                                <a href="#" class="btn btn-danger btn-sm">Delete</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>R002</td>
                        <td>Overdue Books Report</td>
                        <td>2025-01-10</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="#" class="btn btn-info btn-sm">View</a>
                                <a href="#" class="btn btn-danger btn-sm">Delete</a>
                            </div>
                        </td>
                    </tr>
                    <!-- Add More Rows as Needed -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal for Generate Report -->
    <div class="modal fade" id="generateReportModal" tabindex="-1" aria-labelledby="generateReportModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="generateReportModalLabel">Generate Report</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Report Generation Form -->
                    <form action="#" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="report_type" class="form-label">Report Type</label>
                            <select class="form-select" id="report_type" name="report_type" required>
                                <option value="book_issuance">Book Issuance</option>
                                <option value="overdue_books">Overdue Books</option>
                                <option value="transaction_summary">Transaction Summary</option>
                                <!-- Add More Report Types as Needed -->
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="start_date" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" required>
                        </div>
                        <div class="mb-3">
                            <label for="end_date" class="form-label">End Date</label>
                            <input type="date" class="form-control" id="end_date" name="end_date" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Generate Report</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
