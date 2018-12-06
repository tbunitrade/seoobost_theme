$(document).ready(function(){
    console.log('ready'); 

    $('.hrefTypeOne').mouseover(function(){
       if ( $('.hrefTypeOne').hover() == true ) {
           console.log('true');
       }
       else {
           console.log('false');
       }
    });

     $(document).on('click','.sunset-load-more:not(.loading)', function(){

         var that = $(this);
         var page = that.data('page');
         var newPage = page+1;
         var ajaxurl = that.data('url');
         console.log('page ' + page + ' Start Ajax');

         that.addClass('loading').find('span').slideUp(50);
         console.log('Add loading');

         $.ajax({
             url : ajaxurl,
             type : 'post',

             data :  {
                 page : page,
                 action : 'sunset_load_more'
             },

             error : function(response) {
                 console.log(response);
                 console.log('Post end');
             },

             success :  function(response) {
                 setTimeout(function(){
                     that.data('page', newPage );
                     $('.sunset-posts-container').append(response);
                     that.removeClass('loading').find('span').slideDown(100);
                     console.log('cancel loading');
                     revealPosts();
                 } , 10);
             }
         });
     });

     $(document).on('click','.sunset-load-more-category1:not(.loading)', function(){

        var that = $(this);
        var page = that.data('page');
        var newPage = page+1;
        var ajaxurl = that.data('url');
        console.log('page ' + page + ' Start Ajax');

        that.addClass('loading').find('.textDown').slideUp(100);
        console.log('Add loading');

        $.ajax({
            url : ajaxurl,
            type : 'post',

            data :  {
                page : page,
                action : 'sunset_load_more_category1'
            },

            error : function(response) {
                console.log(response);
            },

            success :  function(response) {
                setTimeout(function(){
                    that.data('page', newPage );
                    $('.sunset-posts-container').append(response);
                    that.removeClass('loading').find('.textDown').slideDown(100);
                    //console.log('cancel loading');
                    revealPosts();
                } , 50);
            }
        });
    });

    $(document).on('click','.sunset-load-more-category2:not(.loading)', function(){

        var that = $(this);
        var page = that.data('page');
        var newPage = page+1;
        var ajaxurl = that.data('url');
        console.log('page ' + page + ' Start Ajax');

        that.addClass('loading').find('.textDown').slideUp(100);
        console.log('Add loading');

        $.ajax({
            url : ajaxurl,
            type : 'post',

            data :  {
                page : page,
                action : 'sunset_load_more_category2'
            },

            error : function(response) {
                console.log(response);
            },

            success :  function(response) {
                setTimeout(function(){
                    that.data('page', newPage );
                    $('.sunset-posts-container').append(response);
                    that.removeClass('loading').find('.textDown').slideDown(100);
                    //console.log('cancel loading');
                    revealPosts();
                } , 50);
            }
        });
    });

     /*reveal posts*/

     function revealPosts (){
         var posts = $('article:not(.reveal)');
         var i = 0;

         setInterval( function(){
             if( i >= posts.lenght ) return false;
             var el = posts[i];
             $(el).addClass('reveal');
             i++;
         }, 50);


     }

     /*scroll functions*/

     /*Variable declaration*/
     var last_scroll = 0;
     /*End of declaration*/

     $(window).scroll( function(){

         var scroll = $(window).scrollTop();
         console.log(scroll);

         if ( Math.abs( scroll - last_scroll) > $(window).height()*0.8 ) {
             last_scroll = scroll;
             console.log('scroll updated ' +  last_scroll  );

             $('.page-limit').each(function(index){

                 if ( isVisible($(this)) ) {
                     console.log('visible');

                     history.replaceState( null, null, $(this).attr("data-page") );
                     return(false);

                 }

             });
         }

     });

     function isVisible( element){

         var scroll_pos = $(window).scrollTop();
         var window_height = $(window).height();
         var el_top = $(element).offset().top;
         var el_height = $(element).height();
         var el_bottom = el_top + el_height;

         return ( ( el_bottom - el_height*0.25 > scroll_pos) && (el_top < (scroll_pos+0.5*window_height) ) );

     }


     /*Infinite Scroll*/
     $(window).scroll(function() {
        //  var docheight = $(document).height();
        //  var windowheight = $(window).height();
        //  var topheight = $(window).scrollTop();

        //  if ( topheight == docheight - windowheight) {
        //      $('.sunset-load-more').click();
        //      $('.sunset-load-more-category').click();
        //      console.log('click');
        //  }
     });



 });

 $(window).scroll(function(){
     console.log('scroll start');
     var sticky = $('.sticky'),
         scroll = $(window).scrollTop();

     if (scroll >= 100) sticky.addClass('fixxed');
     else sticky.removeClass('fixxed');
 });