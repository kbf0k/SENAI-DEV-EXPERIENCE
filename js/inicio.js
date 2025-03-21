// // Selecting the sidebar and buttons
// const sidebar = document.querySelector(".sidebar");
// const sidebarOpenBtn = document.querySelector("#sidebar-open");
// const sidebarCloseBtn = document.querySelector("#sidebar-close");
// const sidebarLockBtn = document.querySelector("#lock-icon");
// // Function to toggle the lock state of the sidebar
// const toggleLock = () => {
//   sidebar.classList.toggle("locked");
//   // If the sidebar is not locked
//   if (!sidebar.classList.contains("locked")) {
//     sidebar.classList.add("hoverable");
//     sidebarLockBtn.classList.replace("bx-lock-alt", "bx-lock-open-alt");
//   } else {
//     sidebar.classList.remove("hoverable");
//     sidebarLockBtn.classList.replace("bx-lock-open-alt", "bx-lock-alt");
//   }
// };
// // Function to hide the sidebar when the mouse leaves
// const hideSidebar = () => {
//   if (sidebar.classList.contains("hoverable")) {
//     sidebar.classList.add("close");
//   }
// };
// // Function to show the sidebar when the mouse enter
// const showSidebar = () => {
//   if (sidebar.classList.contains("hoverable")) {
//     sidebar.classList.remove("close");
//   }
// };
// // Function to show and hide the sidebar
// const toggleSidebar = () => {
//   sidebar.classList.toggle("close");
// };
// // If the window width is less than 800px, close the sidebar and remove hoverability and lock
// if (window.innerWidth < 800) {
//   sidebar.classList.add("close");
//   sidebar.classList.remove("locked");
//   sidebar.classList.remove("hoverable");
// }
// // Adding event listeners to buttons and sidebar for the corresponding actions
// sidebarLockBtn.addEventListener("click", toggleLock);
// sidebar.addEventListener("mouseleave", hideSidebar);
// sidebar.addEventListener("mouseenter", showSidebar);
// sidebarOpenBtn.addEventListener("click", toggleSidebar);
// document.addEventListener("DOMContentLoaded", function () {
//   const sidebar = document.querySelector(".sidebar");
//   const logoSidebar = document.getElementById("logoSidebar");

//   // Função para alternar a sidebar e mudar a logo
//   function toggleSidebar() {
//     sidebar.classList.toggle("close");
//     atualizarLogo();
//   }

//   // Função para atualizar a logo com base no estado da sidebar
//   function atualizarLogo() {
//     if (sidebar.classList.contains("close")) {
//       logoSidebar.src = "./img/logo_x.svg"; // Logo quando a sidebar está fechada
//     } else {
//       logoSidebar.src = "./img/DEV EXPERIENCE V2 TRANSPARENTE SVG.svg"; // Logo quando a sidebar está aberta
//     }
//   }

//   // Evento de clique para fechar/abrir a sidebar
//   document.getElementById("sidebar-close").addEventListener("click", toggleSidebar);

//   // Evento de mouse para alterar a logo ao passar o mouse
//   sidebar.addEventListener("mouseenter", function () {
//     if (sidebar.classList.contains("close")) {
//       logoSidebar.src = "./img/DEV EXPERIENCE V2 TRANSPARENTE SVG.svg"; // Logo ao passar o mouse
//     }
//   });

//   sidebar.addEventListener("mouseleave", function () {
//     if (sidebar.classList.contains("close")) {
//       logoSidebar.src = "./img/logo_x.svg "; // Volta para a logo fechada
//     }
//   });
// });

// const sidebar = document.querySelector(".sidebar");
// const logoFechada = document.getElementById("logoSidebar");
// const logoAberta = document.getElementById("logoSidebarOpen");


// logoAberta.style.display = "none";


// sidebar.addEventListener("mouseenter", () => {
//   logoFechada.style.display = "none";
//   logoAberta.style.display = "block";
// });


// sidebar.addEventListener("mouseleave", () => {
//   logoFechada.style.display = "block";
//   logoAberta.style.display = "none";
// });

document.addEventListener("DOMContentLoaded", () => {
  const logoutBtn = document.getElementById('logout');
  if (logoutBtn) {
    logoutBtn.addEventListener('click', () => {
      Swal.fire({
        title: "Você deseja sair?",
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: "Cancelar",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sim, sair",
        confirmButtonColor: "#0d72ff",
      }).then((result) => {
        if (result.isConfirmed) {
          fetch('logout.php', {
            method: 'POST'
          }).then(() => {
            window.location.href = 'login.php';
          });
        }
      });
    });
  }
});

// Efeito de Digitação na Frase de Destaque
const texto = "Uma oportunidade única, um mundo de possibilidades.";
let letra = 0;

function escreverTexto() {
    document.getElementById("destaque-texto").textContent = texto.substring(0, letra);
    letra++;

    if (letra <= texto.length) {
        setTimeout(escreverTexto, 100);
    }
}
escreverTexto();

// Contagem Regressiva
const dataEvento = new Date("2025-06-21T00:00:00").getTime();

function atualizarContagem() {
    const agora = new Date().getTime();
    const diferenca = dataEvento - agora;

    if (diferenca <= 0) {
        document.getElementById("contagem").innerHTML = "<h2>O evento já começou!</h2>";
        return;
    }

    document.getElementById("dias").textContent = Math.floor(diferenca / (1000 * 60 * 60 * 24));
    document.getElementById("horas").textContent = Math.floor((diferenca % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    document.getElementById("minutos").textContent = Math.floor((diferenca % (1000 * 60 * 60)) / (1000 * 60));
    document.getElementById("segundos").textContent = Math.floor((diferenca % (1000 * 60)) / 1000);
}

setInterval(atualizarContagem, 1000);
atualizarContagem();
