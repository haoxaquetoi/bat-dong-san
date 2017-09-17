<script src="{{ URL::asset('Backend/js/backend.js') }}"></script>
<!--factory-->
<script src="{{ URL::asset('js/factory/apply.js') }}"></script>
<script src="{{ URL::asset('js/factory/myFunc.js') }}"></script>
<script src="{{ URL::asset('backend/js/factory/services/userService.js') }}"></script>

<!--directive-->
<script src="{{ URL::asset('js/directives/index.php') }}"></script>

<script src="{{ URL::asset('js/plugins/notify.js') }}"></script>

<!--custom javascript by view-->
 @stack('scripts')