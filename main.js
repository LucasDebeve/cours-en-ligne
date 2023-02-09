const closeButtons = document.querySelectorAll('.SelectMenu-closeButton');

closeButtons.forEach((closeButton) => {
  closeButton.addEventListener('click', () => {
    const selectMenu = closeButton.closest('details');
    selectMenu.removeAttribute('open');

  });
});