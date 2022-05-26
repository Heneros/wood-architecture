"use strict";

$(document).ready(function () {

    var button = $("#loadmore a"),
        paged = button.data("paged"),
        maxPages = button.data("max_num_pages");
    button.click(function (event) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: wood.ajax_url,

            data: {
                paged: button.data('paged'),
                action: 'loadmore',
                taxonomy: button.data('taxonomy'),
                term_id: button.data('term_id'),
                // pagenumlink: button.data('pagenumlink')
            },
            dataType: 'json',
            beforeSend: function (xhr) {
                button.text("Loading...")
            },
            success: function (data) {
                console.log(data);
                paged++;
                button.parent().before(data.posts);
                // $('#pagination').html(data.pagination);
                button.text("Load More");
                if (paged == maxPages) {
                    button.remove();
                }
            }
        })
    });


    $('.about__architect p').text(function (index, text) {
        return text.replace('[…]', '');
    });

});
