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
  <a href="<?php echo URLROOT;?>/CultivationQuestionsResponse/add/<?php echo $cultivationQuestion->question_id;?>"><button class="publish-announcement-btn"><h2>Add a response</h2></button></a>
  </div>

  <?php foreach($data['CultivationQuestion'] as $cultivationQuestion) : ?>
  <div class="announcement-container">
    <p><?php echo $cultivationQuestion->content;?></p>
    <?php
        if($_SESSION['user_id'] == $cultivationQuestion->agri_officer_id){?>
          <div style="Display:flex; gap:5px">
            <a href="<?php echo URLROOT ."/CultivationQuestionsResponse/edit/".$cultivationQuestion->response_id?>">
              <button class="edit-btn">
                Edit
              </button>
            </a>
            <a href="<?php echo URLROOT ."/CultivationQuestionsResponse/delete/".$cultivationQuestion->response_id?>">
              <button class="delete-btn">
                Delete
              </button>
            </a>
          </div>
        <?php }?>
        <div style="display:flex; justify-content: flex-start;">
          <h3><?php echo $cultivationQuestion->agri_officer_name;?> - </h3>
          <h3><?php echo $cultivationQuestion->responded_date_time;?></h3>
        </div>
        <div class="announcement-container">
    </div>
    <br><br>
  <?php endforeach; ?>

  
<?php require APPROOT. '/views/inc/footer.php'; ?>