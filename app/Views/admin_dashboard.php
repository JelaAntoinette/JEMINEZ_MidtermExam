<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Student Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Admin Dashboard</h3>
                    </div>
                    <div class="card-body">
                        <h4>Welcome, Admin!</h4>
                        <p>This is your admin dashboard where you can manage the entire system.</p>
                        
                        <div class="mt-4">
                            <a href="<?= base_url('admin/announcements') ?>" class="btn btn-primary">View Announcements</a>
                            <a href="<?= base_url('admin/users') ?>" class="btn btn-info">Manage Users</a>
                            <a href="<?= base_url('logout') ?>" class="btn btn-secondary">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
