@extends('front.layout.main')
<link href="{{url('assets/front/dist/css/datatable.min.css')}}" rel="stylesheet">
<link href="{{url('assets/front/dist/css/cdn.css')}}" rel="stylesheet">
@section('content')
@include('front.inc.journal_content_hero')
<div class="container mb-3 mt-3">
    <div class="row">
        @include('front.inc.alerts')
       <div class="col-lg-12 text-center">
       @include('front.inc.pages_journal_buttons')
       </div>
      </div>
    <div class="row">
        
        <div class="col-lg-12 mt-2 text-end py-2" style="text-decoration:none;">
       

        <div class="content">
            <div class="collapse multi-collapse" id="multiCollapseExample2">
              <div class="card card-body">
               
              </div>
            </div>
            <div>
              <div class="card card-body">
                  <div class="row">
                      <div class="col-lg-6 text-start">
                        <h3>Update Article Type</h3>
                        <div>
                            <form method="post" action="{{url('edit-article-type/'.$journal->id.'/'.$article_type->id)}}">@csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Article Type Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" 
                                name="article_type" 
                                value="{{$article_type->name}}"
                                Placeholder="Enter Article Type"
                                aria-describedby="emailHelp" required>
                            </div>
                         
                        </div>
                      </div>
                      <div class="col-lg-6">
                      <a href="{{route('front.article_types',$journal->id)}}" class="btn btn-success text-end" >View Article Types</a>
                          
                      </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-12 text-start">
                            <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                     </form>
                     </div>
                  </div>
              </div>
            </div>

        </div>
        
        
         
        </div>
    </div>
</div>

@endsection
<script src="{{url('assets/front/dist/js/jquery.min.js')}}"></script>
    <script src="{{url('assets/front/dist/js/datatable_net.min.js')}}"></script>
    <script src="{{url('assets/front/dist/js/datatable.min.js')}}"></script>
    <script>
    $(document).ready(function () {
    $('#example').DataTable();
    });
</script>
