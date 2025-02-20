// Selecting the sidebar and buttons
const sidebar = document.querySelector(".sidebar");
const sidebarOpenBtn = document.querySelector("#sidebar-open");
const sidebarCloseBtn = document.querySelector("#sidebar-close");
const sidebarLockBtn = document.querySelector("#lock-icon");
// Function to toggle the lock state of the sidebar
const toggleLock = () => {
  sidebar.classList.toggle("locked");
  // If the sidebar is not locked
  if (!sidebar.classList.contains("locked")) {
    sidebar.classList.add("hoverable");
    sidebarLockBtn.classList.replace("bx-lock-alt", "bx-lock-open-alt");
  } else {
    sidebar.classList.remove("hoverable");
    sidebarLockBtn.classList.replace("bx-lock-open-alt", "bx-lock-alt");
  }
};
// Function to hide the sidebar when the mouse leaves
const hideSidebar = () => {
  if (sidebar.classList.contains("hoverable")) {
    sidebar.classList.add("close");
  }
};
// Function to show the sidebar when the mouse enter
const showSidebar = () => {
  if (sidebar.classList.contains("hoverable")) {
    sidebar.classList.remove("close");
  }
};
// Function to show and hide the sidebar
const toggleSidebar = () => {
  sidebar.classList.toggle("close");
};
// If the window width is less than 800px, close the sidebar and remove hoverability and lock
if (window.innerWidth < 800) {
  sidebar.classList.add("close");
  sidebar.classList.remove("locked");
  sidebar.classList.remove("hoverable");
}
// Adding event listeners to buttons and sidebar for the corresponding actions
sidebarLockBtn.addEventListener("click", toggleLock);
sidebar.addEventListener("mouseleave", hideSidebar);
sidebar.addEventListener("mouseenter", showSidebar);
sidebarOpenBtn.addEventListener("click", toggleSidebar);
document.addEventListener("DOMContentLoaded", function () {
    const sidebar = document.querySelector(".sidebar");
    const logoSidebar = document.getElementById("logoSidebar");

    // Função para alternar a sidebar e mudar a logo
    function toggleSidebar() {
        sidebar.classList.toggle("close");
        atualizarLogo();
    }

    // Função para atualizar a logo com base no estado da sidebar
    function atualizarLogo() {
        if (sidebar.classList.contains("close")) {
            logoSidebar.src = "./img/logo_x.svg"; // Logo quando a sidebar está fechada
        } else {
            logoSidebar.src = "./img/DEV EXPERIENCE V2 TRANSPARENTE SVG.svg"; // Logo quando a sidebar está aberta
        }
    }

    // Evento de clique para fechar/abrir a sidebar
    document.getElementById("sidebar-close").addEventListener("click", toggleSidebar);

    // Evento de mouse para alterar a logo ao passar o mouse
    sidebar.addEventListener("mouseenter", function () {
        if (sidebar.classList.contains("close")) {
            logoSidebar.src = "./img/DEV EXPERIENCE V2 TRANSPARENTE SVG.svg"; // Logo ao passar o mouse
        }
    });

    sidebar.addEventListener("mouseleave", function () {
        if (sidebar.classList.contains("close")) {
            logoSidebar.src = "./img/logo_x.svg "; // Volta para a logo fechada
        }
    });
});

