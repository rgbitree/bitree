<?php
session_start();
require_once __DIR__ . '/include/env.php';
bitree_load_env(__DIR__ . '/include/.env');

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$recaptchaSiteKey = bitree_env('SITE_KEY', '');

include 'include/header.php';
?>

<main class="main">

<!-- Hero Section -->
<section id="hero" class="hero section">
  <div class="container">
    <div class="hero-wrapper">

      <div class="hero-main-content text-center">
        <h1 class="hero-title" data-aos="zoom-in" data-aos-delay="200">
          Build Smarter Systems With<br>
          <span class="typed" data-typed-items="Data Engineering,Scalable Systems,Actionable Insights"></span>
        </h1>

        <p class="hero-description" data-aos="fade-up" data-aos-delay="300">
          Bitree Data Systems helps organizations structure their data, streamline operations, and transform information into clear insights that drive smarter decisions and sustainable growth.
        </p>

        <div class="hero-actions" data-aos="fade-up" data-aos-delay="400">
          <a href="#" class="action-btn primary">
            <span>Explore Our Solutions</span>
            <i class="bi bi-arrow-right"></i>
          </a>
          <a href="#contact" class="action-btn secondary glightbox">
            <i class="bi bi-play-circle"></i>
            <span>Start a Project</span>
          </a>
        </div>

      </div>

    </div>
  </div>
</section><!-- /Hero Section -->

<!-- Dashboard Showcase Section -->
<section id="dashboard-showcase" class="dashboard-showcase section">
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="dashboard-frame">
      <div class="dashboard-screen">
        <img src="assets/img/showcase/partflow-dashboard.png" class="img-fluid" alt="PartFlow operations dashboard">

        <div class="dashboard-float dashboard-float-data" data-aos="fade-right" data-aos-delay="200">
          <div class="dashboard-float-icon">
            <i class="bi bi-diagram-3"></i>
          </div>
          <div>
            <h4>Data</h4>
            <p>Structured & Connected</p>
          </div>
        </div>

        <div class="dashboard-float dashboard-float-systems" data-aos="fade-left" data-aos-delay="250">
          <div class="dashboard-float-icon">
            <i class="bi bi-cpu"></i>
          </div>
          <div>
            <h4>Systems</h4>
            <p>Scalable & Intelligent</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- /Dashboard Showcase Section -->


<!-- About Section -->
<section id="about" class="about section">

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row align-items-center justify-content-between g-lg-5">
      <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
        <div class="image-wrapper">
          <img src="assets/img/about/about.png" class="img-fluid rounded" alt="About Bitree">
        </div>
      </div>

      <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
        <div class="content">
          <h2 class="mb-4">About Bitree</h2>
          <h5 class="mb-4">Transforming data into structured, intelligent systems</h5>

          <p>
            Bitree Data Systems is a technology company specializing in data engineering, analytics, and custom system development. We partner with startups, SMEs, and established organizations to design solutions that improve operations and enable data-driven decision-making.
          </p>

          <p>
            Our work sits at the intersection of data and operations—helping organizations move from fragmented processes to integrated, efficient systems that provide clarity and insight.
          </p>

          <div class="features-list mt-5" data-aos="fade-up" data-aos-delay="400">
            <div class="row g-4">

              <div class="col-md-6">
                <div class="feature-item">
                  <i class="bi bi-database"></i>
                  <h5>Data Structuring</h5>
                  <p>Organizing and managing data for consistency, accessibility, and scalability.</p>
                </div>
              </div>

              <div class="col-md-6">
                <div class="feature-item">
                  <i class="bi bi-gear"></i>
                  <h5>System Development</h5>
                  <p>Building scalable systems that streamline and automate business processes.</p>
                </div>
              </div>

              <div class="col-md-6">
                <div class="feature-item">
                  <i class="bi bi-bar-chart"></i>
                  <h5>Analytics & Insights</h5>
                  <p>Transforming data into actionable insights for better decision-making.</p>
                </div>
              </div>

              <div class="col-md-6">
                <div class="feature-item">
                  <i class="bi bi-diagram-2"></i>
                  <h5>Integrated Operations</h5>
                  <p>Connecting systems and processes for efficiency and operational clarity.</p>
                </div>
              </div>

            </div>
          </div>

          <div class="mt-5" data-aos="fade-up" data-aos-delay="600">
            <a href="#" class="btn btn-primary me-3">Learn More</a>
            <a href="#contact" class="btn btn-outline-primary">Contact Us</a>
          </div>
        </div>
      </div>
    </div>

  </div>

</section><!-- /About Section -->

<!-- Features Section -->
<section id="features" class="features section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Capabilities</h2>
    <p>Helping organizations move from fragmented processes to structured, intelligent systems</p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row align-items-center mb-5">
      <div class="col-lg-6" data-aos="fade-right" data-aos-delay="150">
        <div class="intro-content">
          <h2>Designed for clarity, efficiency, and smarter decisions</h2>
          <p>
            At Bitree, we focus on building systems and data environments that simplify complexity. 
            Our approach ensures organizations gain visibility into their operations, reduce inefficiencies, 
            and make decisions based on reliable, structured information.
          </p>
          <div class="feature-stats">
            <div class="stat-item">
              <span class="stat-number">100%</span>
              <span class="stat-label">Tailored Solutions</span>
            </div>
            <div class="stat-item">
              <span class="stat-number">Data-Driven</span>
              <span class="stat-label">Approach</span>
            </div>
            <div class="stat-item">
              <span class="stat-number">Scalable</span>
              <span class="stat-label">Systems</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
        <div class="intro-image">
          <img src="assets/img/features/features-1.jpg" alt="Bitree Capabilities" class="img-fluid">
        </div>
      </div>
    </div>

    <div class="features-grid">

      <div class="feature-item" data-aos="flip-up" data-aos-delay="250">
        <div class="feature-number">01</div>
        <div class="feature-content">
          <div class="feature-icon">
            <i class="bi bi-diagram-3"></i>
          </div>
          <h4>Structured Data Environments</h4>
          <p>
            We help organizations organize and centralize their data, transforming scattered information into structured systems that are easy to manage and use.
          </p>
          <div class="feature-tags">
            <span class="tag">Clarity</span>
            <span class="tag">Organization</span>
          </div>
        </div>
      </div>

      <div class="feature-item" data-aos="flip-up" data-aos-delay="300">
        <div class="feature-number">02</div>
        <div class="feature-content">
          <div class="feature-icon">
            <i class="bi bi-layers"></i>
          </div>
          <h4>Integrated Systems</h4>
          <p>
            We design systems that connect different parts of your business, reducing duplication and creating a seamless flow of information across operations.
          </p>
          <div class="feature-tags">
            <span class="tag">Integration</span>
            <span class="tag">Efficiency</span>
          </div>
        </div>
      </div>

      <div class="feature-item" data-aos="flip-up" data-aos-delay="350">
        <div class="feature-number">03</div>
        <div class="feature-content">
          <div class="feature-icon">
            <i class="bi bi-eye"></i>
          </div>
          <h4>Operational Visibility</h4>
          <p>
            Gain a clear view of your business performance through structured data and reporting systems that highlight what matters most.
          </p>
          <div class="feature-tags">
            <span class="tag">Insights</span>
            <span class="tag">Transparency</span>
          </div>
        </div>
      </div>

      <div class="feature-item" data-aos="flip-up" data-aos-delay="400">
        <div class="feature-number">04</div>
        <div class="feature-content">
          <div class="feature-icon">
            <i class="bi bi-graph-up-arrow"></i>
          </div>
          <h4>Informed Decision-Making</h4>
          <p>
            Replace guesswork with data-backed insights, enabling leaders to make confident and strategic decisions.
          </p>
          <div class="feature-tags">
            <span class="tag">Strategy</span>
            <span class="tag">Insights</span>
          </div>
        </div>
      </div>

      <div class="feature-item" data-aos="flip-up" data-aos-delay="450">
        <div class="feature-number">05</div>
        <div class="feature-content">
          <div class="feature-icon">
            <i class="bi bi-gear"></i>
          </div>
          <h4>Process Optimization</h4>
          <p>
            We streamline workflows by reducing manual processes and improving how tasks are handled across your organization.
          </p>
          <div class="feature-tags">
            <span class="tag">Automation</span>
            <span class="tag">Productivity</span>
          </div>
        </div>
      </div>

      <div class="feature-item" data-aos="flip-up" data-aos-delay="500">
        <div class="feature-number">06</div>
        <div class="feature-content">
          <div class="feature-icon">
            <i class="bi bi-arrows-expand"></i>
          </div>
          <h4>Scalable Foundations</h4>
          <p>
            Our solutions are designed to grow with your business, ensuring long-term sustainability and adaptability as your needs evolve.
          </p>
          <div class="feature-tags">
            <span class="tag">Scalable</span>
            <span class="tag">Future-Ready</span>
          </div>
        </div>
      </div>

    </div>

  </div>

</section><!-- /Features Section -->

    <!-- Features Tabs Section -->
    <section id="features-tabs" class="features-tabs section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="tabs-wrapper">
          <ul class="nav nav-tabs" data-aos="fade-up" data-aos-delay="100">

            <li class="nav-item">
              <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tabs-tab-1">
                <div class="tab-icon">
                  <i class="bi bi-rocket-takeoff"></i>
                </div>
                <div class="tab-content">
                  <h5>Innovation</h5>
                  <span>Cutting-edge solutions</span>
                </div>
              </a>
            </li><!-- End tab nav item -->

            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tabs-tab-2">
                <div class="tab-icon">
                  <i class="bi bi-shield-shaded"></i>
                </div>
                <div class="tab-content">
                  <h5>Security</h5>
                  <span>Advanced protection</span>
                </div>
              </a>
            </li><!-- End tab nav item -->

            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tabs-tab-3">
                <div class="tab-icon">
                  <i class="bi bi-lightning-charge"></i>
                </div>
                <div class="tab-content">
                  <h5>Performance</h5>
                  <span>Lightning fast speed</span>
                </div>
              </a>
            </li><!-- End tab nav item -->

            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tabs-tab-4">
                <div class="tab-icon">
                  <i class="bi bi-heart-pulse"></i>
                </div>
                <div class="tab-content">
                  <h5>Support</h5>
                  <span>24/7 assistance</span>
                </div>
              </a>
            </li><!-- End tab nav item -->

          </ul>

          <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

          <!-- TAB 1 -->
          <div class="tab-pane fade active show" id="features-tabs-tab-1">
            <div class="row align-items-center">

              <div class="col-lg-5">
                <div class="content-wrapper">
                  <div class="icon-badge">
                    <i class="bi bi-rocket-takeoff"></i>
                  </div>
                  <h3>Data-Driven Transformation</h3>
                  <p>
                    We help organizations move from fragmented data and manual processes to structured, intelligent systems that support growth and efficiency.
                  </p>

                  <div class="feature-grid">
                    <div class="feature-item">
                      <i class="bi bi-check-circle-fill"></i>
                      <span>Organize and centralize business data</span>
                    </div>
                    <div class="feature-item">
                      <i class="bi bi-check-circle-fill"></i>
                      <span>Eliminate disconnected tools and workflows</span>
                    </div>
                    <div class="feature-item">
                      <i class="bi bi-check-circle-fill"></i>
                      <span>Improve visibility across operations</span>
                    </div>
                    <div class="feature-item">
                      <i class="bi bi-check-circle-fill"></i>
                      <span>Enable smarter, data-backed decisions</span>
                    </div>
                  </div>

                  <div class="stats-row">
                    <div class="stat-item">
                      <div class="stat-number">Clarity</div>
                      <div class="stat-label">In Data</div>
                    </div>
                    <div class="stat-item">
                      <div class="stat-number">Efficiency</div>
                      <div class="stat-label">In Processes</div>
                    </div>
                    <div class="stat-item">
                      <div class="stat-number">Growth</div>
                      <div class="stat-label">Through Insight</div>
                    </div>
                  </div>

                  <a href="#" class="btn-primary">Learn More <i class="bi bi-arrow-right"></i></a>
                </div>
              </div>

              <div class="col-lg-7">
                <div class="visual-content">
                  <div class="main-image">
                    <img src="assets/img/features/features-2.jpg" alt="" class="img-fluid">
                    <div class="floating-card">
                      <i class="bi bi-graph-up-arrow"></i>
                      <div class="card-content">
                        <span>Insight</span>
                        <strong>Better Decisions</strong>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End tab content item -->


          <!-- TAB 2 -->
          <div class="tab-pane fade" id="features-tabs-tab-2">
            <div class="row align-items-center">

              <div class="col-lg-5">
                <div class="content-wrapper">
                  <div class="icon-badge">
                    <i class="bi bi-shield-shaded"></i>
                  </div>
                  <h3>Reliable & Structured Systems</h3>
                  <p>
                    Our solutions are built with reliability and consistency in mind, ensuring your data and systems remain dependable as your organization grows.
                  </p>

                  <div class="feature-grid">
                    <div class="feature-item">
                      <i class="bi bi-check-circle-fill"></i>
                      <span>Consistent and well-structured data environments</span>
                    </div>
                    <div class="feature-item">
                      <i class="bi bi-check-circle-fill"></i>
                      <span>Secure handling of business information</span>
                    </div>
                    <div class="feature-item">
                      <i class="bi bi-check-circle-fill"></i>
                      <span>Systems designed for long-term use</span>
                    </div>
                    <div class="feature-item">
                      <i class="bi bi-check-circle-fill"></i>
                      <span>Reduced risk from manual processes</span>
                    </div>
                  </div>

                  <div class="stats-row">
                    <div class="stat-item">
                      <div class="stat-number">Reliable</div>
                      <div class="stat-label">Systems</div>
                    </div>
                    <div class="stat-item">
                      <div class="stat-number">Secure</div>
                      <div class="stat-label">Data</div>
                    </div>
                    <div class="stat-item">
                      <div class="stat-number">Stable</div>
                      <div class="stat-label">Operations</div>
                    </div>
                  </div>

                  <a href="#" class="btn-primary">Learn More <i class="bi bi-arrow-right"></i></a>
                </div>
              </div>

              <div class="col-lg-7">
                <div class="visual-content">
                  <div class="main-image">
                    <img src="assets/img/features/features-2.jpg" alt="" class="img-fluid">
                    <div class="floating-card">
                      <i class="bi bi-shield-check"></i>
                      <div class="card-content">
                        <span>Systems</span>
                        <strong>Reliable & Secure</strong>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End tab content item -->


          <!-- TAB 3 -->
          <div class="tab-pane fade" id="features-tabs-tab-3">
            <div class="row align-items-center">

              <div class="col-lg-5">
                <div class="content-wrapper">
                  <div class="icon-badge">
                    <i class="bi bi-lightning-charge"></i>
                  </div>
                  <h3>Efficient Operations</h3>
                  <p>
                    We streamline workflows and reduce inefficiencies, helping organizations operate faster and more effectively without unnecessary complexity.
                  </p>

                  <div class="feature-grid">
                    <div class="feature-item">
                      <i class="bi bi-check-circle-fill"></i>
                      <span>Reduce manual and repetitive tasks</span>
                    </div>
                    <div class="feature-item">
                      <i class="bi bi-check-circle-fill"></i>
                      <span>Improve process efficiency across teams</span>
                    </div>
                    <div class="feature-item">
                      <i class="bi bi-check-circle-fill"></i>
                      <span>Streamline business workflows</span>
                    </div>
                    <div class="feature-item">
                      <i class="bi bi-check-circle-fill"></i>
                      <span>Enhance overall productivity</span>
                    </div>
                  </div>

                  <div class="stats-row">
                    <div class="stat-item">
                      <div class="stat-number">Faster</div>
                      <div class="stat-label">Processes</div>
                    </div>
                    <div class="stat-item">
                      <div class="stat-number">Optimized</div>
                      <div class="stat-label">Workflows</div>
                    </div>
                    <div class="stat-item">
                      <div class="stat-number">Reduced</div>
                      <div class="stat-label">Manual Work</div>
                    </div>
                  </div>

                  <a href="#" class="btn-primary">Learn More <i class="bi bi-arrow-right"></i></a>
                </div>
              </div>

              <div class="col-lg-7">
                <div class="visual-content">
                  <div class="main-image">
                    <img src="assets/img/features/features-6.webp" alt="" class="img-fluid">
                    <div class="floating-card">
                      <i class="bi bi-speedometer2"></i>
                      <div class="card-content">
                        <span>Efficiency</span>
                        <strong>Optimized Workflows</strong>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End tab content item -->


          <!-- TAB 4 -->
          <div class="tab-pane fade" id="features-tabs-tab-4">
            <div class="row align-items-center">

              <div class="col-lg-5">
                <div class="content-wrapper">
                  <div class="icon-badge">
                    <i class="bi bi-heart-pulse"></i>
                  </div>
                  <h3>Collaborative Approach</h3>
                  <p>
                    We work closely with organizations to understand their processes, ensuring every solution aligns with real business needs and delivers measurable value.
                  </p>

                  <div class="feature-grid">
                    <div class="feature-item">
                      <i class="bi bi-check-circle-fill"></i>
                      <span>Client-focused solution design</span>
                    </div>
                    <div class="feature-item">
                      <i class="bi bi-check-circle-fill"></i>
                      <span>Close collaboration throughout projects</span>
                    </div>
                    <div class="feature-item">
                      <i class="bi bi-check-circle-fill"></i>
                      <span>Solutions aligned to real operations</span>
                    </div>
                    <div class="feature-item">
                      <i class="bi bi-check-circle-fill"></i>
                      <span>Continuous improvement and support</span>
                    </div>
                  </div>

                  <div class="stats-row">
                    <div class="stat-item">
                      <div class="stat-number">Client</div>
                      <div class="stat-label">Focused</div>
                    </div>
                    <div class="stat-item">
                      <div class="stat-number">Collaborative</div>
                      <div class="stat-label">Process</div>
                    </div>
                    <div class="stat-item">
                      <div class="stat-number">Long-Term</div>
                      <div class="stat-label">Value</div>
                    </div>
                  </div>

                  <a href="#" class="btn-primary">Learn More <i class="bi bi-arrow-right"></i></a>
                </div>
              </div>

              <div class="col-lg-7">
                <div class="visual-content">
                  <div class="main-image">
                    <img src="assets/img/features/features-1.webp" alt="" class="img-fluid">
                    <div class="floating-card">
                      <i class="bi bi-people"></i>
                      <div class="card-content">
                        <span>Partnership</span>
                        <strong>Working Together</strong>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End tab content item -->

        </div>
        </div>

      </div>

    </section><!-- /Features Tabs Section -->

<!-- Services Section -->
<section id="services" class="services section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Services</h2>
    <p>Designing data-driven systems that improve efficiency, visibility, and decision-making</p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row align-items-center">
      <div class="col-lg-6">
        <div class="intro-content" data-aos="fade-right" data-aos-delay="100">
          <div class="section-badge mb-3" data-aos="zoom-in" data-aos-delay="50">
            <i class="bi bi-star-fill"></i>
            <span>WHAT WE DO</span>
          </div>
          <h2 class="section-heading mb-4">Building Systems That Power Smarter Businesses</h2>
          <p class="section-description mb-4">
            At Bitree, we combine data engineering, analytics, and system development to help organizations move from manual, disconnected processes to integrated and intelligent operations.
          </p>
          <a href="#call-to-action" class="cta-button" data-aos="fade-right" data-aos-delay="200">
            View Our Approach
          </a>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="hero-visual" data-aos="fade-left" data-aos-delay="150">
          <img src="assets/img/services/services-1.jpg" alt="Bitree Services" class="img-fluid">
        </div>
      </div>
    </div>

    <div class="services-grid mt-5">
      <div class="row g-4">

        <!-- 01 -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="service-card">
            <div class="card-number">
              <span>01</span>
            </div>
            <div class="card-content">
              <h5 class="service-title">
                <a href="#">Data Engineering & Database Systems</a>
              </h5>
              <p class="service-description">
                We design and implement structured data systems that form the foundation of modern businesses, ensuring data is organized, accessible, and scalable.
              </p>
            </div>
          </div>
        </div>

        <!-- 02 -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="service-card">
            <div class="card-number">
              <span>02</span>
            </div>
            <div class="card-content">
              <h5 class="service-title">
                <a href="#">Data Analytics & Business Intelligence</a>
              </h5>
              <p class="service-description">
                We transform raw data into meaningful insights through reporting, dashboards, and analysis that support informed and strategic decision-making.
              </p>
            </div>
          </div>
        </div>

        <!-- 03 -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
          <div class="service-card">
            <div class="card-number">
              <span>03</span>
            </div>
            <div class="card-content">
              <h5 class="service-title">
                <a href="#">Custom System Development</a>
              </h5>
              <p class="service-description">
                We build tailored systems that align with your business processes, improving efficiency, automation, and overall operational performance.
              </p>
            </div>
          </div>
        </div>

        <!-- 04 -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="service-card">
            <div class="card-number">
              <span>04</span>
            </div>
            <div class="card-content">
              <h5 class="service-title">
                <a href="#">Web Platforms & Digital Systems</a>
              </h5>
              <p class="service-description">
                We develop web platforms that go beyond presentation, focusing on functionality, system integration, and data-driven experiences.
              </p>
            </div>
          </div>
        </div>

        <!-- 05 -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="service-card">
            <div class="card-number">
              <span>05</span>
            </div>
            <div class="card-content">
              <h5 class="service-title">
                <a href="#">System Integration & Automation</a>
              </h5>
              <p class="service-description">
                We connect systems and automate workflows to eliminate inefficiencies, reduce manual work, and ensure seamless operations across your organization.
              </p>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>

</section><!-- /Services Section -->

<!-- Call To Action Section -->
<section id="call-to-action" class="call-to-action section light-background">

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="advertise-1 d-flex flex-column flex-lg-row gap-4 align-items-center position-relative">

      <!-- LEFT: APPROACH -->
      <div class="content-left flex-grow-1" data-aos="fade-right" data-aos-delay="200">
        <span class="badge text-uppercase mb-2">OUR APPROACH</span>
        <h2>How We Design and Build Data-Driven Systems</h2>
        <p class="my-4">
          At Bitree, we follow a structured process that ensures every solution delivers clarity, efficiency, and measurable business value.
        </p>

        <div class="features d-flex flex-wrap gap-3 mb-4">
          <div class="feature-item"><i class="bi bi-check-circle-fill"></i><span>Assess – Understand processes & data flow</span></div>
          <div class="feature-item"><i class="bi bi-check-circle-fill"></i><span>Design – Architect systems & data structures</span></div>
          <div class="feature-item"><i class="bi bi-check-circle-fill"></i><span>Develop – Build tailored solutions</span></div>
          <div class="feature-item"><i class="bi bi-check-circle-fill"></i><span>Integrate – Connect systems & workflows</span></div>
          <div class="feature-item"><i class="bi bi-check-circle-fill"></i><span>Optimize – Improve performance continuously</span></div>
        </div>

        <div class="cta-buttons d-flex flex-wrap gap-3">
          <a href="#contact" class="btn btn-primary">Start a Project</a>
          <a href="#services" class="btn btn-outline">View Services</a>
        </div>
      </div>

      <!-- RIGHT: WHY BITREE -->
      <div class="content-right position-relative" data-aos="fade-left" data-aos-delay="300">

        <div class="why-bitree-card">
          <h4 class="mb-4">Why Bitree?</h4>

          <div class="why-item">
            <i class="bi bi-database"></i>
            <div>
              <h6>Data-First Approach</h6>
              <p>We prioritize structured data as the foundation of every system we build.</p>
            </div>
          </div>

          <div class="why-item">
            <i class="bi bi-diagram-3"></i>
            <div>
              <h6>Analytics + Systems Combined</h6>
              <p>We bridge the gap between insights and execution through integrated solutions.</p>
            </div>
          </div>

          <div class="why-item">
            <i class="bi bi-briefcase"></i>
            <div>
              <h6>Business-Focused Execution</h6>
              <p>Every solution is designed to solve real operational challenges, not just technical problems.</p>
            </div>
          </div>

          <div class="why-item">
            <i class="bi bi-arrows-expand"></i>
            <div>
              <h6>Scalable Solutions</h6>
              <p>Our systems are built to grow with your organization, from startup to enterprise.</p>
            </div>
          </div>
        </div>

      </div>

      <!-- DECORATION -->
      <div class="decoration">
        <div class="circle-1"></div>
        <div class="circle-2"></div>
      </div>

    </div>

  </div>

</section>

<!-- Pricing Section -->
<section id="pricing" class="pricing section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Pricing</h2>
    <p>Flexible data and analytics packages designed for businesses at different stages of growth</p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-4">

      <!-- Starter Insights -->
      <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
        <div class="pricing-card">
          <div class="plan-header">
            <div class="plan-icon">
              <i class="bi bi-bar-chart"></i>
            </div>
            <h3>Starter Insights</h3>
            <p>For small businesses starting with data</p>
          </div>

          <div class="plan-pricing">
            <div class="price">
              <span class="currency">MWK</span>
              <span class="amount">450K – 750K</span>
            </div>
          </div>

          <div class="plan-features">
            <ul>
              <li><i class="bi bi-check-circle-fill"></i> Data audit & assessment</li>
              <li><i class="bi bi-check-circle-fill"></i> Basic data cleaning</li>
              <li><i class="bi bi-check-circle-fill"></i> Simple analysis & reporting</li>
              <li><i class="bi bi-check-circle-fill"></i> 1 performance dashboard</li>
              <li class="disabled"><i class="bi bi-x-circle-fill"></i> Advanced analytics & automation</li>
            </ul>
          </div>

          <div class="plan-cta">
            <a href="/pricing/" class="btn-plan">View Full Details</a>
          </div>
        </div>
      </div><!-- End Starter -->

      <!-- Business Intelligence -->
      <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="300">
        <div class="pricing-card popular">
          <div class="popular-tag">Recommended</div>
          <div class="plan-header">
            <div class="plan-icon">
              <i class="bi bi-graph-up-arrow"></i>
            </div>
            <h3>Business Intelligence</h3>
            <p>For growing businesses and teams</p>
          </div>

          <div class="plan-pricing">
            <div class="price">
              <span class="currency">MWK</span>
              <span class="amount">900K – 1.8M</span>
            </div>
          </div>

          <div class="plan-features">
            <ul>
              <li><i class="bi bi-check-circle-fill"></i> Data structuring & setup</li>
              <li><i class="bi bi-check-circle-fill"></i> Advanced data analysis</li>
              <li><i class="bi bi-check-circle-fill"></i> 2–4 interactive dashboards</li>
              <li><i class="bi bi-check-circle-fill"></i> KPI tracking system</li>
              <li class="disabled"><i class="bi bi-x-circle-fill"></i> Full system integration</li>
            </ul>
          </div>

          <div class="plan-cta">
            <a href="/pricing/" class="btn-plan">View Full Details</a>
          </div>
        </div>
      </div><!-- End BI -->

      <!-- Advanced Data Systems -->
      <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="400">
        <div class="pricing-card">
          <div class="plan-header">
            <div class="plan-icon">
              <i class="bi bi-diagram-3"></i>
            </div>
            <h3>Advanced Data Systems</h3>
            <p>For organizations ready to scale</p>
          </div>

          <div class="plan-pricing">
            <div class="price">
              <span class="currency">MWK</span>
              <span class="amount">2.5M – 5.5M+</span>
            </div>
          </div>

          <div class="plan-features">
            <ul>
              <li><i class="bi bi-check-circle-fill"></i> Full database design & setup</li>
              <li><i class="bi bi-check-circle-fill"></i> Data pipeline development</li>
              <li><i class="bi bi-check-circle-fill"></i> Multiple dashboards</li>
              <li><i class="bi bi-check-circle-fill"></i> Forecasting & insights</li>
              <li><i class="bi bi-check-circle-fill"></i> System integration</li>
            </ul>
          </div>

          <div class="plan-cta">
            <a href="/pricing/" class="btn-plan">View Full Details</a>
          </div>
        </div>
      </div><!-- End Advanced -->

    </div>

  </div>

</section><!-- /Pricing Section -->

<!-- Studio Banner Section -->
<section id="studio-banner" class="studio-banner section">
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="studio-banner-inner">
      <div class="studio-banner-brand">
        <img src="assets/img/brand/bitree-studio-logo.png" alt="Bitree Studio">
      </div>
      <div class="studio-banner-copy">
        <span>Creative side of Bitree</span>
        <h2>Need branding, media, visuals, or digital content?</h2>
        <p>Visit Bitree Studio for design, brand identity, content creation, and creative media work.</p>
      </div>
      <a href="/studio/" class="studio-banner-link">
        Visit Bitree Studio <i class="bi bi-arrow-up-right"></i>
      </a>
    </div>
  </div>
</section><!-- /Studio Banner Section -->

<!-- Contact Section -->
<section id="contact" class="contact section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Contact Details</h2>
    <p>
      To give you a better insight into our company and areas of expertise, feel free to reach out using any of the communication channels below. We will get in touch with you within 24 hours.
    </p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row">

      <!-- LEFT -->
      <div class="col-lg-6 mb-5" data-aos="fade-right" data-aos-delay="200">
        <div class="contact-info-section">

          <div class="info-header">
            <h3>Connect With Us</h3>
            <p>
              Whether you're looking for data solutions, systems development, or digital platforms, our team is ready to help you build something impactful.
            </p>
          </div>

          <div class="contact-info-grid">

            <div class="info-item" data-aos="zoom-in" data-aos-delay="250">
              <div class="info-icon">
                <i class="bi bi-envelope-fill"></i>
              </div>
              <div class="info-content">
                <h5>Email Us</h5>
                <p>bitreemw@gmail.com</p>
              </div>
            </div>

            <div class="info-item" data-aos="zoom-in" data-aos-delay="300">
              <div class="info-icon">
                <i class="bi bi-telephone-fill"></i>
              </div>
              <div class="info-content">
                <h5>Call or WhatsApp</h5>
                <p>+265 881 536 054</p>
              </div>
            </div>

            <div class="info-item" data-aos="zoom-in" data-aos-delay="350">
              <div class="info-icon">
                <i class="bi bi-globe"></i>
              </div>
              <div class="info-content">
                <h5>Website</h5>
                <p>www.bitreemw.com</p>
              </div>
            </div>

            <div class="info-item" data-aos="zoom-in" data-aos-delay="400">
              <div class="info-icon">
                <i class="bi bi-clock-fill"></i>
              </div>
              <div class="info-content">
                <h5>Response Time</h5>
                <p>Within 24 hours</p>
              </div>
            </div>

          </div>

          <div class="social-contact" data-aos="fade-up" data-aos-delay="450">
            <h5>Follow Us</h5>
            <div class="social-icons">
              <a href="#" class="social-icon"><i class="bi bi-facebook"></i></a>
              <a href="#" class="social-icon"><i class="bi bi-instagram"></i></a>
              <a href="#" class="social-icon"><i class="bi bi-twitter-x"></i></a>
            </div>
            <p style="margin-top:10px; font-size:13px; opacity:0.7;">
              @bitreemw
            </p>
          </div>

        </div>
      </div>

      <!-- RIGHT -->
      <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
        <div class="contact-form-wrapper">

          <div class="form-header">
            <h3>Request a Quote</h3>
            <p>
              Tell us about your project, and we’ll design a solution tailored to your needs.
            </p>
          </div>

          <form action="/contact/" method="post" class="php-email-form" data-recaptcha-site-key="<?= htmlspecialchars((string) $recaptchaSiteKey, ENT_QUOTES, 'UTF-8'); ?>">
            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8'); ?>">
            <input type="hidden" name="recaptcha_token" value="">
            <input type="text" name="website" tabindex="-1" autocomplete="off" class="visually-hidden" aria-hidden="true">

            <div class="loading">Sending message...</div>
            <div class="error-message"></div>
            <div class="sent-message">Message sent successfully.</div>

            <div class="mb-3">
              <label for="contactName" class="form-label">Full Name</label>
              <input type="text" name="name" class="form-control" id="contactName" placeholder="Enter your full name" required>
            </div>

            <div class="mb-3">
              <label for="contactEmail" class="form-label">Email Address</label>
              <input type="email" class="form-control" name="email" id="contactEmail" placeholder="Enter your email address" required>
            </div>

            <div class="mb-3">
              <label for="contactPhone" class="form-label">Phone Number</label>
              <input type="tel" class="form-control" name="phone" id="contactPhone" placeholder="Enter your phone number">
            </div>

            <div class="mb-3">
              <label for="contactSubject" class="form-label">Subject</label>
              <input type="text" class="form-control" name="subject" id="contactSubject" placeholder="Project / Service Inquiry" required>
            </div>

            <div class="mb-4">
              <label for="contactMessage" class="form-label">Your Message</label>
              <textarea class="form-control message-textarea" name="message" id="contactMessage" rows="5" placeholder="Briefly describe what you need (e.g. website, system, data solution...)" required></textarea>
            </div>

            <button type="submit" class="submit-btn">
              <span>Send Request</span>
              <i class="bi bi-arrow-right"></i>
            </button>

          </form>

        </div>
      </div>

    </div>
  </div>

</section>
<!-- /Contact Section -->

  </main>

  <?php if (!empty($recaptchaSiteKey)): ?>
  <script src="https://www.google.com/recaptcha/api.js?render=<?= urlencode((string) $recaptchaSiteKey); ?>"></script>
  <?php endif; ?>

  <?php include 'include/footer.php'; ?>
