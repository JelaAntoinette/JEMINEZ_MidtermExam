<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcements - Student Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mb-4">Announcements</h1>
                
                <?php if (session()->get('isLoggedIn')): ?>
                    <div class="alert alert-info">
                        <strong>Welcome, <?= ucfirst(session()->get('role')) ?>!</strong> 
                        You are viewing announcements as a <?= session()->get('role') ?>.
                    </div>
                <?php endif; ?>
                
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('success') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('error') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <?php if (empty($announcements)): ?>
                    <div class="alert alert-info">
                        <h5>No announcements available</h5>
                        <p>There are currently no announcements to display.</p>
                    </div>
                <?php else: ?>
                    <div class="row">
                        <?php foreach ($announcements as $announcement): ?>
                            <div class="col-md-6 mb-4">
                                <div class="card h-100">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0"><?= esc($announcement['title']) ?></h5>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text"><?= esc($announcement['content']) ?></p>
                                    </div>
                                    <div class="card-footer text-muted">
                                        <small>Posted on: <?= date('F j, Y \a\t g:i A', strtotime($announcement['created_at'])) ?></small>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <div class="mt-4">
                    <?php if (session()->get('isLoggedIn')): ?>
                        <?php $role = session()->get('role'); ?>
                        <?php if ($role === 'admin'): ?>
                            <a href="<?= base_url('admin/dashboard') ?>" class="btn btn-secondary">Back to Admin Dashboard</a>
                        <?php elseif ($role === 'teacher'): ?>
                            <a href="<?= base_url('teacher/dashboard') ?>" class="btn btn-secondary">Back to Teacher Dashboard</a>
                        <?php elseif ($role === 'student'): ?>
                            <a href="<?= base_url('student/dashboard') ?>" class="btn btn-secondary">Back to Student Dashboard</a>
                        <?php endif; ?>
                    <?php else: ?>
                        <a href="<?= base_url() ?>" class="btn btn-secondary">Back to Home</a>
                    <?php endif; ?>
                    <a href="<?= base_url('logout') ?>" class="btn btn-outline-danger">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
