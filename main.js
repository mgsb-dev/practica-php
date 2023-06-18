document.addEventListener("DOMContentLoaded", function () {
  const formulario = document.getElementById("form");
  const nombreInput = document.getElementById("nombre");
  const apellidoInput = document.getElementById("apellido");
  const emailInput = document.getElementById("email");
  const botonEnviar = document.getElementById("botonEnviar");
  const botonTexto = document.getElementById("botonTexto");
  const spinner = document.getElementById("spinner");

  nombreInput.addEventListener("input", validarInputs);
  apellidoInput.addEventListener("input", validarInputs);
  emailInput.addEventListener("input", validarInputs);

  function validarInputs() {
    if (
      nombreInput.validity.valid &&
      apellidoInput.validity.valid &&
      emailInput.validity.valid
    ) {
      botonEnviar.classList.remove("btn-secondary");
      botonEnviar.classList.remove("disabled");
      botonEnviar.classList.add("btn-primary");
      botonEnviar.disabled = false;
      return;
    }
    botonEnviar.disabled = true;
    botonEnviar.classList.add("btn-secondary");
    botonEnviar.classList.remove("btn-primary");
  }

  formulario.addEventListener("submit", function (event) {
    if (
      nombreInput.validity.valid &&
      apellidoInput.validity.valid &&
      emailInput.validity.valid
    ) {
      botonTexto.classList.add("d-none");
      spinner.classList.remove("d-none");
      spinner.classList.add("d-block");
      setTimeout(() => {
        botonTexto.classList.remove("d-none");
        spinner.classList.remove("d-inline");
        spinner.classList.add("d-none");
        botonEnviar.classList.remove("btn-primary");
        botonEnviar.classList.add("disabled");
      }, 2000);
    }
  });
});
