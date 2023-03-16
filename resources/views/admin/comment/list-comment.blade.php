@extends('admin_layout')
@section('title')
      {{$title}}
@endsection
@section('Admin.Dashboard')
    <div class="card">

        <div class="card-header border-0">
            <h3 class="mb-0">Liệt kê bình luận</h3>
        </div>
        <div id="notify_commment"></div>

        <div class="table-responsive">
            <?php
            $message = Session::get('message');
            if ($message) {
                echo $message;
                Session::put('message', null);
            }
            ?>
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        {{-- <th scope="col" class="sort" data-sort="name">ID</th> --}}
                        <th scope="col" class="sort" data-sort="budget">Duyệt</th>
                        <th scope="col" class="sort" data-sort="status">Tên người gửi</th>
                        <th scope="col" class="sort" data-sort="budget">Bình luận</th>
                        <th scope="col" class="sort" data-sort="budget">Ngày gửi</th>
                        <th scope="col" class="sort" data-sort="status">Sản phẩm</th>
                        <th scope="col" class="sort" data-sort="name">Quản lý</th>
                    </tr>
                </thead>
                <tbody class="list">
                    @foreach ($comment as $Data)
                        <tr>
                            <td class="budget">
                               @if($Data->comment_status==1)
                                    <input type="button" data-comment_status="0" data-comment_id="{{$Data->comment_id}}" id="{{$Data->comment_product_id}}"
                                     class="btn btn-primary comment_duyet_btn" value="Duyệt">
                               @else
                                    <input type="button" data-comment_status="1" data-comment_id="{{$Data->comment_id}}" id="{{$Data->comment_product_id}}"
                                        class="btn btn-danger comment_duyet_btn" value="Bỏ duyệt">
                               @endif
                            </td>
                            <td class="budget">
                                {{ $Data->comment_name }}
                            </td>
                            <td class="budget">
                                {{ $Data->comment }}
                                    <style type="text/css">
                                        ul.list_rep{
                                            margin-bottom: 0;
                                            padding-left: 0;
                                        }
                                        ul.list_rep li{
                                            list-style-type: decimal;
                                            color: #44a41b;
                                            margin: 5px 35px;
                                        }
                                    </style>
                                    <ul class="list_rep ">
                                        Trả lời:
                                        @foreach($comment_rep as $comm_reply)
                                           @if($comm_reply->comment_parent_comment==$Data->comment_id)
                                                <li>
                                                      {{$comm_reply->comment}}
                                                </li>
                                           @endif
                                        @endforeach
                                     </ul> 

                                @if($Data->comment_status==0)
                                    <textarea class="form-control reply_comment_{{$Data->comment_id}}" rows="3"></textarea>
                                    </br><button class=" btn btn-default btn-reply-comment" data-product_id="{{$Data->comment_product_id}}" data-comment_id="{{$Data->comment_id}}">Trả lời</button>                                
                                @endif
                            </td>
                            <td class="budget">
                                {{ $Data->comment_date }}
                            </td>
                            <td class="budget">
                               <a href="{{url('/chi-tiet-hoa-qua/'.$Data->product->product_id)}}" target="blank"> {{ $Data->product->product_name }}</a>
                            </td>
                            <td class="">
                                <div class="dropdown">
                                    {{-- <a href="#"> <button
                                            class="btn btn-success">Sửa</button>
                                    </a> --}}
                                    <a href="" > 
                                        <button
                                        class="btn btn-warning check_del" 
                                        type="button"
                                        onclick="confirm('Bạn có chắc chắn muốn xóa? ') === true ? window.location ='delete-comment/{{$Data->comment_id}}' : '';">
                                        Xóa</button>
                                </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- {{ $comment->links() }} --}}
       
    </div>

   
@endsection
