<?php require APPROOT. '/views/inc/header.php'; ?>
<?php require APPROOT. '/views/inc/topnavbar.php'; ?>
<?php if($_SESSION['user_role'] == 'Agri Officer'){
  require APPROOT. '/views/inc/sidebar.php'; 
  }
  else{
    require APPROOT. '/views/inc/sidebar2.php';
  }?>

<div class="body-container">
  <div style="display:flex; justify-content:space-between; align-items: center;" >
    <h1 style="font-size: 2.8em;">Cultivation Questions</h1>
  </div>
  <a href="<?php echo URLROOT."/CultivationQuestions/index"?>" style="text-decoration:none">
  <button>all</button>
  </a>
  <?php foreach($data['CultivationQuestionCategoryList'] as $category){?>
    <a href="<?php echo URLROOT."/CultivationQuestions/category/". $category->category;?>" style="text-decoration:none">
      <button style="margin:10px"><?php echo (str_replace('_', ' ', $category->category));?></button>
    </a>    
  <?php };?>
 
  <?php if($_SESSION['user_role'] == 'Producer'){?>
    <div style="display: flex; justify-content:end">
      <a href="<?php echo URLROOT;?>/CultivationQuestions/add"><button class="publish-announcement-btn"><h2>Add cultivation question</h2></button></a>
    </div>
  <?php }?>
  <?php foreach($data['CultivationQuestion'] as $cultivationQuestion) : ?>
  <div class="announcement-container">
    <h2><?php echo $cultivationQuestion->title;?></h2>
    <p><?php echo $cultivationQuestion->content;?></p>
        <div style="display:flex; justify-content:flex-start;">
          <h3 style="margin-right: 5px;"><?php echo $cultivationQuestion->producer_name;?> </h3>
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