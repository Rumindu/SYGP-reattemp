<?php require APPROOT. '/views/inc/component/header.php'; ?>
  <h1><?php echo $data['title']; ?></h1>
  <ul>
    <?php foreach($data['announcements'] as $announcement) : ?>
      <li><?php echo $announcement->title; ?></li>
    <?php endforeach; ?>
  </ul>
<?php require APPROOT. '/views/inc/component/footer.php'; ?>