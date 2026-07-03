<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Bitree Studio</title>
  <meta name="description" content="Bitree Studio is the creative media, branding, and content side of Bitree.">

  <link href="/assets/img/favicon.png" rel="icon">
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            studio: {
              green: '#05ea76',
              yellow: '#ffcd00',
              cyan: '#00a7c8',
              rose: '#ff4f87',
              black: '#111111'
            }
          },
          fontFamily: {
            sans: ['Inter', 'system-ui', 'sans-serif'],
            display: ['Raleway', 'Inter', 'sans-serif']
          }
        }
      }
    };
  </script>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/assets/css/main.css" rel="stylesheet">

  <style>
    :root {
      --studio-bg: #111111;
      --studio-panel: #1f1f1f;
      --studio-ink: #f8f7f3;
      --studio-muted: #c4cbc6;
      --studio-green: #05ea76;
      --studio-yellow: #ffcd00;
      --studio-cyan: #00a7c8;
      --studio-rose: #ff4f87;
      --studio-line: rgba(255, 255, 255, 0.12);
    }

    body {
      background:
        radial-gradient(circle at top left, rgba(5, 234, 118, 0.22), transparent 30%),
        radial-gradient(circle at 82% 14%, rgba(255, 205, 0, 0.18), transparent 26%),
        radial-gradient(circle at 12% 82%, rgba(0, 167, 200, 0.18), transparent 28%),
        var(--studio-bg);
      color: var(--studio-ink);
    }

    .studio-header {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 20;
      background: transparent;
      border-bottom: 1px solid transparent;
      backdrop-filter: blur(0);
      transition: background 0.3s ease, border-color 0.3s ease, backdrop-filter 0.3s ease, box-shadow 0.3s ease;
    }

    body.studio-scrolled .studio-header {
      background: rgba(17, 17, 17, 0.88);
      border-bottom-color: var(--studio-line);
      backdrop-filter: blur(16px);
      box-shadow: 0 14px 36px rgba(0, 0, 0, 0.28);
    }

    .studio-nav {
      min-height: 86px;
    }

    .studio-logo {
      width: min(250px, 56vw);
      height: auto;
      display: block;
    }

    .studio-nav-links {
      display: flex;
      align-items: center;
      gap: 24px;
    }

    .studio-link {
      color: var(--studio-ink);
      font-weight: 800;
      font-size: 14px;
    }

    .studio-link:hover {
      color: var(--studio-yellow);
    }

    .studio-pill {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 10px 16px;
      border-radius: 999px;
      background: var(--studio-green);
      color: #101010;
      font-weight: 900;
      white-space: nowrap;
    }

    .studio-hero {
      position: relative;
      overflow: hidden;
      min-height: 100vh;
      display: flex;
      align-items: center;
      padding: 140px 0 54px;
      background:
        linear-gradient(135deg, rgba(5, 234, 118, 0.08), transparent 34%),
        linear-gradient(315deg, rgba(255, 79, 135, 0.08), transparent 36%),
        transparent;
    }

    .studio-hero::before,
    .studio-hero::after {
      content: "";
      position: absolute;
      width: 44%;
      height: 42%;
      transform: rotate(-10deg);
      pointer-events: none;
      opacity: 0.16;
      z-index: 0;
    }

    .studio-hero::before {
      top: 70px;
      right: -10%;
      background: repeating-linear-gradient(135deg, var(--studio-yellow) 0 16px, transparent 16px 32px);
    }

    .studio-hero::after {
      left: -14%;
      bottom: 20px;
      background: repeating-linear-gradient(45deg, var(--studio-cyan) 0 14px, transparent 14px 28px);
    }

    .studio-hero .container {
      position: relative;
      z-index: 2;
    }

    .paint-splash {
      position: absolute;
      z-index: 1;
      pointer-events: none;
      opacity: 0.62;
      filter: saturate(1.15);
    }

    .paint-splash::before,
    .paint-splash::after {
      content: "";
      position: absolute;
      border-radius: 999px;
      background: currentColor;
    }

    .splash-one {
      top: 118px;
      left: 4%;
      width: 155px;
      height: 112px;
      color: var(--studio-yellow);
      background:
        radial-gradient(circle at 24% 32%, currentColor 0 16px, transparent 17px),
        radial-gradient(circle at 62% 22%, currentColor 0 10px, transparent 11px),
        radial-gradient(circle at 78% 58%, currentColor 0 20px, transparent 21px),
        radial-gradient(circle at 39% 68%, currentColor 0 34px, transparent 35px);
      transform: rotate(-18deg);
    }

    .splash-one::before {
      width: 12px;
      height: 12px;
      top: -10px;
      left: 94px;
      box-shadow: -86px 74px 0 -2px currentColor, 64px 96px 0 -1px currentColor;
    }

    .splash-one::after {
      width: 18px;
      height: 18px;
      right: -18px;
      top: 28px;
    }

    .splash-two {
      top: 28%;
      right: 6%;
      width: 180px;
      height: 140px;
      color: var(--studio-rose);
      background:
        radial-gradient(circle at 18% 58%, currentColor 0 22px, transparent 23px),
        radial-gradient(circle at 48% 34%, currentColor 0 42px, transparent 43px),
        radial-gradient(circle at 78% 48%, currentColor 0 24px, transparent 25px),
        radial-gradient(circle at 54% 78%, currentColor 0 18px, transparent 19px);
      transform: rotate(14deg);
    }

    .splash-two::before {
      width: 14px;
      height: 14px;
      left: -8px;
      top: 20px;
      box-shadow: 154px -18px 0 -1px currentColor, 118px 112px 0 1px currentColor;
    }

    .splash-two::after {
      width: 10px;
      height: 10px;
      right: 42px;
      bottom: -12px;
    }

    .splash-three {
      left: 46%;
      bottom: 40px;
      width: 126px;
      height: 96px;
      color: var(--studio-cyan);
      background:
        radial-gradient(circle at 28% 44%, currentColor 0 26px, transparent 27px),
        radial-gradient(circle at 70% 36%, currentColor 0 18px, transparent 19px),
        radial-gradient(circle at 56% 74%, currentColor 0 15px, transparent 16px);
      transform: rotate(24deg);
    }

    .splash-three::before {
      width: 9px;
      height: 9px;
      top: -8px;
      right: 24px;
      box-shadow: -76px 92px 0 -1px currentColor, 72px 58px 0 currentColor;
    }

    .splash-three::after {
      width: 13px;
      height: 13px;
      left: -12px;
      top: 44px;
    }

    .studio-eyebrow {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      color: var(--studio-yellow);
      font-size: 13px;
      font-weight: 900;
      letter-spacing: 0.12em;
      text-transform: uppercase;
      margin-bottom: 20px;
    }

    .studio-hero h1 {
      font-size: clamp(42px, 6.8vw, 88px);
      line-height: 0.98;
      font-weight: 950;
      max-width: 900px;
      margin-bottom: 24px;
    }

    .studio-hero h1 span {
      color: var(--studio-green);
    }

    .studio-hero p {
      max-width: 690px;
      color: var(--studio-muted);
      font-size: 17px;
      line-height: 1.75;
      margin-bottom: 34px;
    }

    .studio-actions {
      display: flex;
      flex-wrap: wrap;
      gap: 14px;
      margin-bottom: 34px;
    }

    .studio-btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      border-radius: 999px;
      padding: 13px 22px;
      font-weight: 900;
      border: 1px solid var(--studio-line);
      color: var(--studio-ink);
      transition: transform 0.25s ease, background-color 0.25s ease, color 0.25s ease;
    }

    .studio-btn.primary {
      background: var(--studio-green);
      color: #101010;
      border-color: var(--studio-green);
    }

    .studio-btn.yellow {
      background: var(--studio-yellow);
      color: #101010;
      border-color: var(--studio-yellow);
    }

    .studio-btn:hover {
      transform: translateY(-2px);
      background: var(--studio-yellow);
      color: #101010;
      border-color: var(--studio-yellow);
    }

    .studio-sticker-row {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
    }

    .studio-sticker {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 9px 13px;
      border: 1px solid var(--studio-line);
      border-radius: 999px;
      background: rgba(255, 255, 255, 0.075);
      color: var(--studio-muted);
      font-weight: 800;
      font-size: 13px;
    }

    .studio-board {
      position: relative;
      padding: 26px;
      border-radius: 16px;
      background: rgba(31, 31, 31, 0.92);
      border: 1px solid var(--studio-line);
      box-shadow: 0 24px 65px rgba(0, 0, 0, 0.35);
    }

    .studio-logo-stage {
      min-height: 330px;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 12px;
      background:
        linear-gradient(135deg, rgba(5, 234, 118, 0.22), transparent 42%),
        linear-gradient(315deg, rgba(255, 205, 0, 0.30), transparent 42%),
        #151515;
      border: 1px solid rgba(255, 255, 255, 0.10);
    }

    .studio-logo-stage img {
      width: min(430px, 92%);
      display: block;
      filter: drop-shadow(0 16px 40px rgba(0, 0, 0, 0.35));
    }

    .studio-note {
      position: absolute;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 12px 16px;
      border-radius: 12px;
      color: #101010;
      font-weight: 950;
      box-shadow: 0 18px 35px rgba(0, 0, 0, 0.25);
    }

    .studio-note.one {
      top: -18px;
      left: 28px;
      background: var(--studio-yellow);
      transform: rotate(-4deg);
    }

    .studio-note.two {
      right: -8px;
      bottom: 28px;
      background: var(--studio-green);
      transform: rotate(3deg);
    }

    .studio-marquee {
      overflow: hidden;
      padding: 18px 0;
      border-top: 1px solid var(--studio-line);
      border-bottom: 1px solid var(--studio-line);
      background: #101010;
    }

    .studio-marquee-track {
      display: flex;
      gap: 18px;
      width: max-content;
      animation: studio-marquee 24s linear infinite;
    }

    .studio-marquee span {
      color: #ffffff;
      font-size: clamp(16px, 2.35vw, 28px);
      font-weight: 950;
      text-transform: uppercase;
      white-space: nowrap;
    }

    .studio-marquee b {
      color: var(--studio-green);
    }

    @keyframes studio-marquee {
      from {
        transform: translateX(0);
      }
      to {
        transform: translateX(-50%);
      }
    }

    .studio-section {
      padding: 86px 0;
      background: rgba(17, 17, 17, 0.56);
    }

    .studio-section.alt {
      background:
        linear-gradient(135deg, rgba(5, 234, 118, 0.09), transparent 38%),
        linear-gradient(315deg, rgba(255, 205, 0, 0.08), transparent 34%),
        #171717;
    }

    .studio-section-title {
      max-width: 760px;
      margin-bottom: 38px;
    }

    .studio-section-title span {
      display: inline-block;
      color: var(--studio-rose);
      font-weight: 950;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      font-size: 13px;
      margin-bottom: 10px;
    }

    .studio-section-title h2 {
      font-size: clamp(30px, 4vw, 50px);
      line-height: 1.05;
      font-weight: 950;
      margin-bottom: 14px;
    }

    .studio-section-title p {
      color: var(--studio-muted);
      font-size: 16px;
      line-height: 1.7;
      margin: 0;
    }

    .studio-service {
      position: relative;
      height: 100%;
      padding: 28px;
      border-radius: 14px;
      background: rgba(31, 31, 31, 0.94);
      border: 1px solid var(--studio-line);
      overflow: hidden;
      transition: transform 0.25s ease, border-color 0.25s ease;
    }

    .studio-service::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 6px;
      background: var(--tile-color, var(--studio-green));
    }

    .studio-service:hover {
      transform: translateY(-8px) rotate(-1deg);
      border-color: var(--tile-color, var(--studio-green));
    }

    .studio-service i {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 54px;
      height: 54px;
      margin-bottom: 22px;
      border-radius: 14px;
      background: color-mix(in srgb, var(--tile-color, var(--studio-green)), transparent 82%);
      color: var(--tile-color, var(--studio-green));
      font-size: 26px;
    }

    .studio-service h3 {
      font-size: 24px;
      font-weight: 950;
      margin-bottom: 12px;
    }

    .studio-service p {
      color: var(--studio-muted);
      line-height: 1.7;
      margin: 0;
    }

    .studio-package {
      height: 100%;
      padding: 30px;
      border-radius: 14px;
      background: rgba(31, 31, 31, 0.94);
      border: 1px solid var(--studio-line);
    }

    .studio-package.featured {
      background:
        linear-gradient(135deg, rgba(5, 234, 118, 0.14), transparent 42%),
        #202020;
      border-color: rgba(5, 234, 118, 0.42);
    }

    .studio-package small {
      color: var(--studio-yellow);
      font-weight: 900;
      letter-spacing: 0.1em;
      text-transform: uppercase;
    }

    .studio-package h3 {
      margin: 10px 0 12px;
      font-size: 28px;
      font-weight: 950;
    }

    .studio-package p,
    .studio-package li {
      color: var(--studio-muted);
      line-height: 1.7;
    }

    .studio-package ul {
      padding: 0;
      margin: 20px 0 0;
      list-style: none;
    }

    .studio-package li {
      display: flex;
      gap: 10px;
      margin-bottom: 9px;
    }

    .studio-package li i {
      color: var(--studio-green);
    }

    .studio-steps {
      counter-reset: studio-step;
      display: grid;
      gap: 18px;
    }

    .studio-step {
      counter-increment: studio-step;
      display: grid;
      grid-template-columns: 76px 1fr;
      gap: 20px;
      align-items: start;
      padding: 22px;
      border-radius: 14px;
      background: rgba(31, 31, 31, 0.94);
      border: 1px solid var(--studio-line);
    }

    .studio-step::before {
      content: counter(studio-step, decimal-leading-zero);
      display: flex;
      align-items: center;
      justify-content: center;
      width: 64px;
      height: 64px;
      border-radius: 14px;
      background: var(--studio-yellow);
      color: #101010;
      font-weight: 950;
      font-size: 22px;
    }

    .studio-step h3 {
      font-size: 22px;
      font-weight: 950;
      margin-bottom: 6px;
    }

    .studio-step p {
      margin: 0;
      color: var(--studio-muted);
      line-height: 1.7;
    }

    .studio-cta {
      position: relative;
      overflow: hidden;
      padding: 76px 0;
      background:
        linear-gradient(120deg, rgba(5, 234, 118, 0.22), transparent 32%),
        linear-gradient(245deg, rgba(255, 205, 0, 0.28), transparent 42%),
        linear-gradient(315deg, rgba(255, 79, 135, 0.22), transparent 38%),
        linear-gradient(45deg, rgba(0, 167, 200, 0.18), transparent 36%),
        #111111;
    }

    .studio-cta .paint-splash {
      z-index: 0;
      opacity: 0.42;
    }

    .splash-four {
      top: 28px;
      right: 12%;
      width: 150px;
      height: 110px;
      color: var(--studio-green);
      background:
        radial-gradient(circle at 22% 42%, currentColor 0 28px, transparent 29px),
        radial-gradient(circle at 56% 34%, currentColor 0 18px, transparent 19px),
        radial-gradient(circle at 74% 70%, currentColor 0 22px, transparent 23px),
        radial-gradient(circle at 42% 76%, currentColor 0 14px, transparent 15px);
      transform: rotate(-12deg);
    }

    .splash-four::before {
      width: 10px;
      height: 10px;
      left: -8px;
      top: 20px;
      box-shadow: 128px -8px 0 2px currentColor, 84px 104px 0 -1px currentColor;
    }

    .splash-four::after {
      width: 16px;
      height: 16px;
      right: -12px;
      top: 58px;
    }

    .studio-cta-panel {
      position: relative;
      display: grid;
      grid-template-columns: 1fr auto;
      align-items: center;
      gap: 28px;
      padding: clamp(28px, 5vw, 46px);
      border-radius: 16px;
      overflow: hidden;
      background:
        linear-gradient(135deg, rgba(5, 234, 118, 0.20), transparent 34%),
        linear-gradient(300deg, rgba(255, 205, 0, 0.24), transparent 38%),
        rgba(22, 22, 22, 0.96);
      border: 1px solid rgba(255, 205, 0, 0.28);
      box-shadow: 0 28px 80px rgba(0, 0, 0, 0.36);
    }

    .studio-cta-panel::before,
    .studio-cta-panel::after {
      content: "";
      position: absolute;
      pointer-events: none;
    }

    .studio-cta-panel::before {
      inset: 0;
      background:
        linear-gradient(90deg, var(--studio-green), var(--studio-yellow), var(--studio-rose), var(--studio-cyan));
      height: 5px;
    }

    .studio-cta-panel::after {
      right: -80px;
      bottom: -120px;
      width: 280px;
      height: 280px;
      border: 1px solid rgba(255, 255, 255, 0.12);
      border-radius: 50%;
    }

    .studio-cta-panel > * {
      position: relative;
      z-index: 1;
    }

    .studio-cta h2 {
      font-size: clamp(30px, 4vw, 50px);
      font-weight: 950;
      margin-bottom: 10px;
      color: #ffffff;
    }

    .studio-cta p {
      color: rgba(255, 255, 255, 0.78);
      margin: 0;
      font-size: 16px;
      line-height: 1.7;
    }

    .data-systems-banner {
      padding: 34px 0 42px;
      background: #050505;
    }

    .data-systems-card {
      position: relative;
      display: grid;
      grid-template-columns: minmax(0, 1fr) auto;
      align-items: center;
      gap: 28px;
      padding: clamp(24px, 4vw, 42px);
      overflow: hidden;
      border-radius: 18px;
      background:
        linear-gradient(135deg, rgba(5, 234, 118, 0.18), transparent 42%),
        linear-gradient(315deg, rgba(5, 234, 118, 0.08), transparent 46%),
        #121111;
      border: 1px solid rgba(5, 234, 118, 0.28);
      box-shadow: 0 24px 70px rgba(0, 0, 0, 0.36);
    }

    .data-systems-card::before {
      content: "";
      position: absolute;
      inset: auto -6% -40% auto;
      width: 360px;
      height: 360px;
      border: 1px solid rgba(5, 234, 118, 0.24);
      border-radius: 50%;
      pointer-events: none;
    }

    .data-systems-copy {
      position: relative;
      z-index: 1;
      display: flex;
      align-items: center;
      gap: 22px;
    }

    .data-systems-logo {
      width: min(260px, 46vw);
      height: auto;
      flex: 0 0 auto;
    }

    .data-systems-label {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      color: var(--studio-green);
      font-size: 12px;
      font-weight: 950;
      letter-spacing: 0.16em;
      text-transform: uppercase;
      margin-bottom: 10px;
    }

    .data-systems-copy h2 {
      font-size: clamp(28px, 4vw, 48px);
      line-height: 1.02;
      font-weight: 950;
      margin: 0 0 10px;
      color: #ffffff;
    }

    .data-systems-copy p {
      max-width: 560px;
      margin: 0;
      color: rgba(255, 255, 255, 0.72);
      line-height: 1.7;
    }

    .data-systems-action {
      position: relative;
      z-index: 1;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      padding: 15px 22px;
      border-radius: 999px;
      background: var(--studio-green);
      color: #121111;
      font-weight: 950;
      white-space: nowrap;
      box-shadow: 0 14px 30px rgba(5, 234, 118, 0.2);
    }

    .data-systems-action:hover {
      color: #121111;
      transform: translateY(-2px);
      box-shadow: 0 18px 38px rgba(5, 234, 118, 0.28);
    }

    .studio-footer {
      padding: 32px 0;
      background: #050505;
      color: var(--studio-muted);
      font-size: 14px;
      border-top: 1px solid rgba(255, 255, 255, 0.06);
    }

    .studio-footer a {
      color: var(--studio-green);
      font-weight: 800;
    }

    .studio-footer a:hover {
      color: var(--studio-yellow);
    }

    @media (max-width: 991px) {
      .studio-nav {
        gap: 16px;
      }

      .studio-nav-links {
        gap: 14px;
      }

      .studio-pill {
        display: none;
      }

      .studio-note {
        position: static;
        width: fit-content;
        margin-top: 14px;
      }

      .studio-note.two {
        margin-left: auto;
      }

      .studio-cta-panel {
        grid-template-columns: 1fr;
      }

      .data-systems-card {
        grid-template-columns: 1fr;
      }

      .data-systems-copy {
        align-items: flex-start;
        flex-direction: column;
      }

      .data-systems-logo {
        width: min(230px, 68vw);
      }
    }

    @media (max-width: 575px) {
      .studio-hero {
        min-height: auto;
        padding-top: 116px;
      }

      .studio-nav {
        min-height: auto;
        padding: 14px 0;
      }

      .studio-nav-links {
        display: none;
      }

      .studio-actions .studio-btn {
        width: 100%;
      }

      .data-systems-action {
        width: 100%;
      }

      .studio-step {
        grid-template-columns: 1fr;
      }

      .paint-splash {
        opacity: 0.32;
        transform: scale(0.72);
      }

      .splash-one {
        left: -28px;
      }

      .splash-two {
        right: -44px;
      }

      .splash-three {
        display: none;
      }
    }
  </style>
</head>

<body>
  <header class="studio-header">
    <div class="container studio-nav d-flex align-items-center justify-content-between">
      <a href="/studio/" aria-label="Bitree Studio home">
        <img src="/assets/img/brand/bitree-studio-logo.png" alt="Bitree Studio" class="studio-logo">
      </a>
      <nav class="studio-nav-links">
        <a href="#services" class="studio-link">Services</a>
        <a href="#packages" class="studio-link">Packages</a>
        <a href="/" class="studio-link">Data Systems</a>
        <a href="mailto:bitreemw@gmail.com?subject=Bitree%20Studio%20Inquiry" class="studio-pill">
          Book Studio <span class="ui-icon ui-icon-arrow-right" aria-hidden="true"></span>
        </a>
      </nav>
    </div>
  </header>

  <main>
    <section class="studio-hero">
      <span class="paint-splash splash-one" aria-hidden="true"></span>
      <span class="paint-splash splash-two" aria-hidden="true"></span>
      <span class="paint-splash splash-three" aria-hidden="true"></span>
      <div class="container">
        <div class="row align-items-center g-5">
          <div class="col-lg-7" data-aos="fade-right">
            <span class="studio-eyebrow"><span class="ui-icon ui-icon-stars" aria-hidden="true"></span> Creative Side of Bitree</span>
            <h1>Brands with <span>spark</span>. Content with rhythm.</h1>
            <p>
              Bitree Studio creates visual identities, campaign assets, digital content, and media
              direction for teams that want their brand to feel sharp, alive, and unmistakably theirs.
            </p>
            <div class="studio-actions">
              <a href="mailto:bitreemw@gmail.com?subject=Bitree%20Studio%20Inquiry" class="studio-btn primary">
                Start a Studio Project <span class="ui-icon ui-icon-arrow-right" aria-hidden="true"></span>
              </a>
              <a href="/" class="studio-btn">
                Visit Data Systems <span class="ui-icon ui-icon-diagram-3" aria-hidden="true"></span>
              </a>
            </div>
            <div class="studio-sticker-row">
              <span class="studio-sticker"><span class="ui-icon ui-icon-palette2" aria-hidden="true"></span> Brand kits</span>
              <span class="studio-sticker"><span class="ui-icon ui-icon-camera-reels" aria-hidden="true"></span> Media direction</span>
              <span class="studio-sticker"><span class="ui-icon ui-icon-grid-3x3-gap" aria-hidden="true"></span> Social content</span>
              <span class="studio-sticker"><span class="ui-icon ui-icon-window-stack" aria-hidden="true"></span> Interface visuals</span>
            </div>
          </div>
          <div class="col-lg-5" data-aos="fade-left">
            <div class="studio-board">
              <div class="studio-logo-stage">
                <img src="/assets/img/brand/bitree-studio-logo.png" alt="Bitree Studio logo">
              </div>
              <div class="studio-note one"><span class="ui-icon ui-icon-lightning-charge-fill" aria-hidden="true"></span> Fresh visuals</div>
              <div class="studio-note two"><span class="ui-icon ui-icon-magic" aria-hidden="true"></span> Made for attention</div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="studio-marquee" aria-label="Studio capabilities">
      <div class="studio-marquee-track">
        <span>Brand Identity <b>/</b></span>
        <span>Social Content <b>/</b></span>
        <span>Campaign Design <b>/</b></span>
        <span>Media Direction <b>/</b></span>
        <span>Pitch Decks <b>/</b></span>
        <span>Brand Identity <b>/</b></span>
        <span>Social Content <b>/</b></span>
        <span>Campaign Design <b>/</b></span>
        <span>Media Direction <b>/</b></span>
        <span>Pitch Decks <b>/</b></span>
      </div>
    </section>

    <section id="services" class="studio-section">
      <div class="container">
        <div class="studio-section-title" data-aos="fade-up">
          <span>What we make</span>
          <h2>Creative work that gives the business side a better outfit.</h2>
          <p>
            Studio work is separate from Bitree Data Systems, but it keeps the same discipline:
            clear thinking, useful structure, and polished delivery.
          </p>
        </div>

        <div class="row g-4">
          <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
            <div class="studio-service" style="--tile-color: var(--studio-green);">
              <span class="ui-icon ui-icon-palette2" aria-hidden="true"></span>
              <h3>Brand Identity</h3>
              <p>Logos, visual direction, brand kits, launch palettes, and practical brand rules.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="160">
            <div class="studio-service" style="--tile-color: var(--studio-yellow);">
              <span class="ui-icon ui-icon-camera-reels" aria-hidden="true"></span>
              <h3>Media Direction</h3>
              <p>Photo, video, product, and campaign direction for social and commercial channels.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="220">
            <div class="studio-service" style="--tile-color: var(--studio-cyan);">
              <span class="ui-icon ui-icon-grid-3x3-gap" aria-hidden="true"></span>
              <h3>Digital Content</h3>
              <p>Social graphics, templates, announcements, launches, and weekly content systems.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="280">
            <div class="studio-service" style="--tile-color: var(--studio-rose);">
              <span class="ui-icon ui-icon-window-stack" aria-hidden="true"></span>
              <h3>Product Visuals</h3>
              <p>Dashboard polish, pitch visuals, app screens, and product explainers with bite.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="packages" class="studio-section alt">
      <div class="container">
        <div class="studio-section-title" data-aos="fade-up">
          <span>Studio packages</span>
          <h2>Pick the creative lane that matches your moment.</h2>
          <p>From a clean starter identity to an ongoing content rhythm, each package is built to ship.</p>
        </div>

        <div class="row g-4">
          <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="studio-package">
              <small>Starter</small>
              <h3>Brand Spark</h3>
              <p>For businesses that need a memorable identity and a practical visual foundation.</p>
              <ul>
                <li><span class="ui-icon ui-icon-check-circle-fill" aria-hidden="true"></span> Logo direction</li>
                <li><span class="ui-icon ui-icon-check-circle-fill" aria-hidden="true"></span> Color and type palette</li>
                <li><span class="ui-icon ui-icon-check-circle-fill" aria-hidden="true"></span> Basic brand kit</li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="160">
            <div class="studio-package featured">
              <small>Popular</small>
              <h3>Content Pulse</h3>
              <p>For teams that need fresh social assets and campaigns without starting from zero each week.</p>
              <ul>
                <li><span class="ui-icon ui-icon-check-circle-fill" aria-hidden="true"></span> Monthly content templates</li>
                <li><span class="ui-icon ui-icon-check-circle-fill" aria-hidden="true"></span> Campaign visuals</li>
                <li><span class="ui-icon ui-icon-check-circle-fill" aria-hidden="true"></span> Launch and promo assets</li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="220">
            <div class="studio-package">
              <small>Custom</small>
              <h3>Studio Buildout</h3>
              <p>For brands that need deeper creative direction across identity, media, and product visuals.</p>
              <ul>
                <li><span class="ui-icon ui-icon-check-circle-fill" aria-hidden="true"></span> Full identity refresh</li>
                <li><span class="ui-icon ui-icon-check-circle-fill" aria-hidden="true"></span> Media art direction</li>
                <li><span class="ui-icon ui-icon-check-circle-fill" aria-hidden="true"></span> Product and pitch visuals</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="studio-section">
      <div class="container">
        <div class="row g-5 align-items-start">
          <div class="col-lg-5" data-aos="fade-right">
            <div class="studio-section-title mb-0">
              <span>How it works</span>
              <h2>Playful does not mean random.</h2>
              <p>Every project gets a simple creative path, so the final work feels expressive and useful.</p>
            </div>
          </div>
          <div class="col-lg-7" data-aos="fade-left">
            <div class="studio-steps">
              <div class="studio-step">
                <div>
                  <h3>Find the feeling</h3>
                  <p>We map the audience, tone, offer, and visual personality before making assets.</p>
                </div>
              </div>
              <div class="studio-step">
                <div>
                  <h3>Build the visual language</h3>
                  <p>We create the palette, shapes, typography, layouts, and content direction.</p>
                </div>
              </div>
              <div class="studio-step">
                <div>
                  <h3>Ship the assets</h3>
                  <p>You get polished files, usable templates, and clear guidance for keeping things consistent.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="studio-cta">
      <span class="paint-splash splash-four" aria-hidden="true"></span>
      <div class="container">
        <div class="studio-cta-panel" data-aos="fade-up">
          <div>
            <h2>Ready to make the brand feel alive?</h2>
            <p>Send the project idea, launch date, or rough creative need. The Studio can shape it from there.</p>
          </div>
          <a href="mailto:bitreemw@gmail.com?subject=Bitree%20Studio%20Inquiry" class="studio-btn yellow">
            Start with Bitree Studio <span class="ui-icon ui-icon-arrow-right" aria-hidden="true"></span>
          </a>
        </div>
      </div>
    </section>

    <section class="data-systems-banner" aria-label="Bitree Data and Systems">
      <div class="container">
        <div class="data-systems-card" data-aos="fade-up">
          <div class="data-systems-copy">
            <img class="data-systems-logo" src="/assets/img/brand/bitree-data-systems-logo.png" alt="Bitree Data & Systems">
            <div>
              <span class="data-systems-label">Bitree Data & Systems</span>
              <h2>Need the systems side of Bitree?</h2>
              <p>Move from creative brand work into structured data, dashboards, operations tools, and intelligent business systems.</p>
            </div>
          </div>
          <a class="data-systems-action" href="/">
            Visit Data & Systems <span class="ui-icon ui-icon-arrow-right" aria-hidden="true"></span>
          </a>
        </div>
      </div>
    </section>
  </main>

  <footer class="studio-footer">
    <div class="container d-flex flex-column flex-md-row gap-2 justify-content-between">
      <span>&copy; Copyright Bitree Studio. All Rights Reserved</span>
      <span>bitreemw@gmail.com</span>
    </div>
  </footer>

  <script src="/assets/vendor/aos/aos.js"></script>
  <script>
    const toggleStudioHeader = () => {
      document.body.classList.toggle("studio-scrolled", window.scrollY > 12);
    };
    window.addEventListener("scroll", toggleStudioHeader, { passive: true });
    window.addEventListener("load", toggleStudioHeader);
    AOS.init({ duration: 650, easing: "ease-in-out", once: true });
  </script>
</body>

</html>
