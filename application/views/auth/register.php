<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Fitness Hub - Sign Up</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <style>
    body { background:#f5f7fb; }
    .card { border-radius: 12px; box-shadow: 0 6px 20px rgba(0,0,0,0.05); }
    .logo { font-weight:700; letter-spacing:1px; color:#0d6efd; }
  </style>
</head>
<body>
  <div class="container">
    <div class="row vh-100 align-items-center justify-content-center">
      <div class="col-md-6 col-lg-5">
        <div class="text-center mb-4">
          <h1 class="logo">Fitness Hub</h1>
          <p class="text-muted small">Create your account</p>
        </div>

        <div class="card">
          <div class="card-body p-4">
            
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
                <label>Full Name</label>
                <input type="text" name="full_name" class="form-control" value="<?= set_value('full_name') ?>" required>
              </div>

              <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" class="form-control" value="<?= set_value('email') ?>" required>
              </div>

              <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
              </div>

              <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" required>
              </div>

              <button type="submit" class="btn btn-primary btn-block">Sign Up</button>

              <div class="text-center mt-3">
                <small>Already have an account? <a href="<?= base_url('auth/login') ?>">Login here</a></small>
              </div>
            </form>
          </div>
        </div>

        <p class="text-center text-muted small mt-3">© <?= date('Y') ?> Fitness Hub</p>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
