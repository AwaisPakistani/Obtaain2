@extends('admin.layout.master')
@section('content')
                 
<!--start content-->
<main class="page-content">
        <!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Roles and Permissions</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Front Permissions</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
                            @can('view')
							<a  href="{{route('front.view_permissions')}}" class="btn btn-primary">View Permissions</a>
							@endcan
						</div>
					</div>
				</div>
				<!--end breadcrumb--> 
				
				
				<h6 class="mb-0 text-uppercase">{{$title}}</h6>
				<hr/>

                <!--alerts-->
                @if(Session::has('success_message'))
                <div class="alert border-0 bg-light-success alert-dismissible fade show py-2">
                    <div class="d-flex align-items-center">
                      <div class="fs-3 text-success"><i class="bi bi-check-circle-fill"></i>
                      </div>
                      <div class="ms-3">
                        <div class="text-success">{{Session::get('success_message')}}</div>
                      </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  @endif
                  @if(Session::has('error_message'))
                  <div class="alert border-0 bg-light-danger alert-dismissible fade show py-2">
                    <div class="d-flex align-items-center">
                      <div class="fs-3 text-danger"><i class="bi bi-x-circle-fill"></i>
                      </div>
                      <div class="ms-3">
                        <div class="text-danger">{{Session::get('error_message')}}</div>
                      </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  @endif
                  <!--alerts-->


                <div class="col-12 col-xl-8 order-xl-3">
                  <div class="card-body p-4 p-sm-5">
                   
                     <form method="post" 
                      action="{{route('front.edit_permission',$front_permission->id)}}"
                     class="form-body">@csrf
                        <div class="row g-3">
                          <div class="col-12 ">
                            <label for="inputName" class="form- 
                            label">Permission Name</label>
                            <div class="ms-auto position-relative">
                              <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-mail-circle"></i></div>
                              <input type="text" class="form-control radius-30 ps-5" id="inputName" name="permission"
                              value="{{$front_permission->name}}"
                              placeholder="Enter Permission" required>
                            </div>
                          </div>
                        
                          <div class="col-12">
                            <div class="d-grid">
                              <button type="submit" class="btn btn-primary radius-30">{{$title}}</button>
                            </div>
                          </div>
                         
                        
                          
                        </div>
                    </form>
                 </div>
                </div>
</main>
        
       <!--end page main-->
@endsection