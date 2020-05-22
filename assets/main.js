function deletar(n) {
    var dados = 'action=delete&id=' + n;
    exibirTabela(dados);
}

function update() {
    var id = $('input#valorId-up').val();
    var nome = $('input#valorNome-up').val();
    var email = $('input#valorEmail-up').val();
    var dados = 'action=update&id=' + id + '&nome=' + nome + '&email=' + email;
    exibirTabela(dados);
    $('#update').hide();
    $('#searchGroup').show();
}

function fazerEditar(n) {
    var atual_nome = $('#n-' + n).html();
    var atual_email = $('#e-' + n).html();
    $('#update').show();
    $('#searchGroup').hide();
    $('#valorId-up').val(n);
    $('input#valorNome-up').val(atual_nome.trim());
    $('input#valorEmail-up').val(atual_email.trim());
}

function adicionar() {
    var nome = $('#valorNome').val();
    var email = $('#valorEmail').val();
    var dados = 'action=insert&nome=' + nome + '&email=' + email;
    exibirTabela(dados);
    $('#insert').hide();
    $('#searchGroup').show();
}

function exibirAdicionar() {
    $('#insert').show();
    $('#searchGroup').hide();
}

function exibirTabela(dados) {
    $.ajax({
        type: "POST",
        url: "query.php",
        data: dados,
        success: function (data) {
            $('tbody#resultado').html(data);
        },
        error: function (data) {
            $('tbody#resultado').html("Erro!");
        }
    });
}
$(document).ready(function () {
    $('#update').hide();
    $('#insert').hide();
    var dados = 'action=all';
    exibirTabela(dados);
    $('input#search').keyup(function () {
        var parametro = $('input#search').val();
        var dados = 'action=search&parametro=' + parametro;
        exibirTabela(dados);
    });
});