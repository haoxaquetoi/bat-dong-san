@if(Auth::check())
<script src="{{ URL::asset('backend/js/modal/changeUserInfoCtrl.js') }}"></script>
@includeif('backend.modal.change_user_info')
@endif