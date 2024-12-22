<footer class="footer bg-secondary pt-4 pb-2 pb-md-5 pt-sm-5">

</footer>
<!-- Back to top button--><a class="btn-scroll-top" href="#top" data-scroll>
  <svg viewBox="0 0 40 40" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
    <circle cx="20" cy="20" r="19" fill="none" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"></circle>
  </svg><i class="ai-arrow-up"></i></a>
<!-- Vendor scripts: js libraries and plugins-->


  <script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/jarallax/dist/jarallax.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/dist/aos.js') }}"></script>
  <!-- Main theme script-->
  <script src="{{ asset('assets/js/theme.min.js') }}"></script>
  <script defer src="{{ asset('assets/js/scripts.js') }}"></script>

  <script src="https://cdn.tiny.cloud/1/z1g10ihgk5hqdo3ihtmvjy681awr1j6qlzv2g5j60rqzvhvc/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    tinymce.init({
      selector: 'textarea.tiny-editor',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      mergetags_list: [
        { value: 'First.Name', title: 'First Name' },
        { value: 'Email', title: 'Email' },
      ]
    });
  </script>
</body>
</html>