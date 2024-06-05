
<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
    <style>
         .div_centre{
            text-align: center;
            margin: auto;
        }
        .cat_label{
            font-size: 30px;
            font-weight: bold;
            padding: 30px;
            color: white;
        }

    </style>
</head>
<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <div class=div_centre>
            {{-- <div>
                @if (session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">X</button>
                    {{session()->get('message')}}
                </div>
            @endif
            </div> --}}
                <h1 class="cat_label">Update Category</h1>
            <form action="{{url('update_category',$datas->id)}}" method="POST">
                @csrf
                <span style="padding-right: 15px">
                    <label for="">Category Name</label>
                    <input type="text" name="category" id="" required value="{{$datas->cat_title}}">
                </span>

               <input class="btn btn-primary" type="submit" value="update category">
            </form>

            </div>
          </div>
        </div>
      </div>
      @include('admin.footer')
</body>

</html>
