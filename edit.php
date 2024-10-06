<?php
require_once('functions.php');
setToken(); // 追記
?>

<?php
require_once('functions.php');
$todo = getSelectedTodo($_GET['key']);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>編集</title>
</head>
<body>
  <?php if (!empty($_SESSION['err'])): ?> <!-- 追記 -->
    <p><?= $_SESSION['err']; ?></p> <!-- 追記 -->
  <?php endif; ?> <!-- 追記 -->
  <form action="store.php" method="post">
    <input type="hidden" name="token" value="<?= $_SESSION['token']; ?>"><!-- 追記 -->
    <input type="hidden" name="id" value="<?= e($_GET['key']); ?>"> <!-- 編集 -->
    <input type="text" name="content" value="<?= e($todo); ?>"> <!-- 編集 -->
    <input type="submit" value="更新">
  </form>
  <div>
    <a href="index.php">一覧へもどる</a>
  </div>
  <?php unsetError(); ?> <!-- 追記 -->
</body>
</html>