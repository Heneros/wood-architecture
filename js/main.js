"use strict";

$(document).ready(function() {
 
    var button = $('#loadmore a'),
    paged = button.data('paged'),
    maxPages = button.data('max_pages');
    button.click(function(event){
        event.preventDefault();
       $.ajax({
           type: 'POST',
           url: droow.ajax_url,
           data: {
               paged: paged,
               action: 'loadmore',
               taxonomy: button.data('taxonomy'),
               term_id: button.data('term_id'),
               pagenumlink: button.data('pagenumlink')
           },
           dataType: 'json',
           beforeSend: function(xhr){
               button.text("Loading...")
           },
           success: function(data){
               console.log(data);
               paged++;
               button.parent().before(data.posts);
               $('#pagination').html(data.pagination);
               button.text("Load more");
               if(paged == maxPages){
                button.remove();
            }

           }
       })
    });

})
