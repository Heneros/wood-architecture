"use strict";

$(document).ready(function() {
 
    var button = $("#loadmore a"),
    paged = button.data("paged"),
    maxPages = button.data("max_num_pages");
    button.click(function(event){
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: wood.ajax_url,

            data:{
                paged: button.data('paged'),
                action: 'loadmore',
                taxonomy: button.data('taxonomy'),
                term_id: button.data('term_id'),
                // pagenumlink: button.data('pagenumlink')
            },
            dataType: 'json',
            beforeSend: function(xhr){
                button.text("Loading...")
            },
            success: function(data){
                console.log(data);
                paged++;
                button.parent().before(data.posts);
                // $('#pagination').html(data.pagination);
                button.text("Load More");
                if(paged == maxPages){
                    button.remove();
                }
            }
        })
    });

    // $("#wood__loadmore").click(function(event){
    //     var button = $(this),
    //     data = {
    //         'action': 'loadmore',
    //         'query': wood_loadmore_params.posts,
    //         'page': wood_loadmore_params.current_page
    //     };
    //     $.ajax({
    //         url: wood_loadmore_params.ajaxurl,
    //         data: data,
    //         type: 'POST',
    //         beforeSend: function(xhr){
    //             button.text("Loading...")
    //         },
    //         success: function(data){
    //             if(data){
    //                 button.text('More posts').prev().before(data);
    //                 wood_loadmore_params.current_page++;
    //                 if(wood_loadmore_params.current_page == wood_loadmore_params.max_page)
    //                 button.remove
    //             }else{
    //                 button.remove();
    //             }
    //         }
    //     })
    // })
});
