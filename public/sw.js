const CACHE_NAME = "offline-v1";
const filesToCache = [
    // General
    '/',
    '/offline.html',
    '/inicio',
    '/logout',
    '/registro',
    '/registroUsuario',
    '/up',

    // Sillas
    '/form_sillas',
    '/editar_sillas/{pk_sillas}',
    '/activarsillas/{pk_sillas}',
    '/actualizarsillas/{pk_sillas}',
    '/bajasillas/{pk_sillas}',

    // Mesas
    '/form_mesas',
    '/editar_mesas/{pk_mesas}',
    '/activarmesas/{pk_mesas}',
    '/actualizarmesas/{pk_mesas}',
    '/bajamesas/{pk_mesas}',

    // Brincolines
    '/form_brincolines',
    '/editar_brincolines/{pk_brincolines}',
    '/activarbrincolines/{pk_brincolines}',
    '/actualizarbrincolines/{pk_brincolines}',
    '/bajabrincolines/{pk_brincolines}',

    // Extensiones
    '/form_extenciones',
    '/editar_extenciones/{pk_extenciones}',
    '/activarextenciones/{pk_extenciones}',
    '/actualizarextenciones/{pk_extenciones}',
    '/bajaextenciones/{pk_extenciones}',

    // Manteles
    '/form_manteles',
    '/editar_manteles/{pk_manteles}',
    '/activarmanteles/{pk_manteles}',
    '/actualizarmanteles/{pk_manteles}',
    '/bajamanteles/{pk_manteles}',

    // Motores
    '/form_motores',
    '/editar_motores/{pk_motores}',
    '/activarmotores/{pk_motores}',
    '/actualizarmotores/{pk_motores}',
    '/bajamotores/{pk_motores}',

    // Rentas
    '/form_renta/{vista}',
    '/editar_rentas/{pk_rentas}',
    '/activarrentas/{pk_rentas}',
    '/actualizarrentas/{pk_rentas}',
    '/bajarentas/{pk_rentas}',
    '/renta/{pk_rentas}'
];

// Precarga de recursos
const preLoad = () => {
    return caches.open(CACHE_NAME).then((cache) => {
        return cache.addAll(filesToCache);
    });
};

// Instalación del service worker
self.addEventListener("install", (event) => {
    event.waitUntil(preLoad());
    self.skipWaiting(); // Activar inmediatamente este SW
});

// Verificar respuesta desde la red
const checkResponse = (request) => {
    return fetch(request).then((response) => {
        if (response.status === 404) {
            throw new Error("Not found");
        }
        return response;
    });
};

// Almacenar en caché
const addToCache = (request) => {
    return caches.open(CACHE_NAME).then((cache) => {
        return fetch(request).then((response) => {
            if (!response.ok) throw new Error("Fetch failed");
            return cache.put(request, response);
        });
    });
};

// Recuperar de la caché
const returnFromCache = (request) => {
    return caches.open(CACHE_NAME).then((cache) =>
        cache.match(request).then((matching) =>
            matching || cache.match("/offline.html")
        )
    );
};

// Manejo de eventos fetch
self.addEventListener("fetch", (event) => {
    if (event.request.method !== "GET") return; // Ignorar otros métodos
    if (!event.request.url.startsWith(self.location.origin)) return; // Solo cachear recursos del mismo origen

    event.respondWith(
        checkResponse(event.request).catch(() => returnFromCache(event.request))
    );

    event.waitUntil(addToCache(event.request).catch(() => {})); // Prevenir errores silenciosos
});
