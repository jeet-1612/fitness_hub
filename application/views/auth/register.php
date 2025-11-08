<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Fitness Hub - Sign Up</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    * { box-sizing: border-box; }
    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      min-height: 100vh;
      margin: 0;
    }
    .auth-container {
      min-height: calc(100vh - 60px);
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }
    .auth-card {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
      border-radius: 20px;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.2);
      overflow: hidden;
      width: 100%;
      max-width: 450px;
    }
    .auth-header {
      text-align: center;
      padding: 40px 40px 20px;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
    }
    .logo {
      font-size: 2rem;
      font-weight: 700;
      margin-bottom: 8px;
      letter-spacing: -0.5px;
    }
    .auth-subtitle {
      opacity: 0.9;
      font-size: 0.95rem;
      font-weight: 300;
    }
    .auth-body {
      padding: 40px;
    }
    .form-group {
      margin-bottom: 24px;
      position: relative;
    }
    .form-label {
      font-weight: 500;
      color: #374151;
      margin-bottom: 8px;
      font-size: 0.9rem;
    }
    .form-control {
      border: 2px solid #e5e7eb;
      border-radius: 12px;
      padding: 14px 16px;
      font-size: 0.95rem;
      transition: all 0.3s ease;
      background: #f9fafb;
    }
    .form-control:focus {
      border-color: #667eea;
      box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
      background: white;
      outline: none;
    }
    .input-icon {
      position: absolute;
      right: 16px;
      top: 50%;
      transform: translateY(-50%);
      color: #9ca3af;
      font-size: 0.9rem;
    }
    .btn-primary {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      border: none;
      border-radius: 12px;
      padding: 14px;
      font-weight: 600;
      font-size: 0.95rem;
      transition: all 0.3s ease;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }
    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
    }
    .auth-link {
      color: #667eea;
      text-decoration: none;
      font-weight: 500;
      transition: color 0.3s ease;
    }
    .auth-link:hover {
      color: #764ba2;
      text-decoration: none;
    }
    .alert {
      border-radius: 12px;
      border: none;
      margin-bottom: 24px;
      font-size: 0.9rem;
    }
    .footer-text {
      text-align: center;
      padding: 20px;
      color: rgba(255, 255, 255, 0.8);
      font-size: 0.85rem;
    }
    @media (max-width: 576px) {
      .auth-header, .auth-body { padding: 30px 25px; }
      .logo { font-size: 1.75rem; }
    }
  </style>
</head>
<body>
  <div class="auth-container">
    <div class="auth-card">
      <div class="auth-header">
        <h1 class="logo"><i class="fas fa-dumbbell"></i> Fitness Hub</h1>
        <p class="auth-subtitle">Create your account to get started</p>
      </div>
      
      <div class="auth-body">
            
            <?php if ($this->session->flashdata('error')): ?>
              <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('success')): ?>
              <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
            <?php endif; ?>

            <?php if (validation_errors()): ?>
              <div class="alert alert-warning"><?= validation_errors() ?></div>
            <?php endif; ?>

        <form method="post" action="<?= base_url('auth/register') ?>">
          <div class="form-group">
            <label class="form-label">Full Name</label>
            <div class="position-relative">
              <input type="text" name="full_name" class="form-control" value="<?= set_value('full_name') ?>" placeholder="Enter your full name" required>
              <i class="fas fa-user input-icon"></i>
            </div>
          </div>

          <div class="form-group">
            <label class="form-label">Email Address</label>
            <div class="position-relative">
              <input type="email" name="email" class="form-control" value="<?= set_value('email') ?>" placeholder="Enter your email" required>
              <i class="fas fa-envelope input-icon"></i>
            </div>
          </div>

          <div class="form-group">
            <label class="form-label">Password</label>
            <div class="position-relative">
              <input type="password" name="password" class="form-control" placeholder="Create a password" required>
              <i class="fas fa-lock input-icon"></i>
            </div>
          </div>

          <div class="form-group">
            <label class="form-label">Confirm Password</label>
            <div class="position-relative">
              <input type="password" name="confirm_password" class="form-control" placeholder="Confirm your password" required>
              <i class="fas fa-lock input-icon"></i>
            </div>
          </div>

          <button type="submit" class="btn btn-primary btn-block">
            <i class="fas fa-user-plus mr-2"></i>Create Account
          </button>

          <div class="text-center mt-4">
            <span class="text-muted">Already have an account?</span>
            <a href="<?= base_url('auth/login') ?>" class="auth-link ml-1">Sign in here</a>
          </div>
        </form>
      </div>
    </div>
  </div>
  
  <div class="footer-text">
    © <?= date('Y') ?> Fitness Hub. All rights reserved.
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
