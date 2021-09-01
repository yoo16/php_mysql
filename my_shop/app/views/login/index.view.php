<div class="container">
    <main id="login" class="d-flex justify-content-center">
        <div class="w-50 mt-3 p-5 bg-light">
            <form action="auth.php" method="post">
                <h3 class="h3 mb-3 fw-normal">Sign In</h3>
                <div class="form-floating">
                    <input type="text" name="email" class="form-control" id="input">
                    <label for="input">Email</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="password">
                    <label for="password">パスワード</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary">Sign In</button>
            </form>
        </div>
    </main>
</div>