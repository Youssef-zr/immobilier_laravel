<footer class="main-footer">
    <div class="pull-right hidden-xs" style="margin-left:15px">
       <b>اصدار</b> 0.1

    </div>
    جميع الحقوق محفوظة
    <strong> لخدمات ويب {{ date('Y')}}</strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark" style="display: none;">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdons Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebars background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
{{-- {!! Html::script('my-tools/adminlte/bower_components/jquery/dist/jquery.min.js') !!} --}}
{!! Html::script('my-tools/adminlte/bower_components/jquery/dist/jquery.min.js') !!}

<!-- jQuery UI 1.11.4 -->
{!! Html::script('my-tools/adminlte/bower_components/jquery-ui/jquery-ui.min.js') !!}
<!-- DataTables -->

{{-- {!! Html::script("my-tools/adminlte/plugins/datatables/jquery.dataTables.js") !!} --}}

{!! Html::script('my-tools/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js') !!}
{!! Html::script('my-tools/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') !!}
{{--  datatable for buttons  --}}
{{--  ------------------------------------------------------------------------------------------------------  --}}
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>

<!-- Bootstrap 3.3.7 -->
{!! Html::script('my-tools/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js') !!}

<!-- AdminLTE App -->
{!! Html::script('my-tools/adminlte/dist/js/adminlte.min.js') !!}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- {!! Html::script('my-tools/adminlte/dist/js/pages/dashboard2.js') !!} --}}
<!-- AdminLTE for demo purposes -->
{!! Html::script('my-tools/adminlte/dist/js/demo.js') !!}
{{--  swwet alert plugin  --}}
{!! Html::script('my-tools/adminlte/plugins/sweetalert2/sweetalert2.all.min.js') !!}

{{-- select2 --}}
{!! Html::script('my-tools/adminlte/plugins/select2/js/select2.min.js') !!}


<script>

    $(function(){
        // preview image when the file is changed
        $(".avatar").on("change", function() {
            $parent = $(this).parents('.parent');
            if (this.files && this.files[0]) {
                var $reader = new FileReader();
                $reader.onload = function($e) {
                    $preview = $parent.next('div').children().find('img');
                    $preview.attr("src", $e.target.result);
                };
            }
            $reader.readAsDataURL(this.files[0]);
        });

        $('select').select2({
            "dir":'rtl',
        });

    })
</script>

{{--  noty plugin script  --}}
{!! Html::script('my-tools/adminlte/plugins/Noty/noty.js') !!}

{{--  stack used to handled the fire code raning   --}}
@stack('js')

</body>
</html>
