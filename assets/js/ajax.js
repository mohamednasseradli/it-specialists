
function sendMessage (e)
{
    // e.preventDefault();

    var message     = document.getElementById("message");
    var sender      = document.getElementById("sender-id").value;
    var receiver    = document.getElementById("receiver-id").value;
    // create a new XMLHttpRequest object
    var xhr = new XMLHttpRequest();


    // prepare the data to be sent in the request
    var params = "action=add-message&sender=" + sender + "&receiver=" + receiver + "&message=" + message.value;

    // specify the request method, URL, and whether the request should be asynchronous
    xhr.open("POST", "../messages.php", true);

    // set the Content-Type header to let the server know we're sending form data
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // handle the response when it arrives
    xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {

        // 
    }
    };
    // send the request
    xhr.send(params);

    // Clear Message Box After Sending Message
    setTimeout(function () {
        message.value = "";
    }, 100);
}


var messagesContainer       = document.getElementById("messages-container");
function getMessages ()
{
    
    var tech                    = document.getElementById("tech-id").value;
    var techName                = document.getElementById("tech-name").value;
    var client                  = document.getElementById("client-id").value;
    var clientName              = document.getElementById("client-name").value;
    // create a new XMLHttpRequest object
    var xhr = new XMLHttpRequest();
    // prepare the data to be sent in the request
    var params = "action=get-messages&client_id=" + client + "&tech_id=" + tech;

    // specify the request method, URL, and whether the request should be asynchronous
    xhr.open("POST", "../messages.php", true);

    // set the Content-Type header to let the server know we're sending form data
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // handle the response when it arrives
    xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {

        var response = JSON.parse(xhr.responseText);
        // console.log(response + tech + client);
        messagesContainer.innerHTML = "";
        response.forEach(element => {
            if (element.sender_id == tech)
            {
                messagesContainer.innerHTML +=
                '<div class="row mb-4">' + 
                    '<div class="col-10">' +
                        '<div class="msgs-area">' +
                            '<div class="border-bottom">' +
                                '<div class="d-flex justify-content-start">' +
                                    '<div class="user-img">' +
                                        '<a href="#"><img src="../assets/imgs/tech.jpg" alt="" /></a>'+
                                    '</div>'+
                                    '<div class="user-name pe-3">'+
                                        '<a href="#">' + techName +'</a>' +
                                        '<p class="text-muted"><span>'+ element.date +'</span></p>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="msg-text mb-3 mt-4">' + element.message +' </div>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>';
            } else {
                messagesContainer.innerHTML +=
                '<div class="row mb-4">' + 
                    '<div class="col-10">' +
                        '<div class="msgs-area">' +
                            '<div class="border-bottom">' +
                                '<div class="d-flex justify-content-start">' +
                                    '<div class="user-img">' +
                                        '<a href="#"><img src="../assets/imgs/client.jpg" alt="" /></a>'+
                                    '</div>'+
                                    '<div class="user-name pe-3">'+
                                        '<a href="#">' + clientName +'</a>' +
                                        '<p class="text-muted"><span>'+ element.date +'</span></p>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="msg-text mb-3 mt-4">' + element.message +' </div>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>';
            }
        });
    }
    };
    // send the request
    xhr.send(params);

}

if (messagesContainer !== null)
{
    
    setInterval(function () {
        getMessages();
    } , 1000);

}