      <script>
            $(document).ready(function() 
            {   
              
              // renderiza o btn de logout
              $('.logout-area').html('<?php echo $logout_btn?>');
              
              //renderiza mensagens de erro
              $('#error').html( <?php echo isset($error_mensage) ? json_encode($error_mensage) : '' ?> );
            
            });
      </script>
  </body>
</html>