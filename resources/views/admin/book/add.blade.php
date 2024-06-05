<!DOCTYPE html>
<html>
   @include('admin.css')
   <style>
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
            <form action="{{url('add_book')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="div_pad">
                <label for="">Book Tittle</label>
                <input type="text" name="book_name">
            </div>
            <div class="div_pad">
                <label for="">Author Name</label>
                <input type="text" name="author_name">
            </div>
            <div class="div_pad">
                <label for="">Price</label>
                <input type="text" name="price">
            </div>
            <div class="div_pad">
                <label for="">Quantity</label>
                <input type="number" name="quantity">
            </div>
            <div class="div_pad">
                <label for="">Book Image</label>
                <input type="file" name="book_img">
            </div>
            <div class="div_pad">
                <label for="">Author Image</label>
                <input type="file" name="author_img">
            </div>
            <div class="div_pad">
                <label for="">Description</label>
               <textarea name="description" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="div_pad">
                <label for="">Category</label>
                <select name="category" id="" required>
                    @foreach ($datas as $data )
                    <option value="{{$data->id}}">{{$data->cat_title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="div_pad">
                <input type="submit" value="add_book" class="btn btn-info">
            </div>
            </form>
            </div>
            </div>
            </div>
            </div>
      @include('admin.footer')
  </body>
</html>
