jQuery(function ($) {
    $('button.install-demo').on('click', function () {
        var $this = this;
        /* Ajax to save my style */
        $this.data = {
            'action': 'mymaps_theme_import',
            '_ajax_nonce': ajax_data
        };

        $.post(
            ajaxurl, $this.data, function (responsive) {
                console.log(responsive);
            });
    });
});

function import_map_data($dir) {
    var $this = this;
    /* Ajax to save my style */
    $this.data = {
        'action': 'mymaps_theme_import',
        'file_url': $dir,
        '_ajax_nonce': ajax_data
    };

    $.post(
        ajaxurl, $this.data, function (responsive) {
            console.log(responsive);
        });
}