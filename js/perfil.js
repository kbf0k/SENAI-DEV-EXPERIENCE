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


document.getElementById('trocar_foto_perfil').addEventListener('click', () => {
  document.getElementById('upload_foto').click(); // Abre o seletor de arquivos
});

document.getElementById('upload_foto').addEventListener('change', function (event) {
  const file = event.target.files[0];
  if (file) {
    const reader = new FileReader();

    reader.onload = function (e) {
      const imageUrl = e.target.result;
      document.getElementById('imagem_perfil').src = imageUrl; // Atualiza a imagem na tela
      localStorage.setItem('foto_perfil', imageUrl); // Salva no LocalStorage
    };

    reader.readAsDataURL(file);
  }
});

window.addEventListener('load', () => {
  const fotoSalva = localStorage.getItem('foto_perfil');
  if (fotoSalva) {
    document.getElementById('imagem_perfil').src = fotoSalva; // Aplica a imagem salva
  }
});
