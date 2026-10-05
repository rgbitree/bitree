// Render the marketing site's sample POS in two preview themes.
// Run with the PartFlow marketing site available through Laravel Herd.
const { chromium } = require('playwright');

(async () => {
  const browser = await chromium.launch({ channel: 'chrome' });
  try {
    const page = await browser.newPage({ viewport: { width: 1600, height: 1100 }, deviceScaleFactor: 2, reducedMotion: 'reduce' });
    await page.goto('http://partflow-auto-website.test', { waitUntil: 'networkidle' });
    await page.evaluate(() => document.fonts.ready);
    const preview = page.getByRole('figure', { name: 'Point of sale preview with sample data', exact: true });
    await preview.screenshot({ path: 'assets/img/showcase/partflow-pos-preview.png' });
    await preview.evaluate(root => {
      root.setAttribute('data-preview-theme', 'dark');
      for (const element of [root, ...root.querySelectorAll('*')]) {
        const classes = element.getAttribute('class') || '';
        if (/bg-white/.test(classes)) element.style.backgroundColor = '#142139';
        if (/bg-canvas/.test(classes)) element.style.backgroundColor = '#0a1630';
        if (/bg-slate-100/.test(classes)) element.style.backgroundColor = '#26354d';
        if (/bg-slate-300/.test(classes)) element.style.backgroundColor = '#64748b';
        if (/bg-ember-50(?:\s|\/|$)/.test(classes)) element.style.backgroundColor = '#30251f';
        if (/bg-navy-950\/5/.test(classes)) element.style.backgroundColor = '#26354d';
        if (/bg-emerald-50/.test(classes)) element.style.backgroundColor = '#103c32';
        if (/bg-rose-50/.test(classes)) element.style.backgroundColor = '#442330';
        if (/text-navy-|text-slate-700/.test(classes)) element.style.color = '#edf2f8';
        if (/text-slate-[456]00/.test(classes)) element.style.color = '#a9b8ce';
        if (/text-ember-/.test(classes)) element.style.color = '#ffaf76';
        if (/text-emerald-/.test(classes)) element.style.color = '#6ee7b7';
        if (/text-rose-/.test(classes)) element.style.color = '#fda4af';
        if (/border-slate-/.test(classes)) element.style.borderColor = '#34445e';
        if (/border-ember-/.test(classes)) element.style.borderColor = '#a95b2b';
        if (/ring-slate-/.test(classes)) element.style.setProperty('--tw-ring-color', '#34445e');
        if (/bg-ember-500/.test(classes)) element.style.color = '#0a1630';
      }
      root.style.color = '#edf2f8';
    });
    await preview.screenshot({ path: 'assets/img/showcase/partflow-pos-preview-dark.png' });
  } finally {
    await browser.close();
  }
})().catch(error => { console.error(error); process.exitCode = 1; });
