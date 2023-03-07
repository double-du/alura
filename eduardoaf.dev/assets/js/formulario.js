let formulario  = document.querySelector('.contato__form');
let dados       = new FormData(formulario);
console.log(dados);
/*formulario.addEventListener('submit', (event) => {
    event.preventDefault();
    fetch('enviar.php', {
		method: 'POST',
		body: new FormData(event.target),
	}).then(function (response) {
        console.log('cheguei...');
        console.log(response);
        return;
		if (response.ok) {
			return response.json();
		}
		return Promise.reject(response);
	}).then(function (data) {
		console.log(data);
	}).catch(function (error) {
		console.warn(error);
	});
});
*/