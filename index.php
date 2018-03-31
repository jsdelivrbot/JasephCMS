<!doctype html>
<html>
<head>
  <?php require 'require/head.php';?>
  <script>applyStyle();</script>
  <link rel="stylesheet" href="style/index.css" id="pagestyle">
</head>
<body>

<div id='grid-wrap'>
  <?php require 'require/header.php';?>
  <?php require 'require/sidebar.php'; ?>
  <div id='content'>
    <?php
      $db = new DatabaseConnection();
      echo $db->postsAusgeben();
    ?>
  </div>
</div>

<script>applyStyle();</script>

</body>
</html>
