<?php require APPROOT. '/views/inc/header.php'; ?>
<?php require APPROOT. '/views/inc/topnavbar.php'; ?>
<?php require APPROOT. '/views/inc/sidebar.php'; ?>

<div class="body-container">
  <div style="display:flex; justify-content:space-between; align-items: center;" >
    <h1 style="font-size: 2.8em;">Responses</h1>
  </div>
  <?php foreach($data['CultivationQuestion'] as $cultivationQuestion) : ?>
  <div class="announcement-container">
    <h2><?php echo $cultivationQuestion->quesion_title;?></h2>
    <p><?php echo $cultivationQuestion->quesion_content;?></p>
        <div style="display:flex; justify-content: flex-start;">
          <h3><?php echo $cultivationQuestion->producer_name;?> - </h3>
          <h3><?php echo $cultivationQuestion->asked_date_time;?></h3>
        </div>
        <div class="announcement-container">
    </div>
    <br><br>
    <?php break;?>
  <?php endforeach; ?>

  <?php foreach($data['CultivationQuestion'] as $cultivationQuestion) : ?>
  <div class="announcement-container">
    <p><?php echo $cultivationQuestion->content;?></p>
        <div style="display:flex; justify-content: flex-start;">
          <h3><?php echo $cultivationQuestion->producer_name;?> - </h3>
          <h3><?php echo $cultivationQuestion->asked_date_time;?></h3>
        </div>
        <div class="announcement-container">
    </div>
    <br><br>
  <?php endforeach; ?>

</div>
<?php require APPROOT. '/views/inc/footer.php'; ?>