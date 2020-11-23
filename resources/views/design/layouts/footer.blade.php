<!--  start section scroll to up  -->
<div class="scroll hidden-xs" title="انتقل الى أعلى"  data-toggle="tooltip" data-trigger="hover">
    <div class="scroll-up">
        <i class="fa fa-chevron-up"></i>
    </div>
</div>
<!--  end section scroll to up  -->

<!-- Footer Section Begin -->
<footer class="footer" dir="rtl">
    <div class="container">
        <div class="footer__copyright">
            <div class="footer__copyright__text text-center">
                <p>
                        جميع الحقوق محفوظة &copy; {{ date('Y') }} | لموقع {{ settings()->sitename}} <i class="fa fa-heart" aria-hidden="true" style="color:#ff4c59"></i> برمجة وتصميم <a href="http://www.facebook.com/zidanhd" target="_blank" style="color:#31cbee">youssef neinaa</a>
                </p>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!--app.js-->
{!! Html::script('js/app.js') !!}
<!-- Js Plugins -->
{!! Html::script("my-tools/design/js/jquery-3.3.1.min.js") !!}
{!! Html::script("my-tools/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js") !!}
{!! Html::script("my-tools/design/js/jquery-ui.min.js") !!}
{!! Html::script("my-tools/design/js/jquery.slicknav.js") !!}
{!! Html::script("my-tools/design/js/mixitup.min.js") !!}
{!! Html::script("my-tools/design/js/owl.carousel.min.js") !!}
{!! Html::script("my-tools/design/js/main.js") !!}
{!! Html::script('my-tools/adminlte/plugins/select2/js/select2.min.js') !!}
{!! Html::script('my-tools/adminlte/plugins/Noty/noty.js') !!}

@stack('js')

<script>
    $('select').select2({
        "dir":'rtl'
    });
</script>
<script>
    $(function(){
          // slide to top scrolling //
            $slideTop = $(".scroll");

            $('.scroll').click(function ($e) {
                $e.preventDefault();
                $("html,body").animate({
                scrollTop: 0
                }, 800)
            })



            function checkScroll() {
                if ($(this).scrollTop() > 600) {
                $slideTop.fadeIn(500);
                } else {
                $slideTop.fadeOut(500);
                }
            }

            checkScroll();
            $(window).scroll(function(){
                checkScroll();
            })
    })
</script>
</body>
</html>

