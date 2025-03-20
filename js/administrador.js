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
document.addEventListener('DOMContentLoaded', () => {
  document.getElementById('info-1').style.right = '0px';
  document.getElementById('info-2').style.left = '150px';
  document.getElementById('info-3').style.left = '2090px';
  document.getElementById('info-4').style.left = '3160px';
  document.getElementById('info-5').style.left = '3750px';
})

document.getElementById('dashboard').addEventListener('click', () => {
  setTimeout(() => {
    document.getElementById('info-1').style.right = '0px';
    document.getElementById('info-2').style.left = '1250px';
    document.getElementById('info-3').style.left = '2090px';
    document.getElementById('info-4').style.left = '6090px';
    document.getElementById('info-5').style.left = '-1230px';
  }, 10)
})

document.getElementById('lista_equipes').addEventListener('click', () => {
  setTimeout(() => {
    document.getElementById('info-1').style.right = '1400px';
    document.getElementById('info-2').style.left = '-1320px';
  }, 10)
})


document.getElementById('inscricoes').addEventListener('click', () => {
  setTimeout(() => {
    document.getElementById('info-1').style.right = '1400px';
    document.getElementById('info-2').style.left = '-1320px';
    document.getElementById('info-3').style.left = '2090px';
    document.getElementById('info-4').style.left = '6160px';
    document.getElementById('info-5').style.left = '-1230px';
  }, 10)
})


document.getElementById('adicionar_notas').addEventListener('click', () => {
  setTimeout(() => {
    document.getElementById('info-1').style.right = '2090px';
    document.getElementById('info-2').style.left = '-2800px';
    document.getElementById('info-3').style.left = '-2350px';
    document.getElementById('info-4').style.left = '3160px';
    document.getElementById('info-5').style.left = '-1230px';
  }, 10)
})

document.getElementById('adicionar_imagens').addEventListener('click', () => {
  setTimeout(() => {
    document.getElementById('info-1').style.right = '2090px';
    document.getElementById('info-2').style.left = '-2800px';
    document.getElementById('info-3').style.left = '-3500px';
    document.getElementById('info-4').style.left = '-3050px';
    document.getElementById('info-5').style.left = '-1230px';
  }, 10)
})

document.getElementById('ranking').addEventListener('click', () => {
  setTimeout(() => {
    document.getElementById('info-4').style.left = '-5080px';
    document.getElementById('info-5').style.left = '-3900px';
    document.getElementById('info-1').style.right = '1550px';
    document.getElementById('info-3').style.left = '-4160px';
    document.getElementById('info-2').style.left = '-4070px';

  }, 10)
})

const label = document.getElementById('dropzone_escolher_imagens');

label.addEventListener('dragenter', () => {
  label.style.background = 'rgba(0, 0, 0, 0.6)';
})

label.addEventListener('dragleave', () => {
  label.style.background = '';
})

const input = document.getElementById('botao_escolher_imagens');
const dropzone = document.getElementById('dropzone_escolher_imagens');
const imagensContainer = document.getElementById('imagens_escolhidas');

// Impede o comportamento padrão de abrir a imagem
document.addEventListener("dragover", event => event.preventDefault());
document.addEventListener("drop", event => event.preventDefault());

dropzone.addEventListener("dragover", event => {
  event.preventDefault();
  dropzone.style.border = "2px dashed #007bff";
});

dropzone.addEventListener("dragleave", () => dropzone.style.border = "none");

dropzone.addEventListener("drop", event => {
  event.preventDefault();
  handleFiles(event.dataTransfer.files);
});

input.addEventListener("change", () => handleFiles(input.files));

function handleFiles(files) {
  [...files].forEach(file => {
    if (file.type.startsWith("image/")) {
      const img = document.createElement("img");
      img.src = URL.createObjectURL(file);
      img.id = "cover";
      imagensContainer.appendChild(img);
      label.style.background = 'rgba(0, 0, 0, 0.6)';
    }
  });
}