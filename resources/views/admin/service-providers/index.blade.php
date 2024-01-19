<x-base-layout>
    <div class="panel-body">
        <div style="width:100%;margin:auto;max-width:1000px;">
            <div class="row">
                <div style="float:left">
                    <h3>Service Providers</h3>
                </div>
                <div style="float:right">
                    <a href="{{route('admin.service-providers.create')}}" class="btn btn-success">Add Service-Provider</a>
                </div>
            </div>
            @if(Session::has('message'))
                <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
            @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Service Category</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>
                            <img src="{{asset($user->SPInfo->image)}}" style="width:100px;height:auto" alt="">
                        </td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->SPInfo->category->name}}</td>
                        <td>{{date('d-m-Y',strtotime($user->created_at))}}</td>
                        <td>
                            {{-- <a href="/admin/order-view/{{$user->id}}" class="btn btn-primary">View</a> --}}
                            <a href="{{route('admin.service-providers.edit',$user->id)}}" class="btn btn-warning">edit</a>
                            {{-- <a href="{{route('admin.service-providers.destroy',$user->id)}}" class="btn btn-danger">Delete</a> --}}
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
   </div>
</x-base-layout>