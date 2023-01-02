<div>
        <!-- Nothing in life is to be feared, it is only to be understood. Now is the time to understand more, so that we may fear less. - Marie Curie -->
        @if (Session::has('alert-message'))
        <div class="alert alert-warning"><i class="fa fa-regular fa-circle-exclamation me-2"></i><strong>{{
                        Session::get('alert-message') }}</strong></div>
        @endif

        @if (Session::has('success-message'))
        <div class="alert alert-success"><i class="fa-regular fa-circle-check me-2"></i><strong>{{
                        Session::get('success-message') }}</strong></div>
        @endif

        @if (Session::has('error-message'))
        <div class="alert alert-danger"><i class="fa fa-regular fa-circle-xmark me-2"></i><strong>{{
                        Session::get('error-message')
                        }}</strong></div>
        @endif
</div>