<?php

//hide footer's contact form for Contact page
if(!is_page(18)) {
  include('inc/contact.php');
}

?>
</div><!-- End of ContentWrap -->
	<?php wp_footer(); ?>
<footer>
  
  <div class="footerTop">
    <div class="container">
      <div class="logos-section">
        <div class="contactDetails">
          <p><strong>Carter Lemon Camerons LLP</strong></p>
          <div class="address">
            <p>3rd Floor, 20 King Street<br> London, EC2V 8EG<br> DX42616 Cheapside</p>
          </div>
          <div class="contact">
            <p>
              <strong>Tel:</strong> &nbsp;+44 (0)20 7406 1000<br>
              <strong>Fax:</strong> +44 (0)20 7406 1010<br>
              <strong>Email:</strong> <a href="mailto:info@cartercamerons.com">info@cartercamerons.com</a>
            </p>
          </div>
        </div>
        <div class="logos">
          <img src="/wp-content/themes/clc-theme-2025/img/Cyber_Logo.jpg" />
          <img src="/wp-content/themes/clc-theme-2025/img/Conveyancing_Logo.jpg" />
          <div>
            <div style="position: relative;padding-bottom: 59.1%;height: auto;overflow: hidden;">
              <iframe frameborder="0" scrolling="no" allowtransparency="true" src="https://cdn.yoshki.com/iframe/55845r.html"></iframe>
            </div>
          </div>
          <img src="/wp-content/themes/clc-theme-2025/img/pragma-logo.jpg" />
          <a href="/supporting-charitys-will-writing-campaign/"><img src="/wp-content/themes/clc-theme-2025/img/will-to-remember-logo.jpg" /></a>
        </div>
      </div>
    </div>
  </div>
  
  <div class="footerBottom">
    <div class="container">
      <p class="links">
        <a href="/terms-of-business/">Terms of business</a> <span>|</span> <a href="/privacy-policy/">Privacy policy</a> <span>|</span> <a href="/cookie-policy/">Cookie policy</a> <span>|</span> <a href="/sitemap/">Sitemap</a>
      </p>
      <p>Carter Lemon Camerons LLP is a limited liability partnership registered in England and Wales with number OC333252. The registered office is at 3rd Floor, 20 King Street, London, EC2V 8EG. It is authorised and regulated by the Solicitors Regulation Authority (<a href="http://www.sra.org.uk/" target="_blank">www.sra.org.uk</a>). It does not accept service by email. In the event of any dispute arising as a result of content posted on this website, the jurisdiction and applicable law to be invoked is that of England and Wales. Solicitors London.</p>
      <p>© <?php echo date('Y'); ?> Carter Lemon Camerons LLP | SRA 487190</p>
      <p><a href="http://www.je-consulting.co.uk/" target="_blank" title="Website for Solicitors by JE Consulting">Website for Solicitors by: JE Consulting</a></p>
    </div>
  </div>
  
</footer>
<script src="<?php bloginfo('template_directory'); ?>/js/slick.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/script.js"></script>
</body>
</html>