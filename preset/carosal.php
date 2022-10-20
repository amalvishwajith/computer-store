<?php
$sql = "SELECT * FROM products WHERE category='laptop' ORDER BY DATE DESC LIMIT 8;";
$result = mysqli_query($link, $sql);

?>


<div class="owl-carousel owl-theme">
<?php while($row = mysqli_fetch_assoc($result)){?>
        <div class="item">
            <div>
            <span class="badge badge-warning">New</span>
                <img src="<?php echo $row['Image']?>" alt="" width="100%">
                <p><?php echo $row['Name']?></p>
                <h5>Rs<?php echo $row['Price']?></h5>
                <a class="btn btn-info" href="preview.php?i=<?=$row['ID']?>">Add to Cart</a>
            </div>
        </div>
<?php } ?>
</div>

      <script>
        $('.owl-carousel').owlCarousel({
            autoplay:true,
            autoplayTimeout:5000,
            loop:true,
            margin:10,
            nav:true,
            responsive:{
                0:{
                    items:2
                },
                600:{
                    items:3
                },
                900:{
                    items:3
                },
                1200:{
                    items:4
                },
                1450:{
                    items:5
                }
            }
        })
        

        $(document).ready(function(){
            $(".owl-carousel").owlCarousel();
          });

        
      </script>