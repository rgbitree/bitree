<?php
$pageTitle = 'Projects | Bitree Data Systems';
$pageDescription = 'Explore systems built by Bitree, including PartFlow Auto for auto-parts stock and sales management.';
$pageClass = 'projects-page';
require __DIR__ . '/../include/header.php';
?>
<main id="main" class="projects-main">
  <p class="insight-panel-label">Our projects</p>
  <h1>Systems at work.</h1>
  <p class="projects-intro">A closer look at the systems we build for everyday business operations.</p>
  <article class="featured-project" aria-labelledby="partflow-title">
  <div class="featured-project-copy">
    <p class="insight-panel-label">Auto parts retail &middot; Inventory &amp; point of sale</p>
    <div class="partflow-project-brand"><img src="/assets/img/brand/partflow-logo.svg" alt="" width="52" height="52" decoding="async"><h2 id="partflow-title">PartFlow Auto</h2></div>
    <p class="featured-project-summary">A stock and sales management system built for auto-parts businesses. PartFlow Auto connects vehicle fitment search, point of sale, purchases, and stock across branches, with payments and reports in one place. Teams can find the right part, track every stock movement, and keep a clear view of daily operations.</p>
    <p class="featured-project-customer"><span>Current customer</span><strong>CPT Car Parts</strong></p>
    <a class="featured-project-link" href="https://partflowautomw.com" target="_blank" rel="noopener noreferrer">Explore PartFlow Auto <span aria-hidden="true">&nearr;</span><span class="sr-only"> (opens in a new tab)</span></a>
  </div>
  <figure class="featured-project-preview" data-project-preview>
    <div class="preview-toolbar" role="group" aria-label="PartFlow Auto preview theme">
      <span>Preview theme</span>
      <button type="button" aria-pressed="true" aria-controls="partflow-preview" data-preview-src="/assets/img/showcase/partflow-pos-preview-dark.png" data-preview-theme="Dark">Dark</button>
      <button type="button" aria-pressed="false" aria-controls="partflow-preview" data-preview-src="/assets/img/showcase/partflow-pos-preview.png" data-preview-theme="Light">Light</button>
    </div>
    <img id="partflow-preview" src="/assets/img/showcase/partflow-pos-preview-dark.png" alt="PartFlow Auto point-of-sale sample preview in dark mode, showing vehicle fitment search, branch stock, and a sales cart" width="1216" height="884" loading="lazy" decoding="async">
    <figcaption>PartFlow Auto &middot; Point-of-sale sample preview &middot; <span data-preview-label aria-live="polite">Dark mode</span></figcaption>
  </figure>
</article>
</main>
<?php require __DIR__ . '/../include/footer.php'; ?>
