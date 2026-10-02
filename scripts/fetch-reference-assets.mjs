import fs from 'node:fs/promises';
const assets = JSON.parse(await fs.readFile('scripts/reference-assets.json', 'utf8'));
await Promise.all(assets.map(async ({ url, path }) => {
  const response = await fetch(url);
  if (!response.ok) { console.warn(`${path}: HTTP ${response.status}; using project assets instead.`); return; }
  await fs.writeFile(path, Buffer.from(await response.arrayBuffer()));
  console.log(`Saved ${path}`);
}));
const families = ['Geist:wght@400;500;600;700', 'Inter:wght@400;500;600', 'JetBrains+Mono:wght@400;500;600', 'Space+Grotesk:wght@500;600;700', 'Plus+Jakarta+Sans:wght@400;500;600;700', 'Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0'];
const pages = (await Promise.all(['index.php', 'bitree-studio/index.php'].map(path => fs.readFile(path, 'utf8')))).join('');
const iconNames = [...new Set([...pages.matchAll(/class="material-symbols-outlined[^>]*>([^<]+)</g)].map(match => match[1].trim()))].sort().join(',');
let result = '';
for (const [i, family] of families.entries()) {
  const subset = family.startsWith('Material') ? `&icon_names=${encodeURIComponent(iconNames)}` : '';
  const response = await fetch(`https://fonts.googleapis.com/css2?family=${family}&display=swap${subset}`, { headers: { 'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36' } });
  if (!response.ok) throw new Error(`Font CSS: ${response.status}`);
  let css = await response.text();
  const latinBlocks = [...css.matchAll(/\/\* latin \*\/([\s\S]*?)(?=\/\*|$)/g)];
  if (latinBlocks.length) css = latinBlocks.map(match => match[1]).join('\n');
  const urls = [...new Set([...css.matchAll(/url\((https:[^)]+)\)/g)].map(m => m[1]))];
  for (const [j, url] of urls.entries()) {
    const path = `assets/fonts/font-${i}-${j}.${css.includes("format('woff2')") ? 'woff2' : 'ttf'}`;
    const font = await fetch(url);
    if (!font.ok) throw new Error(`Font download: ${font.status}`);
    await fs.writeFile(path, Buffer.from(await font.arrayBuffer()));
    css = css.replaceAll(url, `/${path}`);
  }
  result += css + '\n';
}
await fs.writeFile('assets/css/fonts.css', result);
for (const file of await fs.readdir('assets/fonts')) {
  if (/^font-\d+-\d+\.ttf$/.test(file) && !result.includes(file)) await fs.unlink(`assets/fonts/${file}`);
}
console.log('Saved local font styles and files.');
