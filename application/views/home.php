<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitness Hub - Transform Your Body, Transform Your Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #4361ee;
            --secondary: #f72585;
            --success: #4cc9f0;
            --dark: #2d3436;
        }
        
        .hero-section {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            color: white;
        }
        
        .feature-card {
            transition: transform 0.3s ease;
            border: none;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
        }
        
        .stats-section {
            background: var(--dark);
            color: white;
        }
        
        .btn-primary {
            background: var(--primary);
            border: none;
            padding: 12px 30px;
            font-weight: 600;
        }
        
        .btn-outline-light:hover {
            background: var(--secondary);
            border-color: var(--secondary);
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background: rgba(67, 97, 238, 0.95);">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">
                <i class="fas fa-dumbbell me-2"></i>Fitness Hub
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#features">Features</a></li>
                    <li class="nav-item"><a class="nav-link" href="#plans">Plans</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('auth/login') ?>">Login</a></li>
                    <li class="nav-item"><a class="btn btn-outline-light ms-2" href="<?= base_url('auth/register') ?>">Join Now</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-4">Transform Your Body, Transform Your Life</h1>
                    <p class="lead mb-4">Join thousands of members who have achieved their fitness goals with our state-of-the-art facilities, expert trainers, and personalized workout plans.</p>
                    <div class="d-flex gap-3">
                        <a href="<?= base_url('auth/register') ?>" class="btn btn-light btn-lg">Start Your Journey</a>
                        <a href="#features" class="btn btn-outline-light btn-lg">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <i class="fas fa-dumbbell display-1 opacity-75"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section py-5">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-3 mb-4">
                    <h2 class="display-4 fw-bold text-warning">500+</h2>
                    <p class="lead">Happy Members</p>
                </div>
                <div class="col-md-3 mb-4">
                    <h2 class="display-4 fw-bold text-success">15+</h2>
                    <p class="lead">Expert Trainers</p>
                </div>
                <div class="col-md-3 mb-4">
                    <h2 class="display-4 fw-bold text-info">50+</h2>
                    <p class="lead">Equipment</p>
                </div>
                <div class="col-md-3 mb-4">
                    <h2 class="display-4 fw-bold text-danger">24/7</h2>
                    <p class="lead">Access</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold">Why Choose Fitness Hub?</h2>
                <p class="lead text-muted">Everything you need to achieve your fitness goals</p>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card feature-card h-100 text-center p-4">
                        <div class="card-body">
                            <i class="fas fa-users display-4 text-primary mb-3"></i>
                            <h5 class="card-title">Expert Trainers</h5>
                            <p class="card-text">Certified personal trainers to guide you through your fitness journey with personalized workout plans.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card feature-card h-100 text-center p-4">
                        <div class="card-body">
                            <i class="fas fa-dumbbell display-4 text-success mb-3"></i>
                            <h5 class="card-title">Modern Equipment</h5>
                            <p class="card-text">State-of-the-art fitness equipment and facilities to support all your workout needs.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card feature-card h-100 text-center p-4">
                        <div class="card-body">
                            <i class="fas fa-chart-line display-4 text-warning mb-3"></i>
                            <h5 class="card-title">Progress Tracking</h5>
                            <p class="card-text">Advanced tracking system to monitor your progress and celebrate your achievements.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Membership Plans -->
    <section id="plans" class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold">Membership Plans</h2>
                <p class="lead text-muted">Choose the plan that fits your lifestyle</p>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card h-100 text-center">
                        <div class="card-body p-4">
                            <h5 class="card-title">Basic</h5>
                            <h2 class="text-primary">$29.99<small class="text-muted">/month</small></h2>
                            <ul class="list-unstyled mt-3">
                                <li><i class="fas fa-check text-success me-2"></i>Gym Access</li>
                                <li><i class="fas fa-check text-success me-2"></i>Locker Room</li>
                                <li><i class="fas fa-check text-success me-2"></i>Basic Equipment</li>
                            </ul>
                            <a href="<?= base_url('auth/register') ?>" class="btn btn-outline-primary">Choose Plan</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 text-center border-primary">
                        <div class="card-header bg-primary text-white">
                            <span class="badge bg-warning">Most Popular</span>
                        </div>
                        <div class="card-body p-4">
                            <h5 class="card-title">Premium</h5>
                            <h2 class="text-primary">$79.99<small class="text-muted">/3 months</small></h2>
                            <ul class="list-unstyled mt-3">
                                <li><i class="fas fa-check text-success me-2"></i>Everything in Basic</li>
                                <li><i class="fas fa-check text-success me-2"></i>Personal Training</li>
                                <li><i class="fas fa-check text-success me-2"></i>Group Classes</li>
                                <li><i class="fas fa-check text-success me-2"></i>Nutrition Consultation</li>
                            </ul>
                            <a href="<?= base_url('auth/register') ?>" class="btn btn-primary">Choose Plan</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 text-center">
                        <div class="card-body p-4">
                            <h5 class="card-title">VIP</h5>
                            <h2 class="text-primary">$199.99<small class="text-muted">/year</small></h2>
                            <ul class="list-unstyled mt-3">
                                <li><i class="fas fa-check text-success me-2"></i>Everything in Premium</li>
                                <li><i class="fas fa-check text-success me-2"></i>Unlimited Personal Training</li>
                                <li><i class="fas fa-check text-success me-2"></i>Nutrition Plan</li>
                                <li><i class="fas fa-check text-success me-2"></i>Massage Therapy</li>
                            </ul>
                            <a href="<?= base_url('auth/register') ?>" class="btn btn-outline-primary">Choose Plan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3>Get In Touch</h3>
                    <p class="text-muted">Ready to start your fitness journey? Contact us today!</p>
                    <div class="mb-3">
                        <i class="fas fa-map-marker-alt text-primary me-2"></i>
                        123 Fitness Street, Health City, HC 12345
                    </div>
                    <div class="mb-3">
                        <i class="fas fa-phone text-primary me-2"></i>
                        (555) 123-4567
                    </div>
                    <div class="mb-3">
                        <i class="fas fa-envelope text-primary me-2"></i>
                        info@fitnesshub.com
                    </div>
                </div>
                <div class="col-md-6">
                    <form>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Your Name" required>
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" placeholder="Your Email" required>
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" rows="4" placeholder="Your Message" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5><i class="fas fa-dumbbell me-2"></i>Fitness Hub</h5>
                    <p class="text-muted">Transform your body, transform your life.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="text-muted">© <?= date('Y') ?> Fitness Hub. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>