<div id="custom-login-right">
 
 <h3>Or sign directly into KosmosOnline.org</h3>

<div>
  <div id="edit-openid-identifier-wrapper" class="form-item">
     <label for="edit-openid-identifier">Log in using OpenID: </label>
     <input type="text" class="form-text" value="" size="58" id="edit-openid-identifier" name="openid_identifier" maxlength="255">
     <div class="description"><a href="http://openid.net/" class="ext">What is OpenID?</a><span class="ext"></span></div>
  </div>
 
   <div id="login-form-name-password-fields">
    <div id="edit-name-wrapper" class="form-item">
      <label for="edit-name">Username: <span title="This field is required." class="form-required">*</span></label>
      <input type="text" class="form-text required" value="" size="60" id="edit-name" name="name" maxlength="60">
      <div class="description">Enter your Kosmos username.</div>
    </div>

    <div id="edit-pass-wrapper" class="form-item">
       <label for="edit-pass">Password: <span title="This field is required." class="form-required">*</span></label>
       <input type="password" class="form-text required" size="60" maxlength="128" id="edit-pass" name="pass">
       <div class="description">Enter the password that accompanies your username.</div>
    </div>
   </div>
 
 <input name="form_build_id" id="<?php print $form['form_build_id']['#id']; ?>" value="<?php print $form['form_build_id']['#value']; ?>" type="hidden">
 <input type="hidden" value="user_login" id="edit-user-login" name="form_id">
 <input type="hidden" value="http://www.spontaneousacademia.org/openid/authenticate?destination=user" id="edit-openid.return-to" name="openid.return_to">

 <input type="submit" name="op" id="edit-submit-login" value="Log in"  class="form-submit" />
 
</div>
</div>



<div id="custom-login-left">

<h3>Sign in easily through your preferred service:</h3>
<br/>
<div id="login-options-block">
  <div class="login-options-header">Connect with Facebook</div>
  <fb:login-button v="2" onlogin="window.location=window.location.href + '?login=fb'"><fb:intl>Connect with Facebook</fb:intl></fb:login-button>
<p>Facebook members can log onto third-party websites with their Facebook identity.  Privacy settings from your Facebook account will follow you around the web, protecting your information.</p>

  <div class="login-options-header">OpenID and Google</div>
  
    <a href="/lightopenid/googleauth.php?login"><img src="/sites/all/themes/SpontaneousAcademia/images/google_login_button.jpg"/></a>
  
  <div class="item-list"><ul><li class="openid-link first"><a href="/%2523">Log in using OpenID</a></li><li class="user-link last"><a href="/%2523">Cancel OpenID login</a></li></ul></div>
  
  <p>Don't have a Facebook account? Prefer not to link your Kosmos account with Facebook?</p>

   <p>Create your login through OpenID.  Similar in concept to Facebook Connect, OpenID allows you to use an existing account (such as Yahoo, flickr, etc) to sign in to multiple websites without needing to create new passwords. You can also sign in using your Google account. With OpenID and Google, you control how much of your information is shared with the websites you visit.</p>

</div>


</div>







