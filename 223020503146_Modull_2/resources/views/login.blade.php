<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Login</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    .container {
      width: 300px;
      margin: 0 auto;
    }

    form {
      background-color: #f2f2f2;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-group {
      margin-bottom: 15px;
    }

    label {
      display: block;
      margin-bottom: 5px;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    button {
      width: 100%;
      padding: 10px;
      background-color: #333;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    button:hover {
      background-color: #555;
    }
  </style>
</head>
<body>
  <div class="container">
    <form id="login-form">
      <h2>Login</h2>
      <div class="form-group">
        <label for="username">Username (max 7 karakter):</label>
        <input type="text" id="username" name="username" required maxlength="7">
      </div>
      <div class="form-group">
        <label for="password">Password (minimal 8 karakter, mengandung huruf besar, huruf kecil, angka, dan karakter khusus):</label>
        <input type="password" id="password" name="password" required minlength="8">
      </div>
      <button type="submit">Login</button>
    </form>
  </div>

  <script>
    const form = document.getElementById('login-form');

    form.addEventListener('submit', function(event) {
      event.preventDefault();

      const username = form.username.value;
      const password = form.password.value;

      if (username.length > 7) {
        alert('Username tidak boleh lebih dari 7 karakter!');
        return;
      }

      const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+])[A-Za-z\d!@#$%^&*()_+]{8,}$/;
      if (!passwordRegex.test(password)) {
        alert('Password harus minimal 8 karakter dan mengandung huruf besar, huruf kecil, angka, dan karakter khusus!');
        return;
      }

      // Login berhasil
      alert('Login berhasil!');
      // Di sini Anda dapat menambahkan tindakan setelah login berhasil, misalnya, redirect ke halaman lain.
    });
  </script>
</body>
</html>
