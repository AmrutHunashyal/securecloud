(function($) {

    function modal(options) {

        var _options = {
            url: '/',
            selectors: {
                content: 'div.entry-content',
                title: 'h1.entry-title'
            },
            width: 1000,
            height: 370,
            loadScripts: true
        }
        $.extend(_options,options);

        $.ajax(_options.url, {
            success: function(data) {

                $('body').addClass('modal-plugin');

                var d = (_options.loadScripts ? data : data.replace(/<script [^<]*<\/script>/gi, ''));
                var el = $('<div>' + d + '</div>')
                    .appendTo('body');

                var dialogEl = el.find(_options.selectors.content)
                    .dialog({
                        autoOpen: true,
                        closeText: 'close',
                        show: 'scale',
                        width: _options.width,
                        height: _options.height,
                        modal: true,
                        title: el.find(_options.selectors.title).html()
                    });

                $('<a href="javascript:void(0);" style="right: 0; top: 18px;" class="ui-dialog-titlebar-close" role="button"><span class="ui-icon ui-icon-closethick">close</span></a>')
                    .appendTo(dialogEl)
                    .click(function() {
                        dialogEl.dialog('close');
                    });
            }
        })
    };

    function scmodal(url, contentSel, titleSel, width, height, loadScripts) {
        return modal({
            url: url,
            selectors: {
                content: contentSel,
                title: titleSel
            },
            width: width,
            height: height,
            loadScripts: loadScripts
        })
    }

    window.modal = modal;
    window.scmodal = scmodal;

})(jQuery)