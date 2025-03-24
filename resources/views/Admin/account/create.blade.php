@extends('Admin.main')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create New Account</h3>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.account.store') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter name" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                </div>

                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" class="form-control" placeholder="Enter phone number">
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" class="form-control" placeholder="Enter address">
                </div>

                <div class="form-group">
                    <label for="role">Role</label>
                    <select name="role" class="form-control">
                        <option value="Admin">Admin</option>
                        <option value="User">User</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                </div>

                <button type="submit" class="btn btn-primary">Create Account</button>
            </form>
        </div>
    </div>
@endsection
