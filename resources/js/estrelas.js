let rating = 0;

window.enviarAvaliacao = () => {
    // Obtém o valor da avaliação selecionada
    var rating = document.querySelector('input[name="rating"]:checked').value;

    // Cria um objeto XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // Configura a requisição para o arquivo PHP que processa a avaliação
    xhr.open('POST', 'processar_avaliacao.php', true);

    // Configura o cabeçalho da requisição
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    // Função de callback quando a requisição for concluída
    xhr.onload = function() {
      if (xhr.status === 200) {
        // Avaliação armazenada com sucesso
        console.log('Avaliação armazenada com sucesso!');
      } else {
        // Erro ao armazenar a avaliação
        console.log('Erro ao armazenar a avaliação:', xhr.responseText);
      }
    };

    // Envia a avaliação para o servidor
    xhr.send('rating=' + rating);
  }
