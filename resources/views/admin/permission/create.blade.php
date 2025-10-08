
@extends('admin.layouts.app')
@section('title', 'Employees | KRL')

@section('content')
<style>
    .form-label .required {
        color: red;
    }
    .table th, .table td {
        vertical-align: middle;
    }
</style>
    <div class="page-content">
        <div class="container-fluid">
           
            <div class="row listing-form">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>

                                <h4 class="card-title">🛞 Create Permission </h4>
                               
                            </div>
                             <a href="{{ route('admin.permissions.index') }}" class="btn btn-primary" >
                                ⬅ Back
                            </a>
                           
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.permissions.store')}}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="permissionName" class="form-label">Module Name</label>
                                    <input type="text" class="form-control" id="permissionName" name="module_name" placeholder="eg order" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Actions</label>
                                    <div class="checkbox-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="create" name="actions[]" value="create">
                                            <label class="form-check-label" for="create">Create</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="edit" name="actions[]" value="edit">
                                            <label class="form-check-label" for="edit">Edit</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="delete" name="actions[]" value="delete">
                                            <label class="form-check-label" for="delete">Delete</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="view" name="actions[]" value="view">
                                            <label class="form-check-label" for="view">View</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="add" name="actions[]" value="manage">
                                            <label class="form-check-label" for="manage">Manage</label>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="row mt-4">
                                    <div class="col-12 text-end">
                                       <button type="submit" class="btn btn-primary">Save Permission</button>
                                    </div>
                              </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- View Modal -->
    </div>
    </div>
    </div> <!-- end slimscroll-menu-->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
           
@endsection