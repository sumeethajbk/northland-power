var jqr5 = jQuery.noConflict();
jqr5(function() {
    console.log('testinggg');
    if (jqr5("#ajax-load-more").length) {
	 //e = 1,
           var t = true,
            n = false,
            r = jqr5(window),
            i = jqr5("#ajax-load-more"),
            s = jqr5("#ajax-load-more ul"),
            o = s.attr("data-path");
            p = s.attr("data-pageNumber");
	    if(p!=''){
		e = p;
	    } else {
		e = 1;
	    }
       console.log(p);
        if (o === undefined) {
            o = "<?php bloginfo('stylesheet_directory'); ?>/ajax-load-more.php"
        }
        if (s.attr("data-button-text") === undefined) {
            jqr5button = "Older Posts"
        } else {
            jqr5button = s.attr("data-button-text")
        }
        i.append('<div id="load-more-news" class="news-post-btn flex flex-center"><span class="loader"></span><span class="btn-center btn-primary" tabindex="0"><span>' + jqr5button + "</span></span></div>");
        var u = function() {
            jqr5("#load-more-news").addClass("loading");
            jqr5("#load-more-news span.text").text("Loading...");
            jqr5.ajax({
                type: "GET",
                data: {
                    postType: s.attr("data-post-type"),
                    category: s.attr("data-category"),
                    author: s.attr("data-author"),
                    taxonomy: s.attr("data-taxonomy"),
                    tag: s.attr("data-tag"),
                    postNotIn: s.attr("data-post-not-in"),
                    numPosts: s.attr("data-display-posts"),
                    year: s.attr("data-year"),
                    month: s.attr("data-month"),
                    searchblog: s.attr("data-searchblog"),
                    offset: s.attr("data-offset"),
                    order: s.attr("data-order"),
                    option: s.attr("data-option"),
                    postsCount: s.attr("data-postsCount"),
                    pageNumber: e,
                    pageOffset: e,
                    //current_row: currentRow,
                },
                url: o + "/ajax-load-more.php",
                beforeSend: function() {
                    if (e != 1) {
                        jqr5("#load-more-news").addClass("loading");
                        jqr5("#load-more-news span.text").text("Loading...")
                    }
                },
                success: function(e) {
                    console.log('success');
                  
                    jqr5data = jqr5(e);
                    console.log('eeE',jqr5data);
                    if (jqr5data.length == 0) {
                        jqr5("#load-more-news").removeClass("loading");
                        if (jqr5(window).width() >= 600) {
                            jqr5("#load-more-news span.text").text("That's all!")
                        } else {
                            jqr5("#load-more-news span.text").text("That's all!")
                        }
                        t = false;
                        n = true
                    } else if (jqr5data.length > 0) {
                        jqr5data = jqr5(e);
                        jqr5data.hide();
                        s.append(jqr5data);
                        jqr5data.fadeIn(500, function() {
                            jqr5("#load-more-news").removeClass("loading");
                            jqr5("#load-more-news span.text").text(jqr5button);
                            t = false
                        })
                    }
                },
                error: function(e, t, n) {
                    jqr5("#load-more-news").removeClass("loading");
                    jqr5("#load-more-news span.text").text(jqr5button)
                }
            })
        };
                var remain = 0;
        var count = 0;
        var postsCount= s.attr("data-postsCount");
        if(postsCount <=10){
       jQuery("#load-more-news").hide(); 
           if(postsCount == 0){ 
              jQuery("#ajax-load-more").append("<h3 class='no_result_found aligncenter'>Sorry, No posts found.</h3>")
           }
        }
        jqr5("#load-more-news").click(function() {
            if (!t && !n && !jqr5(this).hasClass("done")) {
                t = true;
                e++;
                u()
            }
        count +=1; 
           
          var postsCount= s.attr("data-postsCount");
          console.log(postsCount);
          
            remain = postsCount - 10 * count;
            if(remain <= 10){
               jQuery("#load-more-news").hide(); 

            }
        });
        u()
    }
})
