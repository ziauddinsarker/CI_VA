<div role="tabpanel" class="tab-pane" id="pharmacist">

    <div class="row">

        <div class="col-md-6">
            <a class="twitter-timeline"  href="https://twitter.com/hashtag/pharmacist" data-widget-id="637308333880307712">#pharmacist Tweets</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
        </div>
        <div class="col-md-6">
            <a class="twitter-timeline"  href="https://twitter.com/hashtag/fda" data-widget-id="637307495728353281">#fda Tweets</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12">
            <h2>Pharmacist</h2>
        </div>
    </div>

    <article class="container">
        <?php foreach($all_pharmacist as $pharmacist){?>
            <div class="row up-doc">
                <div class="col-md-4 doctor-info-upper">

                    <p class="home-profile-title"><a href="<?=  base_url()?>pharmacist/single/<?= $pharmacist->pharmacist_id;?>"><?php echo $pharmacist->pharmacist_name; ?><sup><span class="home-title-rating-value"> 500</span><span class="home-title-rating-pp "> PP</span></sup></a></p>
                    <img src="<?php echo base_url('assets/images/avatar.png');?>" height="90" width="90" alt="Doctor's Image">
                    <ul class="doctor-info-unorder">

                        <li><b>Degree*:</b> <?php echo $pharmacist->pharmacist_title; ?></li>
                        <li><b>Pharmacist's Registration No.*:</b> <?php echo $pharmacist->pharmacist_reg_no; ?></li>

                    </ul>
                </div>
            </div>

            <div class="row ">
                <div class="col-md-4 doctor-info-all">

                    <div class="row social-doctor">
                        <div class="col-md-4">
                            <a id="single-fb" href="https://www.facebook.com/sharer/sharer.php?u=<?=  base_url()?>pharmacist/single/<?= $pharmacist->pharmacist_id;?>">fb</a>
                        </div>

                        <div class="col-md-4">
                            <a href="#">tw</a>
                        </div>

                        <div class="col-md-4">
                            <a href="#">copy link</a>
<!--
                            <p>Email me at <a class="js-emaillink" href="mailto:matt@example.co.uk">matt@example.co.uk</a></p>

                            <p><button class="js-emailcopybtn"><img src="./images/copy-icon.png" alt="Copy"/></button></p>
    -->



                        </div>
                    </div>

                    <div class="row contact-doctor">
                        <div class="col-md-12">
                            <a href="#">Contact detail</a>
                        </div>
                    </div>

                    <div class="row contact-doctor-details">
                        <ul>
                            <li><b>Phone:</b> <?php echo $pharmacist->pharmacist_phone; ?></li>
                            <li><b>Email:</b> <?php echo $pharmacist->pharmacist_email; ?></li>
                        </ul>
                    </div>



                    <div class="row pp-doctor">
                        <p><a href="#rat<?= $pharmacist->pharmacist_id;?>" data-toggle="collapse" data-target="#rat<?= $pharmacist->pharmacist_id;?>">See Ratings >></a></p>
                    </div>
                    <div id="rat<?= $pharmacist->pharmacist_id;?>" class="collapse" >
                        <div class="row doctor-pp">
                            <div class="col-md-6">
                                <a href="#">By(members Name)</a>
                            </div>

                            <div class="col-md-6">
                                <a href="#">PP</a>
                            </div>
                        </div>

                        <div class="row doctor-pp">
                            <div class="col-md-6">
                                <a href="#">Admin</a>
                            </div>

                            <div class="col-md-6">
                                <a href="#">20</a>
                            </div>
                        </div>
                    </div>


                </div>



            </div>
        <?php } ?>
    </article>

    </div>
    
    
