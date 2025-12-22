<?php
session_start();

require 'validation.php';

// クリックジャッキング対策
header('X-FRAME-OPTIONS: DENY');

if (!empty($_POST)) {
    echo '<pre>';
    var_dump($_POST);
    echo '</pre>';
}

// 初期値
$pageFlag = 0;
$errors   = !empty($_POST) ? validation($_POST) : [];

// CSRFトークン（セッションに無ければ作る）
if (!isset($_SESSION['csrfToken'])) {
    $_SESSION['csrfToken'] = bin2hex(random_bytes(32));
}
$token = $_SESSION['csrfToken'];

// POST受け取り（未送信はデフォ値）
$your_name = $_POST['your_name'] ?? '';
$email     = $_POST['email'] ?? '';
$url       = $_POST['url'] ?? '';
$tags      = $_POST['tag'] ?? [];       // tag[] 想定
$os        = $_POST['os'] ?? '';        // '0' or '1'
$browser   = $_POST['browser'] ?? '';
$contact   = $_POST['contact'] ?? '';
$caution   = $_POST['caution'] ?? '';   // '1' or ''

// CSRFチェック（POST時だけ）
$csrf_ok = true;
if (!empty($_POST)) {
    $csrf_ok = isset($_POST['csrf']) && hash_equals($_SESSION['csrfToken'], $_POST['csrf']);
}

// 画面遷移
if (!empty($_POST['btn_confirm'])) {
    $pageFlag = empty($errors) ? 1 : 0; // confirm
} elseif (!empty($_POST['btn_submit'])) {
    $pageFlag = 2; // complete
} elseif (!empty($_POST['back_submit'])) {
    $pageFlag = 0; // back
}
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>

<body>

<?php if (!$csrf_ok): ?>
  <p>Invalid submission（CSRF）</p>

<?php elseif ($pageFlag === 0): ?>
<?php if(!empty($errors) && !empty($_POST['btn_confirm'])): ?>

<?php echo '<ul>' ;?>
<?php
  foreach($errors as $error)
  echo '<li>' . $error . '<li>'
?>
  <?php echo '</ul>' ;?>
<?php endif ;?>
  <h2>input</h2>

  <form method="POST" action="input.php">
    name
    <input type="text" name="your_name" value="<?php echo htmlspecialchars($your_name, ENT_QUOTES, 'UTF-8'); ?>">
    <br>

    mail
    <input type="email" name="email" value="<?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?>">
    <br>

    hp
    <input type="url" name="url" value="<?php echo htmlspecialchars($url, ENT_QUOTES, 'UTF-8'); ?>">
    <br>

    type
    <label><input type="checkbox" name="tag[]" value="A" <?php echo in_array('A', $tags, true) ? 'checked' : ''; ?>>A</label>
    <label><input type="checkbox" name="tag[]" value="B" <?php echo in_array('B', $tags, true) ? 'checked' : ''; ?>>B</label>
    <label><input type="checkbox" name="tag[]" value="C" <?php echo in_array('C', $tags, true) ? 'checked' : ''; ?>>C</label>
    <br>

    OS
  <label><input type="radio" name="os" value="0" <?php if (isset($_POST['os']) && $_POST['os'] === '0') echo 'checked'; ?>>windows</label>
  <label><input type="radio" name="os" value="1"<?php if (isset($_POST['os']) && $_POST['os'] === '1') echo 'checked'; ?>>mac</label>
    <br>

    browser
    <select name="browser">
      <option value="">select</option>
      <option value="Chrome"  <?php echo ($browser === 'Chrome')  ? 'selected' : ''; ?>>Chrome</option>
      <option value="FireFox" <?php echo ($browser === 'FireFox') ? 'selected' : ''; ?>>FireFox</option>
      <option value="Edge"    <?php echo ($browser === 'Edge')    ? 'selected' : ''; ?>>Edge</option>
    </select>
    <br>

    contact
    <textarea name="contact"><?php echo htmlspecialchars($contact, ENT_QUOTES, 'UTF-8'); ?></textarea>
    <br>

    <label><input type="checkbox" name="caution" value="1" <?php echo ($caution === '1') ? 'checked' : ''; ?>>Please check the notes/precautions.</label>
    <br>

    <input type="hidden" name="csrf" value="<?php echo htmlspecialchars($token, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="submit" name="btn_confirm" value="confirm">
  </form>

<?php elseif ($pageFlag === 1 && empty($errors)): ?>
  <h2>confirm</h2>

  name: <?php echo htmlspecialchars($your_name, ENT_QUOTES, 'UTF-8'); ?><br>
  mail: <?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?><br>
  hp: <?php echo htmlspecialchars($url, ENT_QUOTES, 'UTF-8'); ?><br>
  type: <?php echo htmlspecialchars(implode(',', $tags), ENT_QUOTES, 'UTF-8'); ?><br>
  os: <?php echo htmlspecialchars($os, ENT_QUOTES, 'UTF-8'); ?><br>
  browser: <?php echo htmlspecialchars($browser, ENT_QUOTES, 'UTF-8'); ?><br>
  contact: <?php echo nl2br(htmlspecialchars($contact, ENT_QUOTES, 'UTF-8')); ?><br>
  caution: <?php echo ($caution === '1') ? 'checked' : 'not checked'; ?><br>

  <form method="POST" action="input.php">
    <input type="hidden" name="your_name" value="<?php echo htmlspecialchars($your_name, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="email" value="<?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="url" value="<?php echo htmlspecialchars($url, ENT_QUOTES, 'UTF-8'); ?>">
    <?php foreach ($tags as $t): ?>
      <input type="hidden" name="tag[]" value="<?php echo htmlspecialchars($t, ENT_QUOTES, 'UTF-8'); ?>">
    <?php endforeach; ?>
    <input type="hidden" name="os" value="<?php echo htmlspecialchars($os, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="browser" value="<?php echo htmlspecialchars($browser, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="contact" value="<?php echo htmlspecialchars($contact, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="caution" value="<?php echo htmlspecialchars($caution, ENT_QUOTES, 'UTF-8'); ?>">

    <input type="hidden" name="csrf" value="<?php echo htmlspecialchars($token, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="submit" name="back_submit" value="back">
    <input type="submit" name="btn_submit" value="submit">
  </form>

<?php else: ?>
  <h2>complete</h2>
  <?php unset($_SESSION['csrfToken']); ?>
<?php endif; ?>

</body>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</html>
