<div class="col-md-8">
        <table class="table ">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên thuộc tính</th>
                    <th>Màu sắc</th>
                    <th>Size</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($attributes as $key => $att)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$att->name}}</td>
                    <td>{{$att->color}}</td>
                    <td>{{$att->size}}</td>
                    <td>
                        <div class="action">
                            <a href="{{route('attribute.edit',['id'=>$att->id])}}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> Sửa</a>
                            <form action="{{route('attribute.destroy',['id'=>$att->id])}}" method="POST"  class="form-action">
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
                {!! $attributes->links() !!}
        </div>