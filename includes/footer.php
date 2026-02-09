            <script>
            $(document).ready(function() 
            {   
                $('.logout-area').html('<?php echo $logout_btn?>');
                $('#error').html( <?php echo isset($error_mensage) ? json_encode($error_mensage) : '' ?> );
                $('#msg_box').html( <?php echo isset($ret_msg) ? json_encode($ret_msg) : '' ?> );
            });
        </script>
    </body>
</html>