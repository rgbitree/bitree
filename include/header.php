<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Bitree</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="/assets/img/favicon.png" rel="icon">
  <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Tailwind CSS -->
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            bitree: {
              green: '#05ea76',
              black: '#121111',
              charcoal: '#1a1a1a'
            }
          },
          fontFamily: {
            sans: ['Roboto', 'system-ui', 'sans-serif'],
            heading: ['Raleway', 'sans-serif']
          }
        }
      }
    };
  </script>
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="/assets/css/main.css" rel="stylesheet">
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">

      <a href="/" class="logo d-flex align-items-center me-auto me-xl-0">
             <img class="brand-logo" src="/assets/img/brand/bitree-data-systems-logo.png" alt="Bitree Data & Systems">
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="/#hero" class="active">Home</a></li>
          <li><a href="/#about">About</a></li>
          <li><a href="/#features">Features</a></li>
          <li><a href="/#services">Services</a></li>
          <li><a href="/#pricing">Pricing</a></li>
          <li><a href="/studio/">Studio</a></li>
          <li><a href="/#contact">Contact</a></li>
        </ul>
        <button class="mobile-nav-toggle xl:hidden" type="button" aria-label="Open menu">
          <span class="ui-icon ui-icon-list" aria-hidden="true"></span>
        </button>
      </nav>

      <a class="btn-getstarted" href="/#about">Get Started</a>

    </div>
  </header>
