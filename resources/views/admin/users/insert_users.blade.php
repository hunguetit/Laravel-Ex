@extends('admin.layouts.default')

@section('title','Insert')

@section('content')
<div class="page-content-wrapper">
	<div class="page-content" style="min-height:288px">
		<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->

		<h3 class="page-title">
			Create User
		</h3>

		<!-- END PAGE HEADER-->
		<!-- BEGIN PAGE CONTENT-->
		<div class="row">
			<div class="col-md-12">
				<script>
                    @if (count($errors) > 0)
                        bootbox.alert({
                              message: "@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach",
                              title: "<strong>Whoops!</strong> There were some problems with your input.<br><br>",
                            });
                    @endif
                </script>
				<div class="portlet box blue">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-gift"></i> Create Account
						</div>

					</div>
					<div class="portlet-body form">
					<form action="{{asset('admin/insert')}}" roll='form' method="POST" enctype="multipart/form-data">
						{!! csrf_field() !!}
						<div class="form-body">
							<div class="form-group">
								<label class="control-label">Name:
								</label>
								<input type="text" class="form-control" name="name">
								
							</div>

							<div class="form-group">
								<label class="control-label">Username:
								</label>
								<input type="text" class="form-control" name="username">
								
							</div>
							<br>

						
							<br>
							<div class="form-group">
								<label class="control-label">Email:
								</label>
								<input type="text" class="form-control" name='email'>
						
							</div>

							<br>
							<div class="form-group">
								<label class="control-label">Password:
								</label>
								<input type="text" class="form-control" name="password">
								
							</div>

							<br>
							<div class="form-group">
								<label class="control-label">Avatar:
								</label>
								<input type="file" class="form-control" name="avatar">
					
							</div>

							<br>
							<div class="form-group">
								<label class="control-label">Role:
								</label>
								<input type="text" class="form-control" name="role">
								
							</div>

							<br>
							<hr>
							<div class="g-recaptcha" data-sitekey="6LdKiQoTAAAAAMWDy774knm_MNx-ffzjDe8ubrc6"></div>
							{!! Recaptcha::render() !!}

						</div>
						<div class="form-actions right">

							<input type="submit" class="btn green" value="Create"/>
						</div>
						</form>
					</div>
				</div>	
			</div>

		</div>

		<!-- END PAGE CONTENT-->
	</div>
</div>
@stop


@section('script')

@stop