(() => {
  'use strict';
  const toggle = document.querySelector('.menu-toggle');
  const nav = document.querySelector('.site-nav');
  function closeMenu() {
    nav?.classList.remove('is-open');
    toggle?.setAttribute('aria-expanded', 'false');
  }
  toggle?.addEventListener('click', () => {
    const open = nav.classList.toggle('is-open');
    toggle.setAttribute('aria-expanded', String(open));
  });
  nav?.addEventListener('click', event => { if (event.target.closest('a')) closeMenu(); });
  document.addEventListener('keydown', event => {
    if (event.key === 'Escape' && nav?.classList.contains('is-open')) { closeMenu(); toggle.focus(); }
  });
  document.addEventListener('click', event => {
    if (!event.target.closest('header')) closeMenu();
  });
  matchMedia('(min-width: 1200px)').addEventListener('change', closeMenu);
  document.querySelectorAll('[data-project-preview]').forEach(preview => {
    const image = preview.querySelector('img');
    const buttons = preview.querySelectorAll('[data-preview-src]');
    buttons.forEach(button => {
      const preload = new Image();
      preload.src = button.dataset.previewSrc;
      button.addEventListener('click', () => {
        image.src = button.dataset.previewSrc;
        image.alt = `PartFlow Auto point-of-sale sample preview in ${button.dataset.previewTheme.toLowerCase()} mode, showing vehicle fitment search, branch stock, and a sales cart`;
        buttons.forEach(option => option.setAttribute('aria-pressed', String(option === button)));
        preview.querySelector('[data-preview-label]').textContent = `${button.dataset.previewTheme} mode`;
      });
    });
  });
})();
