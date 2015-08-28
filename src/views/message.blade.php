@if (Session::has('flash_notification.message'))
    @if (Session::has('flash_notification.overlay'))
        @include('flash::modal', ['title' => Session::get('flash_notification.title'), 
							        'message' => Session::get('flash_notification.message'),
							        'level' => Session::get('flash_notification.level')]
				)
	@else
        <script type="text/javascript"> 

		    swal({ 
				    title: "{{ Session::get('flash_notification.title') }}", 
				    text: "{{ Session::get('flash_notification.message') }}", 
				    type: "{{ Session::get('flash_notification.level') }}",   
				    timer: 3000,
				    showConfirmButton: false,
				    cancelButtonText: "No, No cancel plz!"
				});

		</script>
    @endif
@endif
