"use strict";

$(document).ready(function () {

    $('.about__architect p').text(function (index, text) {
        return text.replace('[…]', '');
    });

    $('#search__input').keyup(function (e) {
        // e.preventDefault();
        let searchPostsInput = document.getElementById("search__input").value.toUpperCase();
        let searchPostsContainer = document.getElementsByClassName("items__service")[0];
        let searchPostItems = searchPostsContainer.getElementsByClassName("item__service");
        for (let i = 0; i < searchPostItems.length; i++) {
            let singlePost = searchPostItems[i];
            let valuePost = singlePost.textContent || singlePost.innerText;
            if (valuePost.toUpperCase().indexOf(searchPostsInput) > -1) {
                searchPostItems[i].style.display = "";
            } else {
                searchPostItems[i].style.display = "none";
            }
        }
        // console.log(searchPostItem);
    });



});
