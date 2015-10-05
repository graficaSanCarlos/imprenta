window.User = Backbone.Collection.extend({
    url: 'api/www/user/edit.php'
});

window.UserCollection = Backbone.Collection.extend({
    url: 'api/www/user/list.php'
});
