 <!-- BEGIN CORE PLUGINS -->
 <script src="{{ asset('public/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
 <script src="{{ asset('public/admins/assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
 <script src="{{ asset('public/admins/assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
 <script src="{{ asset('public/admins/assets/global/plugins/js.cookie.min.js') }}" type="text/javascript"></script>
 <script src="{{ asset('public/admins/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
 <script src="{{ asset('public/admins/assets/global/plugins/jquery.blockui.min.js') }}" type="text/javascript">
 </script>
 <script src="{{ asset('public/admins/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
 <script src="{{ asset('public/admins/assets/global/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
 <script src="{{ asset('public/admins/assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
 <script src="{{ asset('public/admins/assets/global/plugins/jquery-validation/js/additional-methods.min.js') }}" type="text/javascript"></script>
 <script src="{{ asset('public/admins/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
 <script src="{{ asset('public/admins/assets/global/plugins/bootstrap-markdown/lib/markdown.js') }}" type="text/javascript"></script>
 <script src="{{ asset('public/admins/assets/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js') }}" type="text/javascript"></script>
 <script src="{{ asset('public/admins/assets/global/scripts/app.min.js') }}" type="text/javascript"></script>
 <script src="{{ asset('public/admins/assets/pages/scripts/form-validation.min.js') }}" type="text/javascript">
 </script>
 <script src="{{ asset('public/admins/assets/layouts/layout4/scripts/layout.min.js') }}" type="text/javascript">
 </script>
 <script src="{{ asset('public/admins/assets/layouts/layout4/scripts/demo.min.js') }}" type="text/javascript">
 </script>
 <script src="{{ asset('public/admins/assets/global/scripts/post.js') }}" type="text/javascript">
 </script>
 @toastr_js
 @toastr_render
 <!-- END THEME LAYOUT SCRIPTS -->
 {{-- <script>
     $(document).ready(function() {
         // CKEDITOR.replace('editor1',
         // {language: 'vi',
         //     filebrowserUploadUrl: '{!! route('uploadImage', ['_token ' => csrf_token() ]) !!}',
         //     filebrowserUploadMethod: 'form'});
         CKEDITOR.replace('editor1', {
             filebrowserBrowseUrl: '{{ asset('
             public / ckfinder / ckfinder.html ') }}'
 , filebrowserImageBrowseUrl: '{{ asset('
             public / ckfinder / ckfinder.html ? type = Images ') }}'
 , filebrowserImageUploadUrl : '{{ asset('
             public / ckfinder / core / connector / php / connector.php ? command = QuickUpload & type = Images ') }}'
 , });
 })

 </script> --}}
