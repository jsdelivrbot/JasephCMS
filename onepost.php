<?php require_once 'require/backend.php';

$db = new DatabaseConnection();
if(!$db->auth()) {
  header('Location: ');
}

if (isset($_COOKIE['identifier'])) {
  $userid = $db->getUserID($_COOKIE['identifier']);
}

if (isset($_GET['del'])) {
  if ($_GET['del'] == 1 && $db->getRole($userid) == 'ADMIN') {
    $db->deletePost();
  }
}

?>
<!doctype html>
<html>
<head>
  <?php require 'require/head.php';?>
  <link rel="stylesheet" href="style/onepost.css" id="pagestyle">
</head>
<body>

<div id='grid-wrap'>
  <?php require 'require/header.php';?>
  <?php require 'require/sidebar.php'; ?>
  <div id='content'>

  <a class='floating-action-btn' id='' href='saved.php?id=<?= $_GET['id']?>'>
    saved
  </a>

  <?php
  if (isset($userid)) {
    if ($db->getRole($userid) == 'ADMIN'): ?>
    <a id='delete-post' class='floating-action-btn' href='onepost.php?del=1&id=<?=$_GET['id']?>'>
      <svg id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" xml:space="preserve">
        <g><path d="M89.4,100l26.2,347.9c2.5,32.5,29.6,58.1,60.7,58.1h159.3c31.1,0,58.2-25.6,60.7-58.1L422.6,100H89.4z M190.1,460.8   c0.3,7.1-5.1,12.7-12,12.7s-12.7-5.7-13.1-12.7l-14.6-296.6c-0.5-9.6,5.7-17.4,13.8-17.4s14.9,7.8,15.3,17.4L190.1,460.8z    M268.5,460.8c0,7.1-5.7,12.7-12.5,12.7s-12.5-5.7-12.5-12.7l-2-296.6c-0.1-9.6,6.4-17.4,14.5-17.4c8.1,0,14.6,7.8,14.5,17.4   L268.5,460.8z M346.9,460.8c-0.3,7.1-6.2,12.7-13.1,12.7s-12.2-5.7-12-12.7l10.6-296.6c0.3-9.6,7.2-17.4,15.3-17.4   c8.1,0,14.3,7.8,13.8,17.4L346.9,460.8z"/><path d="M445.3,82.8H66.7v0c-1.8-21.1,10.7-38.4,27.9-38.4h322.9C434.6,44.4,447.1,61.8,445.3,82.8L445.3,82.8z" id="XMLID_2_"/><path d="M324.3,58.6H187.7l-0.2-7.8C186.7,26.3,202.1,6,221.9,6h68.3c19.7,0,35.1,20.3,34.4,44.7L324.3,58.6z" id="XMLID_1_"/></g>
      </svg>
    </a>
  <?php endif;
  }
  ?>
  <?= $db->einenPostAusgeben(); ?>
  </div>
</div>

<script>applyStyle();</script>
<script>updateMD();</script>
</body>
</html>
