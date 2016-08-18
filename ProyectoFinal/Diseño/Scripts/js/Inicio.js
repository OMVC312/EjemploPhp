var Nuevo = {
    Inicial: function () {
        $.ajaxSetup({ cache: false });
        Nuevo.Eventos();
    },
    Eventos: function () {
        $('#btnIniciar').click(Nuevo.AbrirPagina);

    },
    AbrirPagina: function () {
        var url = "/Login/Home";
    }
}

$(function () {
    Nuevo.Inicial();
});
