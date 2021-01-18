<!-- Sign In Popup -->
<div id="utf-signin-dialog-block" class="zoom-anim-dialog mfp-hide dialog-with-tabs">
    <div class="utf-signin-form-part">
        <ul class="utf-popup-tabs-nav-item">
            <li class="active"><a href="http://jobword.utouchdesign.com/jobword_ltr/index-1.html#login">Log In</a></li>
            <li><a href="http://jobword.utouchdesign.com/jobword_ltr/index-1.html#register">Register</a></li>
        </ul>
        <div class="utf-popup-container-part-tabs">
            <!-- Login -->
            <div class="utf-popup-tab-content-item" id="login" style="">
                <div class="utf-welcome-text-item">
                    <h3>Welcome Back Sign in to Continue</h3>
                    <span>Don't Have an Account? <a href="http://jobword.utouchdesign.com/jobword_ltr/index-1.html#" class="register-tab">Sign Up!</a></span>
                </div>
                <form method="post" id="login-form">
                    <div class="utf-no-border">
                        <input type="text" class="utf-with-border" name="emailaddress" id="emailaddress" placeholder="Email Address" required="">
                    </div>
                    <div class="utf-no-border">
                        <input type="password" class="utf-with-border" name="password" id="password" placeholder="Password" required="">
                    </div>
                    <div class="checkbox margin-top-0">
                        <input type="checkbox" id="two-step">
                        <label for="two-step"><span class="checkbox-icon"></span> Remember Me</label>
                    </div>
                    <a href="http://jobword.utouchdesign.com/jobword_ltr/forgot-password.html" class="forgot-password">Forgot Password?</a>
                </form>
                <button class="button full-width utf-button-sliding-icon ripple-effect" type="submit" form="login-form" style="width: 30px;">Log In <i class="icon-feather-chevrons-right"></i></button>
                <div class="utf-social-login-separator-item"><span>or</span></div>
                <div class="utf-social-login-buttons-block">
                    <button class="facebook-login ripple-effect"><i class="icon-brand-facebook-f"></i> Facebook</button>
                    <button class="google-login ripple-effect"><i class="icon-brand-google-plus-g"></i> Google+</button>
                    <button class="twitter-login ripple-effect"><i class="icon-brand-twitter"></i> Twitter</button>
                </div>
            </div>

            <!-- Register -->
            <div class="utf-popup-tab-content-item" id="register" style="display: none;">
                <div class="utf-welcome-text-item">
                    <h3>Create your Account!</h3>
                    <span>Don't Have an Account? <a href="http://jobword.utouchdesign.com/jobword_ltr/index-1.html#" class="register-tab">Sign Up!</a></span>
                </div>
                <form method="post" id="utf-register-account-form">
                    <div class="utf-no-border">
                        <input type="text" class="utf-with-border" name="name" id="name" placeholder="User Name" required="">
                    </div>
                    <div class="utf-no-border">
                        <input type="text" class="utf-with-border" name="emailaddress-register" id="emailaddress-register" placeholder="Email Address" required="">
                    </div>
                    <div class="utf-no-border margin-bottom-20">
                        <div class="btn-group bootstrap-select utf-with-border"><button type="button" class="btn dropdown-toggle bs-placeholder btn-default" data-toggle="dropdown" role="button" title="Select Jobs"><span class="filter-option pull-left">Select Jobs</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button>
                            <div class="dropdown-menu open" role="combobox">
                                <ul class="dropdown-menu inner" role="listbox" aria-expanded="false">
                                    <li data-original-index="1"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Web Designer</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                    <li data-original-index="2"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Web Developer</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                    <li data-original-index="3"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Graphic Designer</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                    <li data-original-index="4"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Android Developer</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                    <li data-original-index="5"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">IOS Developer</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                    <li data-original-index="6"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">UI/UX Designer</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                    <li data-original-index="7"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Graphics Designer</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                </ul>
                            </div><select class="selectpicker utf-with-border" data-size="5" title="Select Jobs" tabindex="-98"><option class="bs-title-option" value="">Select Jobs</option>
                                <option>Web Designer</option>
                                <option>Web Developer</option>
                                <option>Graphic Designer</option>
                                <option>Android Developer</option>
                                <option>IOS Developer</option>
                                <option>UI/UX Designer</option>
                                <option>Graphics Designer</option>
                            </select></div>
                    </div>
                    <div class="utf-no-border" data-tippy-placement="bottom" data-tippy="" data-original-title="Should be at least 8 characters long">
                        <input type="password" class="utf-with-border" name="password-register" id="password-register" placeholder="Password" required="">
                    </div>
                    <div class="utf-no-border">
                        <input type="password" class="utf-with-border" name="password-repeat-register" id="password-repeat-register" placeholder="Repeat Password" required="">
                    </div>
                    <div class="checkbox margin-top-0">
                        <input type="checkbox" id="two-step0">
                        <label for="two-step0"><span class="checkbox-icon"></span> By Registering You Confirm That You Accept <a href="http://jobword.utouchdesign.com/jobword_ltr/index-1.html#">Terms &amp; Conditions</a> and <a href="http://jobword.utouchdesign.com/jobword_ltr/index-1.html#">Privacy Policy</a></label>
                    </div>
                </form>
                <button class="margin-top-10 button full-width utf-button-sliding-icon ripple-effect" type="submit" form="utf-register-account-form" style="width: 30px;">Register <i class="icon-feather-chevrons-right"></i></button>
                <div class="utf-social-login-separator-item"><span>or</span></div>
                <div class="utf-social-login-buttons-block">
                    <button class="facebook-login ripple-effect"><i class="icon-brand-facebook-f"></i> Facebook</button>
                    <button class="google-login ripple-effect"><i class="icon-brand-google-plus-g"></i> Google+</button>
                    <button class="twitter-login ripple-effect"><i class="icon-brand-twitter"></i> Twitter</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Sign In Popup / End -->
