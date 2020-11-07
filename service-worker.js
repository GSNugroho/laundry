const CACHE_NAME = "adilaya-laundry-app1";

const urlsToCache = [
    "/",
    "/assets/background1.jpg",
    "/assets/background2.jpg",
    "/assets/background3.jpg",
    "/assets/Icon/logo_notif.png", 
    "/assets/css/materialize.min.css", 
    "/assets/css/dataTables.material.min.css", 
    "/assets/css/jquery.dataTables.min.css", 
    "/assets/css/material-components-web.min.css", 
    "/assets/css/materialize.css", 
    "/assets/css/style.css", 
    "/assets/js/dataTables.material.min.js", 
    "/assets/js/init.js", 
    "/assets/js/jquery-2.1.1.min.js", 
    "/assets/js/jquery.dataTables.min.js", 
    "/assets/js/materialize.js", 
    "/assets/js/materialize.min.js", 
    "/assets/404/css/font-awesome.min.css", 
    "/assets/404/css/style.css", 
    "/assets/404/fonts/fontawesome-webfont.eot", 
    "/assets/404/fonts/fontawesome-webfont.svg ", 
    "/assets/404/fonts/fontawesome-webfont.ttf ", 
    "/assets/404/fonts/fontawesome-webfont.woff ", 
    "/assets/404/fonts/fontawesome-webfont.woff2 ", 
    "/assets/404/fonts/FontAwesome.otf "
];

self.addEventListener("install", function(event){
    self.skipWaiting();
    event.waitUntil(
        caches.open(CACHE_NAME).then(function(cache){
            return cache.addAll(urlsToCache);
        })
    );
})

self.addEventListener("activate", function (event) {
    event.waitUntil(
        caches.keys().then(function(cacheNames) {
            return Promise.all(
                cacheNames.map(function(cacheName) {
                    if (cacheName !== CACHE_NAME) {
                        console.log("ServiceWorker: cache " + cacheName + " dihapus");
                        return caches.delete(cacheName);
                    }
                })
            );
        })
    );
});