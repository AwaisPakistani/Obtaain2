@php 
use App\Models\User;
use App\Models\Paper;
@endphp
@extends('front.layout.main')

<link href="{{url('assets/front/dist/css/datatable.min.css')}}" rel="stylesheet">

<link href="{{url('assets/front/dist/css/cdn.css')}}" rel="stylesheet">

<style>

 .author-links a{

    text-decoration:none;

 }

 .author-links a:hover{

    color:#ff8000;

 }

</style>

@section('content')

@include('front.inc.journal_content_hero')

<div class="container mb-3 mt-3">

    <div class="row">

       <div class="col-lg-12 text-end">

       <a href="{{ url()->previous() }}" class="btn btn-warning">Previous Link <-</a>

       </div>

      </div>

    <div class="row">

    

        <div class="col-lg-12 mt-2 text-end py-2 text-start" style="text-decoration:none;">

        @include('front.inc.alerts')

        <div class="author-links text-start px-5 py-2">

        

            <table id='example' class="table table-striped table-bordered">

                <thead>

                  <tr>

                    <th>Sr#</th>

                    <th>Paper ID</th>

                    <th>Paper Title</th>

                    <th>Publisher Name</th>
                    
                    <th>Message</th>

                    <th>Sent Date</th>

                    <th>Respond</th>

                  </tr>

                </thead>

                <tbody>

                    @php

                    $sr=1;

                    @endphp

                    @foreach($messages as $notify)
                    

                    <tr>

                        <td>{{$sr}}</td>

                        <td>{{$notify->paper_id}}</td>
                        
                        <td>
                            @php 
                            $paper = Paper::where('id',$notify->paper_id)->first();
                            echo $paper->submission_title;
                            @endphp
                        </td>

                        <td>
                            
                         @php 
                         $name = User::where('id',$notify->from_user_id)->first();
                         $to_user = $name->id;
                         $from_user=Auth::guard('frontuser')->user()->id;
                         echo $name->name;

                         $paper_id = $notify->paper_id;
                         @endphp

                        </td> 

                        <td>{{$notify->message}}</td>

                        <td>

                        @php

                        echo date("d-m-Y", strtotime($notify->created_at));

                        @endphp 

                        </td>

                        <td>
                           <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Reply</button>
                            
                        </td>
                        <!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <form method="post" action="{{route('chief.respond_toPublisher')}}">@csrf
      <div class="modal-header">
        <h4 class="modal-title">Reply to Publisher </h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        
            <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                     <input type="hidden" name="paper_id" value="{{$paper_id}}">
                     <input type="hidden" name="from_user_id" value="{{$from_user}}">
                     <input type="hidden" name="to_user_id" value="{{$to_user}}">
                     <textarea name="remarks" class="form-control" placeholder="Enter Remarks..."></textarea>

                </div>
            </div>

            </div>
        
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Send</button>
      </div>
      </form>

    </div>
  </div>
</div>

                               <!-- Remarks Portion ends here -->

                        

                        

                        

                    </tr>

                    @php

                    $sr++;

                    @endphp

                    @endforeach

                </tbody>

                <tfoot>

                    <th></th>

                    <th></th>

                    <th></th>

                    <th></th>

                    <th></th>

                    <th></th>

                    <th></th>

                    

                </tfoot>

            </table>

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

