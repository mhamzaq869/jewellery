<script>
    var pusher = new Pusher("{{ pusherCredentials('key') }}", {
        cluster: "{{ pusherCredentials('cluster') }}",
    });
    // Enter a unique channel you wish your users to be subscribed in.
    var channel = pusher.subscribe('order.' + `{{ Auth::id() }}`);

    channel.bind("order-event", (data) => {
        let notify = data.message;
        getNotifications()
        alertNotification('info', notify.noti_title, notify.noti_desc)

        jQuery("#msg_my_audio")[0].play();
    });
</script>
