<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Signup</title>

  <!-- Bootstrap CSS -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    rel="stylesheet"
  />
  <link
    href="https://fonts.googleapis.com/css2?family=Inter&display=swap"
    rel="stylesheet"
  />
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background-color: #6c757d; /* Bootstrap secondary */
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 1rem;
    }
    .signup-card {
      background: #fff;
      border-radius: 0.5rem;
      box-shadow: 0 0.25rem 0.75rem rgba(0, 0, 0, 0.1);
      max-width: 450px;
      width: 100%;
    }
    .signup-header {
      background-color: #0dcaf0; /* Bootstrap info */
      border-top-left-radius: 0.5rem;
      border-top-right-radius: 0.5rem;
      padding: 1rem 1.5rem;
      color: #fff;
      text-align: center;
      font-weight: 600;
      font-size: 1.75rem;
    }
    .btn-info {
      background-color: #0dcaf0;
      border: none;
    }
    .btn-info:hover {
      background-color: #31d2f2;
    }
  </style>
</head>
<body>
  <div class="signup-card">
    <div class="signup-header">Signup Form</div>
    <form action="insert.php" method="POST" class="p-4">
      <div class="mb-3">
        <input
          type="text"
          name="username"
          class="form-control"
          placeholder="Username"
          required
          aria-label="Username"
        />
      </div>
      <div class="mb-3">
        <input
          type="text"
          name="name"
          class="form-control"
          placeholder="Enter your full name"
          required
          aria-label="Full Name"
        />
      </div>
      <div class="mb-3">
        <input
          type="tel"
          name="number"
          class="form-control"
          placeholder="Enter your number"
          required
          aria-label="Phone Number"
          pattern="[0-9]{10,15}"
          title="Please enter a valid phone number"
        />
      </div>
      <div class="mb-4">
        <input
          type="email"
          name="email"
          class="form-control"
          placeholder="Enter your email"
          required
          aria-label="Email"
        />
      </div>

      <button
        type="submit"
        name="submit"
        class="btn btn-info w-100 mb-3"
        value="Signup"
      >
        Signup
      </button>

      <a href="login.php" class="btn btn-danger w-100">Login</a>
    </form>
  </div>

  <!-- Bootstrap Bundle JS -->
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
  ></script>
</body>
</html>
