function addPictureLinks() {   // this fixes a problem in IE6 where facebook photos interfere with the link that surrounds them
    $('.fb-active-user').each(function() {
        $(this).click(function() {
            window.location = $(this).find('a').attr('href');
        });
    });
    
    $('.recent-post-user-picture').each(function() {
        $(this).click(function() {
            window.location = $(this).find('a').attr('href');
        });
    });
    
    $('.facebook-user-picture').each(function() {
        $(this).click(function() {
            window.location = $(this).find('a').attr('href');
        });
    });
}


function firefoxFixes() {
        if($.browser.mozilla) {
            $('#edit-search-block-form-1').css({'padding-top': '6px'});  // firefox won't vert align the text properly
        }
}


function commentReplyAdjustments() {
    //load the reply form on the same page
    $('a[href^=/comment/reply]').click(function() {
        var commentBox = $(this).parent().parent('ul.links').siblings('.ajax-comment-reply')[0];
        $(commentBox).load($(this).attr('href') + ' #main .box');
        return false;
    });      
}



function userRegHelp() {
    // a quick way to get a small help button in the reg form.
    // this will work using javascript popup anyway, so I don't mind using javascript to add it to the form.
    //$('<div id="reg-website-help"></div>').insertBefore('form#user-register table#field_profile_websites_values');
    //$('#reg-website-help').hover(function() {
    //   console.log('help1');
    //},
    //function() {
    //   console.log('out1'); 
    //});
    
    //$('<div id="reg-affiliations-help"></div>').insertBefore('form#user-register table#field_memberships_affiliations_values');
    //$('#reg-affiliations-help').hover(function() {
    //    console.log('help2');
    //},
    //function() {
    //    console.log('out2');
    //});
}




jQuery(document).ready(function($){
   
    $('.search-box input').val('Search');
    //$('#block-menu-primary-links .content ul.menu').droppy({speed: 10});
    addPictureLinks();
    //firefoxFixes();
    userRegHelp();

    //$('a[href^=/user/register]').parent().parent().hide();
    $('form#user-login').parent().siblings('.tabs').hide();
    
    commentReplyAdjustments();
    
});
