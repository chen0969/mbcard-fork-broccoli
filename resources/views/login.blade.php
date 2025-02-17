<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/mainStyle.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body class="container">
    <header class="row p-2">
        <i class="bi bi-arrow-left-circle text-dark fs-1"></i>
    </header>
    <main class="row">
        <div class="col-md-6 d-flex justify-content-center p-3">
            <i class="bi bi-person-circle icon__large"></i>
        </div>
        <div class="col-md-6 p-2">
            <form id="login-form" class="container">
                <div class="row gy-md-5 gy-3 pt-0 p-3">
                    <!-- <label for="account">Account:</label> -->
                    <input type="text" id="account" class="col-12 input__main" name="account" placeholder="輸入帳號" required>
                    <!-- <label for="password">Password:</label> -->
                    <input type="password" id="password" class="col-12 input__main" name="password" placeholder="輸入密碼" required>
                    <button type="submit" class="col-12 btn__submit">登入</button>
                </div>
            </form>
            <p id="error-message" style="color: red; display: none;">Invalid credentials. Please try again.</p>
        </div>
    </main>
    <footer class="row">
        <p>@match19</p>
    </footer>
    <script>
        const loadAdmin = () => {
            const loginForm = document.getElementById('login-form');

            loginForm.addEventListener('submit', async (event) => {
                event.preventDefault();

                const account = document.getElementById('account').value;
                const password = document.getElementById('password').value;

                try {
                    const response = await fetch('/api/login', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            account,
                            password
                        })
                    });

                    if (!response.ok) throw new Error('Login failed');

                    const data = await response.json();
                    alert('Login successful! Redirecting...');
                    localStorage.setItem('token', data.token);
                    window.location.href = '/admin/member';

                } catch (error) {
                    document.getElementById('error-message').style.display = 'block';
                }
            });
        }

        loadAdmin();
    </script>
</body>

</html>