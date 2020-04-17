<?php if(isset($user_id)){ // Der Footer wird nur angezeigt, wenn der User eingeloggt ist. ?>
  <footer class="fixed-bottom bg-secondary text-white text-center">
      <br>
      <p>Eingeloggt als <?php echo  $user['firstname']. " " .$user['lastname']; ?></p>
  </footer>
<?php } ?>
