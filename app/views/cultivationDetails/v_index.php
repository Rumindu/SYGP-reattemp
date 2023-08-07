<?php require APPROOT. '/views/inc/header.php'; ?>
<?php require APPROOT. '/views/inc/topnavbar.php'; ?>
<?php require APPROOT. '/views/inc/sidebar.php'; ?>

<div class="body-container">
  <table>
    <tr>
      <th>NIC</th>
      <th>Name</th>
      <th>Address</th>
      <th>Contact no</th>
    </tr>
    
    <?php
    foreach($data['cultivationDetails'] as $cultivationDetail):
    ?>
    <tr>
      <td><?php echo $cultivationDetail->nic;?></td>
      <td><?php echo $cultivationDetail->name;?></td>
      <td><?php echo $cultivationDetail->address;?></td>
      <td><?php echo $cultivationDetail->contact_no;?></td>
    </tr>
    <?php endforeach ?>
  </table>
</div>