const { chromium } = require('playwright');
const fs = require('node:fs');
(async () => {
  fs.mkdirSync('.qa', { recursive: true });
  const browser = await chromium.launch({ headless: true, ...(process.env.CHROMIUM_PATH ? { executablePath: process.env.CHROMIUM_PATH } : { channel: 'chrome' }) });
  const failures = [];
  for (const width of [1440, 390, 768]) {
    const page = await browser.newPage({ viewport: { width, height: 1000 }, reducedMotion: 'reduce' });
    page.on('pageerror', e => failures.push(e.message));
    for (const [name, route] of [['data', '/'], ['studio', '/studio/'], ['pricing', '/pricing/']]) {
      await page.goto('http://bitree.test' + route, { waitUntil: 'networkidle' });
      await page.evaluate(async () => {
        document.querySelectorAll('img').forEach(img => img.loading = 'eager');
        await Promise.all([...document.images].map(img => img.decode().catch(() => {})));
        await document.fonts.ready;
      });
      const results = await page.evaluate(() => ({
        title: document.title,
        overflow: document.documentElement.scrollWidth > innerWidth,
        brokenImages: [...document.images].filter(i => !i.complete || !i.naturalWidth).map(i => i.src),
        brokenAnchors: [...document.querySelectorAll('a[href^="#"]')].map(a => a.getAttribute('href')).filter(h => h === '#' || !document.getElementById(h.slice(1))),
        csrf: !document.querySelector('form') || Boolean(document.querySelector('[name=csrf_token]')?.value.match(/^[a-f0-9]{64}$/)),
      }));
      console.log(name, width, JSON.stringify(results));
      if (results.overflow || results.brokenImages.length || results.brokenAnchors.length || !results.csrf) failures.push(`${name} ${width}: ${JSON.stringify(results)}`);
      if (width < 1200) {
        await page.getByRole('button', { name: 'Menu', exact: true }).click();
        if (!await page.locator('.site-nav').isVisible()) failures.push('Menu did not open');
        await page.keyboard.press('Escape');
        if (await page.locator('.site-nav').isVisible()) failures.push('Menu did not close');
      }
      if (name === 'studio') {
        if (await page.locator('#showcase [data-tone]').count()) failures.push('Removed palette controls still present');
        if (await page.locator('#what-we-do h3').count() !== 3) failures.push('Expected three Studio services');
      }
      if (await page.evaluate(() => document.getAnimations().some(a => a.playState === 'running'))) failures.push('Animation running under reduced motion');
      await page.screenshot({ path: `.qa/${name}-${width}.png`, fullPage: true });
      if (width === 1440) await page.screenshot({ path: `.qa/${name}-desktop-top.png` });
    }
    await page.close();
  }
  const page = await browser.newPage();
  for (const route of ['/', '/studio/']) {
    await page.goto('http://bitree.test' + route);
    await page.locator('[name=name]').fill('QA Preview');
    await page.locator('[name=email]').fill('preview@example.com');
    await page.locator('[name=message]').fill('Local browser validation; no email will be sent.');
    if (route === '/') await page.locator('[name=subject]').fill('QA');
    let submitted;
    await page.route('**/contact/', async handler => {
      submitted = handler.request().postData();
      await handler.fulfill({ status: 503, contentType: 'application/json', body: JSON.stringify({ success: false, message: 'Test service unavailable' }) });
    });
    // This test intercepts the network request and never delivers an inquiry.
    await page.evaluate(() => document.querySelector('form').setAttribute('data-recaptcha-site-key', ''));
    await page.locator('button[type=submit]').click();
    await page.locator('.error-message').waitFor({ state: 'visible' });
    if (await page.locator('button[type=submit]').isDisabled()) failures.push('Submit did not recover');
    if (route === '/studio/' && !submitted.includes('Target timeline')) failures.push('Studio timeline missing');
    await page.unroute('**/contact/');
    await page.route('**/contact/', handler => handler.fulfill({ contentType: 'application/json', body: JSON.stringify({ success: true, message: 'Test inquiry accepted' }) }));
    await page.locator('button[type=submit]').click();
    await page.locator('.sent-message').waitFor({ state: 'visible' });
    if (await page.locator('[name=name]').inputValue()) failures.push('Successful form was not reset');
    await page.unroute('**/contact/');
  }
  await browser.close();
  console.log('Failures:', JSON.stringify(failures, null, 2));
  process.exitCode = failures.length ? 1 : 0;
})().catch(e => { console.error(e); process.exitCode = 1; });
