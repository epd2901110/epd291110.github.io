document.addEventListener("DOMContentLoaded", () => {
    const buyButtons = document.querySelectorAll(".buy-btn");
    const message = document.getElementById("message");
  
    buyButtons.forEach(button => {
      button.addEventListener("click", () => {
        const item = button.dataset.item;
        let price = 0;
  
        if (item === "Web") {
          price = 10;
        } else if (item === "Bot") {
          const numPersonas = parseInt(document.getElementById("numPersonas").value) || 1;
          price = numPersonas * 1;
        } else if (item === "Juego") {
          price = parseInt(document.getElementById("gamePrice").value) || 20;
        }
  
        if (price >= 1) {
          // Mostrar opciones de pago
          message.innerHTML = `
            Has seleccionado: <strong>${item}</strong> por <strong>${price} euros</strong>.
            <br>
            Opciones de pago:
            <ul>
              <li><a href="https://es.wallapop.com/" target="_blank">Wallapop: Programaciones (legajo.manuall@gmail.com)</a></li>
              <li>Correo: <a href="mailto:legajo.manuall@gmail.com">legajo.manuall@gmail.com</a></li>
              <li>Bizum: 613080436</li>
            </ul>
          `;
          message.classList.remove("hidden");
          setTimeout(() => message.classList.add("hidden"), 5000);
        } else {
          message.textContent = "Por favor, selecciona una cantidad válida.";
          message.classList.remove("hidden");
          message.style.color = "red";
        }
      });
    });
  });
  