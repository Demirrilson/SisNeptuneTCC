function showPerfil(event) {
    const mostrarPerfil = document.querySelector('.content-profile');
    if (event.target.closest('.profile')) {
        if (mostrarPerfil.classList.contains('open')) {
            mostrarPerfil.classList.remove('open');
        } else {
            mostrarPerfil.classList.add('open');
        }
    } else {
        let perfilAberto = document.querySelector('.content-profile.open');
        if (perfilAberto) {
            perfilAberto.classList.remove('open');
        }
    }
}

document.addEventListener('click', function (event) {
    const perfilAberto = document.querySelector('.content-profile.open');
    if (perfilAberto && !event.target.closest('.profile')) {
        perfilAberto.classList.remove('open');
    }
});

const pageTitle = document.title;

const tituloElemento = document.getElementById("titulo");

tituloElemento.innerText = pageTitle;