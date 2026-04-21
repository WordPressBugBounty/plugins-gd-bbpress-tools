/*jslint regexp: true, undef: true, sloppy: true, eqeq: true, vars: true, white: true, plusplus: true, maxerr: 50, indent: 4 */
/*global gdbbPressToolsInit,tinymce,tinyMCE,jQuery*/

;(function($, window, document) {
    window.wp = window.wp || {};
    window.wp.gdbto = window.wp.gdbto || {};

    window.wp.gdbto.front = {
        storage: {},
        get_selection: function() {
            let t = '';

            if (window.getSelection) {
                t = window.getSelection();
            } else if (document.getSelection) {
                t = document.getSelection();
            } else if (document.selection) {
                t = document.selection.createRange().text;
            }

            return t.toString().trim();
        },
        init: function() {
            $(document).on("click", ".d4p-bbt-quote-link", function(e) {
                e.preventDefault();

                const rc = $("#bbp_reply_content"),
                    button = $(this);

                if (rc.length > 0) {
                    let id = button.data("id"),
                        quote = wp.gdbto.front.get_selection(),
                        quote_id = '#d4p-bbp-quote-' + id;

                    if (quote === "") {
                        quote = $(quote_id).html();
                    }

                    quote = quote.replace(/&nbsp;/g, " ");
                    quote = quote.replace(/<p>|<br>/g, "");
                    quote = quote.replace(/<\/\s*p>/g, "\n");
                    quote = quote.trim();

                    if (gdbbPressToolsInit.quote_method === "bbcode") {
                        quote = "[quote quote=" + id + "]" + quote + "[/quote]";
                    } else {
                        let title = '<div class="d4p-bbp-quote-title"><a href="' + button.data("url") + '">';

                        title += button.data("author") + ' ' + gdbbPressToolsInit.quote_wrote + ':</a></div>';
                        quote = '<blockquote class="d4pbbc-quote">' + title + quote + '</blockquote>';
                    }

                    if (gdbbPressToolsInit.wp_editor === "1" && !rc.is(":visible")) {
                        tinymce.get("bbp_reply_content").execCommand("mceInsertContent", false, quote);
                    } else {
                        const content = rc.val();

                        if (content.trim() !== '') {
                            quote = "\n\n" + quote;
                        }

                        rc.val(content + quote);
                    }

                    $("html, body").animate({scrollTop: $("#new-post").offset().top}, 1000);
                }
            });
        }
    };

    $(document).ready(function() {
        wp.gdbto.front.init();
    });
})(jQuery, window, document);
