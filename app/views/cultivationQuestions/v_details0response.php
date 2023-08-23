<?php require APPROOT. '/views/inc/header.php'; ?>
<?php require APPROOT. '/views/inc/topnavbar.php'; ?>
<?php require APPROOT. '/views/inc/sidebar.php'; ?>

<div class="body-container">
  <div style="display:flex; justify-content:space-between; align-items: center;" >
    <h1 style="font-size: 2.8em;">Responses</h1>
  </div>
  <?php foreach($data['CultivationQuestion'] as $cultivationQuestion) : ?>
  <div class="announcement-container">
    <h2><?php echo $cultivationQuestion->title;?></h2>
    <p><?php echo $cultivationQuestion->content;?></p>
        <div style="display:flex; justify-content: flex-start;">
          <h3><?php echo $cultivationQuestion->producer_name;?> - </h3>
          <h3><?php echo $cultivationQuestion->asked_date_time;?></h3>
        </div>
        <div class="announcement-container">
    </div>
    <br><br>
  <?php endforeach; ?>
  <h1>There is no Responses</h1>
  <a href="<?php echo URLROOT;?>/CultivationQuestionsResponse/add/<?php echo $cultivationQuestion->cultivation_question_id;?>"><button class="publish-announcement-btn"><h2>Add a response</h2></button></a>
  </div>

  