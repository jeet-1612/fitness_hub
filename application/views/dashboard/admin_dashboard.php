<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> - Fitness Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #4361ee;
            --secondary: #f72585;
            --success: #4cc9f0;
            --dark: #2d3436;
        }
        
        .sidebar {
            background: var(--dark);
            min-height: 100vh;
            color: white;
        }
        
        .sidebar .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 12px 20px;
            border-radius: 8px;
            margin: 2px 0;
        }
        
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: var(--primary);
            color: white;
        }
        
        .stats-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.2s ease;
        }
        
        .stats-card:hover {
            transform: translateY(-5px);
        }
        
        .main-content {
            background: #f8f9fa;
            min-height: 100vh;
        }
    </style>
</head>
<body>
    <div class="container-fluid"> 
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 px-0">
                <div class="sidebar">
                    <div class="p-3">
                        <h4><i class="fas fa-dumbbell me-2"></i>Fitness Hub</h4>
                        <small class="text-muted">Admin Panel</small>
                    </div>
                    <nav class="nav flex-column px-3">
                        <a class="nav-link active" href="<?= base_url('admin/dashboard') ?>">
                            <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                        </a>
                        <a class="nav-link" href="<?= base_url('admin/members') ?>">
                            <i class="fas fa-users me-2"></i>Members
                        </a>
                        <a class="nav-link" href="<?= base_url('admin/trainers') ?>">
                            <i class="fas fa-user-tie me-2"></i>Trainers
                        </a>
                        <a class="nav-link" href="<?= base_url('admin/classes') ?>">
                            <i class="fas fa-calendar me-2"></i>Classes
                        </a>
                        <a class="nav-link" href="<?= base_url('admin/payments') ?>">
                            <i class="fas fa-credit-card me-2"></i>Payments
                        </a>
                        <a class="nav-link" href="<?= base_url('admin/plans') ?>">
                            <i class="fas fa-tags me-2"></i>Plans
                        </a>
                        <hr class="text-white-50">
                        <a class="nav-link" href="<?= base_url('auth/logout') ?>">
                            <i class="fas fa-sign-out-alt me-2"></i>Logout
                        </a>
                    </nav>
                </div>
            </div>
            
            <!-- Main Content -->
            <div class="col-md-9 col-lg-10">
                <div class="main-content p-4">
                    <!-- Header -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2>Admin Dashboard</h2>
                        <div class="text-muted">
                            <i class="fas fa-calendar me-2"></i><?= date('F j, Y') ?>
                        </div>
                    </div>
                    
                    <!-- Stats Cards -->
                    <div class="row mb-4">
                        <div class="col-md-3 mb-3">
                            <div class="card stats-card text-center p-3">
                                <div class="card-body">
                                    <i class="fas fa-users display-4 text-primary mb-2"></i>
                                    <h3 class="mb-0"><?= $total_members ?? 0 ?></h3>
                                    <p class="text-muted mb-0">Total Members</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card stats-card text-center p-3">
                                <div class="card-body">
                                    <i class="fas fa-user-check display-4 text-success mb-2"></i>
                                    <h3 class="mb-0"><?= $active_members ?? 0 ?></h3>
                                    <p class="text-muted mb-0">Active Members</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card stats-card text-center p-3">
                                <div class="card-body">
                                    <i class="fas fa-dollar-sign display-4 text-warning mb-2"></i>
                                    <h3 class="mb-0">$<?= number_format($total_revenue ?? 0, 2) ?></h3>
                                    <p class="text-muted mb-0">Total Revenue</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card stats-card text-center p-3">
                                <div class="card-body">
                                    <i class="fas fa-calendar-check display-4 text-info mb-2"></i>
                                    <h3 class="mb-0"><?= date('j') ?></h3>
                                    <p class="text-muted mb-0">Today's Date</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Recent Members -->
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">Recent Members</h5>
                                </div>
                                <div class="card-body">
                                    <?php if (!empty($recent_members)): ?>
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Join Date</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($recent_members as $member): ?>
                                                    <tr>
                                                        <td><?= $member->full_name ?></td>
                                                        <td><?= $member->email ?></td>
                                                        <td><?= date('M j, Y', strtotime($member->created_at)) ?></td>
                                                        <td>
                                                            <span class="badge bg-success">Active</span>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php else: ?>
                                        <p class="text-muted">No members found.</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">Quick Actions</h5>
                                </div>
                                <div class="card-body">
                                    <div class="d-grid gap-2">
                                        <a href="<?= base_url('admin/members/add') ?>" class="btn btn-primary">
                                            <i class="fas fa-user-plus me-2"></i>Add Member
                                        </a>
                                        <a href="<?= base_url('admin/trainers/add') ?>" class="btn btn-success">
                                            <i class="fas fa-user-tie me-2"></i>Add Trainer
                                        </a>
                                        <a href="<?= base_url('admin/classes/add') ?>" class="btn btn-info">
                                            <i class="fas fa-calendar-plus me-2"></i>Schedule Class
                                        </a>
                                        <a href="<?= base_url('admin/reports') ?>" class="btn btn-warning">
                                            <i class="fas fa-chart-bar me-2"></i>View Reports
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>