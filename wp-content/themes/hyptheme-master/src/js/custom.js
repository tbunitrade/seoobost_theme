 $(document).ready(function(){
    console.log('ready');

     // $('.panel-image-prop').mouseover( function() {
     //     console.log('hover at article');
     //     $(this).css("opacity", "0.5");
     //     $('.hrefTypeOne').css("opacity","1");
     //
     // });
     //
     // $('.panel-image-prop').mouseout( function() {
     //     console.log('hover at article');
     //     $(this).css("opacity", "1");
     // });


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

         that.addClass('loading').find('.textDown').slideUp(100);
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
             },

             success :  function(response) {
                 setTimeout(function(){
                     that.data('page', newPage );
                     $('.sunset-posts-container').append(response);
                     that.removeClass('loading').find('.textDown').slideDown(100);
                     console.log('cancel loading');
                     revealPosts();
                 } , 1200);
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
         }, 200);


     }

     /*scroll functions*/

     /*Variable declaration*/
     var last_scroll = 0;
     /*End of declaration*/

     $(window).scroll( function(){

         var scroll = $(window).scrollTop();
         console.log(scroll);

         if ( Math.abs( scroll - last_scroll) > $(window).height()*0.1 ) {
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
         if ($(window).scrollTop() == $(document).height() - $(window).height()) {
             $('.sunset-load-more').click();
             console.log('click');
         }
     });



 });

 $(window).scroll(function(){
     console.log('scroll start');
     var sticky = $('.sticky'),
         scroll = $(window).scrollTop();

     if (scroll >= 100) sticky.addClass('fixxed');
     else sticky.removeClass('fixxed');
 });