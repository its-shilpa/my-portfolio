<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package my-portfolio
 */

?>

<footer class="site-footer">
    <div class="footer-content">

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

        <p class="footer-text">
            © <script>document.write(new Date().getFullYear())</script> Shilpa Mukherjee | Web Developer
        </p>

    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
