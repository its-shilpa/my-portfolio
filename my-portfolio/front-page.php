<?php
get_header();
?>

<section class="hero" id="home">

    <!-- Hero Glow Background -->
    <div class="hero-glow">
        <span class="glow glow-1"></span>
        <span class="glow glow-2"></span>
        <span class="glow glow-3"></span>
    </div>

    <div class="hero-text reveal">
        <h1 class="hero-name">Shilpa Mukherjee</h1>
        <h3>Web Developer</h3>
        <p>I create fast, responsive & SEO-friendly WordPress websites.</p>
        <a href="#projects" class="btn">View My Work</a>
    </div>

    <div class="footer-socials">
            <a href="mailto:shilpamukherjee625@gmail.com" aria-label="Email" class="social gmail">
                <i class="fa-solid fa-envelope"></i>
            </a>

            <a href="https://www.linkedin.com/in/shilpa-mukherjee/" target="_blank" aria-label="LinkedIn" class="social linkedin">
                <i class="fa-brands fa-linkedin-in"></i>
            </a>

            <a href="https://github.com/its-shilpa" target="_blank" aria-label="GitHub" class="social github">
                <i class="fa-brands fa-github"></i>
            </a>
           
            <a href="https://www.instagram.com/yourusername" target="_blank" aria-label="Instagram" class="social instagram">
                <i class="fa-brands fa-instagram"></i>
            </a>
        </div>

    <div class="hero-img reveal">
        <img src="<?php echo get_template_directory_uri();?>/media/images/mypic.jpeg" alt="Shilpa Mukherjee">
    </div>
</section>


<section id="about" class="about-section reveal-left">
  <div class="parallax-glow"></div>

    <!-- Content Wrapper -->
    <div class="content">
      <h2 class="section-title">About Me</h2>
 
      <div class="about-card reveal">
          <p>
              I am a <strong>WordPress Developer</strong> with 2+ years of experience
              in building modern, responsive, and SEO-friendly websites.
              I specialize in custom themes, WooCommerce stores, and performance optimization.
          </p>
 
          <div class="about-stats">
              <div>
                  <h3>2+</h3>
                  <span>Years Experience</span>
              </div>
              <div>
                  <h3>50+</h3>
                  <span>Projects</span>
              </div>
              <div>
                  <h3>10+</h3>
                  <span>Clients</span>
              </div>
          </div>
 
          <a href="media/cv/Shilpa's Resume.pdf" target="_blank" class="btn gradient-btn" download>
             <i class="fa-solid fa-download"></i> Download CV
          </a>

      </div>
    </div>
</section>


<section id="skills" class="skills-orbit-section reveal">
  <div class="parallax-glow"></div>

    <!-- Content Wrapper -->
    <div class="content">
      <h2 class="section-title">Skills</h2>
 
        <div class="orbit-wrapper">
            <div class="orbit-center">SKILLS</div>
 
          <!-- Orbit 1 -->
            <div class="orbit orbit-1">
                <div class="skill-holder">
                    <div class="skill html" data-skill="HTML5"><i class="fa-brands fa-html5"></i></div>
                </div>
                <div class="skill-holder">
                    <div class="skill css" data-skill="CSS3"><i class="fa-brands fa-css3-alt"></i></div>
                </div>
                <div class="skill-holder">
                    <div class="skill js" data-skill="javaScript"><i class="fa-brands fa-js"></i></div>
                </div>
                <div class="skill-holder">
                    <div class="skill jquery" data-skill="jQuery"><i class="fa-solid fa-code"></i></div>
                </div>
            </div>
 
          <!-- Orbit 2 -->
            <div class="orbit orbit-2">
                <div class="skill-holder">
                    <div class="skill wp" data-skill="WordPress"><i class="fa-brands fa-wordpress"></i></div>
                </div>
                <div class="skill-holder">
                    <div class="skill php" data-skill="PHP"><i class="fa-brands fa-php"></i></div>
                </div>
                <div class="skill-holder">
                    <div class="skill mysql" data-skill="MySQL"><i class="fa-solid fa-database"></i></div>
                </div>
                <div class="skill-holder">
                    <div class="skill git" data-skill="GIT"><i class="fa-brands fa-git-alt"></i></i></div>
                </div>
                <div class="skill-holder">
                    <div class="skill bootstrap" data-skill="Bootstrap4"><i class="fa-brands fa-bootstrap"></i></div>
                </div>
            </div>
        </div>
    </div>
</section>



<section id="projects" class="projects-section reveal-right">
    <div class="parallax-glow"></div>
    <div class="content">

        <h2 class="section-title">Projects</h2>

        <!-- Tabs -->
        <div class="project-tabs">
            <button class="tab-btn active" data-tab="cms">WordPress CMS Sites</button>
            <button class="tab-btn" data-tab="woocommerce">WooCommerce Sites</button>
            <button class="tab-btn" data-tab="business">WordPress Business Sites</button>
        </div>

        <?php
        $categories = array('cms', 'woocommerce', 'business');

        foreach ($categories as $index => $cat_slug) :
            $args = array(
                'post_type' => 'projects',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'project_category',
                        'field'    => 'slug',
                        'terms'    => $cat_slug,
                    ),
                ),
            );

            $query = new WP_Query($args);
        ?>

        <div class="tab-content <?php echo $index === 0 ? 'active' : ''; ?>" id="<?php echo $cat_slug; ?>">
            <div class="project-grid">

                <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>

                    <div class="project-card">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('medium'); ?>
                        <?php endif; ?>

                        <h3><?php the_title(); ?></h3>
                        <p><?php echo wp_trim_words(get_the_content(), 20); ?></p>

                        <a href="<?php echo the_permalink(); ?>" target="_blank">View Project</a>
                        
                    </div>

                <?php endwhile; wp_reset_postdata(); else : ?>
                    <p>No projects found.</p>
                <?php endif; ?>

            </div>
        </div>

        <?php endforeach; ?>

    </div>
</section>


<section id="services" class="services-section reveal">
    <div class="parallax-glow"></div>

    <div class="content">
        <h2 class="section-title">Services</h2>

        <div class="services-grid">
            <!-- Service Card -->
            <div class="service-card reveal-left">
                <div class="service-icon">
                    <i class="fa-brands fa-wordpress"></i>
                </div>
                <h3>WordPress Development</h3>
                <p>
                    Custom WordPress websites built for performance,
                    scalability, and SEO.
                </p>
            </div>

            <div class="service-card reveal-right">
                <div class="service-icon">
                    <i class="fa-solid fa-palette"></i>
                </div>
                <h3>Theme Customization</h3>
                <p>
                    Pixel-perfect theme customization with clean UI
                    and responsive design.
                </p>
            </div>

            <div class="service-card reveal-left">
                <div class="service-icon">
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
                <h3>WooCommerce Setup</h3>
                <p>
                    Complete WooCommerce stores with payment,
                    shipping, and product optimization.
                </p>
            </div>

            <div class="service-card reveal-right">
                <div class="service-icon">
                    <i class="fa-solid fa-gauge-high"></i>
                </div>
                <h3>Speed Optimization</h3>
                <p>
                    Improve website speed, Core Web Vitals,
                    and overall performance.
                </p>
            </div>
        </div>
    </div>
</section>


<section id="contact" class="contact-section">
  <h2 class="section-title">Contact Me</h2>

    <div class="parallax-glow glow-1"></div>
    <div class="parallax-glow glow-2"></div>

  <div class="contact-wrapper">

    <!-- Contact Info Card -->
    <div class="contact-card">
      <h3>Let’s Work Together</h3>
      <p>
        Have a project in mind or need help with your WordPress website?
        Feel free to reach out — I’d love to hear from you.
      </p>

      <div class="contact-info">
        <div class="contact-item">
          <span class="icon"><i class="fa-solid fa-envelope"></i></span>
          <a href="mailto:shilpamukherjee625@gmail.com">
            shilpamukherjee625@gmail.com
          </a>
        </div>

        <div class="contact-item">
          <span class="icon"><i class="fa-solid fa-phone"></i></span>
          <a href="tel:+916294094588">+91 62940 94588</a>
        </div>

        <div class="contact-item">
          <span class="icon"><i class="fa-brands fa-linkedin-in"></i></span>
          <a href="#" target="_blank">LinkedIn Profile</a>
        </div>
      </div>
    </div>

    <!-- Contact Form -->
    <div class="contact-form">
      <?php echo do_shortcode('[contact-form-7 id="e719392" title="Contact Form"]');?>
    </div>

  </div>
</section>


<?php
get_footer();
?>