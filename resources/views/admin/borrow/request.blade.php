<!DOCTYPE html>
<html>
    <head>
   @include('admin.css')

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
            padding:10px;
        }
        td{
            padding:10px;
            margin: 10px;
        }
        tr{
            border: 1px solid wheat;
            padding:10px;
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
            <table>
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Book Title</th>
                        <th>Quantity</th>
                        <th>borrow status</th>
                        <th>Book Image</th>
                    </tr>
                </thead>
            <tbody>
                @foreach ($datas as $data )
                <tr>
                    <td>{{$data->user->name}}</td>
                    <td>{{$data->user->email}}</td>
                    <td>{{$data->user->phone}}</td>
                    <td>{{$data->book->title}}</td>
                    <td>{{$data->book->quantity}}</td>
                    <td>
                        @if ($data->status == 'Approved')
                        <span style="color:yellow">{{$data->status}}</span>
                        @endif
                        @if ($data->status == 'Returned')
                        <span style="color:skyblue">{{$data->status}}</span>
                        @endif
                        @if ($data->status == 'Rejected')
                        <span style="color:red">{{$data->status}}</span>
                        @endif
                        @if ($data->status == 'Applied')
                        <span style="color:white">{{$data->status}}</span>
                        @endif
                        </td>
                    <td><img  style="height:50px width:39px" src="book/{{$data->book->image}}" alt=""></td>
                    <td>
                        <a class="btn btn-warning" href="{{url('approve_book',$data->id)}}">Approved</a>
                        <a class="btn btn-danger" href="{{url('reject_book',$data->id)}}">Rejected</a>
                        <a class="btn btn-info" href="{{url('return_book',$data->id)}}">Returned</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
          </div>
        </div>
      </div>

</body>
</html>
