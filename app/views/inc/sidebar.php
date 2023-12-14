<div class="sidebar">
<img src="<?php echo URLROOT."/public/img/navbar-logo-large.webp";?>" alt="logo" height="72px">
  <a href="<?php echo URLROOT; ?>/Announcements/Index" <?php if($data['activeLink']=='Announcements'){?>style="background:red;"<?php };?>>Announcements</a>
  <a href="<?php echo URLROOT; ?>/CultivationDetails/index" <?php if($data['activeLink']=='CultivationDetails'){?>style="background:red;"<?php };?>>Producers Details</a>
  <a href="<?php echo URLROOT; ?>/CultivationQuestions/Index" <?php if($data['activeLink']=='CultivationQuestions'){?>style="background:red;"<?php };?>>Cultivation question</a>
</div>