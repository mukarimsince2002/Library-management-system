<!DOCTYPE html>
<html>
    <head>
   <style>
     .img_author{
        width: 75px;
        border-radius: 50%;
        margin: 20px;
    }
    .img_book{
        width: 150px;
       height: auto;
    }
    .div_centre{
        text-align: center;
        margin: auto;
    }
    .title_deg{
        color:white;
        padding:35px;
        font-size:40px;
        font-weight:bold;
    }
    label{
        display: inline-block;
        width: 200px;
    }
    .div_pad{
        padding:15px;
    }

   </style>
    @include('admin.css')
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
                <div>
                    @if (session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                        {{session()->get('message')}}
                    </div>
                    @endif
                </div>
            <h1 class="title_deg">Add Books</h1>
            <form action="{{url('update_book',$data->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="div_pad">
                <label for="">Book Tittle</label>
                <input type="text" name="book_name" value="{{$data->title}}">
            </div>
            <div class="div_pad">
                <label for="">Author Name</label>
                <input type="text" name="author_name" value="{{$data->author}}">
            </div>
            <div class="div_pad">
                <label for="">Price</label>
                <input type="text" name="price" value="{{$data->price}}">
            </div>
            <div class="div_pad">
                <label for="">Quantity</label>
                <input type="number" name="quantity" value="{{$data->quantity}}">
            </div>
            <div class="div_pad">
                <label for="">Current Book Image</label>
                <img  class="img_book" src="/book/{{$data->book_img}}" alt="">
            </div>
            <div class="div_pad">
                <label for="">Change Book Image</label>
                <input type="file" name="book_img">
            </div>
            <div class="div_pad">
                <label for="">Current Author Image</label>
                <img  class="img_author" src="/author/{{$data->author_img}}" alt="">
            </div>
            <div class="div_pad">
                <label for="">change Author Image</label>
                <input type="file" name="author_img">
            </div>
            <div>
                <label for="">Description</label>
               <textarea name="description" id="" cols="30" rows="10" >{{$data->description}}</textarea>
            </div>
            <div class="div_pad">
                <label for="">Category</label>
                <select name="category" id="" required>
                    <option value="{{$data->category_id}}"> {{$data->category->cat_title}}</option>
                    @foreach ($cat_datas as $cat_data )
                    <option value="{{$cat_data->id}}">{{$cat_data->cat_title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="div_pad">
                <input type="submit" value="update_book" class="btn btn-info">
            </div>
            </form>
            </div>
            </div>
            </div>
            </div>
      @include('admin.footer')
  </body>
</html>
