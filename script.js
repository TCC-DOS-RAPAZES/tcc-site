$(document).ready(function() {
    // Atualiza as mensagens do chat a cada 1 segundo
    setInterval(fetchMessages, 1000);

    // Envia a mensagem quando o formulário for enviado
    $("#message-form").submit(function(e) {
        e.preventDefault(); // Impede o envio padrão do formulário
        var message = $("#message-input").val();
        sendMessage(message);
        $("#message-input").val(''); // Limpa o campo de entrada
    });
});

function fetchMessages() {
    $.ajax({
        url: "get_messages.php",
        type: "GET",
        success: function(data) {
            $("#chatbox").html(data); // Atualiza a área de exibição das mensagens
            /*
            Essa funcao ajax, atualiza a area de exibicao, passando por parametro a div, Chatbox,
            que esta presente no arquivo chatbox.php, os arquivos chat.php e privateroom.php
            chamam o arquivo chatbox.php na forma de um iframe, possibilitando assim o acumulo de varias
            mensagens na tela de forma organizda.
            */
        }
    });
}

function sendMessage(message) {
    $.ajax({
        url: "send_message.php",
        type: "POST",
        data: { message: message },
        success: function() {
            fetchMessages(); // Atualiza as mensagens após enviar uma nova
        }
    });
}
