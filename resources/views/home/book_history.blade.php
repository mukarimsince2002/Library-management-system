<!DOCTYPE html>
<html>
    <head>
   @include('home.css')
        <style type="text/css">
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
        .centre{
            margin: auto;
            width:50%;
            text-align: center;
            margin-top: 50px;
            border: 1px solid white;
        }

        th{
            background-color:skyblue;
            padding:50px;
        }
        tr{
            border: 1px solid wheat;
            padding:10px;
        }

        </style>
    </head>

  <body>

    @include('home.header')

    <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <div class="row">
            <div class="div_centre">
@if (session()->has('message'))
<div class="alert alert-success">
 {{ session()->get('message') }}
 <button type="button" class="dismiss" aria-hidden="true" data-bs-dismiss='alert'>X</button>
</div>
@endif
    <table>
        <thead>
            <tr>
                <th>Book Name</th>
                <th>Author</th>
                <th>Status</th>
                <th>Book Image</th>
                <th>Cancel Request</th>
            </tr>
        </thead>
    <tbody>
        @foreach ($datas as $data )
        <tr>
            <td>{{$data->book->title}}</td>
            <td>{{$data->book->author}}</td>
            <td>{{$data->status}} </td>
            <td><img  style="height:50px width:39px" src="book/{{$data->image}}" alt=""></td>
            <td>
                @if ($data->status == 'Approved')
                <a href="{{url('cancel_req',$data->id)}}"><button class="btn btn-warning">Cancel</button></a>
               @else
               <button class="btn btn-danger">Not Allowed</button>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>
<div>
    @include('home.footer')
</div>
</div>
</div>
</div>
</div>
    </body>
  </html>

