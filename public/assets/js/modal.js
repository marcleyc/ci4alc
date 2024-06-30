document.addEventListener("DOMContentLoaded", function() {
    const openModalBtn = document.getElementById('openModalBtn');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const modal = document.getElementById('myModal');

    // Função para abrir o modal
    function openModal() {
        modal.style.display = 'flex';
    }

    // Função para fechar o modal
    function closeModal() {
        modal.style.display = 'none';
    }

    // Evento de clique no botão de abrir o modal
    openModalBtn.addEventListener('click', openModal);

    // Evento de clique no botão de fechar o modal
    closeModalBtn.addEventListener('click', closeModal);

    // Fechar o modal quando clicar fora dele
    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            closeModal();
        }
    });
});