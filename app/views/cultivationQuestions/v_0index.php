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
    <?php if($_SESSION['user_role'] == 'Producer'){?>
      <a href="<?php echo URLROOT;?>/CultivationQuestions/add"><button class="publish-announcement-btn"><h2>Add cultivation question</h2></button></a>
    <?php }?>
  </div>
  <div>
    <?php //print_r($data['CultivationQuestion']);?>
    <a href="<?php echo URLROOT."/CultivationQuestions/index"?>" style="text-decoration:none">
      <button <?php
      if($data['ActiveTab']=='all'){?>class="submit-btn"<?php } else{?>class="cancel-btn"<?php };?>>All</button>
    </a>
    <?php foreach($data['CultivationQuestionCategoryList'] as $category){?>
    <a href="<?php echo URLROOT."/CultivationQuestions/category/". $category->category;?>" style="text-decoration:none">
      <button <?php 
      if($data['ActiveTab']==$category->category){?>class="submit-btn"<?php } else{?>class="cancel-btn"<?php };?>><?php echo (str_replace('_', ' ', $category->category));?></button>
    </a>    
    <?php };?>
  </div>
  <h1>Nothing to Display</h1>
</div>
<?php require APPROOT. '/views/inc/footer.php'; ?>