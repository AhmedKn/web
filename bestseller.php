<?php
        require_once("./connect.php");
        $reqez="select * from products where home=1;";
        $resez=mysqli_query($con,$reqez) or die("request is not working;");
        if(mysqli_num_rows($resez)!=0){
            
    ?>

<section class="promotion">
    <div class="title-sec">
        <h1>Bestseller</h1>
        <span class="top"></span>
        <span class="right"></span>
        <span class="bot"></span>
        <span class="left"></span>
    </div>
    <div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div id="best-slider" class="owl-carousel">
        <?php while($t=mysqli_fetch_array($resez)){  ?>
            <div class="post-slide">
                <div class="post-img" style="background-image:url('<?php echo$t['photo']?>')">
                
                    <a href="/route/product.php?id=<?php echo$t['id_produit'] ?>" class="over-layer"><i class="fa fa-link"></i></a>
                </div>
                <div class="post-content">
                    <h3 class="post-title">
                    <a href="/route/product.php?id=<?php echo$t['id_produit'] ?>"><?php echo $t['lib'] ?></a>
                    </h3>
                    <p class="post-description"><?php echo$t['description'] ?></p>
                    <?php
                        if($t['promoprix']>0){
                        
                    ?>
                      <span class="post-date"><i class="fa fa-clock-o"></i><?php echo$t['promoprix'] ?> TND</span>
                      <?php
                        }else {
                      ?>
                        <span class="post-date"><i class="fa fa-clock-o"></i><?php echo$t['prix'] ?> TND</span>
                      <?php
                        }
                      ?>
                    <a onclick="disp({id:<?php echo$t['id_produit']; ?>,lib:'<?php echo$t['lib']; ?>',prix:<?php echo$t['prix']; ?>,prixpromo:<?php echo$t['promoprix']; ?>,img:'<?php echo$t['photo']; ?>',quantite:1})"  class="read-more">Ajouter</a>
                </div>
            </div>
        <?php } ?>
        

        <div class="owl-buttons"><div class="owl-prev"></div><div class="owl-next"></div></div>
      </div>
    </div>
  </div>
</div>

</section>
<?php } ?>