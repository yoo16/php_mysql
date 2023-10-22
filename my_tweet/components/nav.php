<nav id="side-menu">
  <ul>
    <li>
      <img src="svg/home.svg">
      <a href="">ホーム</a>
    </li>
    <li>
      <img src="svg/profile.svg">
      <a href="#">プロフィール</a>
    </li>
    <li>
      <img src="svg/logout.svg">
      <a href="login/logout.php">Sign out</a>
    </li>
  </ul>
  <p class="fw-bold">
  <p class="profile-image">
    <img src="./images/user_icon/<?= User::userIcon($auth_user['id']) ?>">
    <span class="fw-bold">@<?= $auth_user['name'] ?></span>
  </p>
  </p>
</nav>