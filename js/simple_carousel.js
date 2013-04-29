var SimpleCarousel = function(config_location){
    var self = this;

    self.current_index = 0;
    $.domReady(function () { 
        $.ajax({
            url: config_location 
            , type: 'jsonp'
            , jsonpCallbackName: 'display'
            , success: function (urls) {
                self.urls = urls;
                self.rotate_carousel();
            }
        });
    });

};
SimpleCarousel.prototype.rotate_carousel = function(){
    var self = this;

    self.current_index %= (self.urls.length);
    var url = self.urls[self.current_index];

    SimpleCarousel.showURL(url.href);
    self.current_index++;

    setTimeout(function(){
        self.rotate_carousel();
    }, url.display_for_seconds * 1000);

};
SimpleCarousel.showURL = function(url){
    $('#carousel_frame').attr('src', url);
}
