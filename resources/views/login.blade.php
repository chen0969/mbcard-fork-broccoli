<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Login</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h2>Login</h2>
    <form id="login-form">
        <label for="account">Account:</label>
        <input type="text" id="account" name="account" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Login</button>
    </form>
    <p id="error-message" style="color: red; display: none;">Invalid credentials. Please try again.</p>

    <script>
        $(document).ready(function() {
            $('#login-form').on('submit', function(event) {
                event.preventDefault();
                
                $.ajax({
                    url: '/api/login',
                    method: 'POST',
                    data: {
                        account: $('#account').val(),
                        password: $('#password').val()
                    },
                    success: function(response) {
                        alert('Login successful! Redirecting...');
                        localStorage.setItem('token', response.token);
                        window.location.href = '/admin/member';
                    },
                    error: function() {
                        $('#error-message').show();
                    }
                });
            });
        });
    </script>
</body>
</html>
