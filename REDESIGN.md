# Bitree website redesign

The PHP sites implement the two supplied `uibuilder` exports and their separate
design systems: dark emerald Data Systems and bright, colorful Studio. The full
pricing page uses the Data Systems theme and retains the existing package prices.

## Build and preview

Serve the repository with PHP/Herd (the local site is `http://bitree.test`).
Run `npm ci` and `npm run build` after changing Tailwind classes or configuration.
The compiled CSS, fonts, and images are committed assets; Node is not needed in
production. Shared responsive styles live in `assets/css/site-refinements.css`.

Both inquiry forms use `/contact/`, the existing session CSRF token, honeypot,
reCAPTCHA configuration, and email/database handler. Studio includes the selected
creative focus and timeline in its submission. Email delivery still depends on
the existing production database, SMTP, and CAPTCHA settings in `include/.env`.

## Verification

`node scripts/check-sites.cjs` checks the local Herd site at desktop, mobile, and
tablet widths. It uses installed Chrome, or `CHROMIUM_PATH` when supplied. It checks
images, fragment links, overflow, CSRF fields, mobile menu behavior, and intercepted
form success/error responses. It does not send real inquiries. Screenshots go in
the ignored `.qa` directory.

## Design assets

Reference images and fonts are stored locally. Studio showcase images are labeled
as concept work. The data console is labeled as illustrative sample data.

The reference Studio hero URL returned HTTP 403, so the built-in imagegen tool
created `assets/img/redesign/studio-hero.png`; the site serves a compact JPEG copy.
Prompt: a photorealistic wide 16:9
sunlit creative workbench with lime, cyan, and coral branding collateral, packaging,
posters, laptop, phone, plants, and natural paper textures; fictional AURA concept
branding, no Bitree logo, claims, overlay UI, or watermark.

`scripts/import-reference.mjs` and `scripts/finish-redesign.cjs` record the initial
migration. They overwrite page templates; they are not part of the normal build.
`scripts/fetch-reference-assets.mjs` records asset provenance and can refresh local
reference images/fonts when their source URLs remain available.
