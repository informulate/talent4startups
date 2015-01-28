@if (! Auth::check())
<div id="login-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<div class="tab-content">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<ul class="nav nav-tabs">
						<li id="login-tab-link" class="active"><a href="#login-tab" data-toggle="tab">Login</a></li>
						<li id="sign-up-tab-link"><a href="#sign-up-tab" data-toggle="tab">Sign Up</a></li>
					</ul>
					<div class="tab-pane active" id="login-tab">
						@include('layouts.partials.forms.login')
					</div>
					<div class="tab-pane text-center" id="sign-up-tab">
						<div class="row">
							@include('layouts.partials.type')
						</div>
						<div class="row">
							<div class="col-sm-12">
								<input id="agree" type="checkbox" value="agree"/> I agree to the Terms of Use and am ready to get started.<br/>
								<a id="register-linked_in" href="{{ route("login_linked_in") }}">Sign up with LinkedIn</a>
								<br/>
								<a id="register-email" href="{{ route('register_path') }}">Or Sign up with email instead</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
	$(document).ready(function() {
		// Activate the signup tab
		$('#signup-link').on('click', function(event) {
			event.preventDefault();
			$('#login-tab, #login-tab-link').removeClass('active');
			$('#sign-up-tab, #sign-up-tab-link').addClass('active');
			$('#login-modal').modal();
		});
		// Activate the login tab
		$('#login-link').on('click', function(event) {
			event.preventDefault();
			$('#login-tab, #login-tab-link').addClass('active');
			$('#sign-up-tab, #sign-up-tab-link').removeClass('active');
			$('#login-modal').modal();
		});

		// User Type Selection feedback
		$('#startup').on('click', function() {
			$('#talent').removeClass('text-primary');
			$(this).addClass('text-primary');
			// Since we need to know the user type, and users might register with a social network, store the selected user type on the session
			$.get("{{ route("store_type_path", ['type' => 'startup']) }}");
		});

		$('#talent').on('click', function() {
			$('#startup').removeClass('text-primary');
			$(this).addClass('text-primary');
			// Since we need to know the user type, and users might register with a social network, store the selected user type on the session
			$.get("{{ route("store_type_path", ['type' => 'talent']) }}");
		});

		// Register via email
		$('#register-email').on('click', function(event) {
			$(this).attr('href', $(this).attr('href') + '?type=' + getType());
			validateRegistration(event);
		});

		// Register via Linekdin
		$('#register-linked_in').on('click', function(event) {
			validateRegistration(event);
		});

		/**
		 * validate form before submit
		 */
		function validateRegistration(event) {
			var errors = null;

			if (false === $("#agree").is(':checked')) {
				errors++;
				event.preventDefault();
				alert('You must agree to the Terms of Use before getting started!');
			}

			if (false === $('#talent').hasClass('text-primary') && false === $('#startup').hasClass('text-primary')) {
				errors++;
				event.preventDefault();
				alert('Are you a talent or a startup? Click the appropriate icon above!');
			}

			return errors;
		}

		/**
		 * Identify user is talent or startup
		 *
		 * @returns {string}
		 */
		function getType() {
			return $('#talent').hasClass('text-primary') ? 'talent' : 'startup';
		}
	});
</script>
@endif
