@extends('layouts.default')

@section('title', 'Create Permissions')

@section('heading')
    <h1>This is permission create page</h1>
@endsection

@section('content')
    <div class="col">
        <form action="{{ route('permissions.store') }}" method="POST">
            @include('admin.permissions.permissions-fields')

            <div class="form-group row">
                <div class="col-sm-3">
                    <button type="submit" class="btn btn-primary">Assign</button>
                </div>
                <div class="col-sm-9">
                    <a href="{{ route('permissions.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </div>
        </form>
    </div>
@endsection
