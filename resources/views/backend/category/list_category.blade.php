<table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>STT</th>
                <th>Cấp</th>
                <th>Tên danh mục</th>
                <th>Trạng thái</th>
                <th>Ngày tạo</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorys as $key => $cat)
            @php
                $status=$cat->status==1?'Hiện':'Ẩn';
            @endphp
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$cap}}</td>
                <td>{{$cat->name}}</td>
                <td>{{ $status}}</td>
                <td>{{ $cat->created_at}}</td>
                <td>
                    <div class="action">
                        <a href="{{route('dm_con_category',['id'=>$cat->id,'cap'=>($cap+1)])}}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> DM.con</a>
                        <a href="{{route('category.edit',['id'=>$cat->id])}}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> Sửa</a>
                        <form action="{{route('category.destroy',['id'=>$cat->id])}}" method="post" accept-charset="utf-8" class="form-action">
                         @csrf
                         <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-danger btn-sm"  onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><span class="glyphicon glyphicon-trash"></span> Xóa</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class=" paging">
            {!! $categorys->links() !!}
    </div>