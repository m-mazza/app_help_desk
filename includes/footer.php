        <script>
          $(document).ready(function() 
          {   
              $('.logout-area').html('<?php echo $logout_btn?>');
              $('#error').html( <?php echo isset($error_mensage) ? json_encode($error_mensage) : '' ?> );
          });
      </script>
      
    </div>
  </body>
</html>