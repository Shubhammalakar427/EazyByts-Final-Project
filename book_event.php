<?php
include 'config.php';

$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $event_id = intval($_POST['event_id']);
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);

    if ($event_id && $name && $email) {
        $stmt = $conn->prepare("INSERT INTO bookings (event_id, name, email) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $event_id, $name, $email);

        if ($stmt->execute()) {
            $success = "✅ Booking successful!";
        } else {
            $error = "❌ Booking failed. Please try again.";
        }

        $stmt->close();
    } else {
        $error = "⚠️ Please fill in all fields.";
    }
}

// Fetch events to display in dropdown
$events = $conn->query("SELECT id, title FROM events ORDER BY date DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Book Event</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
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
          <h4 class="mb-0"><i class="fas fa-ticket-alt me-2"></i>Book an Event</h4>
        </div>
        <div class="card-body">
          <?php if ($success): ?>
            <div class="alert alert-success"><?php echo $success; ?> <a href="events.php" class="text-decoration-underline">Back to Events</a></div>
          <?php elseif ($error): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
          <?php endif; ?>

          <form method="POST" novalidate>
            <div class="mb-3">
              <label for="event_id" class="form-label">Select Event</label>
              <select name="event_id" id="event_id" class="form-select" required>
                <option value="" disabled selected>Select an event</option>
                <?php while ($row = $events->fetch_assoc()): ?>
                  <option value="<?php echo $row['id']; ?>">
                    <?php echo htmlspecialchars($row['title']); ?>
                  </option>
                <?php endwhile; ?>
              </select>
            </div>

            <div class="mb-3">
              <label for="name" class="form-label">Your Name</label>
              <input type="text" name="name" id="name" class="form-control" placeholder="Enter full name" required>
            </div>

            <div class="mb-3">
              <label for="email" class="form-label">Your Email</label>
              <input type="email" name="email" id="email" class="form-control" placeholder="Enter email" required>
            </div>

            <div class="d-grid">
              <button type="submit" class="btn btn-info">
                <i class="fas fa-calendar-check me-1"></i> Book Now
              </button>
            </div>

             <div class="d-grid mt-3">
            
               <a href="index.php" class="btn btn-outline-danger w-100">
              <i class="fas fa-arrow-left me-2"></i>Back to Home
            </a>
             
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>



<!-- Bootstrap Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
