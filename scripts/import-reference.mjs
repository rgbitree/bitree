// One-time import of the supplied UI Builder exports. Run only to re-import designs.
import fs from 'node:fs/promises';
import vm from 'node:vm';
import { load } from 'cheerio';
import { refineContent } from './content-refinements.mjs';

await fs.mkdir('assets/img/redesign', { recursive: true });
await fs.mkdir('assets/fonts', { recursive: true });
const sources = [
  ['data', 'bitree_data_systems_redesigned_homepage', 'index.php'],
  ['studio', 'bitree_studio_vibrant_creative_brand_direction', 'bitree-studio/index.php']
];
const downloads = [];
for (const [theme, folder, output] of sources) {
  const $ = load(await fs.readFile(`uibuilder/${folder}/code.html`, 'utf8'));
  const context = { tailwind: {} };
  vm.runInNewContext($('#tailwind-config').text(), context);
  const config = context.tailwind.config;
  config.content = [output, 'assets/js/site.js'];
  for (const fonts of Object.values(config.theme.extend.fontFamily)) fonts.push('sans-serif');
  await fs.writeFile(`tailwind.${theme}.config.cjs`, `module.exports = ${JSON.stringify(config, null, 2)};\n`);
  $('script, style, head link').remove();
  $('head').append(`<title>${theme === 'data' ? 'Bitree Data Systems | Data, Analytics & Custom Systems' : 'Bitree Studio | Branding, Media & Digital Content'}</title>
    <meta name="description" content="${theme === 'data' ? 'Bitree helps organizations structure data, streamline operations, and build systems for better decisions. Based in Malawi.' : 'Creative identities, campaign assets, digital content and media direction from Bitree Studio, Malawi.'}">
    <link rel="icon" href="/assets/img/favicon.png">
    <link rel="preload" href="/assets/fonts/font-${theme === 'data' ? '0' : '3'}-0.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/assets/fonts/font-${theme === 'data' ? '1' : '4'}-0.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="stylesheet" href="/assets/css/fonts.css">
    <link rel="stylesheet" href="/assets/css/${theme}.css">
    <link rel="stylesheet" href="/assets/css/site-refinements.css">`);
  $('body').addClass(`${theme}-site`).prepend('<a href="#main" class="skip-link">Skip to content</a>');
  $('main').attr('id', 'main');
  const isStudio = theme === 'studio';
  const nav = isStudio
    ? [['What We Do', '#what-we-do'], ['Showcase', '#showcase'], ['Packages', '#packages'], ['Process', '#process'], ['Contact', '#inquiry'], ['Data Systems ↗', '/']]
    : [['Home', '/'], ['About', '#about'], ['Capabilities', '#capabilities'], ['Services', '#services'], ['Pricing', '#pricing'], ['Studio ↗', '/studio/']];
  $('header').html(`<div class="site-header-inner"><a href="${isStudio ? '/studio/' : '/'}" aria-label="${isStudio ? 'Bitree Studio' : 'Bitree Data Systems'} home"><img class="brand-logo" src="/assets/img/brand/bitree-${isStudio ? 'studio' : 'data-systems'}-logo.png" alt="${isStudio ? 'Bitree Studio' : 'Bitree Data Systems'}" width="165" height="42"></a><nav class="site-nav" id="site-navigation" aria-label="Main navigation">${nav.map(([label, url]) => `<a href="${url}">${label}</a>`).join('')}</nav><div class="site-header-actions"><a class="site-header-cta" href="${isStudio ? '#inquiry' : '#contact'}">${isStudio ? 'Start a Studio Project' : 'Start a Project'} ↗</a><button class="menu-toggle" type="button" aria-expanded="false" aria-controls="site-navigation">Menu</button></div></div>`);
  const routes = { home: '/', about: '#about', capabilities: '#capabilities', services: '#services', pricing: '#pricing', studio: '/studio/', contact: isStudio ? '#inquiry' : '#contact', 'what-we-do': '#what-we-do', packages: '#packages', process: '#process', showcase: '#showcase' };
  $('[data-path]').each((_, el) => {
    const a = $(el), path = a.attr('data-path');
    if (routes[path]) a.attr('href', routes[path]); else a.remove();
  });
  $('a[href="#studio"]').attr('href', '/studio/');
  $('a[href="#solutions"]').attr('href', '#services');
  $('a').filter((_, el) => /view full pricing/i.test($(el).text())).attr('href', '/pricing/');
  $('a[href="#"]').each((_, el) => {
    const a = $(el);
    if (/Data|Back to Bitree/.test(a.text())) a.attr('href', '/');
    else if (a.closest('footer').length) a.remove();
    else a.attr('href', isStudio ? '#inquiry' : '#contact');
  });
  if (isStudio) {
    $('h2').each((_, el) => {
      const h = $(el), text = h.text();
      if (text.includes('Creative work')) h.closest('section').attr('id', 'what-we-do');
      if (text.includes('Chromatic')) h.closest('section').attr('id', 'showcase');
      if (text.includes('Playful')) h.closest('section').attr('id', 'process');
    });
    $('[onclick]').each((_, el) => {
      const button = $(el), tone = button.attr('onclick').match(/'([^']+)'/)?.[1];
      button.removeAttr('onclick').attr('data-tone', tone).attr('aria-pressed', 'false');
    });
    $('[data-tone=cyan] span').last().text('Cyan #5BB8FE');
    $('[data-tone=coral] span').last().text('Coral #BC0B3B');
    $('[data-tone=violet] span').last().text('Original palette');
    $('div').filter((_, el) => $(el).children().length === 0 && /Featured Case|420% Engagement/.test($(el).text())).text('Studio concept');
    $('#showcase > div').append('<p class="concept-note">Visual explorations from the Studio design direction. Concept work, not client case studies.</p>');
    $('#submitNotice').remove();
    const fields = { clientName: 'name', clientEmail: 'email', projectBrief: 'message', projectTimeline: 'timeline' };
    for (const [id, name] of Object.entries(fields)) $(`#${id}`).attr('name', name);
    $('#studioForm').append('<input type="hidden" name="subject" value="Bitree Studio project inquiry">');
    $('input[name=serviceFocus]').attr('name', 'service_focus');
    $('label').filter((_, el) => $(el).text().trim() === 'Select Creative Focus').replaceWith('<span id="creative-focus-label" class="font-bold text-label-sm">Select Creative Focus</span>');
    $('#creative-focus-label').next().attr('role', 'radiogroup').attr('aria-labelledby', 'creative-focus-label');
  } else {
    const fields = { fullName: 'name', emailAddr: 'email', phoneNum: 'phone', subjectMatter: 'subject', projectMsg: 'message' };
    for (const [id, name] of Object.entries(fields)) $(`#${id}`).attr('name', name);
    $('#subjectMatter').attr('required', '');
    $('#form-status').remove();
    // The reference telemetry is illustrative, not a claim of live infrastructure.
    $('span').filter((_, el) => $(el).children().length === 0 && $(el).text().includes('Bitree Distributed Architecture')).text('Data engineering · Systems development');
    $('span').filter((_, el) => $(el).children().length === 0 && $(el).text().includes('Low Latency Sync Active')).text('Built around your business');
    $('span').filter((_, el) => $(el).text().trim() === 'bitree://telemetry.console.core:8080').text('Architecture preview · Illustrative sample data');
    $('footer span').filter((_, el) => $(el).text().includes('Operational //')).text('Data & systems development · Malawi');
    $('footer p').first().text('Data engineering, business intelligence, and custom systems that help organizations work with clarity.');
  }
  $('form').removeAttr('onsubmit').attr('action', '/contact/').attr('method', 'post').addClass('php-email-form').attr('data-recaptcha-site-key', 'RECAPTCHA_KEY_PLACEHOLDER');
  $('form').prepend('<input type="hidden" name="csrf_token" value="CSRF_PLACEHOLDER"><input type="hidden" name="recaptcha_token" value=""><div class="honeypot" aria-hidden="true"><input type="text" name="website" tabindex="-1" autocomplete="off" aria-label="Leave empty"></div>');
  $('form').append('<div class="loading form-status" role="status">Sending your inquiry…</div><div class="error-message form-status" role="alert"></div><div class="sent-message form-status" role="status">Your inquiry has been sent. Thank you.</div>');
  $('input[name=name]').attr('autocomplete', 'name');
  $('input[name=email]').attr('autocomplete', 'email');
  $('input[name=phone]').attr('autocomplete', 'tel');
  $('.material-symbols-outlined').attr('aria-hidden', 'true');
  // Preserve visual styles while keeping the document outline sequential.
  $('h4').each((_, el) => { el.tagName = 'h3'; el.name = 'h3'; });
  $('h5').each((_, el) => { el.tagName = 'h4'; el.name = 'h4'; });
  $('h3').filter((_, el) => $(el).text().trim() === 'Data Integrity First').each((_, el) => { el.tagName = 'p'; el.name = 'p'; });
  $('footer h3').each((_, el) => { el.tagName = 'h2'; el.name = 'h2'; });
  $('img').each((index, el) => {
    const img = $(el), source = img.attr('src');
    img.attr('decoding', 'async');
    if (index > 1) img.attr('loading', 'lazy');
    const alt = img.attr('alt') || img.attr('data-alt') || '';
    img.attr('alt', alt);
    if (/Logo|Emblem|bitree-data-systems-logo/.test(alt)) {
      img.attr('src', `/assets/img/brand/bitree-${isStudio ? 'studio' : 'data-systems'}-logo.png`).attr('alt', isStudio ? 'Bitree Studio' : 'Bitree Data Systems');
    } else if (source?.startsWith('https://')) {
      const path = isStudio && index === 1 ? 'assets/img/redesign/studio-hero.jpg' : `assets/img/redesign/${theme}-${index}.jpg`;
      img.attr('src', `/${path}`);
      if (!(isStudio && index === 1)) downloads.push({ url: source, path });
    }
  });
  $('body').append('<script src="/assets/js/site.js" defer></script><script src="/assets/js/contact-form.js" defer></script>RECAPTCHA_SCRIPT_PLACEHOLDER');
  let html = $.html().replaceAll('RECAPTCHA_KEY_PLACEHOLDER', "<?= htmlspecialchars((string) $recaptchaSiteKey, ENT_QUOTES, 'UTF-8'); ?>")
    .replaceAll('CSRF_PLACEHOLDER', "<?= htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8'); ?>")
    .replace('RECAPTCHA_SCRIPT_PLACEHOLDER', '<?php if ($recaptchaSiteKey !== ""): ?><script src="https://www.google.com/recaptcha/api.js?render=<?= urlencode((string) $recaptchaSiteKey); ?>" async defer></script><?php endif; ?>')
    .replaceAll('© 2025', '© <?= date("Y"); ?>').replaceAll('All computational rights reserved.', 'All rights reserved.');
  html = `<?php require __DIR__ . '${isStudio ? '/../' : '/'}include/site-session.php'; ?>\n` + html;
  await fs.writeFile(output, refineContent(html).replace(/[ \t]+$/gm, ''));
}
await fs.writeFile('scripts/reference-assets.json', JSON.stringify(downloads, null, 2));
console.log(`Imported both pages; ${downloads.length} reference images to download.`);
