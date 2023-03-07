const observador = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if(entry.isIntersecting){ // Se o elemento foi interseccionado
            entry.target.classList.add('skill__progress--ativo');
            return;       
        }

        entry.target.classList.remove('skill__progress--ativo');
    });
});

let elementos = document.querySelectorAll('.skill__progress');
elementos.forEach(elemento => {
    observador.observe(document.querySelector(`.${elemento.classList[0]}.${elemento.classList[1]}`));
});