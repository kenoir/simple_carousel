#SimpleCarousel

---

Need a build monitor? Don't care about having a [swanky dashboard](http://shopify.github.io/dashing/)?

This is a simple iframe carousel for displaying a series of webpages each for a given time, maybe on a big screen.

##Dependencies

This application uses [Ender](https://github.com/ender-js/Ender) specifically the jeesh & reqwest modules. You don't need it to run the app, but if you want to develop for it you will.

Current build command is:

    ender build jeesh reqwest

###Usage

Requires an iframe element with id "carousel_frame":

    <iframe id="carousel_frame" src="data:text/html,<h1>Loading ...</h1>">

Instantiate SimpleCarousel and pass it the config location:

    new SimpleCarousel("/js/config/urls.json");

The config should follow this format: 

    display([
        {
            href: 'http://www.boingboing.net',
            display_for_seconds: 10 
        },
        {
            href: 'http://slashdot.org/',
            display_for_seconds: 5
        }
    ]);

Just add your own URLs.
