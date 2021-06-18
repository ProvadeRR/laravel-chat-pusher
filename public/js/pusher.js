let pusher = new Pusher('cd7b1f65c3ede833df2a', {
    cluster: 'eu'
});

let channel = pusher.subscribe('my-channel');
channel.bind('message', function(data) {
    $('.messages').append(`
                <div class="message-group">
                <label for="" class="message-title">${data.name}</label>
                <span>${data.message}</span>
            </div>
            `)
});
$("#chat").submit(function(e){
    e.preventDefault();
    sendMessage();
})

$('#message').keypress(function(event){
    if(event.key === 'Enter'){
       $("#chat").submit();
    }
});
function sendMessage(){
    $.post('/sendMessage', {message: $("#message").val()});
    $('#message').val(null);
}
