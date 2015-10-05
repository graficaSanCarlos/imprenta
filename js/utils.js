// The Template Loader. Used to asynchronously load templates located in separate .html files
window.templateLoader = {

    // Recursively pre-load all the templates for the app.
    // This implementation should be changed in a production environment. A build script should concatenate
    // all the template files in a single file.
    load: function(views, callback) {

        var deferreds = [];

        $.each(views, function(index, view) {
            if (window[view]) {
                deferreds.push($.get('tpl/' + view + '.html', function(data) {
                    window[view].prototype.template = _.template(data);
                }, 'html'));
            } else {
                alert(view + " not found");
            }
        });

        $.when.apply(null, deferreds).done(callback);
    }

};
