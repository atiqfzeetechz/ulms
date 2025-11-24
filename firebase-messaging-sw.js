importScripts('https://www.gstatic.com/firebasejs/9.0.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/9.0.0/firebase-messaging.js');

firebase.initializeApp({
    apiKey: "AIzaSyCyJAkZrDzv_U875YvkZXaXrL7Ekdk4HrU",
    authDomain: "whapy-notify.firebaseapp.com",
    projectId: "whapy-notify",
    storageBucket: "whapy-notify.appspot.com",
    messagingSenderId: "50370584711",
    appId: "1:50370584711:web:658412c001174aee08d822",
    measurementId: "G-SLREXQ06CM"
});

const messaging = firebase.messaging();

messaging.onBackgroundMessage((payload) => {
    console.log('Background message received: ', payload);
    const notificationTitle = payload.notification.title;
    const notificationOptions = {
        body: payload.notification.body,
        icon: 'icon-url' // Optional icon URL
    };

    self.registration.showNotification(notificationTitle, notificationOptions);
});
