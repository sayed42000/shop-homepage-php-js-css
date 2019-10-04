                <p class="lead">Shop Name</p>
                <div class="list-group">
                <?php 
                $sql="SELECT * FROM category";
                $result=query($sql);
                while($row=fetchArray($result)){?>
                    <a href="category.php?cat_id=<?php echo $row['cat_id'] ?>" class="list-group-item"><?php echo $row['cat_title'] ?></a>                    
                <?php } ?>
                </div>