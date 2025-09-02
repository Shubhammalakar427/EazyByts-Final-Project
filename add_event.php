<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Add Event</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet"/>

  <style>
    body {
      font-family: 'Inter', sans-serif;
      background-color: #f8f9fa;
    }
    .card {
      margin-top: 60px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    .form-label {
      font-weight: 500;
    }
    .btn-info {
      background-color: #0dcaf0;
      border-color: #0dcaf0;
      font-weight: 500;
    }
    .btn-info:hover {
      background-color: #0bbdd4;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
      <div class="card">
        <div class="card-header bg-info text-white text-center">
          <h4 class="mb-0"><i class="fas fa-calendar-plus me-2"></i>Add New Event</h4>
        </div>
        <div class="card-body">
          <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
              $title = trim($_POST['title']);
              $date = $_POST['date'];
              $location = trim($_POST['location']);

              if ($title && $date && $location) {
                $stmt = $conn->prepare("INSERT INTO events (title, date, location) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $title, $date, $location);

                if ($stmt->execute()) {
                  echo '<div class="alert alert-success">✅ Event added successfully!</div>';
                  echo "<script>window.open('dashboard.php','_self')</script>";
                } else {
                  echo '<div class="alert alert-danger">❌ Error adding event. Please try again.</div>';
                }
                $stmt->close();
              } else {
                echo '<div class="alert alert-warning">⚠️ Please fill in all fields.</div>';
              }
            }
          ?>
          <form method="post" action="" novalidate>
            <div class="mb-3">
              <label for="title" class="form-label">Event Title</label>
              <input name="title" id="title" type="text" class="form-control" required placeholder="e.g. AI Tech Conference 2025">
            </div>
            <div class="mb-3">
              <label for="date" class="form-label">Event Date</label>
              <input name="date" id="date" type="date" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="location" class="form-label">Event Location</label>
              <input name="location" id="location" type="text" class="form-control" required placeholder="e.g. Delhi Convention Center">
            </div>
            <div class="d-grid">
              <button type="submit" class="btn btn-info">
                <i class="fas fa-plus-circle me-1"></i> Add Event
              </button>
            </div>

            <div class="d-grid mt-2">
              <a href="dashboard.php" type="submit" class="btn btn-danger">
                <i class="fas fa-minus-circle me-1"></i> Back
              </a>
            </div>


          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
