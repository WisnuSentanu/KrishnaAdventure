window._ = require('lodash');

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });


import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    encrypted: true
});


// Mendapatkan user ID penerima dari meta tag atau variabel JavaScript global
const receiverUserId = document.querySelector('meta[name="receiver-user-id"]').getAttribute('content');

window.Echo.private('chat.' + receiverUserId)
    .listen('MessageSent', (e) => {
        console.log(e.message);
        // Update UI chat window
        let messageList = document.getElementById('message-list');
        let newMessage = document.createElement('div');
        newMessage.innerHTML = `<strong>${e.user.name}:</strong> ${e.message.body}`;
        messageList.appendChild(newMessage);

        // Update notifikasi badge
        updateUnreadMessagesCount();
    });

function updateUnreadMessagesCount() {
    axios.get('/unread-messages-count')
        .then(response => {
            let badge = document.getElementById('unread-messages-badge');
            let unreadCount = response.data.unread_count;
            badge.style.display = unreadCount > 0 ? 'inline-block' : 'none';
            badge.textContent = unreadCount;
        })
        .catch(error => {
            console.error('Error fetching unread messages count:', error);
        });
}

// Panggil updateUnreadMessagesCount saat halaman pertama kali dimuat
document.addEventListener('DOMContentLoaded', function() {
    updateUnreadMessagesCount();
});

<script src="{{ mix('js/app.js') }}"></script>