// Service Worker para Magna Comunicaciones
// Version 1.0

const CACHE_NAME = 'magna-comunicaciones-v1.0';
const urlsToCache = [
  '/',
  '/index.html',
  '/somos.html',
  '/servicios.html',
  '/como.html',
  '/conversemos.html',
  '/assets/css/style.css',
  '/assets/css/plugins.css',
  '/assets/js/jquery-3.6.0.min.js',
  '/assets/js/plugins.js',
  '/img/logo.svg',
  '/img/favicon-32x32.png'
];

// Install event
self.addEventListener('install', function(event) {
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then(function(cache) {
        console.log('Magna SW: Cache opened');
        return cache.addAll(urlsToCache);
      })
  );
});

// Fetch event
self.addEventListener('fetch', function(event) {
  event.respondWith(
    caches.match(event.request)
      .then(function(response) {
        // Cache hit - return response
        if (response) {
          return response;
        }

        return fetch(event.request).then(
          function(response) {
            // Check if we received a valid response
            if(!response || response.status !== 200 || response.type !== 'basic') {
              return response;
            }

            // Clone the response
            var responseToCache = response.clone();

            caches.open(CACHE_NAME)
              .then(function(cache) {
                cache.put(event.request, responseToCache);
              });

            return response;
          }
        );
      })
    );
});

// Activate event
self.addEventListener('activate', function(event) {
  event.waitUntil(
    caches.keys().then(function(cacheNames) {
      return Promise.all(
        cacheNames.map(function(cacheName) {
          if (cacheName !== CACHE_NAME) {
            console.log('Magna SW: Deleting old cache', cacheName);
            return caches.delete(cacheName);
          }
        })
      );
    })
  );
});
