<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Profile - Fitness Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #4361ee;
            --secondary: #f72585;
            --success: #4cc9f0;
        }
        
        .profile-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .profile-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: var(--primary);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            font-weight: bold;
        }
    </style>
</head>
<body class="bg-light">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background: var(--primary);">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('members/dashboard') ?>">
                <i class="fas fa-dumbbell me-2"></i>Fitness Hub
            </a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="<?= base_url('members/dashboard') ?>">Dashboard</a>
                <a class="nav-link active" href="<?= base_url('members/profile') ?>">Profile</a>
                <a class="nav-link" href="<?= base_url('auth/logout') ?>">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card profile-card">
                    <div class="card-body text-center p-4">
                        <div class="profile-avatar mx-auto mb-3">
                            <?= strtoupper(substr($user['full_name'] ?? 'U', 0, 1)) ?>
                        </div>
                        <h4><?= $user['full_name'] ?? 'User' ?></h4>
                        <p class="text-muted"><?= $user['email'] ?></p>
                        <span class="badge bg-success">Active Member</span>
                    </div>
                </div>
            </div>
            
            <div class="col-md-8">
                <div class="card profile-card">
                    <div class="card-header">
                        <h5 class="mb-0">Profile Information</h5>
                    </div>
                    <div class="card-body">
                        <?php if ($this->session->flashdata('success')): ?>
                            <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
                        <?php endif; ?>
                        
                        <?php if ($this->session->flashdata('error')): ?>
                            <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
                        <?php endif; ?>
                        
                        <form method="post" action="<?= base_url('members/update_profile') ?>">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Full Name</label>
                                    <input type="text" name="full_name" class="form-control" 
                                           value="<?= $member->full_name ?? '' ?>" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" 
                                           value="<?= $member->email ?? '' ?>" readonly>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Phone</label>
                                    <input type="tel" name="phone" class="form-control" 
                                           value="<?= $member->phone ?? '' ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Date of Birth</label>
                                    <input type="date" name="date_of_birth" class="form-control" 
                                           value="<?= $member->date_of_birth ?? '' ?>">
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Gender</label>
                                    <select name="gender" class="form-select">
                                        <option value="">Select Gender</option>
                                        <option value="male" <?= ($member->gender ?? '') == 'male' ? 'selected' : '' ?>>Male</option>
                                        <option value="female" <?= ($member->gender ?? '') == 'female' ? 'selected' : '' ?>>Female</option>
                                        <option value="other" <?= ($member->gender ?? '') == 'other' ? 'selected' : '' ?>>Other</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Height (cm)</label>
                                    <input type="number" name="height" class="form-control" 
                                           value="<?= $member->height ?? '' ?>" step="0.1">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Weight (kg)</label>
                                    <input type="number" name="weight" class="form-control" 
                                           value="<?= $member->weight ?? '' ?>" step="0.1">
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Fitness Goal</label>
                                <textarea name="fitness_goal" class="form-control" rows="3"><?= $member->fitness_goal ?? '' ?></textarea>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Emergency Contact</label>
                                    <input type="text" name="emergency_contact" class="form-control" 
                                           value="<?= $member->emergency_contact ?? '' ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Emergency Phone</label>
                                    <input type="tel" name="emergency_phone" class="form-control" 
                                           value="<?= $member->emergency_phone ?? '' ?>">
                                </div>
                            </div>
                            
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i>Update Profile
                                </button>
                                <a href="<?= base_url('members/dashboard') ?>" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left me-2"></i>Back to Dashboard
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>