<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <style>
    :root {
      --primary: #4361ee;
      --secondary: #3a0ca3;
      --success: #4cc9f0;
      --dark: #212529;
      --light: #f8f9fa;
      --danger: #e63946;
      --warning: #fca311;
      --info: #4895ef;
    }
    
    body {
      background-color: #f5f7fb;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    
    .dashboard-container {
      max-width: 1200px;
    }
    
    .navbar-brand {
      font-weight: 700;
      color: var(--primary) !important;
    }
    
    .welcome-card {
      background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
      color: white;
      border-radius: 15px;
      overflow: hidden;
    }
    
    .stats-card {
      border-radius: 12px;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      border: none;
    }
    
    .stats-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    
    .stats-icon {
      width: 50px;
      height: 50px;
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.5rem;
    }
    
    .workout-card {
      border-radius: 12px;
      overflow: hidden;
      border: none;
      transition: transform 0.3s ease;
    }
    
    .workout-card:hover {
      transform: translateY(-3px);
    }
    
    .progress {
      height: 8px;
      border-radius: 10px;
    }
    
    .btn-primary {
      background-color: var(--primary);
      border-color: var(--primary);
    }
    
    .btn-primary:hover {
      background-color: var(--secondary);
      border-color: var(--secondary);
    }
    
    .sidebar {
      background-color: white;
      border-radius: 15px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.05);
      padding: 20px;
    }
    
    .sidebar-item {
      padding: 12px 15px;
      border-radius: 10px;
      margin-bottom: 5px;
      cursor: pointer;
      transition: all 0.2s ease;
    }
    
    .sidebar-item:hover {
      background-color: rgba(67, 97, 238, 0.1);
      color: var(--primary);
    }
    
    .sidebar-item.active {
      background-color: var(--primary);
      color: white;
    }
    
    .user-avatar {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background-color: var(--primary);
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
    }
    
    .badge-goal {
      background-color: rgba(76, 201, 240, 0.2);
      color: var(--success);
    }
    
    .chart-container {
      background-color: white;
      border-radius: 12px;
      padding: 20px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    
    .goal-progress {
      height: 120px;
    }
    
    @media (max-width: 768px) {
      .sidebar {
        margin-bottom: 20px;
      }
    }
  </style>
</head>
<body>
  <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container dashboard-container">
      <a class="navbar-brand" href="#">
        <i class="fas fa-dumbbell me-2"></i>Fitness Hub
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
              <div class="user-avatar me-2">
                <?= strtoupper(substr($user, 0, 1)) ?>
              </div>
              <span><?= ucfirst($user) ?></span>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Profile</a></li>
              <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Settings</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item text-danger" href="<?= site_url('auth/logout') ?>"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Dashboard Content -->
  <div class="container dashboard-container my-4">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-lg-3 mb-4">
        <div class="sidebar">
          <h5 class="mb-3">Dashboard</h5>
          <div class="sidebar-item active">
            <i class="fas fa-home me-2"></i> Overview
          </div>
          <div class="sidebar-item">
            <i class="fas fa-running me-2"></i> Workouts
          </div>
          <div class="sidebar-item">
            <i class="fas fa-chart-line me-2"></i> Progress
          </div>
          <div class="sidebar-item">
            <i class="fas fa-utensils me-2"></i> Nutrition
          </div>
          <div class="sidebar-item">
            <i class="fas fa-cog me-2"></i> Settings
          </div>
          
          <div class="mt-4">
            <h6 class="text-muted">QUICK STATS</h6>
            <div class="d-flex justify-content-between mt-3">
              <div class="text-center">
                <h5 class="mb-0">12</h5>
                <small class="text-muted">Workouts</small>
              </div>
              <div class="text-center">
                <h5 class="mb-0">8,542</h5>
                <small class="text-muted">Calories</small>
              </div>
              <div class="text-center">
                <h5 class="mb-0">28</h5>
                <small class="text-muted">Days</small>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Main Content -->
      <div class="col-lg-9">
        <!-- Welcome Card -->
        <div class="card welcome-card mb-4">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-md-8">
                <h3 class="card-title">Welcome back, <?= ucfirst($user) ?>! 👋</h3>
                <p class="card-text">You're making great progress. Keep up the good work!</p>
                <div class="mt-3">
                  <span class="badge bg-light text-dark me-2">Current Streak: 7 days</span>
                  <span class="badge bg-light text-dark">Next Workout: Tomorrow</span>
                </div>
              </div>
              <div class="col-md-4 text-center">
                <i class="fas fa-dumbbell display-1 opacity-50"></i>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Stats Cards -->
        <div class="row mb-4">
          <div class="col-md-3 mb-3">
            <div class="card stats-card h-100">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <h6 class="card-title text-muted">CALORIES BURNED</h6>
                    <h3 class="mb-0">1,250</h3>
                    <small class="text-success">+12% from last week</small>
                  </div>
                  <div class="stats-icon bg-danger bg-opacity-10 text-danger">
                    <i class="fas fa-fire"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <div class="card stats-card h-100">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <h6 class="card-title text-muted">WORKOUT TIME</h6>
                    <h3 class="mb-0">45 min</h3>
                    <small class="text-success">+8% from last week</small>
                  </div>
                  <div class="stats-icon bg-warning bg-opacity-10 text-warning">
                    <i class="fas fa-clock"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <div class="card stats-card h-100">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <h6 class="card-title text-muted">STEPS</h6>
                    <h3 class="mb-0">8,542</h3>
                    <small class="text-success">+5% from last week</small>
                  </div>
                  <div class="stats-icon bg-info bg-opacity-10 text-info">
                    <i class="fas fa-shoe-prints"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <div class="card stats-card h-100">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <h6 class="card-title text-muted">HEART RATE</h6>
                    <h3 class="mb-0">72 bpm</h3>
                    <small class="text-danger">-2% from last week</small>
                  </div>
                  <div class="stats-icon bg-success bg-opacity-10 text-success">
                    <i class="fas fa-heartbeat"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Workout and Progress Section -->
        <div class="row">
          <!-- Recent Workouts -->
          <div class="col-md-6 mb-4">
            <div class="card workout-card h-100">
              <div class="card-header bg-white">
                <h5 class="card-title mb-0">Recent Workouts</h5>
              </div>
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3 p-2 border-bottom">
                  <div>
                    <h6 class="mb-0">Upper Body Strength</h6>
                    <small class="text-muted">45 min • 320 cal</small>
                  </div>
                  <span class="badge bg-primary">Completed</span>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3 p-2 border-bottom">
                  <div>
                    <h6 class="mb-0">Cardio Blast</h6>
                    <small class="text-muted">30 min • 280 cal</small>
                  </div>
                  <span class="badge bg-primary">Completed</span>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3 p-2 border-bottom">
                  <div>
                    <h6 class="mb-0">Yoga & Stretching</h6>
                    <small class="text-muted">40 min • 180 cal</small>
                  </div>
                  <span class="badge bg-warning">Scheduled</span>
                </div>
                <div class="d-flex justify-content-between align-items-center p-2">
                  <div>
                    <h6 class="mb-0">Leg Day</h6>
                    <small class="text-muted">50 min • 380 cal</small>
                  </div>
                  <span class="badge bg-secondary">Planned</span>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Goals Progress -->
          <div class="col-md-6 mb-4">
            <div class="card workout-card h-100">
              <div class="card-header bg-white">
                <h5 class="card-title mb-0">Goals Progress</h5>
              </div>
              <div class="card-body">
                <div class="mb-4">
                  <div class="d-flex justify-content-between mb-1">
                    <span>Weight Loss</span>
                    <span>75%</span>
                  </div>
                  <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 75%"></div>
                  </div>
                </div>
                <div class="mb-4">
                  <div class="d-flex justify-content-between mb-1">
                    <span>Muscle Gain</span>
                    <span>60%</span>
                  </div>
                  <div class="progress">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 60%"></div>
                  </div>
                </div>
                <div class="mb-4">
                  <div class="d-flex justify-content-between mb-1">
                    <span>Flexibility</span>
                    <span>40%</span>
                  </div>
                  <div class="progress">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 40%"></div>
                  </div>
                </div>
                <div>
                  <div class="d-flex justify-content-between mb-1">
                    <span>Endurance</span>
                    <span>85%</span>
                  </div>
                  <div class="progress">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 85%"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Activity Chart -->
        <div class="row">
          <div class="col-12">
            <div class="chart-container mb-4">
              <h5 class="mb-3">Weekly Activity</h5>
              <div class="goal-progress d-flex align-items-end">
                <div class="d-flex flex-column align-items-center mx-2">
                  <div class="bg-primary rounded-top" style="height: 80px; width: 30px;"></div>
                  <small class="mt-1">Mon</small>
                </div>
                <div class="d-flex flex-column align-items-center mx-2">
                  <div class="bg-primary rounded-top" style="height: 60px; width: 30px;"></div>
                  <small class="mt-1">Tue</small>
                </div>
                <div class="d-flex flex-column align-items-center mx-2">
                  <div class="bg-primary rounded-top" style="height: 90px; width: 30px;"></div>
                  <small class="mt-1">Wed</small>
                </div>
                <div class="d-flex flex-column align-items-center mx-2">
                  <div class="bg-primary rounded-top" style="height: 70px; width: 30px;"></div>
                  <small class="mt-1">Thu</small>
                </div>
                <div class="d-flex flex-column align-items-center mx-2">
                  <div class="bg-primary rounded-top" style="height: 100px; width: 30px;"></div>
                  <small class="mt-1">Fri</small>
                </div>
                <div class="d-flex flex-column align-items-center mx-2">
                  <div class="bg-primary rounded-top" style="height: 50px; width: 30px;"></div>
                  <small class="mt-1">Sat</small>
                </div>
                <div class="d-flex flex-column align-items-center mx-2">
                  <div class="bg-primary rounded-top" style="height: 30px; width: 30px;"></div>
                  <small class="mt-1">Sun</small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>