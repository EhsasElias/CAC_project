@extends('admin.layout.dashboard')
@section('content')

@if($do == 'Manage')

<h1 class="text-center fs-3 text-white">ادارة تصنيف السيارات</h1>
    <div class="container">
        @if(session()->has('success'))
            <div class="alert alert-success message">
                {{ session()->get('success') }}
            </div>
        @endif
        <a href="admincategories?do=Add" class="btn btn-sm bg-yellow">
            <i class="fa fa-plus"></i> اضافة  تصنيف
        </a>
        <div class="table-responsive text-white">
            <table class="main-table manage-members text-center table table-bordered  text-white">
                <tr >
                    <td>#ID</td>
                    <td>اسم التصنيف </td>
                    <td> صورة التصنيف</td>
                    <td>التحكم</td>
                </tr>
                <?php $i = 1 ?>
                @foreach($category as $category)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$category->name}}</td>
                    <td><img src="images/{{$category->image}}" width="80" alt="{{$category->image}}" ></td>
                    <td>
                        <a href="admincategories?do=Edit&categoryid={{$category->id}}" class="btn btn-success">
                            <i class='fa fa-edit'></i> Edit
                        </a>
                       
                        @if($category->is_active == 1)
                            <a href="" class='btn btn-info activate' data-bs-toggle="modal" data-bs-target="#activeCategory{{$category->id}}">
                                <i class='fa fa-check'></i> Active
                            </a>
                        @else
                            <a href="" class='btn btn-danger activate' data-bs-toggle="modal" data-bs-target="#activeCategory{{$category->id}}">
                                <i class='fa fa-close'></i> noActive
                            </a>
                        @endif
                        
                    </td>
                </tr>
                <div class="modal fade user" id="deleteCategory{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content bg-grey">
                            <form action="delete_admin_category" method="post">
                                @csrf
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    <h5 class="modal-title " id="exampleModalLabel">حذف طريقة دفع</h5>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="categoryid" value="{{$category->id}}">
                                    <h2 >هل انت متاكد</h2>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">تراجع</button>
                                    <input type="submit" class="btn btn-primary" value="حذف" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade user" id="activeCategory{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content bg-dark">
                            <form action="{{ route('active_admin_category',$category->id) }}" method="post">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">حالة الموديل</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                   
                                    <h2>هل انت متاكد</h2>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">تراجع</button>
                                    <input type="submit" class="btn btn-primary" value="تعديل الحالة" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </table>
        </div>
       
       
    </div>
@elseif($do == 'Add')
<!-- start add model -->
<h1 class="text-center fs-3 m-4"> اضافة صنف جديد </h1>
<div class="container col-lg-9 col-11">
    @if ($errors->any())
        <div class="alert alert-danger error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="add_admin_category" method="POST"  enctype="multipart/form-data">
    @csrf
        <!-- Start Payment -->
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label text-white"> إضافة صنف   </label>
            <div class="col-sm-8 col-md-9">
                <input type="text" name="name" class="form-control" value="{{old('name')}}" autocomplete="off" placeholder=" اضف تصنيف  ">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label text-white"> أضف صورة </label>
            <div class="col-sm-8 col-md-9">
                <input type="file" name="image" value="{{old('image')}}" class="form-control" autocomplete="off">
            </div>
        </div>
        <div class="form-check d-flex  justify-content-center mt-5 ">
            <input class="form-check-input col-7" type="checkbox" id="blankCheckbox" name="active" value="1" aria-label="...">
            <label class="col-6 mx-5 text-white" for="">تفعيل</label>    
        </div>
        <!-- End category -->
        <!-- Start Submit -->
        <div class="mb-2 row">
            <div class="offset-sm-2 col-sm-10">
                <input type="submit" value="اضافة تصنيف '" class=" btn bg-yellow ">
            </div>
        </div>
        <!-- End Submit -->
    </form>
</div>

@elseif($do == 'Edit')
<!-- start Edit model -->
{{$categoryid = isset($_GET['categoryid']) && is_numeric($_GET['categoryid']) ? intval($_GET['categoryid']) : 0;}}
<h1 class="text-center">Edit Modal</h1>
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @foreach($category as $cat)
        @if($cat->id == $categoryid)
            <form action="{{ route('edit_admin_category',$categoryid) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="categoryid" value="{{$categoryid}}">
                <!-- Start Name -->
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label text-white"> اسم الصنف   </label>
                    <div class="col-sm-8 col-md-9">
                        <input type="text" name="name" value="{{$cat->name}}" class="form-control" autocomplete="off" placeholder="ادخل طريقة الدفع ">
                    </div>
                </div>
                <!-- End Name -->
                <!-- Start Image -->
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label text-white"> صورة الصنف  </label>
                    <div class="col-sm-8 col-md-9">
                        <input type="file" name="image" value="{{$cat->image}}" class="form-control" autocomplete="off" placeholder="ادخل اسم البنك">
                        <input type="hidden" name="image_old" value="{{$cat->image}}" class="form-control" autocomplete="off" placeholder="ادخل اسم البنك">
                    </div>
                </div> 
                <!-- End Image -->
                <!-- Start Active -->
                <div class="form-check d-flex  justify-content-center mt-5 ">
                    <input class="form-check-input col-7" type="checkbox" id="blankCheckbox" name="active" value="1" aria-label="...">
                    <label class="col-6 mx-5 text-white" for="">تفعيل</label>    
                </div> 
                <!-- End Active -->
                <!-- Start Submit -->
                <div class="mb-2 row">
                    <div class="offset-sm-2 col-sm-10">
                        <input type="submit" value="تعديل التصنيف  " class=" btn btn-primary ">
                    </div>
                </div>
                <!-- End Submit -->
                
            </form>
        @endif
    @endforeach
</div>
@endif
@endsection
                