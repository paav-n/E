<div class="col-lg-4 col-md-6">
    <div class="room-items">
        <?php
        $string = str_replace(' ', '', $row['name']);
        $a = 'img/';
        $b = '.jpg';
        $file = $a . $string . $b;
        ?>
        <div class="room-img set-bg" data-setbg="<?php echo "$file" ?>">
            <a href="#" class="room-content">
                <i class="flaticon-heart"></i>
            </a>
        </div>
        <div class="room-text">
            <div class="room-details">
                <div class="room-title">
                    <h5><?php echo ucwords($row['name']); ?></h5>
                    <a href="#"><i class="flaticon-placeholder"></i>
                        <span>Location</span></a>
                    <a href="#" class="large-width"><i class="flaticon-cursor"></i>
                        <span>Show on
                                            Map</span></a>
                </div>
            </div>
            <div class="room-features">
                <div class="room-info">
                    <div class="size">
                        <p>Cuisine</p>

                        <span><?php echo ucwords($row['cuisine']); ?></span>
                        <br>
                    </div>
                    <div class="beds">
                        <p>Rating</p>
                        <img src="img/onestar.png" alt="">

                    </div>
                    <div class="room-price">
                        <br>
                        <a href="#" class="site-btn btn-line">View Menu</a>
                    </div>

                </div>
            </div>


        </div>
    </div>
</div>