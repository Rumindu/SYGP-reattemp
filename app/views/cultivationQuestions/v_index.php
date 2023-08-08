<?php require APPROOT. '/views/inc/header.php'; ?>
<?php require APPROOT. '/views/inc/topnavbar.php'; ?>
<?php require APPROOT. '/views/inc/sidebar.php'; ?>

<div class="body-container">
  <div style="display:flex; justify-content:space-between; align-items: center;" >
    <h1 style="font-size: 2.8em;">Cultivation Questions</h1>
  </div>
  <?php foreach($data['CultivationQuestion'] as $cultivationQuestion) : ?>
  <div class="announcement-container">
    <h2><?php echo $cultivationQuestion->title;?></h2>
    <p><?php echo $cultivationQuestion->content;?></p>
        <div style="display:flex; justify-content:flex-start;">
          <h3><?php echo $cultivationQuestion->name." _";?> </h3>
          <h4>asked on_ </h4><h3><?php echo $cultivationQuestion->asked_date_time;?></h3>
          </div>
        <div class="announcement-container" style="display:flex; justify-content: flex-end;">
        <a href="<?php echo URLROOT ."/CultivationQuestions/detail/".$cultivationQuestion->cultivation_question_id?>">
              <button class="edit-btn">
                View Responses
              </button>
            </a>
        </div>
    </div>
    <br><br>
  <?php endforeach; ?>
</div>
<?php require APPROOT. '/views/inc/footer.php'; ?>