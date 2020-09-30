(function ($) {
    "use strict";


    var blog = {};
    qodef.modules.blog = blog;

    blog.qodefInitAudioPlayer = qodefInitAudioPlayer;
    blog.qodefInitBlogLoadMore = qodefInitBlogLoadMore;

    blog.qodefOnDocumentReady = qodefOnDocumentReady;
    blog.qodefOnWindowLoad = qodefOnWindowLoad;
    blog.qodefOnWindowResize = qodefOnWindowResize;
    blog.qodefOnWindowScroll = qodefOnWindowScroll;

    $(document).ready(qodefOnDocumentReady);
    $(window).load(qodefOnWindowLoad);
    $(window).resize(qodefOnWindowResize);
    $(window).scroll(qodefOnWindowScroll);

    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function qodefOnDocumentReady() {
        qodefInitAudioPlayer();
        qodefInitBlogLoadMore();
    }

    /*
     All functions to be called on $(window).load() should be in this function
     */
    function qodefOnWindowLoad() {
    }

    /*
     All functions to be called on $(window).resize() should be in this function
     */
    function qodefOnWindowResize() {

    }

    /*
     All functions to be called on $(window).scroll() should be in this function
     */
    function qodefOnWindowScroll() {

    }


    function qodefInitAudioPlayer() {

        var players = $('audio.qodef-blog-audio');

        players.mediaelementplayer({
            audioWidth: '100%'
        });
    }

    function qodefInitBlogLoadMore() {
        var blogHolder = $('.qodef-blog-holder.qodef-blog-load-more');

        if (blogHolder.length) {
            blogHolder.each(function () {
                var thisBlogHolder = $(this);
                var nextPage;
                var maxNumPages;

                var loadMoreButton = thisBlogHolder.find('.qodef-load-more-ajax-pagination .qodef-btn');
                if (blogHolder.hasClass('qodef-blog-type-masonry') || blogHolder.hasClass('qodef-blog-type-masonry-gallery')) {
                    loadMoreButton = blogHolder.next().find('.qodef-btn');
                }
                maxNumPages = thisBlogHolder.data('max-pages');

                loadMoreButton.on('click', function (e) {
                    e.preventDefault();
                    e.stopPropagation();

                    var loadMoreDatta = getBlogLoadMoreData(thisBlogHolder);
                    nextPage = loadMoreDatta.nextPage;

                    var nonceHolder = thisBlogHolder.find('input[name*="qodef_blog_load_more_nonce_"]');

                    loadMoreDatta.blog_load_more_id = nonceHolder.attr('name').substring(nonceHolder.attr('name').length - 4, nonceHolder.attr('name').length);
                    loadMoreDatta.blog_load_more_nonce = nonceHolder.val();

                    if (nextPage <= maxNumPages) {
                        var ajaxData = setBlogLoadMoreAjaxData(loadMoreDatta);

                        $.ajax({
                            type: 'POST',
                            data: ajaxData,
                            url: QodefAjaxUrl,
                            success: function (data) {
                                nextPage++;
                                thisBlogHolder.data('next-page', nextPage);
                                var response = $.parseJSON(data);
                                var responseHtml = response.html;

                                thisBlogHolder.waitForImages(function () {
                                    if (thisBlogHolder.hasClass('qodef-blog-type-masonry')) {

                                        thisBlogHolder.append(responseHtml).isotope('reloadItems').isotope({sortBy: 'original-order'});

                                    } else {
                                        thisBlogHolder.find('article:last').after(responseHtml); // Append the new content
                                    }

                                    setTimeout(function () {
                                        qodef.modules.blog.qodefInitAudioPlayer();
                                        qodef.modules.common.qodefOwlSlider();
                                        qodef.modules.common.qodefFluidVideo();
                                    }, 400);
                                });
                            }
                        });
                    }

                    if (nextPage === maxNumPages) {
                        loadMoreButton.hide();
                    }
                });
            });
        }
    }

    function getBlogLoadMoreData(container) {

        var returnValue = {};

        returnValue.nextPage = '';
        returnValue.number = '';
        returnValue.category = '';
        returnValue.blogType = '';
        returnValue.archiveCategory = '';
        returnValue.archiveAuthor = '';
        returnValue.archiveTag = '';
        returnValue.archiveDay = '';
        returnValue.archiveMonth = '';
        returnValue.archiveYear = '';

        if (typeof container.data('next-page') !== 'undefined' && container.data('next-page') !== false) {
            returnValue.nextPage = container.data('next-page');
        }
        if (typeof container.data('post-number') !== 'undefined' && container.data('post-number') !== false) {
            returnValue.number = container.data('post-number');
        }
        if (typeof container.data('category') !== 'undefined' && container.data('category') !== false) {
            returnValue.category = container.data('category');
        }
        if (typeof container.data('blog-type') !== 'undefined' && container.data('blog-type') !== false) {
            returnValue.blogType = container.data('blog-type');
        }
        if (typeof container.data('archive-category') !== 'undefined' && container.data('archive-category') !== false) {
            returnValue.archiveCategory = container.data('archive-category');
        }
        if (typeof container.data('archive-author') !== 'undefined' && container.data('archive-author') !== false) {
            returnValue.archiveAuthor = container.data('archive-author');
        }
        if (typeof container.data('archive-tag') !== 'undefined' && container.data('archive-tag') !== false) {
            returnValue.archiveTag = container.data('archive-tag');
        }
        if (typeof container.data('archive-day') !== 'undefined' && container.data('archive-day') !== false) {
            returnValue.archiveDay = container.data('archive-day');
        }
        if (typeof container.data('archive-month') !== 'undefined' && container.data('archive-month') !== false) {
            returnValue.archiveMonth = container.data('archive-month');
        }
        if (typeof container.data('archive-year') !== 'undefined' && container.data('archive-year') !== false) {
            returnValue.archiveYear = container.data('archive-year');
        }

        return returnValue;

    }

    function setBlogLoadMoreAjaxData(container) {
        var returnValue = {
            action: 'moments_qodef_blog_load_more',
            nextPage: container.nextPage,
            number: container.number,
            category: container.category,
            blogType: container.blogType,
            archiveCategory: container.archiveCategory,
            archiveAuthor: container.archiveAuthor,
            archiveTag: container.archiveTag,
            archiveDay: container.archiveDay,
            archiveMonth: container.archiveMonth,
            archiveYear: container.archiveYear,
            blog_load_more_nonce: container.blog_load_more_nonce,
            blog_load_more_id: container.blog_load_more_id
        };

        return returnValue;
    }


})(jQuery);