<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Bookings</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Optional: Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
        }
        .booking-card {
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            background-color: #fff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }
        .form-wrapper {
            max-width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];

        // Fetch bookings
        $stmt = $conn->prepare("
            SELECT e.title, e.date, e.location, b.booked_at
            FROM bookings b
            JOIN events e ON b.event_id = e.id
            WHERE b.email = ?
            ORDER BY b.booked_at DESC
        ");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        ?>

        <h2 class="text-center mb-4">My Booked Events</h2>

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "
                <div class='booking-card'>
                    <h4>{$row['title']}</h4>
                    <p><strong>Date:</strong> {$row['date']}</p>
                    <p><strong>Location:</strong> {$row['location']}</p>
                    <p class='text-muted'><small><strong>Booked At:</strong> {$row['booked_at']}</small></p>
                </div>
                ";
            }
        } else {
            echo "<div class='alert alert-warning text-center'>No bookings found for <strong>{$email}</strong>.</div>";
        }

        $stmt->close();
    } else {
        ?>
        <div class="form-wrapper">
            <h2 class="text-center mb-4">View My Bookings</h2>
            <form method="post" class="card p-4 shadow-sm bg-white">
                <div class="mb-3">
                    <label for="email" class="form-label">Enter your email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="you@example.com" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Show My Bookings</button>
            </form>
        </div>
        <?php
    }
    ?>
</div>

<!-- Bootstrap 5 JS (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
