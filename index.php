<?php //追記
require_once('functions.php');
header('Set-Cookie: userId=123'); //追記
setToken();//追記
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Home</title>
</head>
<body>
  <?php if (!empty($_SESSION['err'])): ?> <!-- 追記 -->
    <p><?= $_SESSION['err']; ?></p> <!-- 追記 -->
  <?php endif; ?> <!-- 追記 -->
  <div>
     <a href="new.php">
       <p>新規作成</p>
     </a>
  </div>
  <div>
    <table>
      <tr>
        <th>ID</th>
        <th>内容</th>
        <th>更新</th>
        <th>削除</th>
      </tr>
      <?php foreach (getTodoList() as $todo): ?>
        <tr>
            <td><?= e($todo['id']); ?></td> <!-- 編集 -->
            <td><?= e($todo['content']); ?></td> <!-- 編集 -->
          <td>
            <a href="edit.php?key=<?= e($todo['id']); ?>">更新</a>
          </td>
          <td>
            <form action="store.php" method="post">
              <input type="hidden" name="id" value="<?= e($todo['id']); ?>">
              <input type="hidden" name="token" value="<?= $_SESSION['token']; ?>"> <!-- 追記 -->
              <button type="submit">削除</button>
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>
  <?php unsetError(); ?> <!-- 追記 -->
</body>
</html>