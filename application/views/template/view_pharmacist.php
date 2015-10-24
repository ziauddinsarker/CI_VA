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

    <?php foreach($all_pharmacist as $pharmacist){?>
    <div class="row">
        <div class="col-md-12">

        </div>
        <div class=" doctor-single">
            <div class="col-md-12">
                <div class="col-md-12 doctor-title">
                    <div class="col-md-4">
                        <h4><a href="<?=  base_url()?>pharmacist/single/<?= $pharmacist->pharmacist_id;?>"><?php echo $pharmacist->pharmacist_name; ?></a></h4>
                        </div>

                    <div class="col-md-8 right">
                        <nav>
                            <a id="single-fb" href="https://www.facebook.com/sharer/sharer.php?u=<?=  base_url()?>pharmacist/single/<?= $pharmacist->pharmacist_id;?>">fb</a>
                            <a id="single-fb" href="#">tw</a>
                            <a id="single-fb" href="#">g+</a>
                        </div>
                    </div>

                <div class="col-md-12 doctor-description">
                    <div class="col-md-3 doctor-description-first">
                        <img src="" alt="">
                        </div>

                    <div class="col-md-6 doctor-description-second">
                        <p><b>Title/degree*:</b><?php echo $pharmacist->pharmacist_title; ?></p>
                        <P><b>Pharmacy council registration no.*:</b><?php echo $pharmacist->pharmacist_reg_no; ?> </P>

                        </div>

                    <div class="col-md-3 doctor-description-third">
                        <p><b>Phone:</b><?php echo $pharmacist->pharmacist_phone; ?></p>
                        <p><b>Contact time:</b><?php echo $pharmacist->pharmacist_contact; ?></p>
                        <p><b>Email:</b>  <?php echo $pharmacist->pharmacist_email; ?></p>
                        <p><b>Other Contact:</b> <?php echo $pharmacist->pharmacist_other_contact; ?></p>
                        </div>
                    </div>

                    <div class="doctor-description-rating ">

                        <div class="col-md-3 paste-background">
                            <p><a href="#rat<?php echo $pharmacist->pharmacist_id; ?>" data-toggle="collapse" data-target="#rat<?php echo $pharmacist->pharmacist_id; ?>">See Ratings >></a></p>
                            </div>

                        <div class="col-md-2 brick-background">
                            <p>Date</p>
                            </div>

                        <div class="col-md-4 brick-background">
                            <p>Description</p>
                            </div>

                        <div class="col-md-3 brick-background">
                            <p>RSB Point</p>
                            </div>

                        </div>

                    <div id="rat<?php echo $pharmacist->pharmacist_id; ?>" class="collapse" >
                        <div class="col-md-12 doctor-description-rating ">
                            <div class="col-md-3 ">

                                </div>

                            <div class="col-md-2 ">
                                <p>20-08-2015</p>
                                </div>

                            <div class="col-md-4 ">
                                <p>This is just description</p>
                                </div>

                            <div class="col-md-3 ">
                                <p>25 RSB</p>
                                </div>

                            </div>

                        <div class="col-md-12 doctor-description-rating ">
                            <div class="col-md-3 yellow-background">

                                </div>

                            <div class="col-md-2 yellow-background">
                                <p>20-08-2015</p>
                                </div>

                            <div class="col-md-4 yellow-background">
                                <p>This is just description</p>
                                </div>

                            <div class="col-md-3 yellow-background">
                                <p>25 RSB</p>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
    <?php } ?>

    </div>
    
    
