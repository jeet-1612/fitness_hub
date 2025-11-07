<!-- application/views/auth/login.php -->
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Fitness Hub - Login</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <!-- Bootstrap CDN (optional) -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

  <style>
    body { background:#f5f7fb; }
    .card { border-radius: 12px; box-shadow: 0 6px 20px rgba(0,0,0,0.05); }
    .logo { font-weight:700; letter-spacing:1px; color:#0d6efd; }
    .form-control:focus { box-shadow: none; }
  </style>
</head>
<body>
  <div class="container">
    <div class="row vh-100 align-items-center justify-content-center">
      <div class="col-md-6 col-lg-5">
        <div class="text-center mb-4">
          <h1 class="logo">Fitness Hub</h1>
          <p class="text-muted small">Login to your account</p>
        </div>

        <div class="card">
          <div class="card-body p-4">

            <?php if ($this->session->flashdata('error')): ?>
              <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
            <?php endif; ?>

            <?php if (validation_errors()): ?>
              <div class="alert alert-warning"><?= validation_errors() ?></div>
            <?php endif; ?>

            <form method="post" action="<?= base_url('auth/login') ?>">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email"
                       value="<?= set_value('email') ?>" placeholder="you@example.com" required>
              </div>

              <div class="form-group mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password"
                       placeholder="Enter your password" required>
              </div>

              <div class="form-group form-row justify-content-between align-items-center">
                <div class="col-auto">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="remember" name="remember">
                    <label class="form-check-label small" for="remember">Remember me</label>
                  </div>
                </div>
                <div class="col-auto">
                  <a href="<?= base_url('auth/forgot') ?>" class="small">Forgot password?</a>
                </div>
              </div>

              <button type="submit" class="btn btn-primary btn-block">Login</button>

              <div class="text-center mt-3">
                <!-- <?php echo base_url(); ?> -->
                <small>Don't have an account? <a href="<?= base_url('auth/register') ?>">Sign up</a></small>
              </div>
            </form>

          </div>
        </div>

        <p class="text-center text-muted small mt-3">© <?= date('Y') ?> Fitness Hub</p>
      </div>
    </div>
  </div>

  <!-- jQuery + Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    $(function(){
      // simple client-side convenience: focus email
      $('#email').focus();
    });
  </script>
</body>
</html>
