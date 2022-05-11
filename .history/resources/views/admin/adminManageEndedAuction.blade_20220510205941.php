@extends('admin.layout.dashboard')
@section('content')


<h1 class="text-center fs-3 text-white mb-5"> المزادات المنتهية لم يحصل لها مزايدة</h1>
    <div class="container">
        @if(session()->has('success'))
            <div class="alert alert-success message">
                {{ session()->get('success') }}
            </div>
        @endif
        
        <div class="table-responsive text-white ms-5">
            <table class="main-table manage-members text-center table table-bordered  text-white">
                <tr >
                    <td>#ID</td>
                    <td>السيارة </td>
                    <td>اسم البائع </td>
                    <td>المبلغ</td>
                    <td>تاريخ الانتهاء</td>
                    <td>تفاصيل المزايدة </td>
                    <td>التحكم </td>
                </tr>
                
                @foreach ($posts as $post )
    
@if (!isset($post->auctions[0]->is_active))
@if($post->is_active == 1 && $post->status_auction == 0 && $post->end_date <= date('Y-m-d') )
<tr >
    <td>#ID</td>
    <td>{{$post->name}} </td>
    <td> {{$post->user->name}} </td>
    <td>{{$post->starting_price}} </td>
    <td> {{$post->end_date}}</td>
    <td> <a href="{{route('auctiondetails',$post->id)}}" class="card-link active  fs-7">تفاصيل<i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>  </td>
    <td>التحكم </td>
</tr>

@endif
@endif
@endforeach
            </table>
        </div>
       
    </div>
<h1 class="text-center fs-3 text-white mb-5">  االمزادات المكتملة </h1>
    <div class="container">
        <div class="table-responsive text-white ms-5">
            <table class="main-table manage-members text-center table table-bordered  text-white">
                <tr >
                    <td>#ID</td>
                    <td>السيارة </td>
                    <td>اسم البائع </td>
                    <td>اسم المشتري </td>
                    <td>المبلغ المدفوع</td>
                    <td>المبلغ الابتدائي</td>
                    <td>تاريخ الانتهاء</td>
                    <td>تفاصيل المزايدة </td>
                    <td> ادارة الاشعارات  </td>
                
                </tr>
                @php $i = 1 @endphp
                @php $total= 0 @endphp
                

@foreach($orders as $order)
       

     
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$order->post->name}}</td>
                                <td>{{$order->post->users->name}}</td>
                                <td>{{$order->user->name}}</td>
                                <td>
                                    {{$order->post->auctions->max('bid_total');}}
                                </td>
                                <td>{{$order->post->starting_price}}</td>
                               
                                <td>{{$order->post->end_date}}</td>
                                <td>
                                    <a href="{{route('auctiondetails',$order->post->id)}}" class="card-link active text-center mt-5 mb-2"> تفاصيل المزاد <i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
                                </td>
                                <td>
                                    <a href="" class='btn btn-info activate' data-bs-toggle="modal" data-bs-target="#active{{$order->post->id}}">
                                        <i class='fa fa-check'></i> ارسال اشعار
                                    </a>
                                </td>
                            </tr>


                            @endforeach
                           
                            {{-- <div class="modal fade user" id="active{{$order->post->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content bg-dark">
                                        <form action="sendnotification" method="post">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">قبول المزاد</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h2>هل انت متاكد</h2>
                                                <input type="hidden" name="useraw" value="{{$auction->userAw->id}}">
                                                <input type="hidden" name="userid" value="{{$post->users->id}}">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class=" bg-lighter text-white fs-5" data-bs-dismiss="modal">تراجع</button>
                                                <input type="submit" class=" bg-yellow text-white fs-5" value=" قبول   " />
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                           --}}
            </table>
        </div>
       
    </div>
@endsection
                
