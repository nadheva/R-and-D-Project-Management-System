<!--   Core JS Files   -->
<script src="{{asset('tadmin/assets/js/core/popper.min.js')}}"></script>
<script src="{{asset('tadmin/assets/js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('tadmin/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('tadmin/assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
<script src="{{asset('tadmin/assets/js/plugins/datatables.js')}}"></script>
<script src="{{asset('tadmin/assets/js/plugins/choices.min.js')}}"></script>
<script src="{{asset('tadmin/assets/js/plugins/dropzone.min.js')}}"></script>
<script src="{{asset('tadmin/assets/js/plugins/quill.min.js')}}"></script>
<script src="{{asset('tadmin/assets/js/plugins/multistep-form.js')}}"></script>
<script src="{{asset('tadmin/assets/js/plugins/flatpickr.min.js')}}"></script>

<!-- Kanban scripts -->
<script src="{{asset('tadmin/assets/js/plugins/dragula/dragula.min.js')}}"></script>
<script src="{{asset('tadmin/assets/js/plugins/jkanban/jkanban.js')}}"></script>
<script src="{{asset('tadmin/assets/js/plugins/chartjs.min.js')}}"></script>
<script src="{{asset('tadmin/assets/js/plugins/threejs.js')}}"></script>
<script src="{{asset('tadmin/assets/js/plugins/orbit-controls.js')}}"></script>
<script src="{{asset('tadmin/assets/js/plugins/tilt.min.js')}}"></script>
  <!-- Js conf delete-->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{asset('tadmin/assets/js/soft-ui-dashboard.min.js?v=1.0.7')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script src="https://cdn.tiny.cloud/1/pbt8hv1pilzu9hy3yh33hvz7bnbdtjda34vxywwge56tcjou/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{asset('tadmin/assets/js/soft-ui-dashboard.min.js?v=1.0.7')}}"></script>
{{-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<script>
  tinymce.init({
    selector: '#mytextarea',
    plugins: [
      'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',
      'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',
      'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount'
    ],
    toolbar: 'undo redo | formatpainter casechange blocks | bold italic backcolor | ' +
      'alignleft aligncenter alignright alignjustify | ' +
      'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help'
  });
</script> --}}
@stack('scripts')
