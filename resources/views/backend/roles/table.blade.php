<div class="table-responsive-sm">
    <table class="table table-striped" id="roles-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Permissions</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($roles as $role)
            <tr>
                <td>{!! $role->id !!}</td>
                <td>{!! $role->name !!}</td>
                <td>
                    @foreach ($role->permissions()->pluck('name') as $permission)
                        <spam>{!! ucfirst($permission) !!}</spam>
                        @if (!$loop->last)
                        ,
                        @endif
                    @endforeach
                </td>
                <td>

                    {!! Form::open(['route' => ['roles.destroy', $role->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('roles.edit', [$role->id]) }}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                        @if($role->name != 'root-admin')
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        @endif
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
