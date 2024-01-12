<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    


    <script type="text/javascript" src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/typeit/6.5.1/typeit.min.js"></script>
       
    
    <?php 
    include('NavigationBar.php');
      
    ?> 
    
  
    <div id="particles-js">
    </div>
    <section class="container heading-wrapper">
    <div class="one">
    <h2>Welcome to,</h2>
    <h1>Easy Transfer</h1>
    <p>Transfer Your Cash Quickly </p> 
      
          <script type="text/javascript">
        new TypeIt(".one", {
          // strings: [''],
              speed: 40,
              waitUntilVisible: true
            
            }).go();
      </script>  
      <a href="AllUsers.php">View Users</a>     

    </div> <!--  END OF CLASS ONE     -->
    
  </section>   <!-- END OF HEADING-WRAPPER-->
   
  <div id="bank_img"> 
  <img src="img_bank.png" alt="mybank" >
</div>


   
    <script type="text/javascript" src="particles.js"></script>
    <script type="text/javascript" src="app.js"></script>
    
    

<?php include('footer.php'); ?>

</body>
</html>