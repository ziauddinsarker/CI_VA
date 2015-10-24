
<section class="signup">
    <article class="row">
        <div role="tabpanel" id="main-tab">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#doctors" aria-controls="home" role="tab" data-toggle="tab">Administrator Sign In</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="doctors">
                    <div id="site_content">
                        <div id="content">
                            <div class="row">
                                <div class="col-md-6">
                            <!-- insert the page content here -->
                            <h1>Login</h1>
                            <form action="<?=  base_url()?>users/login/" method="post" class="form-horizontal">

                                <div class="form-group">
                                        <!-- the name input field -->
                                        <label class="control-label col-sm-5">Username</label>
                                        <div class="col-sm-7">
                                            <input class="form-control login_input" type="text" name="username" value="" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <!-- the name input field -->
                                        <label class="control-label col-sm-5" >Password</label>
                                        <div class="col-sm-7">
                                            <input class="form-control login_input" class="" type="password" name="password" value="" />
                                        </div>
                                    </div>
                                    <input type="hidden" name="user_type" value="admin">

                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-7">
                                            <!-- the Submit input field -->
                                            <input class="submit" type="submit" name="add" value="Login" />

                                        </div>
                                    </div>
                            </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
</section>