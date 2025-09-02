<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upcoming Events</title>
    <!-- Include Bootstrap and custom styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
        }
        .event-card {
            box-shadow: 0 0 15px rgba(0,0,0,0.05);
            border: 1px solid #e3e3e3;
            border-radius: 8px;
        }
        .form-control {
            border-radius: 6px;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <h2 class="text-center mb-5">Upcoming Events</h2>

    <div class="row">
        <?php
        $result = $conn->query("SELECT * FROM events ORDER BY date DESC");

        if ($result->num_rows > 0) {
            while ($event = $result->fetch_assoc()) {
                echo "
                <div class='col-md-6 mb-4'>
                    <div class='event-card p-4 bg-white h-100'>
                        <h4 class='mb-3'>{$event['title']}</h4>
                        <p><strong>Date:</strong> {$event['date']}</p>
                        <p><strong>Location:</strong> {$event['location']}</p>
                        <form method='post' action='book_event.php' class='mt-3'>
                            <input type='hidden' name='event_id' value='{$event['id']}'>
                            <div class='mb-2'>
                                <input type='text' name='name' class='form-control' placeholder='Your Name' required>
                            </div>
                            <div class='mb-2'>
                                <input type='email' name='email' class='form-control' placeholder='Your Email' required>
                            </div>
                            <button type='submit' class='btn btn-primary w-100'>Book</button>
                        </form>
                    </div>
                </div>
                ";
            }
        } else {
            echo "<div class='col-12 text-center'><p>No events found.</p></div>";
        }
        ?>
    </div>
</div>

<!-- Bootstrap 5 JS (Optional if no JS is needed) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
