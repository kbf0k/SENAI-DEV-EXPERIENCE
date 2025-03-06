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
