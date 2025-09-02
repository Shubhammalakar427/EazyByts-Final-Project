<?php include("config.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Event 2025</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
        }

        header {
            background-color: #6feff8;
            color: #fff;
            padding: 2rem 0;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .navbar-nav .nav-link {
            font-weight: 500;
            color: #000 !important;
        }

        .navbar-nav .nav-link:hover {
            color: #0d6efd !important;
        }

        section {
            padding: 50px 0;
        }

        .event-card {
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            border: none;
        }

        .carousel-item img {
            height: 300px;
            object-fit: cover;
        }

        .line {
            height: 6px;
            background-color: #6feff8;
            border-radius: 4px;
            margin: 40px 0;
        }
        .add:hover{
            color:white;
        }
    </style>
</head>
<body>

<header>
    <h1>Welcome to Event 2025</h1>
</header>

<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
  <div class="container">
    <a class="navbar-brand" href="#">Event</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#about">Events</a></li>
        <li class="nav-item"><a class="nav-link" href="#speakers">Speakers</a></li>
        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
        <li class="nav-item">
        <a href="signup.php" class="add nav-link btn btn-outline-primary ms-3 px-3 py-1 rounded">Admin</a>
    </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Home Section -->
<section id="home" class="container">
  <div class="row align-items-center">
    <div class="col-md-4 text-center mb-4">
      <a href="my_bookings.php" class="btn btn-primary btn-lg">Search Your Events</a>
    </div>
    <div class="col-md-8">
      <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner rounded-3 overflow-hidden">
          <div class="carousel-item active">
            <img src="image/download.jpg" class="d-block w-100" alt="Event Image 1">
          </div>
          <div class="carousel-item">
            <img src="image/download (2).jpg" class="d-block w-100" alt="Event Image 2">
          </div>
          <div class="carousel-item">
            <img src="image/download (3).jpg" class="d-block w-100" alt="Event Image 3">
          </div>
          <div class="carousel-item">
            <img src="image/download (4).jpg" class="d-block w-100" alt="Event Image 4">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Event Section -->
<section id="about" class="bg-white">
  <div class="container">
    <h2 class="text-center mb-5 text-primary">Upcoming Events</h2>
    <div class="row g-4">
      <?php
      $query = "SELECT * FROM events ORDER BY date DESC";
      $run = mysqli_query($conn, $query);
      while ($row = mysqli_fetch_array($run)) {
          $title = $row['title'];
          $date = $row['date'];
          $location = $row['location'];
      ?>
      <div class="col-md-6">
        <div class="card event-card p-4">
          <h4><?php echo htmlspecialchars($title); ?></h4>
          <p><strong>Date:</strong> <?php echo htmlspecialchars($date); ?></p>
          <p><strong>Location:</strong> <?php echo htmlspecialchars($location); ?></p>
          <a href="events.php" class="btn btn-info">Book Now</a>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</section>

<!-- Speakers -->
<section id="speakers">
  <div class="container">
    <h2 class="text-center text-primary mb-5">Meet the Speakers</h2>
    <ul class="list-group list-group-flush fs-5">
      <li class="list-group-item"><strong>Yesh Sharma:</strong>	Technology leader focused on AI and machine learning.</li>
      <li class="list-group-item"><strong>Ankit Kumar:</strong> Bestselling author and creative writing instructor.</li>
      <li class="list-group-item"><strong>Yog Gupta:</strong>plenary speakers</li>
      <li class="list-group-item"><strong>Sohan Reddy:</strong>keynote speakers</li>
    </ul>
  </div>
</section>

<!-- Contact -->
<section id="contact" class="bg-light">
  <div class="container">
    <h2 class="text-center text-primary mb-4">Contact Us</h2>
    <div class="row justify-content-center">
      <div class="col-md-6">
        <form method="post" class="p-4 bg-white rounded shadow-sm">
          <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" id="name" name="name" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" name="email" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="message" class="form-label">Message:</label>
            <textarea id="message" name="message" rows="4" class="form-control" required></textarea>
          </div>
          <button name="submit" type="submit" class="btn btn-primary w-100">Send</button>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- Footer -->
 <footer class="bg-dark text-white pt-5 pb-4 mt-5">
  <div class="container text-md-left">
    <div class="row text-md-left">

      <!-- About -->
      <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mb-4">
        <h5 class="text-uppercase fw-bold mb-4">Event 2025</h5>
        <p>
          Bringing together the brightest minds in tech, innovation, and creativity. Join us to explore, connect, and build the future.
        </p>
      </div>

      <!-- Quick Links -->
      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
        <h6 class="text-uppercase fw-bold mb-4">Quick Links</h6>
        <ul class="list-unstyled">
          <li><a href="index.php" class="text-white text-decoration-none">Home</a></li>
          <li><a href="events.php" class="text-white text-decoration-none">Events</a></li>
          <li><a href="my_bookings.php" class="text-white text-decoration-none">My Bookings</a></li>
          <li><a href="#contact" class="text-white text-decoration-none">Contact</a></li>
        </ul>
      </div>

      <!-- Contact Info -->
      <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-4">
        <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
        <p><i class="fas fa-home me-2"></i> New Event, India</p>
        <p><i class="fas fa-envelope me-2"></i> info@event2025.com</p>
        <p><i class="fas fa-phone me-2"></i> +91 123456789</p>
      </div>

      <!-- Social Icons -->
      <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-4">
        <h6 class="text-uppercase fw-bold mb-4">Follow Us</h6>
        <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
        <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
        <a href="#" class="text-white"><i class="fab fa-linkedin-in"></i></a>
      </div>
    </div>

    <!-- Divider -->
    <hr class="mb-4" style="background-color: rgba(255,255,255,0.2);" />

    <!-- Copyright -->
    <div class="row">
      <div class="col-md-12 text-center">
        <p class="mb-0">&copy; <?php echo date('Y'); ?> Event 2025. All rights reserved.</p>
      </div>
    </div>
  </div>
</footer>



<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Contact form handler
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $insert = "INSERT INTO contact (name, email, message) VALUES ('$name', '$email', '$message')";
    $run = mysqli_query($conn, $insert);
    if ($run) {
        echo "<script>alert('Message sent successfully!'); window.location.href='confirm.php';</script>";
    } else {
        echo "<script>alert('Failed to send message');</script>";
    }
}
?>

