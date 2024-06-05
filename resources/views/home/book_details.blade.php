<!DOCTYPE html>
<html>
<head>
   @include('admin.css')
     <style>
    .table_centre{
        text-align: center;
        margin: auto;
        border: 1px solid yellowgreen;
        margin-top: 50px;
    }
    .div_centre{
        text-align: center;
        margin: auto;
    }
    th{
        background-color: skyblue;
        padding:10px;
        font-size: 20px;
        font-weight: bold;
        color: black;
    }
    .img_author{
        width: 75px;
        border-radius: 50%;
        margin: 20px;
    }
    .img_book{
        width: 150px;
       height: auto;
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
            <div class="div_centre">
                @if (session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                    {{session()->get('message')}}
                </div>
                @endif
            </div>
            <div>
                <table class="table_centre">
                    <thead >
                        <tr>
                            <th>Book Title</th>
                            <th>Author Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Book Image</th>
                            <th>Author Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                        <tr>
                            <td>{{$data->title}}</td>
                            <td>{{$data->author}}</td>
                            <td>{{$data->price}}</td>
                            <td>{{$data->quantity}}</td>
                            <td>{{$data->description}}</td>
                            <td>{{$data->category->cat_title}}</td>
                            <td><img  class="img_author" src="author/{{$data->author_img}}" alt=""></td>
                            <td><img class="img_book" src="book/{{$data->book_img}}" alt=""></td>
                            <td>
                                <a href="{{url('edit_book',$data->id)}}" class="btn btn-info">Edit</a>
                                <a onclick="confirmation(event)" href="{{url('delete_book',$data->id)}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>

      @include('admin.footer')
  </body>
</html>
