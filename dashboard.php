<?php include('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Panel - Event Management</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background-color: #f8f9fa;
    }
    .sidebar .list-group-item {
      padding: 15px 20px;
    }
    .card-title {
      margin-bottom: 0.5rem;
    }
    .btn-sm {
      font-size: 0.875rem;
    }
    .event-card {
      background-color: #fff;
      border: 1px solid #dee2e6;
      border-radius: 8px;
      padding: 20px;
      margin-bottom: 30px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
    }
    .line {
      height: 4px;
      background-color: #0d6efd;
      margin: 30px 0;
      border-radius: 2px;
    }
    table th {
      background-color: #e9ecef;
    }
  </style>
</head>
<body>

<div class="container-fluid mt-4">
  <div class="row">

    <!-- Sidebar -->
    <div class="col-md-3 mb-4">
      <div class="card shadow-sm">
        <div class="card-header bg-primary text-white text-center">
          <h4 class="mb-0">Admin Panel</h4>
        </div>
        <ul class="list-group list-group-flush sidebar">
          <li class="list-group-item">
            <a href="add_event.php" class="btn btn-outline-info w-100">
              <i class="fas fa-calendar-plus me-2"></i>Add Event
            </a>
          </li>
          <li class="list-group-item">
            <a href="display.php" class="btn btn-outline-info w-100">
              <i class="fas fa-list me-2"></i>Total Bookings
              <span class="badge bg-secondary float-end">
                <?php
                  $result = mysqli_query($conn, "SELECT * FROM bookings");
                  echo mysqli_num_rows($result);
                ?>
              </span>
            </a>
          </li>
          <li class="list-group-item">
            <a href="dashboard.php" class="btn btn-outline-info w-100">
              <i class="fas fa-calendar-alt me-2"></i>Total Events
              <span class="badge bg-secondary float-end">
                <?php
                  $result = mysqli_query($conn, "SELECT * FROM events");
                  echo mysqli_num_rows($result);
                ?>
              </span>
            </a>
          </li>
          <li class="list-group-item">
            <a href="display_contact.php" class="btn btn-outline-info w-100">
              <i class="fas fa-envelope me-2"></i>Contact Person
            </a>
          </li>
          <li class="list-group-item">
            <a href="index.php" class="btn btn-outline-danger w-100">
              <i class="fas fa-arrow-left me-2"></i>Back to Home
            </a>
          </li>
        </ul>
      </div>
    </div>

    <!-- Main Content -->
    <div class="col-md-9">
      <h3 class="mb-4">Manage Events</h3>
      <?php
        $query = "SELECT * FROM events ORDER BY date DESC";
        $run = mysqli_query($conn, $query);
        while($row = mysqli_fetch_assoc($run)) {
      ?>
        <div class="event-card">
          <div class="d-flex justify-content-between align-items-start mb-2">
            <div>
              <h4 class="card-title"><?php echo $row['title']; ?></h4>
              <h6 class="text-muted">Event ID: <?php echo $row['id']; ?></h6>
            </div>
            <div>
              <a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-outline-primary me-2">
                <i class="fas fa-edit"></i> Update
              </a>
              <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure to delete this event?')">
                <i class="fas fa-trash-alt"></i> Delete
              </a>
            </div>
          </div>
          <h5 class="mb-3">Event Schedule</h5>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Date</th>
                <th>Location</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><?php echo htmlspecialchars($row['date']); ?></td>
                <td><?php echo htmlspecialchars($row['location']); ?></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="line"></div>
      <?php } ?>
    </div>

  </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
