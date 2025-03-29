@extends('Admin.main')
@section('content')
    <!-----------------------------Danh sách người dùng--------------------------->
    <div class="card-body">
        <div id="userTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12 col-md-6"></div>
                <div class="col-sm-12 col-md-6"></div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <table id="userTable" class="table table-bordered table-hover dataTable dtr-inline" role="grid"
                        aria-describedby="userTable_info">
                        <thead>
                            <tr role="row">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id ?? 'Chưa cập nhật' }}</td>
                                    <td>{{ $user->name ?? 'Chưa cập nhật' }}</td>
                                    <td>{{ $user->email ?? 'Chưa cập nhật' }}</td>
                                    <td>{{ $user->phone ?? 'Chưa cập nhật' }}</td>
                                    <td>{{ $user->address ?? 'Chưa cập nhật' }}</td>
                                    <td>{{ $user->role ?? 'Chưa cập nhật' }}</td>
                                    <td>{{ $user->status ?? 'Chưa cập nhật' }}</td>
                                    <td>{{ $user->created_at ?? 'Chưa cập nhật' }}</td>
                                    <td>{{ $user->updated_at ?? 'Chưa cập nhật' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
            <!-- Pagination Section -->
            <div class="row">
                <div class="col-sm-12 col-md-5">
                    <div class="dataTables_info" id="userTable_info" role="status" aria-live="polite">Showing 1 to 2 of 2
                        entries</div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="userTable_paginate">
                        <ul class="pagination">
                            <li class="paginate_button page-item previous disabled" id="userTable_previous">
                                <a href="#" aria-controls="userTable" data-dt-idx="0" tabindex="0"
                                    class="page-link">Previous</a>
                            </li>
                            <li class="paginate_button page-item active">
                                <a href="#" aria-controls="userTable" data-dt-idx="1" tabindex="0"
                                    class="page-link">1</a>
                            </li>
                            <li class="paginate_button page-item next disabled" id="userTable_next">
                                <a href="#" aria-controls="userTable" data-dt-idx="2" tabindex="0"
                                    class="page-link">Next</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
