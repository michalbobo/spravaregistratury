/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * AJAX Nette Framework plugin for jQuery
 *
 * @copyright   Copyright (c) 2009 Jan Marek
 * @license     MIT
 * @link        http://addons.nette.org/cs/jquery-ajax
 * @version     0.2
 */

jQuery.extend({
    nette: {
        updateSnippet: function (id, html) {
            $("#" + id).html(html);
        },

        success: function (payload) {
            // redirect
            if (payload.redirect) {
                window.location.href = payload.redirect;
                return;
            }

            // snippets
            if (payload.snippets) {
                for (var i in payload.snippets) {
                    jQuery.nette.updateSnippet(i, payload.snippets[i]);
                }
            }
        }
    }
});

jQuery.ajaxSetup({
    success: jQuery.nette.success,
    dataType: "json"
});

